
<?php
require_once "config.php";
require_once "../../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MissionC
{
    public function addMission($mission)
    {
        $sql = "INSERT INTO mission (id_m, title, description, imageM, place, gift_point,id_r ,latitude , longitude)
            VALUES (:id_m, :title, :description, :imageM, :place, :gift_point, :id_r , :latitude , :longitude)";
            
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_m' => $mission->getIdM(),
                'title' => $mission->getTitle(),
                'description' => $mission->getDescription(),
                'imageM' => $mission->getImageM(),
                'place' => $mission->getPlace(),
                'gift_point' => $mission->getGiftPoint(),
                'id_r'=> $mission->getIdR(),
                'latitude'=> $mission->getLatitude(),
                'longitude'=> $mission->getLongitude(),


            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        // Send an email to the user
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Update with your SMTP host
            $mail->SMTPAuth   = true;
            $mail->Username   = 'voysync@gmail.com'; // Update with your SMTP username
            $mail->Password   = 'cvpstdqqzmrugrln';    // Update with your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587; // Update with your SMTP port

            //Recipients
            $mail->setFrom('voysync@gmail.com', 'Voysync'); // Update with your email and name
            $mail->addAddress('aziz.zahra837@gmail.com', 'aziz');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Nouveau Mission Ajouté';
            $mail->Body    = 'Cher aziz,<br><br>'
                         .'Nous avons ajouté une nouvelle mission. Si vous êtes intéressé, visitez notre espace des missions.<br>'
                         .'Le contenu de la mission :<br>'
                         .'Titre : '.$mission->getTitle().'<br>'
                         .'Place : '.$mission->getPlace().'<br>'
                         .'Récompense : '.$mission->getIdR().'<br>'
                         .'Points de fidélité : '.$mission->getGiftPoint().'<br>';

            var_dump($mail);
            $mail->send();
            echo 'Email sent successfully';
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function updateMission($mission, $id_m)
    {
        $db = config::getConnexion();

        try {
            $query = $db->prepare(
                'UPDATE `mission` SET
                    title = :title, 
                    description = :description, 
                    imageM = :imageM, 
                    place = :place,
                    gift_point = :gift_point
                WHERE id_m = :id_m'
            );
            $query->execute([
                'id_m' => $id_m,
                'title' => $mission->getTitle(),
                'description' => $mission->getDescription(),
                'imageM' => $mission->getImageM(),
                'place' => $mission->getPlace(),
                'gift_point' => $mission->getGiftPoint(),
            ]);
            $rowCount = $query->rowCount();
            echo $rowCount . " records UPDATED successfully <br>";
            return $rowCount;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return -1;
        }
    }

    public function deleteMission($id_m)
    {
        $db = config::getConnexion();
        try {
            // Begin a transaction
            $db->beginTransaction();

            // Delete reviews associated with the mission
            $sqlDeleteReviews = "DELETE FROM review WHERE id_m = :id_m";
            $stmtDeleteReviews = $db->prepare($sqlDeleteReviews);
            $stmtDeleteReviews->bindValue(':id_m', $id_m);
            $stmtDeleteReviews->execute();

            // Delete the mission
            $sqlDeleteMission = "DELETE FROM mission WHERE id_m = :id_m";
            $stmtDeleteMission = $db->prepare($sqlDeleteMission);
            $stmtDeleteMission->bindValue(':id_m', $id_m);
            $stmtDeleteMission->execute();

            // Commit the transaction if everything was successful
            $db->commit();

            return true;
        } catch (Exception $e) {
            // Rollback the transaction if an error occurred
            $db->rollBack();
            die('Error:' . $e->getMessage());
        }
    }

    public function listMission()
    {
        $sql = "SELECT * FROM mission;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listMissionWithReward()
    {
        $sql = "SELECT m.*, r.title AS reward_name
                FROM mission m
                LEFT JOIN reward r ON m.id_r = r.id_r;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listMissionWithRewardHome()
    {
        $sql = "SELECT m.*, r.title AS reward_name
                FROM mission m
                LEFT JOIN reward r ON m.id_r = r.id_r;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    public function searchMissions($searchQuery) {
        $sql = "SELECT * FROM mission WHERE title LIKE '%$searchQuery%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function TrieMissions($TrieQuery) {
        $sql = "SELECT * FROM mission ORDER BY $TrieQuery ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function generatePDF()
{
    ob_start(); 
    $pdf = new TCPDF();

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Mission Report');
    $pdf->SetSubject('Mission Details');
    $pdf->SetKeywords('Mission, Report, PDF');

    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    $missions = $this->listMissionWithReward(); 
    $nbr = 1;
    $missionsPerPage = 3;
    $pageNumber = 1;
    $contentHeight = 0; // Track the content height to determine page breaks
    $pdf->Cell(0, 10, '_____________________________________ Page ' . $pageNumber . ' ____________________________________', 0, 1);
    $pageNumber++;
    foreach ($missions as $mission) {
        
        // Check if adding content will exceed page height
        if (($pdf->GetY() + 75) > $pdf->getPageHeight()) {
            $pdf->AddPage();
            $contentHeight = 0; // Reset content height for new page
            $pdf->Cell(0, 10, '_____________________________________ Page ' . $pageNumber . ' ____________________________________', 0, 1);
            $pageNumber++;
        }
        $pdf->Ln(15);
        $pdf->Cell(0, 10, '-------------------------- Mission ' . $nbr . ' --------------------------', 0, 1);
        $pdf->Cell(0, 10, 'Mission ID: ' . $mission['id_m'], 0, 1);
        $pdf->Cell(0, 10, 'Title: ' . $mission['title'], 0, 1);
        $pdf->Cell(0, 10, 'Description: ' . $mission['description'], 0, 1);
        $pdf->Cell(0, 10, 'Gift Point: ' . $mission['gift_point'], 0, 1);
        $pdf->Cell(0, 10, 'Reward name: ' . $mission['reward_name'], 0, 1);
        $contentHeight += 75; // Add height for mission content
    
        $nbr++;
    }
    ob_end_clean(); 

    $pdf->Output('mission_report.pdf', 'D');
}


    public function checkGeneratePDF()
    {
        if (isset($_POST['generatePDF']) && $_POST['generatePDF'] === 'true') {
            $this->generatePDF();
        }
    }
    
    
 // MissionC.php
    public function getAllMissionsCoordinates() {
        $sql = "SELECT id_m, title, latitude, longitude FROM mission";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $missions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $missions;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showMission($id_m)
    {
        $sql = "SELECT * FROM `mission` WHERE id_m = :id_m";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_m' => $id_m]);

            $mission = $query->fetch();
            return $mission;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
   
}
$MissionC = new MissionC();
$MissionC->checkGeneratePDF();
?>

<?php
require_once "C:/xampp/htdocs/Projet_webV2/config.php";
require_once "C:/xampp/htdocs/Projet_webV2/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MissionC
{
    public function addMission($mission)
    {
        $sql = "INSERT INTO mission (id_m, title, description, imageM, place, gift_point,id_r)
            VALUES (:id_m, :title, :description, :imageM, :place, :gift_point, :id_r)";
            
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
                'id_r'=> $mission->getIdR()
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
            $mail->setFrom('voysync@gmail.com', 'Your Name'); // Update with your email and name
            $mail->addAddress('aziz.zahra837@gmail.com', 'aziz');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Mission Added';
            $mail->Body    = 'Dear ' . 'aziz' . ',<br><br>'
                             ;
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
    function deleteMission($id_m)
    {
        $sql = "DELETE FROM mission WHERE id_m = :id_m";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_m', $id_m);
        
        try {
            $req->execute();
            return true;
        } catch (Exception $e) {
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
    public function searchMissions($searchQuery) {
        // Use SQL query to retrieve missions with titles similar to the search query
        // Example SQL query (replace with your actual query):
        $sql = "SELECT * FROM mission WHERE title LIKE '%$searchQuery%'";
        $db = config::getConnexion();
        // Execute the query and fetch results (this depends on your database connection method)
        // Example:
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
        // Execute the query and fetch results (this depends on your database connection method)
        // Example:
        try {
            $liste = $db->query($sql);
            return $liste;
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
    
    public function generatePDF()
    {
        ob_start(); // Start output buffering

        // Create a new TCPDF object
        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Mission Report');
        $pdf->SetSubject('Mission Details');
        $pdf->SetKeywords('Mission, Report, PDF');

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Fetch data from the database (example)
        // Replace this with your actual database query
        $missions = $this->listMissionWithReward(); // Assuming you have a method to fetch all missions
        $nbr = 1;
        $missionsPerPage = 3; // Number of missions per page
        $pageNumber = 1;
    
        // Loop through the missions and add them to the PDF
        foreach ($missions as $mission) {
            // Add a page for every $missionsPerPage missions
            if ($nbr % $missionsPerPage == 1) {
                $pdf->AddPage();
                $pdf->Cell(0, 10, '------------------ Page ' . $pageNumber . ' ------------------', 0, 1);
                $pageNumber++;
            }
    
            $pdf->Ln(15);
            $pdf->Cell(0, 10, '-------------------------- Mission ' . $nbr . ' --------------------------', 0, 1);
            $pdf->Cell(0, 10, 'Mission ID: ' . $mission['id_m'], 0, 1);
            $pdf->Cell(0, 10, 'Title: ' . $mission['title'], 0, 1);
            $pdf->Cell(0, 10, 'Description: ' . $mission['description'], 0, 1);
            $pdf->Cell(0, 10, 'Gift Point: ' . $mission['gift_point'], 0, 1);
            $pdf->Cell(0, 10, 'Reward name: ' . $mission['reward_name'], 0, 1);
    
            // Add more mission details as needed
            $nbr++;
        }
        ob_end_clean(); // Clean the output buffer without sending it to the browser

        // Output the PDF as a download
        $pdf->Output('mission_report.pdf', 'D');
    }
    public function checkGeneratePDF()
{
    if (isset($_POST['generatePDF']) && $_POST['generatePDF'] === 'true') {
        $this->generatePDF();
    }
}
    
    // public function searchMission($searchQuery) {
    //     $missions = []; // Initialize an array to store the search results
    
    //     // SQL query to search for missions based on the title
    //     $sql = "SELECT * FROM mission WHERE title LIKE :searchQuery";
    //     $db = config::getConnexion();
    //     echo 'SQL Query: ' . $sql . '<br>';

    
    //     try {
    //         $stmt = $db->prepare($sql);
    //         $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%');
    //         $stmt->execute();
    //         $missions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //         // Create HTML content for the search results
    //         $html = '';
    //         foreach ($missions as $mission) {
    //             $html .= '<div class="item">';
    //             $html .= '<h4>' . $mission['title'] . '</h4>';
    //             // Add more details as needed
    //             $html .= '</div>';
    //         }
    //         echo $html;
    
    //         // Return the HTML content as a variable
    //         return $html;
    //     } catch (PDOException $e) {
    //         // Handle the error, for example:
    //         return 'Error: ' . $e->getMessage();
    //     }
    // }
        
    
    
    
    
    
    

    public function MissionDone($mission)
    {
        $sql = "INSERT INTO mission (title,rate)
                VALUES (:title,:rate)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'title' => $mission->getTitle(),
                'rate'=>$mission->getRate()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
$MissionC = new MissionC();
$MissionC->checkGeneratePDF();
?>

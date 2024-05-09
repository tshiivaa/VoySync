
<?php
require_once "../../config.php";
require_once '../../vendor/autoload.php'; 
use Twilio\Rest\Client;


class ReviewC
{
    public function updateMissionWithReview($id_m)
{
    $sql = "UPDATE mission m
            JOIN (
                SELECT id_m, Round(Avg(rate),1) AS avg_rate
                FROM review
                GROUP BY id_m
            ) r ON m.id_m = r.id_m
            SET m.rate = r.avg_rate
            WHERE m.id_m = :id_m";
    
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id_m' => $id_m]);
        $rowCount = $query->rowCount();
        echo $rowCount . " records UPDATED successfully <br>";
        return $rowCount;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return -1;
    }
}
    public function listReviewWithMission()
    {
        $sql = "SELECT r.*, m.title AS mission_name
                FROM review r
                LEFT JOIN mission m ON r.id_m = m.id_m
                WHERE r.image IS NULL
                ORDER BY mission_name";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    public function listReview()
    {
        $sql = "SELECT * FROM review;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addReview($review)
    {
        $sql = "INSERT INTO review (id_rev, description, rate, image, id_m) VALUES (:id_rev, :description, :rate, :image, :id_m)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_rev' => $review->getIdRev(),
                'description' => $review->getDescription(),
                'rate'=> $review->getRate(),
                'image'=> $review->getImage(),
                'id_m'=> $review->getIdM()
            ]);
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function addReviewSMS($review)
    {
        $sql = "INSERT INTO review (id_rev, description, rate, image, id_m) VALUES (:id_rev, :description, :rate, :image, :id_m)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_rev' => $review->getIdRev(),
                'description' => $review->getDescription(),
                'rate'=> $review->getRate(),
                'image'=> $review->getImage(),
                'id_m'=> $review->getIdM()
            ]);

            // Send SMS notification
            $sid = "ACc4c16b3aa501bbe3b1099c6b9c5b0020"; // Your Twilio Account SID
            $token = "c63ec04ff6b849d0af81d6d832b0ea27"; // Your Twilio Auth Token
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create("+21655626765", // to (recipient phone number)
                    array(
                        "from" => "+18289701375", // your Twilio phone number
                        "body" => "La mission est bien validé .Vous avez reçu votre récomponse !" // message body
                    )
                );

            print($message->sid); // Optional: print the message SID for debugging

            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }


    
    function showReview($id_rev)
    {
        $sql = "SELECT * FROM `review` WHERE id_rev = :id_rev";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_rev' => $id_rev]);

            $mission = $query->fetch();
            return $mission;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
}
?>

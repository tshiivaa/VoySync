
<?php
require_once "../../config.php";

class MissionC
{
   
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
?>

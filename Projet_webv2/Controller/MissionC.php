<?php
require_once "../config.php";

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
    $sql = "INSERT INTO mission (id_m, title, description, image, place, gift_point)
            VALUES (:id_m, :title, :description, :image, :place, :gift_point)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_m' => $mission->getIdM(),
            'title' => $mission->getTitle(),
            'description' => $mission->getDescription(),
            'image' => $mission->getImage(),
            'place' => $mission->getPlace(),
            'gift_point' => $mission->getGiftPoint(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function updateMission($mission, $id_m)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE `mission` SET
                    title = :title, 
                    description = :description, 
                    image = :image, 
                    place = :place
                    gift_point = :gift_point, 
                WHERE id_m = :id_m'
            );
            $query->execute([
                'id_m' => $id_m,
                'title' => $mission->getTitle(),
                'description' => $mission->getDescription(),
                'image' => $mission->getImage(),
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
}
?>

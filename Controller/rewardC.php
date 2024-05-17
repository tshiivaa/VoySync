<?php
require_once 'config.php';

class RewardC
{
    public function listReward()
    {
        $sql = "SELECT * FROM reward;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteReward($id_r)
    {
        $sql = "DELETE FROM reward  WHERE id_r = :id_r";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_r', $id_r);
    
        try {
            $req->execute();
            return true;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function addReward($reward)
    {
        $sql = "INSERT INTO reward (id_r, title, type, image, description, place, prix_coins)
                VALUES (:id_r, :title, :type, :image, :description, :place, :prix_coins)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                "id_r" => $reward->getIdR(),
                "title" => $reward->getTitle(),
                "type" => $reward->getType(),
                "image" => $reward->getImage(),
                "description" => $reward->getDescription(),
                "place" => $reward->getPlace(),
                "prix_coins" => $reward->getPrixCoins(),
            ]);
            echo "Reward added successfully.";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function updateReward($reward, $id_r)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE `reward` SET 
                title = :title,
                type = :type,
                image = :image, 
                description = :description,
                place = :place, 
                prix_coins = :prix_coins
            WHERE id_r = :id_r'
        );
        $query->execute([
            'id_r' => $id_r,
            'title' => $reward->getTitle(),
            'type' => $reward->getType(),
            'image' => $reward->getImage(),
            'description' => $reward->getDescription(),
            'place' => $reward->getPlace(),
            'prix_coins' => $reward->getPrixCoins(),
        ]);
        $rowCount = $query->rowCount();
        if ($rowCount > 0) {
            echo $rowCount . " records UPDATED successfully <br>";
            return $rowCount;
        } else {
            echo "No records were updated.";
            return 0;
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return -1;
    }
}


    function showReward($id_r)
    {
        $sql = "SELECT * FROM `reward` WHERE id_r = :id_r";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_r' => $id_r]);

            $reward = $query->fetch();
            return $reward;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
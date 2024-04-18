<?php
require_once '../config.php';

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
        $sql = "DELETE FROM `reward` id_r WHERE = :id_r";
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
        $sql = "INSERT INTO `reward` (type, description, prix_coins)
                VALUES (:type, :description, :prix_coins)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'type' => $reward->getType(),
                'description' => $reward->getDescription(),
                'prix_coins' => $reward->getPrixCoins(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReward($reward, $id_r)
    {
        $sql = "UPDATE reward SET type = :type , description = :description , prix_coins = :prix_coins WHERE id_r = :id_r";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'type' => $reward->getType(),
                'description' => $reward->getDescription(),
                'prix_coins' => $reward->getPrixCoins(),
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error updating reward: ' . $e->getMessage());
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
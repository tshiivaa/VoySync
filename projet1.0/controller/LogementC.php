<?php
include_once '../config.php';

class LogementC
{
    public function listLogements()
    {
        $sql = "SELECT * FROM logement";
        $db = config::getConnexion();
        try
        {
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: ' . $e->getMessage());
        }                   
    }

    public function deleteLogement($IDlogement)
    {
        $sql = "DELETE FROM logement WHERE IDlogement=:IDlogement";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':IDlogement', $IDlogement);  
        try 
        {
            $query->execute();
        }
        catch (Exception $e)
        {
            die('Error:'. $e->getMessage());
        }
    }

    public function listLogement()
    {
        $sql = "SELECT * FROM logement";
        $db = config::getConnexion();
        try
        {
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: ' . $e->getMessage());
        }                   
    }
}
?>

<?php
include_once '../config.php';

class VolC
{
    public function listVols()
    {
        $sql = "SELECT * FROM vol";
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

    public function deleteVol($IDvol)
    {
        $sql = "DELETE FROM vol WHERE IDvol=:IDvol";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':IDvol', $IDvol);  
        try 
        {
            $query->execute();
        }
        catch (Exception $e)
        {
            die('Error:'. $e->getMessage());
        }
    }

    public function listVol()
    {
        $sql = "SELECT * FROM vol";
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

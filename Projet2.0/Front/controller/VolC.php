<?php
include_once '../configPW.php';

class VolC
{
    public function listVols()
    {
        $sql = "SELECT * FROM vol";
        $db = configPW::getConnexion();
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
        $db = configPW::getConnexion();
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
        $db = configPW::getConnexion();
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

    public function addVol($vol)
    {
        $sql = "INSERT INTO vol (IDvol, Compagnie, Num_vol, Depart, Arrive, DateDepart, DateArrive, DureeOffre, Prix, Classe, Evaluation)  
                VALUES (:IDvol, :Compagnie, :Num_vol, :Depart, :Arrive, :DateDepart, :DateArrive, :DureeOffre, :Prix, :Classe, :Evaluation)";
        $db = configPW::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute([
                'IDvol' => $vol->getIDvol(),
                'Compagnie' => $vol->getCompagnie(),
                'Num_vol' => $vol->getNum_vol(),
                'Depart' => $vol->getDepart(),
                'Arrive' => $vol->getArrive(),
                'DateDepart' => $vol->getDateDepart(),
                'DateArrive' => $vol->getDateArrive(),
                'DureeOffre' => $vol->getDureeOffre(),
                'Prix' => $vol->getPrix(),
                'Classe' => $vol->getClasse(),
                'Evaluation' => $vol->getEvaluation()
            ]);
        }
        catch (Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateVol($vol, $IDvol)
    {
        $sql = "UPDATE vol SET Compagnie = :Compagnie, Num_vol = :Num_vol, Depart = :Depart, Arrive = :Arrive, 
                DateDepart = :DateDepart, DateArrive = :DateArrive, DureeOffre = :DureeOffre, Prix = :Prix, 
                Classe = :Classe, Evaluation = :Evaluation WHERE IDvol = :IDvol";
        $db = configPW::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->execute([
                'IDvol' => $IDvol,
                'Compagnie' => $vol->getCompagnie(),
                'Num_vol' => $vol->getNum_vol(),
                'Depart' => $vol->getDepart(),
                'Arrive' => $vol->getArrive(),
                'DateDepart' => $vol->getDateDepart(),
                'DateArrive' => $vol->getDateArrive(),
                'DureeOffre' => $vol->getDureeOffre(),
                'Prix' => $vol->getPrix(),
                'Classe' => $vol->getClasse(),
                'Evaluation' => $vol->getEvaluation()
            ]);
        }
        catch (Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showVol($IDvol)
    {
        $sql = "SELECT * FROM vol WHERE IDvol = :IDvol";
        $db = configPW::getConnexion();
        try
        {
            $query = $db->prepare($sql);
            $query->bindValue(':IDvol', $IDvol);
            $query->execute();
            $vol = $query->fetch();
            return $vol;
        }
        catch (Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>

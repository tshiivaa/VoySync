<?php
require_once '../configPW.php';

class VolC
{
    public function listVols()
    {
        $sql = "SELECT * FROM vol";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            throw new Exception('Error fetching vols: ' . $e->getMessage());
        }                   
    }

    public function deleteVol($IDvol)
    {
        $sql = "DELETE FROM vol WHERE IDvol=:IDvol";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':IDvol', $IDvol);  
        try {
            $query->execute();
        } catch (Exception $e) {
            throw new Exception('Error deleting vol: ' . $e->getMessage());
        }
    }

    /*public function addVol($vol)
    {
        $sql = "INSERT INTO vol (IDvol, Compagnie, Num_vol, Depart, Arrive, DateDepart, DateArrive, DureeOffre, Prix, Classe, Evaluation)  
                VALUES (:IDvol, :Compagnie, :Num_vol, :Depart, :Arrive, :DateDepart, :DateArrive, :DureeOffre, :Prix, :Classe, :Evaluation)";
        $db = config::getConnexion();
        try {
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
        } catch (Exception $e) {
            throw new Exception('Error adding vol: ' . $e->getMessage());
        }
    }*/
    public function addVol($vol)
    {
        $sql = "INSERT INTO vol (Compagnie, Num_vol, Depart, Arrive, DateDepart, DateArrive, DureeOffre, Prix, Classe, Evaluation, File)
                VALUES (:Compagnie, :Num_vol, :Depart, :Arrive, :DateDepart, :DateArrive, :DureeOffre, :Prix, :Classe, :Evaluation, :File)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Compagnie' => $vol->getCompagnie(),
                'Num_vol' => $vol->getNum_vol(),
                'Depart' => $vol->getDepart(),
                'Arrive' => $vol->getArrive(),
                'DateDepart' => $vol->getDateDepart(),
                'DateArrive' => $vol->getDateArrive(),
                'DureeOffre' => $vol->getDureeOffre(),
                'Prix' => $vol->getPrix(),
                'Classe' => $vol->getClasse(),
                'Evaluation' => $vol->getEvaluation(),
                'File' =>$vol->getFile()
            ]);
        } catch (Exception $e) {
            throw new Exception('Error adding vol: ' . $e->getMessage());
        }
    }


    public function updateVol($vol, $IDvol)
    {
        $sql = "UPDATE vol SET Compagnie = :Compagnie, Num_vol = :Num_vol, Depart = :Depart, Arrive = :Arrive, 
                DateDepart = :DateDepart, DateArrive = :DateArrive, DureeOffre = :DureeOffre, Prix = :Prix, 
                Classe = :Classe, Evaluation = :Evaluation, File = :File WHERE IDvol = :IDvol";
        $db = config::getConnexion();
        try {
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
                'Evaluation' => $vol->getEvaluation(),
                'File' =>$vol->getFile()
            ]);
        } catch (Exception $e) {
            throw new Exception('Error updating vol: ' . $e->getMessage());
        }
    }

    public function showVol($IDvol)
    {
        $sql = "SELECT * FROM vol WHERE IDvol = :IDvol";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':IDvol', $IDvol);
            $query->execute();
            $vol = $query->fetch();
            return $vol;
        } catch (Exception $e) {
            throw new Exception('Error fetching vol details: ' . $e->getMessage());
        }
    }
}
?>

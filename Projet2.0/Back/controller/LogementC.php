<?php
include_once '../configPW.php';
include_once 'VolC.php';
include_once '../model/Vol.php';
class LogementC
{
    public function listLogement()
    {
        $sql = "SELECT * FROM logement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            throw new Exception('Error fetching logements: ' . $e->getMessage());
        }
    }

    public function deleteLogement($IDlogement)
    {
        $sql = "DELETE FROM logement WHERE IDlogement=:IDlogement";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':IDlogement', $IDlogement);
        try {
            $query->execute();
        } catch (Exception $e) {
            throw new Exception('Error deleting logement: ' . $e->getMessage());
        }
    }

    
    public function addLogement($logement) {
        $sqlCheck = "SELECT COUNT(*) FROM vol WHERE IDvol = :IDvol";
    $db = config::getConnexion();
    try {
        // Vérifier si l'IDvol existe dans la table vol
        $queryCheck = $db->prepare($sqlCheck);
        $queryCheck->execute(['IDvol' => $logement->getIDvol()]);
        $count = $queryCheck->fetchColumn();
        if ($count == 0) {
            throw new Exception("L'IDvol n'existe pas dans la table vol");
        }
        // Si l'IDvol est valide, procéder à l'ajout du logement
        $sql = "INSERT INTO logement (IDLogement, Nom, Type, Adresse, Prix, Description, Capacite, Evaluation, Disponibilite, IDvol/*, img*/)  
                VALUES (:IDLogement, :Nom, :Type, :Adresse, :Prix, :Description, :Capacite, :Evaluation, :Disponibilite, :IDvol/*, :img*/)";
        $query = $db->prepare($sql);
        $query->execute([
            'IDLogement' => $logement->getIDlogement(),
            'Nom' => $logement->getNom(),
            'Type' => $logement->getType(),
            'Adresse' => $logement->getAdresse(),
            'Prix' => $logement->getPrix(),
            'Description' => $logement->getDescription(),
            'Capacite' => $logement->getCapacite(),
            'Evaluation' => $logement->getEvaluation(),
            'Disponibilite' => $logement->getDisponibilite(),
            'IDvol' => $logement->getIDvol(),
            //'img' => $logement->getImage(),
        ]);
    }
    catch (Exception $e) {
        throw new Exception('Erreur lors de l ajout du logement : ' . $e->getMessage());
    }
    }


    public function updateLogement($logement, $IDlogement)
    {
        $sql = "UPDATE logement SET Nom = :Nom, Type = :Type, Adresse = :Adresse, Prix = :Prix, Description = :Description, 
                Capacite = :Capacite, Evaluation = :Evaluation, Disponibilite = :Disponibilite/*, img = :img*/ WHERE IDlogement = :IDlogement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IDlogement' => $IDlogement,
                'Nom' => $logement->getNom(),
                'Type' => $logement->getType(),
                'Adresse' => $logement->getAdresse(),
                'Prix' => $logement->getPrix(),
                'Description' => $logement->getDescription(),
                'Capacite' => $logement->getCapacite(),
                'Evaluation' => $logement->getEvaluation(),
                'Disponibilite' => $logement->getDisponibilite(),
                //'img' => $logement->getImage(),
            ]);
        } 
        catch (Exception $e) 
        {
            throw new Exception('Error updating logement: ' . $e->getMessage());
        }
    }

    public function showLogement($IDlogement)
    {
        $sql = "SELECT * FROM logement WHERE IDlogement = :IDlogement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':IDlogement', $IDlogement);
            $query->execute();
            $logement = $query->fetch();
            return $logement;
        } catch (Exception $e) {
            throw new Exception('Error fetching logement details: ' . $e->getMessage());
        }
    }
}
?>

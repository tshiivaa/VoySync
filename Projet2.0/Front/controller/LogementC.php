<?php
include_once '../configPW.php';

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

    public function addLogement($logement)
{
    $sql = "INSERT INTO logement (IDLogement, Nom, Type, Adresse, Prix, Description, Capacite, Evaluation, Disponibilite)  
            VALUES (:IDLogement, :Nom, :Type, :Adresse, :Prix, :Description, :Capacite, :Evaluation, :Disponibilite)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'IDLogement' => $logement->getIdLogement(), 
            'Nom' => $logement->getNom(),
            'Type' => $logement->getType(),
            'Adresse' => $logement->getAdresse(),
            'Prix' => $logement->getPrix(),
            'Description' => $logement->getDescription(),
            'Capacite' => $logement->getCapacite(),
            'Evaluation' => $logement->getEvaluation(),
            'Disponibilite' => $logement->getDisponibilite()
        ]);
    } catch (Exception $e) {
        throw new Exception('Error adding logement: ' . $e->getMessage());
    }
}


    public function updateLogement($logement, $IDlogement)
    {
        $sql = "UPDATE logement SET Nom = :Nom, Type = :Type, Adresse = :Adresse, Prix = :Prix, Description = :Description, 
                Capacite = :Capacite, Evaluation = :Evaluation, Disponibilite = :Disponibilite WHERE IDlogement = :IDlogement";
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
                'Disponibilite' => $logement->getDisponibilite()
            ]);
        } catch (Exception $e) {
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
    public function getFilteredLogements($date_reservation, $destination, $capacite) {
        $sql = "SELECT * FROM logement 
                WHERE Capacite >= :capacite 
                AND Adresse LIKE :destination"; 
    
        $db = config::getConnexion();
        $stmt = $db->prepare($sql);
    
        // Lier les paramètres de filtrage
        $stmt->bindValue(':capacite', $capacite);
        $stmt->bindValue(':destination', '%' . $destination . '%'); // Pour la recherche par adresse
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error fetching filtered logements: " . $e->getMessage());
        }
    }
    
    
}
?>

<?php
include_once '../Model/Destination.php';
include_once '../config.php';

class DestinationController {
    
    public function listDestinations() {
        $query = "SELECT * FROM destination";
        $pdo = config::getConnexion();
        try {
            $stmt = $pdo->query($query);
            $listDestinations = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $destination = new Destination($row['id_destination'], $row['nom'], $row['description'], $row['pays']);
                $listDestinations[] = $destination;
            }
            return $listDestinations;
        } catch(Exception $e) {
            die('erreur:' . $e->getMessage());
        }
    }

    public function createDestination($nom, $description, $pays) {
        $pdo = config::getConnexion();
        $query = "INSERT INTO destination (nom, description, pays) VALUES (:nom, :description, :pays)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':pays', $pays);
        $stmt->execute();
    }

    public function updateDestination($id_destination, $nom, $description, $pays) {
        $pdo = config::getConnexion();
        $query = "UPDATE destination SET ";
        $params = [];
    
        if (!empty($nom)) {
            $query .= "nom = :nom, ";
            $params[':nom'] = $nom;
        }
    
        if (!empty($description)) {
            $query .= "description = :description, ";
            $params[':description'] = $description;
        }
    
        if (!empty($pays)) {
            $query .= "pays = :pays, ";
            $params[':pays'] = $pays;
        }
    
        $query = rtrim($query, ', ');
    
        $query .= " WHERE id_destination = :id_destination";
    
        $stmt = $pdo->prepare($query);
    
        foreach ($params as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
    
        $stmt->bindParam(':id_destination', $id_destination);
    
        $stmt->execute();
    }
    

    public function deleteDestination($id_destination) {
        $pdo = config::getConnexion();
        $query = "DELETE FROM destination WHERE id_destination = :id_destination";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_destination', $id_destination);
        $stmt->execute();
    }
}
?>

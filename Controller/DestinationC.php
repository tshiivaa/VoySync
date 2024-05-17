<?php

require_once __DIR__ . '/../Model/Destination.php';
require_once 'config.php';

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

    public function listCountries() {
        $pdo = config::getConnexion();
        $query = "SELECT DISTINCT pays FROM destination";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $countryNames = [];
        foreach ($countries as $country) {
            $countryNames[] = $country['pays'];
        }
        return $countryNames;
    }

    public function listDestinationsByCountry($country) {
        $pdo = config::getConnexion();
        $query = "SELECT nom FROM destination WHERE pays = :country";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->execute();
        
        $options = ""; // Chaîne pour stocker les options HTML
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $options .= "<option value='" . $row['nom'] . "'>" . $row['nom'] . "</option>";
        }
        return $options;
    }
}
if (isset($_GET['country'])) {
    $selectedCountry = $_GET['country'];

    // Appeler la méthode pour récupérer les destinations associées au pays sélectionné
    $DestinationController = new DestinationController();
    $options = $DestinationController->listDestinationsByCountry($selectedCountry);

    // Retourner les options HTML
    echo $options;
}
?>

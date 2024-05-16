<?php
include_once '../config.php';

// Check if depart and arrive parameters are set
if(isset($_GET['depart']) && isset($_GET['arrive'])) {
    // Sanitize and store the parameters
    $depart = $_GET['depart'];
    $arrive = $_GET['arrive'];

    try {
        // Get PDO connection instance
        $pdo = config::getConnexion();

        // Prepare the database query
        $query = "SELECT * FROM vol WHERE Depart = :depart AND Arrive = :arrive";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':depart', $depart);
        $statement->bindParam(':arrive', $arrive);

        // Execute the query
        $statement->execute();

        // Fetch the results
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Convert the result to JSON format
        $jsonResult = json_encode($rows);

        // Return the JSON result
        echo $jsonResult;
    } catch(PDOException $e) {
        // Handle query error
        echo "Error executing query: " . $e->getMessage();
    }
}
if(isset($_GET['prix']) && isset($_GET['adresse']) && isset($_GET['heb'])) {
    // Sanitize and store the parameters
    $prix = $_GET['prix'];
    $adresse = $_GET['adresse'];
    $heb = $_GET['heb'];

    try {
        // Get PDO connection instance
        $pdo2 = config::getConnexion();

        // Prepare the database query
        $query2 = "SELECT * FROM logement WHERE Type = :heb AND Adresse = :adresse AND Prix <= :prix";
        $statement2 = $pdo2->prepare($query2);
        $statement2->bindParam(':heb', $heb);
        $statement2->bindParam(':adresse', $adresse);
        $statement2->bindParam(':prix', $prix);

        // Execute the query
        $statement2->execute();

        // Fetch the results
        $rows2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

        // Convert the result to JSON format
        $jsonResult2 = json_encode($rows2);

        // Return the JSON result
        echo $jsonResult2;
    } catch(PDOException $e2) {
        // Handle query error
        echo "Error executing query: " . $e2->getMessage();
    }
}
?>

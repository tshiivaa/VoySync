<?php
//include '../Controller/Configuration.php';
//include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['IDart']) && isset($_POST['rating'])) {
        $IDart = $_POST['IDart'];
        $rating = $_POST['rating'];

        $sql = "INSERT INTO notation (rating,IDart) 
                VALUES (:rating, :IDart)";

        $pdo = Configuration::getConnexion();

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':IDart', $IDart);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header("Location:blog.php");
                exit();
            } else {
                header("Location: blog.php");
                exit();
            }
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
        if ($resultat !== null) {
            header("Location: blog.php");
            exit();
        } else {
            header("Location: blog.php");
            exit();
        }
    } else {
        header("Location: erreur.php");
        exit();
    }
} else {
    header("Location: erreur.php");
    exit();
}
?>
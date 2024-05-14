<?php
include '../../Model/CommentModel.php';
include '../../Controller/BlogController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['IDart']) && isset($_POST['ContenuComm'])) {
        $IDart = $_POST['IDart'];
        $ContenuComm = $_POST['ContenuComm'];

        $sql = "INSERT INTO commentaire (ContenuComm,IDart) 
                VALUES (:ContenuComm, :IDart)";

        $pdo = Configuration::getConnexion();

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':ContenuComm', $ContenuComm);
            $stmt->bindParam(':IDart', $IDart);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header("Location: comments.php?IDart=$IDart&success=true");
                exit();
            } else {
                header("Location: comments.php?IDart=$IDart&error=true");
                exit();
            }
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
        if ($resultat !== null) {
            header("Location: comments.php?IDart=$IDart&success=true");
            exit();
        } else {
            header("Location: comments.php?IDart=$IDart&error=true");
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
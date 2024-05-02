<?php
include '../../Model/CommentModel.php';
include '../../Controller/BlogController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['IDart']) && isset($_POST['ContenuComm'])) {
        $IDart = $_POST['IDart'];
        $ContenuComm = $_POST['ContenuComm'];

        $pdo = Configuration::getConnexion();

        $sql = "INSERT INTO commentaire (ContenuComm,IDart) 
                VALUES (:ContenuComm, :IDart)";

        $pdo = Configuration::getConnexion();

        try {
            // Préparer la déclaration
            $stmt = $pdo->prepare($sql);

            // Lier les paramètres
            $stmt->bindParam(':ContenuComm', $ContenuComm);
            $stmt->bindParam(':IDart', $IDart);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // Rediriger vers la page des commentaires de l'article avec un message de succès
                header("Location: comments.php?IDart=$IDart&success=true");
                exit();
            } else {
                // Rediriger vers la page des commentaires de l'article avec un message d'erreur
                header("Location: comments.php?IDart=$IDart&error=true");
                exit();
            }
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
        // Vérifier si l'ajout du commentaire a réussi
        if ($resultat !== null) {
            // Rediriger vers la page des commentaires de l'article avec un message de succès
            header("Location: comments.php?IDart=$IDart&success=true");
            exit();
        } else {
            // Rediriger vers la page des commentaires de l'article avec un message d'erreur
            header("Location: comments.php?IDart=$IDart&error=true");
            exit();
        }
    } else {
        // Rediriger vers une page d'erreur si les données du formulaire sont manquantes
        header("Location: erreur.php");
        exit();
    }
} else {
    // Rediriger vers une page d'erreur si la requête n'est pas de type POST
    header("Location: erreur.php");
    exit();
}
?>
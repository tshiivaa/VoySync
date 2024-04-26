<?php
include '../../Model/CommentModel.php';
include '../../Controller/BlogController.php';

if (isset($_POST['submit'])) {
    $ContenuComm = $_POST['ContenuComm'];
    $DatePubComm = date('Y-m-d H:i:s');
    $IDart = $_POST['$IDart'];
    $sql = "INSERT INTO commentaire (ContenuComm,DatePubComm,IDart) VALUES (:ContenuComm, :DatePubComm, :IDart)";
    $db = Configuration::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':ContenuComm', $ContenuComm);
        $query->bindParam(':DatePubComm', $DatePubComm);
        $query->bindParam(':IDart', $IDart);

        $query->execute();

        echo "Le commentaire a été ajouté avec succès.";
    } catch (Exception $e) {
        echo "Une erreur s'est produite lors de l'ajout du commentaire : " . $e->getMessage();
    }
} else {
    echo "Toutes les données requises n'ont pas été fournies.";
}

?>
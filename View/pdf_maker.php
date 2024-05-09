<?php
require '../Controller/connexion.php';
require('fpdf/fpdf.php'); // Inclure la bibliothèque FPDF

// Vérifier si 'user_id' est fourni dans l'URL
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Requête pour récupérer les informations de l'utilisateur à partir de la table "utilisateurs"
    $user_query = "SELECT id, email, password, date_nais, phone, role FROM utilisateurs WHERE id = :user_id";
    $conn = config::connexion();
    $user_stmt = $conn->prepare($user_query);
    $user_stmt->execute(array(':user_id' => $user_id));
    $user_data_row = $user_stmt->fetch(PDO::FETCH_ASSOC);

    if ($user_data_row) {
        // Créer une nouvelle instance de FPDF
        $pdf = new FPDF();
        $pdf->AddPage(); // Ajouter une nouvelle page

        // Ajouter du contenu au PDF
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'INFORMATION UTILISATEUR', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'ID: ' . $user_data_row['id'], 0, 1);
        $pdf->Cell(0, 10, 'Email: ' . $user_data_row['email'], 0, 1);
        $pdf->Cell(0, 10, 'Date de naissance: ' . $user_data_row['date_nais'], 0, 1);
        $pdf->Cell(0, 10, 'phone: ' . $user_data_row['phone'], 0, 1);
        $pdf->Cell(0, 10, 'Role: ' . $user_data_row['role'], 0, 1);

        // Spécifier le nom de fichier pour le PDF
        $file_name = "USER_INFO_" . $user_data_row['id'] . ".pdf";

        // Déterminer l'action en fonction du paramètre 'action' dans l'URL
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'view') {
                $pdf->Output($file_name, 'I'); // Afficher le PDF dans le navigateur
            } else if ($_GET['action'] == 'download') {
                $pdf->Output($file_name, 'D'); // Télécharger le PDF
            } else if ($_GET['action'] == 'upload') {
                $pdf->Output($file_name, 'F'); // Enregistrer le PDF sur le serveur
                echo "Upload réussi !";
            } else {
                echo 'Action invalide.';
            }
        } else {
            echo 'Action non spécifiée.';
        }

    } else {
        echo 'Aucun enregistrement trouvé pour le PDF.';
    }
} else {
    echo 'ID utilisateur non fourni.';
}
?>

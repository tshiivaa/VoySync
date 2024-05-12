<?php
include '../../Controller/DepenseC.php';

$depenseC = new DepenseC();

if (isset($_GET['location'])) {

    $lieu = $_GET['location'];

    $resultats = $depenseC->TotalB_Lieu($lieu);

    // Gérer la réponse en renvoyant les totaux au format JSON
    header('Content-Type: application/json');
    echo json_encode($resultats);
} else {

    http_response_code(400);
    echo "Missing location parameter";
}
?>

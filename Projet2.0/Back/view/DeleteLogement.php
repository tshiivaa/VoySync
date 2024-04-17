<?php
include '../controller/LogementC.php';

if (isset($_POST['IDlogement'])) {
    $IDlogement = $_POST['IDlogement'];
    $logementC = new LogementC();
    $logementC->deleteLogement($IDlogement);
    header('location:ListLogement.php');
} else {
    header('location:ErrorPage.php');
    exit();
}
?>

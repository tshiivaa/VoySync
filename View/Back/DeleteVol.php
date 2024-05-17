<?php
include '../../Controller/VolC.php';

if (isset($_POST['IDvol'])) {
    $IDvol = $_POST['IDvol'];
    $volC = new VolC();
    $volC->deleteVol($IDvol);
    header('location:ListVol.php');
} else {
    header('location:ErrorPage.php');
    exit();
}
?>

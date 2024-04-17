<?php
ob_start();
include '../View/Budget.php';
$id = $_GET["id"];
  $depDel = $depenseC->deleteDepense($_GET["id"]);
  if ($depDel) {
    header("Location:Budget.php");
    exit();
  } else {
    echo "Failed to delete expense item.";
  }
  ob_end_flush();
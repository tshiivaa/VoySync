<?php
ob_start();
include 'C:\wamp64\www\Voysync_nour\View\Front\Budget.php';
$id = $_GET["id"];
  $depDel = $depenseC->deleteDepense($_GET["id"]);
  if ($depDel) {
    header("Location:Budget.php");
    exit();
  } else {
    echo "Failed to delete expense item.";
  }
  ob_end_flush();
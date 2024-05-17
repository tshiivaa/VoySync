<?php
ob_start();
include '../../View/Front/Document.php';
$id = $_GET["id"];
$doDel = $documentC->deleteDocumentVoyage($_GET["id"]);
if ($doDel) {
  header("Location:Document.php");
  exit();
} else {
  echo "Failed to delete expense item.";
}
ob_end_flush();
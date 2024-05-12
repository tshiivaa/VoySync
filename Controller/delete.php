<?php
require "connexion.php";
$conn = config::connexion();

$id = $_GET["id"];

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM `utilisateurs` WHERE id = :id");

    // Bind parameter
    $stmt->bindParam(':id', $id);

    // Execute the statement
    $stmt->execute();

    // Redirect after successful deletion
    header("Location: index.php?msg=Data deleted successfully");
    exit();
} catch (PDOException $e) {
    // Handle errors
    echo "Failed: " . $e->getMessage();
}
?>

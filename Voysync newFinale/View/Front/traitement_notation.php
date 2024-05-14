<?php
include '../../Model/BlogModel.php';
include '../../Controller/Configuration.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['note']) && isset($_POST['IDart'])) {
    $note = $_POST['note'];
    $IDart = $_POST['IDart'];

    $query = "INSERT INTO notation (rating, IDart) VALUES (:rating, :IDart)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':rating', $note);
    $stmt->bindParam(':IDart', $IDart);
    $stmt->execute();

    $query = "SELECT AVG(rating) AS averageRating FROM notation WHERE IDart = :IDart";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':IDart', $IDart);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(array('success' => true, 'averageRating' => $result['averageRating']));
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid data received.'));
}
?>
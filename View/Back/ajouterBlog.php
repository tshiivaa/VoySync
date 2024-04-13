<?php

include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';


if (isset($_POST['submit'])) {
    // Retrieve form data
    $TitreArt = $_POST['TitreArt'];
    $ContenuArt = $_POST['ContenuArt'];
    $DatePubArt = date('Y-m-d H:i:s');
    $AuteurArt = $_POST['AuteurArt'];

    // Prepare SQL query
    $sql = "INSERT INTO blog (TitreArt, ContenuArt,DatePubArt, AuteurArt) 
            VALUES (:TitreArt, :ContenuArt, :DatePubArt, :AuteurArt)";

    // Get PDO connection
    $pdo = Configuration::getConnexion();

    try {
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':TitreArt', $TitreArt);
        $stmt->bindParam(':ContenuArt', $ContenuArt);
        $stmt->bindParam(':DatePubArt', $DatePubArt);
        $stmt->bindParam(':AuteurArt', $AuteurArt);

        // Execute the statement
        $stmt->execute();

        // Redirect to BlogPage.php upon success
        header('Location: BlogPage.php');
        exit(); // Stop further execution
    } catch (PDOException $e) {
        // Handle database errors
        die('Error: ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>

<body>
    <div class="card">
        <div class="card-body">
            <a class="btn btn-primary" href="addBlog.php" role="button">ajouter article </a>
        </div>
    </div>

    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <label for="TitreArt">Titre :</label>
            <input type="text" id="TitreArt" name="TitreArt" placeholder="entrer le titre" required>

            <br>

            <label for="ContenuArt">Contenu :</label>
            <input type="text" id="ContenuArt" name="ContenuArt" placeholder="Entrer le contenu" required>

            <br>

            <!-- <label for="DatePubArt">Date de publication:</label>
            <input type="datetime-local" id="DatePubArt" name="DatePubArt" required>

            <br> -->

            <label for="AuteurArt">Auteur :</label>
            <input type="text" id="AuteurArt" name="AuteurArt" placeholder="Entrer votre nom" required>

            <br>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" name="submit">ajouter</button>
        </form>
    </div>
</body>

</html>
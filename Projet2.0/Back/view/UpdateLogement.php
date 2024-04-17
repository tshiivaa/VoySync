<?php
include '../controller/LogementC.php';
include '../model/Logement.php';

$logementC = new LogementC();
$s = 0;

// Check if all form fields are set
if (
    isset($_POST['idlogement']) &&
    isset($_POST['nom']) &&
    isset($_POST['type']) &&
    isset($_POST['adresse']) &&
    isset($_POST['prix']) &&
    isset($_POST['description']) &&
    isset($_POST['capacite']) &&
    isset($_POST['evaluation']) &&
    isset($_POST['disponibilite'])
) {
    // Create a new instance of the Logement class and set its properties
    $logement = new Logement(
        $_POST['idlogement'],  // IDLogement
        $_POST['nom'],         // Nom
        $_POST['type'],        // Type
        $_POST['adresse'],     // Adresse
        $_POST['prix'],        // Prix
        $_POST['description'], // Description
        $_POST['capacite'],    // Capacite
        $_POST['evaluation'],  // Evaluation
        $_POST['disponibilite']// Disponibilite
    );

    // Update the logement using the LogementController
    $logementC->updateLogement($logement, $_POST['idlogement']);

    // Set the flag to indicate that the data is valid
    $s = 1;
}

// Fetch the logement details to prepopulate the form
if (isset($_GET['idlogement'])) {
    $idlogement = $_GET['idlogement'];
    $logementDetails = $logementC->showLogement($idlogement);
} else {
    // Handle the case when IDlogement is not provided
    // Redirect to an error page or handle gracefully
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un logement</title>
</head>
<body>
    <h2>Modifier un logement</h2>
    <form method="POST" action="UpdateLogement.php">

        <!-- Hidden input field to pass IDlogement -->
        <input type="hidden" id="idlogement" name="idlogement" value="<?= $logementDetails['IDlogement']; ?>" required>

        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" value="<?= $logementDetails['Nom']; ?>" required><br>
        
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" value="<?= $logementDetails['Type']; ?>" required><br>
        
        <label for="adresse">Adresse:</label><br>
        <input type="text" id="adresse" name="adresse" value="<?= $logementDetails['Adresse']; ?>" required><br>
        
        <label for="prix">Prix:</label><br>
        <input type="number" id="prix" name="prix" value="<?= $logementDetails['Prix']; ?>" required><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?= $logementDetails['Description']; ?></textarea><br>
        
        <label for="capacite">Capacité:</label><br>
        <input type="number" id="capacite" name="capacite" value="<?= $logementDetails['Capacite']; ?>" required><br>
        
        <label for="evaluation">Evaluation:</label><br>
        <input type="number" id="evaluation" name="evaluation" min="0" max="5" value="<?= $logementDetails['Evaluation']; ?>" required><br>
        
        <label for="disponibilite">Disponibilité:</label><br>
        <select id="disponibilite" name="disponibilite" required>
            <option value="disponible" <?= $logementDetails['Disponibilite'] == 'disponible' ? 'selected' : ''; ?>>Disponible</option>
            <option value="non disponible" <?= $logementDetails['Disponibilite'] == 'non disponible' ? 'selected' : ''; ?>>Non disponible</option>
        </select><br><br>
        
        <input type="submit" value="Modifier">
    </form>

    <?php if($s==1): ?>
        <script>alert('Vous avez modifié le logement');</script>
        <script>window.location.href='ListLogement.php'</script>
    <?php endif; ?>
</body>
</html>

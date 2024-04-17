<?php
include '../controller/VolC.php';
include '../model/Vol.php';

$volC = new VolC();
$s = 0;

// Check if all form fields are set
if (
    isset($_POST['IDvol']) &&
    isset($_POST['Compagnie']) &&
    isset($_POST['Num_vol']) &&
    isset($_POST['Depart']) &&
    isset($_POST['Arrive']) &&
    isset($_POST['DateDepart']) &&
    isset($_POST['DateArrive']) &&
    isset($_POST['DureeOffre']) &&
    isset($_POST['Prix']) &&
    isset($_POST['Classe']) &&
    isset($_POST['Evaluation'])
) {
    // Create a new instance of the Vol class and set its properties
    $vol = new Vol(
        $_POST['IDvol'],           // IDvol
        $_POST['Compagnie'],      // Compagnie
        $_POST['Num_vol'],        // Num_vol
        $_POST['Depart'],         // Depart
        $_POST['Arrive'],         // Arrive
        $_POST['DateDepart'],     // DateDepart
        $_POST['DateArrive'],     // DateArrive
        $_POST['DureeOffre'],     // DureeOffre
        $_POST['Prix'],           // Prix
        $_POST['Classe'],         // Classe
        $_POST['Evaluation']      // Evaluation
    );

    // Update the flight using the VolController
    try {
        $volC->updateVol($vol, $_POST['IDvol']);
        $s = 1; // Set flag for successful update
    } catch (Exception $e) {
        echo 'Error updating vol: ' . $e->getMessage();
    }
}

// Fetch the flight details to prepopulate the form
$volDetails = null; // Initialize to null
if (isset($_GET['IDvol'])) {
    $IDvol = $_GET['IDvol'];
    $volDetails = $volC->showVol($IDvol);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un vol</title>
</head>
<body>
    <h2>Modifier un vol</h2>
    <form method="POST" action="UpdateVol.php">

        <!-- Hidden input field to pass IDvol -->
        <input type="hidden" id="IDvol" name="IDvol" value="<?= isset($volDetails['IDvol']) ? $volDetails['IDvol'] : ''; ?>" required>

        <label for="Compagnie">Compagnie:</label><br>
        <input type="text" id="Compagnie" name="Compagnie" value="<?= isset($volDetails['Compagnie']) ? $volDetails['Compagnie'] : ''; ?>" required><br>
        
        <label for="Num_vol">Numéro de vol:</label><br>
        <input type="text" id="Num_vol" name="Num_vol" value="<?= isset($volDetails['Num_vol']) ? $volDetails['Num_vol'] : ''; ?>" required><br>
        
        <label for="Depart">Départ:</label><br>
        <input type="text" id="Depart" name="Depart" value="<?= isset($volDetails['Depart']) ? $volDetails['Depart'] : ''; ?>" required><br>
        
        <label for="Arrive">Arrivée:</label><br>
        <input type="text" id="Arrive" name="Arrive" value="<?= isset($volDetails['Arrive']) ? $volDetails['Arrive'] : ''; ?>" required><br>
        
        <label for="DateDepart">Date de départ:</label><br>
        <input type="date" id="DateDepart" name="DateDepart" value="<?= isset($volDetails['DateDepart']) ? $volDetails['DateDepart'] : ''; ?>" required><br>
        
        <label for="DateArrive">Date d'arrivée:</label><br>
        <input type="date" id="DateArrive" name="DateArrive" value="<?= isset($volDetails['DateArrive']) ? $volDetails['DateArrive'] : ''; ?>" required><br>
        
        <label for="DureeOffre">Date limite de l'offre:</label><br>
        <input type="date" id="DureeOffre" name="DureeOffre" value="<?= isset($volDetails['DureeOffre']) ? $volDetails['DureeOffre'] : ''; ?>" required><br>
        
        <label for="Prix">Prix:</label><br>
        <input type="number" id="Prix" name="Prix" value="<?= isset($volDetails['Prix']) ? $volDetails['Prix'] : ''; ?>" required><br>
        
        <label for="Classe">Classe:</label><br>
        <input type="text" id="Classe" name="Classe" value="<?= isset($volDetails['Classe']) ? $volDetails['Classe'] : ''; ?>" required><br>
        
        <label for="Evaluation">Évaluation:</label><br>
        <input type="number" id="Evaluation" name="Evaluation" min="0" max="5" value="<?= isset($volDetails['Evaluation']) ? $volDetails['Evaluation'] : ''; ?>" required><br><br>
        

        <input type="submit" value="Modifier">
    </form>

    <?php if($s==1): ?>
        <script>alert('Vous avez modifié le vol');</script>
        <script>window.location.href='ListVol.php'</script>
    <?php endif; ?>
</body>
</html>
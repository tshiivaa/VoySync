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
    

    // Set the flag to indicate that the data is valid
    $s = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un vol</title>
</head>
<body>
    <h2>Ajouter un vol</h2>
    <form method="POST" action="">

         <label for="IDvol">ID Vol:</label><br>
        <input type="text" id="IDvol" name="IDvol" required><br>

        <label for="Compagnie">Compagnie:</label><br>
        <input type="text" id="Compagnie" name="Compagnie" required><br>
        
        <label for="Num_vol">Numéro de vol:</label><br>
        <input type="text" id="Num_vol" name="Num_vol" required><br>
        
        <label for="Depart">Départ:</label><br>
        <input type="text" id="Depart" name="Depart" required><br>
        
        <label for="Arrive">Arrivée:</label><br>
        <input type="text" id="Arrive" name="Arrive" required><br>
        
        <label for="DateDepart">Date de départ:</label><br>
        <input type="date" id="DateDepart" name="DateDepart" required><br>
        
        <label for="DateArrive">Date d'arrivée:</label><br>
        <input type="date" id="DateArrive" name="DateArrive" required><br>

        <label for="DureeOffre">Date limite de l'offre:</label><br>
        <input type="date" id="DureeOffre" name="DureeOffre" required><br>
        
        <label for="Prix">Prix:</label><br>
        <input type="number" id="Prix" name="Prix" required><br>
        
        <label for="Classe">Classe:</label><br>
        <input type="text" id="Classe" name="Classe" required><br>
        
        <label for="Evaluation">Évaluation:</label><br>
        <input type="number" id="Evaluation" name="Evaluation" min="0" max="5" required><br><br>
        
        <input type="submit" value="Ajouter">
    </form>

<?php if($s==1)
{
    $volC->addVol($vol);
    echo "<script>alert('Vous avez ajouté un vol');</script>";
    echo "<script>window.location.href='ListVol.php'</script>";
}
?>  
</body>
</html>

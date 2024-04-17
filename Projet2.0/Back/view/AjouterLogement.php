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
    

    // Set the flag to indicate that the data is valid
    $s = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un logement</title>
</head>
<body>
    <h2>Ajouter un logement</h2>
    <form method="POST" action="">

         <label for="idlogement">IDLogement:</label><br>
        <input type="text" id="idlogement" name="idlogement" required><br>

        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>
        
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" required><br>
        
        <label for="adresse">Adresse:</label><br>
        <input type="text" id="adresse" name="adresse" required><br>
        
        <label for="prix">Prix:</label><br>
        <input type="number" id="prix" name="prix" required><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        
        <label for="capacite">Capacité:</label><br>
        <input type="number" id="capacite" name="capacite" required><br>
        
        <label for="evaluation">Evaluation:</label><br>
        <input type="number" id="evaluation" name="evaluation" min="0" max="5" required><br>
        
        <label for="disponibilite">Disponibilité:</label><br>
        <select id="disponibilite" name="disponibilite" required>
            <option value="disponible">Disponible</option>
            <option value="non disponible">Non disponible</option>
        </select><br><br>
        
        <input type="submit" value="Ajouter">
    </form>

<?php if($s==1)
{
    $logementC->addLogement($logement);
    echo "<script>alert('Vous avez ajouté un logement');</script>";
    echo "<script>window.location.href='ListLogement.php'</script>";
}
?>  
</body>
</html>

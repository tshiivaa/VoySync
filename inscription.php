 
  <?php  include 'connexion.php'; 
    $nameErr = ""; $validForm=true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $nameErr = "Name is required";
    $validForm= false;
  } else {
    $nameErr="";
    //$name = test_input($_POST["name"]);
  }
 
}
    if(isset($_POST['nom'])&& $validForm)
{
    $sql = "INSERT INTO utilisateurs (nom, prénom, date_nais) VALUES (:nom, :prenom, :date_nais)";
    $stmt = $conn->prepare($sql);
    $stmt->execute( [':nom' => $_POST["nom"],':prenom' => $_POST["prenom"],':date_nais' => $_POST["date_nais"] ]   );
    $stmt = null;
}
     ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULAIRE</title>
</head>
<body>
    <form action="" method="POST">

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom"> <br>
        <?php if(!empty($nameErr)): ?>
<span class="error"> *<?php   echo $nameErr; ?> </span> <br> <?php endif; ?>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom"><br>

        <label for="date_nais">date_nais:</label>
        <input type="date" id="date_nais" name="date_nais"><br>

        <input type="submit" value="Envoyer">
        <input type="reset" value="Annuler">

    </form>
  
   

    
    
</body>
</html>



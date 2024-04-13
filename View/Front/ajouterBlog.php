<?php
include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $TitreArt = $_POST['TitreArt'];
    $ContenuArt = $_POST['ContenuArt'];
    $DatePubArt = date('Y-m-d H:i:s');
    $AuteurArt = $_POST['AuteurArt'];

    // Préparer la requête SQL
    $sql = "INSERT INTO blog (TitreArt, ContenuArt, DatePubArt, AuteurArt) 
            VALUES (:TitreArt, :ContenuArt, :DatePubArt, :AuteurArt)";

    // Obtenez la connexion PDO
    $pdo = Configuration::getConnexion();

    try {
        // Préparer la déclaration
        $stmt = $pdo->prepare($sql);

        // Lier les paramètres
        $stmt->bindParam(':TitreArt', $TitreArt);
        $stmt->bindParam(':ContenuArt', $ContenuArt);
        $stmt->bindParam(':DatePubArt', $DatePubArt);
        $stmt->bindParam(':AuteurArt', $AuteurArt);

        // Exécuter la déclaration
        $stmt->execute();

        // Rediriger vers BlogPage.php en cas de succès
        header('Location: BlogPage.php');
        exit(); // Arrêter l'exécution ultérieure
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        die('Error: ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffcc00;
            /* Jaune */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            /* Blanc */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            /* Noir */
        }

        .container form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            /* Gris clair */
            border-radius: 5px;
            box-sizing: border-box;
        }

        .container form button {
            background-color: #7ba0c9;
            /* Bleu pétrole */
            color: #fff;
            /* Blanc */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .container form button:hover {
            background-color: #5a82ad;
            /* Bleu pétrole plus foncé */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ajouter un article</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="TitreArt">Titre :</label>
            <input type="text" id="TitreArt" name="TitreArt" placeholder="Entrer le titre" required>

            <label for="ContenuArt">Contenu :</label>
            <input type="text" id="ContenuArt" name="ContenuArt" placeholder="Entrer le contenu" required>

            <label for="AuteurArt">Auteur :</label>
            <input type="text" id="AuteurArt" name="AuteurArt" placeholder="Entrer votre nom" required>

            <!-- Bouton de soumission -->
            <button type="submit" name="submit">Ajouter</button>
        </form>
    </div>
</body>

</html>
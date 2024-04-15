<?php
include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $TitreArt = $_POST['TitreArt'];
    $ContenuArt = $_POST['ContenuArt'];
    $DatePubArt = date('Y-m-d H:i:s');
    $AuteurArt = $_POST['AuteurArt'];

    // Récupérer les données de l'image uploadée
    $image = $_FILES['file'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageError = $image['error'];

    // Vérifier s'il n'y a pas d'erreur lors de l'upload
    if ($imageError === 0) {
        // Déplacer l'image téléchargée vers le répertoire d'upload
        $upload_image = '../uploads/' . $imageName;
        move_uploaded_file($imageTmpName, $upload_image);

        // Préparer la requête SQL
        $sql = "INSERT INTO blog (TitreArt, ContenuArt, DatePubArt, AuteurArt, img) 
                VALUES (:TitreArt, :ContenuArt, :DatePubArt, :AuteurArt, :img)";

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
            $stmt->bindParam(':img', $upload_image); // Utiliser le chemin de l'image comme valeur

            // Exécuter la déclaration
            $stmt->execute();

            // Rediriger vers BlogPage.php en cas de succès
            header('Location: BlogPage.php');
            exit(); // Arrêter l'exécution ultérieure
        } catch (PDOException $e) {
            // Gérer les erreurs de la base de données
            die('Error: ' . $e->getMessage());
        }
    } else {
        // Gérer les erreurs d'upload d'image
        die('Error uploading image.');
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

        .container form input[type="text"],
        .container form input[type="file"] {
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
        <form id="articleForm" method="post" enctype="multipart/form-data">
            <label for="TitreArt">Titre :</label>
            <input type="text" id="TitreArt" name="TitreArt" placeholder="Entrer le titre (max 50 caractères)" required>

            <label for="ContenuArt">Contenu :</label>
            <input type="text" id="ContenuArt" name="ContenuArt" placeholder="Entrer le contenu (max 1000 caractères)"
                required>

            <label for="AuteurArt">Auteur :</label>
            <input type="text" id="AuteurArt" name="AuteurArt" placeholder="Entrer votre nom (max 15 caractères)"
                required>

            <!-- Input field for image upload -->
            <!-- <label for="file">Image :</label>
            <input type="file" id="file" name="file" accept="img/*" required> -->

            <label for="img">Image :</label>
            <input type="file" id="img" name="img" accept="img/*" required>

            <!-- Bouton de soumission -->
            <button type="submit" name="submit">Ajouter</button>
        </form>
    </div>

    <script>
        document.getElementById('articleForm').addEventListener('submit', function (event) {
            // Get the form elements
            var TitreArt = document.getElementById('TitreArt');
            var ContenuArt = document.getElementById('ContenuArt');
            var AuteurArt = document.getElementById('AuteurArt');

            // Check if any of the input fields are empty
            if (!TitreArt.value.trim() || !ContenuArt.value.trim() || !AuteurArt.value.trim()) {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an alert message
                alert('Veuillez remplir tous les champs.');
            }

            // Check if Auteur input length exceeds 15 characters
            if (AuteurArt.value.length > 15) {
                event.preventDefault();
                alert('Le nom de l\'auteur ne doit pas dépasser 15 caractères.');
            }

            // Check if Titre input length exceeds 50 characters
            if (TitreArt.value.length > 50) {
                event.preventDefault();
                alert('Le titre ne doit pas dépasser 50 caractères.');
            }

            // Check if Contenu input length exceeds 1000 characters
            if (ContenuArt.value.length > 1000) {
                event.preventDefault();
                alert('Le contenu ne doit pas dépasser 1000 caractères.');
            }
        });
    </script>
</body>

</html>
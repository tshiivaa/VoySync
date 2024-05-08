<?php
include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';

$etat = isset($_POST['etat']) ?
    $_POST['etat'] : 'en attente';
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $TitreArt = $_POST['TitreArt'];
    $ContenuArt = $_POST['ContenuArt'];
    $DatePubArt = date('Y-m-d H:i:s');
    $AuteurArt = $_POST['AuteurArt'];

    // Récupérer les données de l'image uploadée
    $image = $_FILES['img'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageError = $image['error'];



    if ($imageError === 0) {
        $upload_image = '../uploads/' . $imageName;
        move_uploaded_file($imageTmpName, $upload_image);

        $sql = "INSERT INTO blog (TitreArt, ContenuArt, DatePubArt, AuteurArt, img,etat) 
                VALUES (:TitreArt, :ContenuArt, :DatePubArt, :AuteurArt, :img ,:etat)";

        $pdo = Configuration::getConnexion();

        try {
            // Préparer la déclaration
            $stmt = $pdo->prepare($sql);

            // Lier les paramètres
            $stmt->bindParam(':TitreArt', $TitreArt);
            $stmt->bindParam(':ContenuArt', $ContenuArt);
            $stmt->bindParam(':DatePubArt', $DatePubArt);
            $stmt->bindParam(':AuteurArt', $AuteurArt);
            $stmt->bindParam(':img', $upload_image);
            $stmt->bindParam(':etat', $etat);


            $stmt->execute();
            header('Location: blog.php');
            exit();
        } catch (PDOException $e) {
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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Voysync</title>
    <link rel="stylesheet" href="http://localhost/mariem\gestiongBlog\CSS\style.css" type="text/css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #e7f2fd;
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
        }

        .container form input[type="text"],
        .container form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .container form button {
            background-color: #7ba0c9;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .container form button:hover {
            background-color: #5a82ad;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="../images/logo.png" alt="">Voysync
        </div>
        <div class="search_bar">
            <input type="text" placeholder="Search">
        </div>
        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <i class='bx bx-bell'></i>
            <img src="../images/profile.jpg" alt="" class="profile">
        </div>
    </nav>
    <div class="main_body">
        <div class="container">
            <h2>Ajouter un article</h2>
            <form id="articleForm" method="post" enctype="multipart/form-data">
                <label for="TitreArt">Titre :</label>
                <input type="text" id="TitreArt" name="TitreArt" placeholder="Entrer le titre (max 50 caractères)"
                    required>

                <label for="ContenuArt">Contenu :</label>
                <input type="text" id="ContenuArt" name="ContenuArt"
                    placeholder="Entrer le contenu (max 1000 caractères)" required>

                <label for="AuteurArt">Auteur :</label>
                <input type="text" id="AuteurArt" name="AuteurArt" placeholder="Entrer votre nom (max 15 caractères)"
                    required>

                <label for="img">Image :</label>
                <input type="file" id="img" name="img" accept="img/*" required>

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
    </div>
    <script src="http://localhost/mariem\gestiongBlog\js\script.js"></script>
</body>

</html>
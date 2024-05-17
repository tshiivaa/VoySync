<?php
include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';

$etat = isset($_POST['etat']) ?
    $_POST['etat'] : 'en attente';
if (isset($_POST['submit'])) {
    $TitreArt = $_POST['TitreArt'];
    $ContenuArt = $_POST['ContenuArt'];
    $DatePubArt = date('Y-m-d H:i:s');
    $AuteurArt = $_POST['AuteurArt'];
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
            $stmt = $pdo->prepare($sql);
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
        die('Error uploading image.');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Voysync</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://localhost/mariem\gestiongBlog\CSS\style.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/templatemo-woox-travel.css">
    <link rel="stylesheet" href="../../CSS/owl.css">
    <link rel="stylesheet" href="../../CSS/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        .container3 {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container3 form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .container3 form input[type="text"],
        .container3 form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .container3 form button {
            background-color: #7ba0c9;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .container3 form button:hover {
            background-color: #5a82ad;
        }
    </style>
</head>

<body>
    <header class="header-area header-sticky">
        <div class="container2">
            <div class="row">
                <div class="col-12">
        <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="indexf.php" class="logo">
                        <img src="../../View/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="accueil-link" href="indexf.php" class="active">Accueil</a></li>
                        <li><a href="ListLogementFront copy 2.php">Logements</a></li>
                        <li><a href="ListVolFront copy.php">Vols</a></li>
                        <li><a id="mission-link" href="FRMissionPage.php">Missions</a></li>
                        <li><a id="blog-link" href="blog.php">Blog</a></li>
                        <li><a id="depenses-link" href="depenses_f.php">Dépenses</a></li>
                        <li><input type="submit" name="connect" value="Connexion" class="btn solid" id="connect" style="background-color:#FBCD5AFF;"/></li>
                        <li><a href="filtre_Magique.php" class="active"><i class='bx bxs-magic-wand'></i> Itineraire magique</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="main_body">
        <br>
        <br><br>
        <div class="container3">
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
                var TitreArt = document.getElementById('TitreArt');
                var ContenuArt = document.getElementById('ContenuArt');
                var AuteurArt = document.getElementById('AuteurArt');

                if (!TitreArt.value.trim() || !ContenuArt.value.trim() || !AuteurArt.value.trim()) {
                    event.preventDefault();
                    alert('Veuillez remplir tous les champs.');
                }

                if (AuteurArt.value.length > 15) {
                    event.preventDefault();
                    alert('Le nom de l\'auteur ne doit pas dépasser 15 caractères.');
                }

                if (TitreArt.value.length > 50) {
                    event.preventDefault();
                    alert('Le titre ne doit pas dépasser 50 caractères.');
                }

                if (ContenuArt.value.length > 1000) {
                    event.preventDefault();
                    alert('Le contenu ne doit pas dépasser 1000 caractères.');
                }
            });
        </script>
    </div>
    <script src="http://localhost/mariem\gestiongBlog\js\script.js"></script>
    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>Vous cherchez à voyager ?</h2>
                    <h4>Réservez en cliquant sur le bouton</h4>
                </div>
                <div class="col-lg-4">
                    <div class="border-button">
                        <a href="reservation.html">Réservez dès maintenant</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Droits d'auteur © 2024 <a href="#">Voysync</a>. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/isotope.min.js"></script>
    <script src="../../js/owl-carousel.js"></script>
    <script src="../../js/tabs.js"></script>
    <script src="../../js/popup.js"></script>
    <script src="../../js/custom.js"></script>
</body>

</html>
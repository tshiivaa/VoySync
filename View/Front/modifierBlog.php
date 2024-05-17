<?php
include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';
$error = "";

if (isset($_GET['modifierid'])) {
    $IDart = $_GET['modifierid'];

    $BlogC = new BlogC();

    $blog = $BlogC->showBlog($IDart);

    if (!$blog) {
        echo "Blog post not found.";
        exit;
    }
} else {
    echo "modifierid parameter is missing.";
    exit;
}

$valid = 0;
if (
    isset($_POST["TitreArt"]) &&
    isset($_POST["ContenuArt"]) &&
    isset($_POST["AuteurArt"])
) {
    if (
        !empty($_POST["TitreArt"]) &&
        !empty($_POST["ContenuArt"]) &&
        !empty($_POST["AuteurArt"])
    ) {
        $img = $_FILES['image'];

        $imagefilename = $img['name'];
        $imagefileerror = $img['error'];
        $imagefiletemp = $img['tmp_name'];
        $filename_seperate = explode('.', $imagefilename);
        $file_extension = strtolower($filename_seperate[1]);
        $extension = array('jpeg', 'jpg', 'png');
        if (in_array($file_extension, $extension)) {
            $upload_image = '../uploads/' . $imagefilename;
            move_uploaded_file($imagefiletemp, $upload_image);
            $valid = 1; // Form validation passed
        }
    } else {
        $error = "Missing information";
    }
}
if ($valid == 1) {
    $blog = new blog(
        $_POST["TitreArt"],
        $_POST["ContenuArt"],
        $_POST["AuteurArt"],
        $upload_image,
    );
    $BlogC->updateBlog($blog, $IDart);

    header('Location: blog.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        /* body {
            font-family: 'Montserrat', sans-serif;
            background-color: #e7f2fd;
            margin: 0;
            padding: 0;
        } */

        .container4 {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container4 form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            /* Noir */
        }

        .container4 form input[type="text"],
        .container4 form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .container4 form button {
            background-color: #7ba0c9;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .container4 form button:hover {
            background-color: #5a82ad;
        }
    </style>
</head>

<body>
    <!-- ***** Preloader End ***** -->
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
                        <input type="submit" name="connect" value="Connexion" class="btn solid" id="connect" style="background-color:#FBCD5AFF;"/>
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
        <div class="container4">
            <h2>Modifier un article</h2>
            <form method="post" enctype="multipart/form-data">
                <label for="TitreArt">Titre :</label>
                <input type="text" id="TitreArt" name="TitreArt"
                    value="<?php echo isset($blog['TitreArt']) ? $blog['TitreArt'] : ''; ?>" required>

                <label for="ContenuArt">Contenu :</label>
                <input type="text" id="ContenuArt" name="ContenuArt"
                    value="<?php echo isset($blog['ContenuArt']) ? $blog['ContenuArt'] : ''; ?>" required>

                <label for="AuteurArt">Auteur :</label>
                <input type="text" id="AuteurArt" name="AuteurArt"
                    value="<?php echo isset($blog['AuteurArt']) ? $blog['AuteurArt'] : ''; ?>" required maxlength="15">

                <!-- Champ d'upload de l'image -->
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" accept="image/*">

                <!-- Bouton de soumission -->
                <button type="submit" name="submit">Modifier</button>
            </form>
            <?php echo $error; ?>
        </div>
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
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript principal de Bootstrap -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/isotope.min.js"></script>
    <script src="../../js/owl-carousel.js"></script>
    <script src="../../js/tabs.js"></script>
    <script src="../../js/popup.js"></script>
    <script src="../../js/custom.js"></script>
</body>

</html>
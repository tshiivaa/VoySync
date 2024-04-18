<?php
include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';
$error = "";

// Check if modifierid is provided in the URL
if (isset($_GET['modifierid'])) {
    $IDart = $_GET['modifierid'];

    // Create an instance of the controller
    $BlogC = new BlogC();

    // Fetch the blog post data based on the ID
    $blog = $BlogC->showBlog($IDart);

    // Check if the blog post data is fetched successfully
    if (!$blog) {
        // Handle the case where the blog post data is not found
        echo "Blog post not found.";
        exit;
    }
} else {
    // Handle the case where modifierid is not provided
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

    header('Location: afficherBlog.php');
    exit;
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
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="images/logo.png" alt="">Voysync
        </div>
        <div class="search_bar">
            <input type="text" placeholder="Search">
        </div>
        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <i class='bx bx-bell'></i>
            <img src="images/profile.jpg" alt="" class="profile">
        </div>
    </nav>
    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title menu_dahsboard"></div>
                <li class="item">
                    <div href="index.html" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Home</span>
                    </div>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class='bx bx-wallet'></i>
                        </span>
                        <span class="navlink">Pochette de voyage</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="Depenses_back.html" class="nav_link sublink">Back office</a>
                        <a href="Depenses_front.html" class="nav_link sublink">Front office</a>
                    </ul>
                </li>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-magic-wand"></i>
                        </span>
                        <span class="navlink">Itineraire magique</span>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class='bx bxs-chat'></i>
                        </span>
                        <span class="navlink">Blog</span>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class='bx bx-map-alt'></i>
                        </span>
                        <span class="navlink">Missions</span>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class='bx bxs-user-account'></i>
                        </span>
                        <span class="navlink">Compte</span>
                    </a>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class='bx bx-wallet'></i>
                        </span>
                        <span class="navlink">Offre</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <!-- <a href="../view/ListLogement.php" class="nav_link sublink">Logement</a>
            <a href="../view/ListVol.php" class="nav_link sublink">Vol</a> -->
                    </ul>
                </li>
            </ul>
            <ul class="menu_items">
                <div class="menu_title menu_setting"></div>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-medal"></i>
                        </span>
                        <span class="navlink">Award</span>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-cog"></i>
                        </span>
                        <span class="navlink">Setting</span>
                    </a>
                </li>
            </ul>
            <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span> Expand</span>
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span> Collapse</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </div>
        </div>
    </nav>
    <div class="main_body">
        <div class="container">
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
</body>

</html>
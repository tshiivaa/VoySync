<?php
include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';
$error = "";

$IDart = $_GET['modifierid'];
// Créer une instance du contrôleur
$BlogC = new BlogC();
$blog = $BlogC->showBlog($IDart);

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
    <title>Modifier un article</title>
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
        <h2>Modifier un article</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="TitreArt">Titre :</label>
            <input type="text" id="TitreArt" name="TitreArt" value="<?php echo $blog['TitreArt']; ?>" required>

            <label for="ContenuArt">Contenu :</label>
            <input type="text" id="ContenuArt" name="ContenuArt" value="<?php echo $blog['ContenuArt']; ?>" required>

            <label for="AuteurArt">Auteur :</label>
            <input type="text" id="AuteurArt" name="AuteurArt" value="<?php echo $blog['AuteurArt']; ?>" required>

            <!-- Champ d'upload de l'image -->
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" accept="image/*">

            <!-- Bouton de soumission -->
            <button type="submit" name="submit">Modifier</button>
        </form>
        <?php echo $error; ?>
    </div>
</body>

</html>
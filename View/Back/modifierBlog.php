<?php

include '../../Model/BlogModel.php';
include '../../Controller/BlogController.php';
$error = "";

$IDart = $_GET['modifierid'];
// create an instance of the controller
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
        $valid = 1;

    } else {
        $error = "Missing information";
    }
}
if ($valid == 1) {

    $blog = new blog(
        $_POST["TitreArt"],
        $_POST["ContenuArt"],
        $_POST["AuteurArt"],
    );
    $BlogC->updateBlog($blog, $IDart);

    header('Location: afficherBlog.php');
    exit;
}
?>


<!DOCTYPE html>
<html>

<body>
    <form method="post" enctype="multipart/form-data">

        <label for="TitreArt">Titre de l'article :</label>
        <input type="text" id="TitreArt" name="TitreArt" value="<?php echo $blog['TitreArt']; ?>">

        <br>

        <label for="ContenuArt">Contenu de l'article :</label>
        <input type="text" id="ContenuArt" name="ContenuArt" value="<?php echo $blog['ContenuArt']; ?>">

        <br>

        <label for="AuteurArt">Auteur de l'article :</label>
        <input type="text" id="AuteurArt" name="AuteurArt" value="<?php echo $blog['AuteurArt']; ?>">

        <br>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name="modifier">modifier</button>
    </form>
    <?php echo $error; ?>
</body>

</html>
<?php
include '../../Controller/BlogController.php';

if (isset($_GET['publier']) && !empty($_GET['publier'])) {
    $articleID = $_GET['publier'];

    $blogController = new BlogC();
    $result = $blogController->publierArticle($articleID);

    if ($result) {
        header("Location: afficherBlogBack.php");
        exit();
    } else {
        echo "Erreur lors de la publication de l'article.";
    }
} else {
    header("Location: afficherBlogBack.php");
    exit();
}
?>
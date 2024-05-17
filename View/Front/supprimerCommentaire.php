<?php
include '../../Controller/BlogController.php';

if (isset($_POST['IDcomm'])) {
    $IDcomm = $_POST['IDcomm'];
    $comment = new CommentaireC();
    $comment->supprimerCommentaire($IDcomm);
    if (isset($_POST['IDart'])) {
        $IDart = $_POST['IDart'];
        header("Location: comments.php?IDart=$IDart&success=true");
        exit;
    } else {
        header('Location: erreur.php');
        exit;
    }
} else {
    header('Location: erreur.php');
    exit;
}
?>
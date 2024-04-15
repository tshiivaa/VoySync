<?php
include '../../Controller/BlogController.php';

$blog = new BlogC();
$blog->deleteBlog($_GET['supprimer']);
header('location: afficherBlogBack.php');
?>
<?php
include '../../Controller/BlogController.php';

$blog = new BlogC();
$blog->deleteBlog($_POST['IDart']);
header('Location: blog.php');
exit;

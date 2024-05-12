<?php
session_start();

require_once '../Controller/connexion.php';

// Vérifier si l'identifiant de l'utilisateur est passé en paramètre
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifier si les mots de passe correspondent
    if ($_POST['new_password'] !== $_POST['confirm_password']) {
        $error = "Password does not match.";
    } else {
        // Récupérer le nouveau mot de passe
        $new_password = $_POST['new_password'];

        // Mettre à jour le mot de passe dans la base de données
        $conn = config::connexion(); // Connexion à la base de données

        $stmt = $conn->prepare("UPDATE `utilisateurs` SET `password` = :password WHERE `id` = :user_id");
        $stmt->bindParam(':password', $new_password);
        $stmt->bindParam(':user_id', $user_id);

        if ($stmt->execute()) {
            //$_SESSION['msg']['success'] = "New Password has been saved successfully.";
            header('location: palindrome.html');
            exit;
        } else {
            $error = 'Password has failed to update.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
</head>
<body>
<h1 id="page-title" class="text-center">Reset Password</h1>
<link rel="stylesheet" href="forgot.css">
<hr id="title_hr" class="mx-auto">
<div id="login-wrapper">
    <div class="text-muted"><small><em>Please Fill all the required fields</em></small></div>
    <?php if (isset($error) && !empty($error)): ?>
        <div class="message-error"><?= $error ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['msg']['success']) && !empty($_SESSION['msg']['success'])): ?>
        <div class="message-success">
            <?php
            echo $_SESSION['msg']['success'];
            unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <div class="input-field">
            <label for="new_password" class="input-label">New Password</label>
            <input type="password" id="new_password" name="new_password" required="required">
        </div>
        <div class="input-field">
            <label for="confirm_password" class="input-label">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required="required">
        </div>
        <button class="reset-btn">Reset Password</button>
    </form>
</div>
</body>
</html>

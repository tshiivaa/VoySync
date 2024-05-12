<?php
require_once '../Controller/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifier si l'email est soumis
    if (isset($_POST['email'])) {
        // Extraction des données du formulaire
        $email = $_POST['email'];
        $conn = config::connexion();

        // Préparation de la requête SQL pour vérifier si l'email existe dans la base de données
        $stmt = $conn->prepare("SELECT * FROM `utilisateurs` WHERE `email` = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification si l'email existe dans la base de données
        if ($result) {
            // Si l'email existe, rediriger vers reset-password.php avec l'identifiant de l'utilisateur
            header('Location: reset-password.php?user_id=' . $result['id']);
            exit;
        } else {
            // Si l'email n'existe pas, afficher une alerte
            echo '<script>alert("Email does not exist!");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
<h1 id="page-title" class="text-center">Forgot Password Page</h1>
<link rel="stylesheet" href="forgot.css">
<hr id="title_hr" class="mx-auto">
<div id="login-wrapper">
    <div class="text-muted"><small><em>Please Fill all the required fields</em></small></div>
    <form action="" method="POST">
        <div class="input-field">
            <label for="email" class="input-label">Email</label>
            <input type="email" id="email" name="email" value="<?= $_POST['email'] ?? "" ?>" required="required">
        </div>
        <button class="login-btn">Reset Password</button>
    </form>
</div>
</body>
</html>

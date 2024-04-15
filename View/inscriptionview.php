<?php
include '../Controller/inscriptioncontroller.php';


if (array_key_exists('save', $_POST)) {
    $x = new utilisateurc();
    $x->testAndSave();

}
if (array_key_exists('connect', $_POST)) {
    $x = new utilisateurc();
    $x->testAndConnect();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="inscription.css"/>
    <title>Formulaire de connexion & d'inscription</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="" method="POST" class="sign-in-form">
                <h2 class="title">Se connecter</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input name="email" type="text" placeholder="Adresse e-mail"/>
                </div>

                <div class="error"><?php if (!empty($emailErr)) echo $emailErr; ?></div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" placeholder="Mot de passe"/>
                </div>

                <div class="error"><?php if (!empty($passwordErr)) echo $passwordErr; ?></div>
                <div class="error"><?php if (!empty($loginErr)) echo $loginErr; ?></div>

                <input type="submit" name="connect" value="Connexion" class="btn solid"/>

                <div class="col-md-6">
                    <a href="">I forgot my password</a>
                </div>

                <p class="social-text">Ou connectez-vous avec les plateformes sociales</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>

                </div>
            </form>
            <form action="" method="POST" class="sign-up-form">
                <h2 class="title">S'inscrire</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Adresse e-mail" name="email"/>


                </div>
                <div class="error"><?php if (!empty($emailErr)) echo $emailErr; ?></div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="date" placeholder="date nais" name="date_nais"/>


                </div>
                <div class="error"><?php if (!empty($dateErr)) echo $dateErr; ?></div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Mot de passe" name="password"/>

                </div>
                <div class="error"><?php if (!empty($passwordErr)) echo $passwordErr; ?></div>
                <input name="save" type="submit" class="btn" value="S'inscrire"/>

                <p class="social-text">Ou inscrivez-vous avec les plateformes sociales</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>VOYSYNC</h3>
                <p>
                    Bienvenue sur la page du site web de VOYSYNC. Complétez votre inscription pour accéder au
                    site web.
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    S'inscrire
                </button>
            </div>
            <img src="yello1.png" class="image" alt=""/>
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>VOYSYNC</h3>
                <p>
                    Bienvenue sur la page du site web de VOYSYNC. Connectez-vous pour accéder au site web.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Se connecter
                </button>
            </div>
            <img src="yello1.png" class="image" alt=""/>
        </div>
    </div>
</div>

<script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
    });
</script>
</body>
</html>




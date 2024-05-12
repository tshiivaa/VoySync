<?php
include '../Controller_us/inscriptioncontroller.php';


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
    <link href="../Build/css/demo.css" rel="stylesheet">
    <link href="../Build/css/intlTelInput.css" rel="stylesheet">
    <link href="inscription.css" rel="stylesheet"/>


    <title>Formulaire de connexion & d'inscription</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                    <input name="password" type="password" id="password" placeholder="Mot de passe"/>
                </div>


                <div class="error"><?php if (!empty($passwordErr)) echo $passwordErr; ?></div>
                <div class="error"><?php if (!empty($loginErr)) echo $loginErr; ?></div>

                <div class="g-recaptcha" data-sitekey="6LcHI80pAAAAADQR7ipJGR6WA17Kmnf3J-hbMJBN"></div>

                <input type="submit" name="connect" value="Connexion" class="btn solid"/>


                <div class="col-md-6">
                    <a href="forgot-password.php">I forgot my password</a>
                </div>

                <p class="social-text">Ou connectez-vous les plateformes sociales</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/profile.php?id=100009553055928&mibextid=LQQJ4d"
                       class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/_tshiiivaa_?igsh=MWZ6Zzh5azFsejV5NA==" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://github.com/tshiivaa/VoySync.git" class="social-icon">
                        <i class="fab fa-github"></i>
                    </a>


                </div>
            </form>

            <form action="" method="POST" class="sign-up-form">
                <h2 class="title">S'inscrire</h2>

                <h6 style="color: #1C4771FF;">Mail</h6>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Adresse e-mail" name="email"/>
                </div>
                <div class="error"><?php if (!empty($emailErr)) echo $emailErr; ?></div>

                <h6 style="color: #1C4771FF;">Date De Naissance</h6>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="date" placeholder="date nais" name="date_nais"/>
                </div>
                <div class="error"><?php if (!empty($dateErr)) echo $dateErr; ?></div>

                <h6 style="color: #1C4771FF;">Call</h6>
                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="tel" placeholder="Phone number" id="phone" name="phone"/>
                </div>
                <div class="error"><?php if (!empty($phoneErr)) echo $phoneErr; ?></div>


                <h6 style="color: #1C4771FF;">Clé</h6>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" placeholder="Mot de passe"/>
                </div>
                <div class="error"><?php if (!empty($passwordErr)) echo $passwordErr; ?></div>

                <div class="g-recaptcha" data-sitekey="6LcHI80pAAAAADQR7ipJGR6WA17Kmnf3J-hbMJBN"></div>
                <input name="save" type="submit" class="btn" value="S'inscrire"/>

                <p class="social-text">Ou Visitez-vous les plateformes sociales</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/profile.php?id=100009553055928&mibextid=LQQJ4d"
                       class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/_tshiiivaa_?igsh=MWZ6Zzh5azFsejV5NA==" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://github.com/tshiivaa/VoySync.git" class="social-icon">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <img height="80px" src="yello1.png" alt="logo">
                <p>
                    Bienvenue sur la page du site web de VOYSYNC. Complétez votre inscription pour accéder au
                    site web.
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    S'inscrire
                </button>
            </div>
            <img src="hero-img.png" class="image" alt=""/>
        </div>
        <div class="panel right-panel">
            <div class="content">
                <img height="80px" src="bleu1.png" alt="logo">
                <p>
                    Bienvenue sur la page du site web de VOYSYNC. Connectez-vous pour accéder au site web.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Se connecter
                </button>
            </div>
            <img src="hero-img.png" class="image" alt=""/>
        </div>
    </div>
</div>

<script src="../Build/js/intlTelInput.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {});
</script>

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
<footer>
    <div>
        <a href="#">Blog</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">Support</a>
        <span>✓ FEEL THE DIFFERENCE</span>
        <p>VOYSYNC Inc 2024
        <div>
            <a>
                <i class="fab fa-facebook-f"></i>
            </a>
            <a>
                <i class="fab fa-instagram"></i>
            </a>
            <a>
                <i class="fab fa-github"></i>
            </a>
        </div>
        </p>
    </div>
</footer>
</body>
</html>




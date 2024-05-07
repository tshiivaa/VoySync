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
                    <input name="password" type="password" placeholder="Mot de passe"/>
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
                    <input type="password" placeholder="Mot de passe" name="password"/>
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
<footer class="pb-0 pb-lg-4">
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-7 col-12 mb-4 mb-md-6 mb-lg-0 order-0">
                <img class="mb-4" src="yello1.png" width="150" alt="jadoo"/>
                <p class="fs--1 text-secondary mb-0 fw-medium">Book your trip in minutes, get full control for much
                    longer.</p>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 mb-lg-0 order-lg-1 order-md-2">
                <h4 class="footer-heading-color fw-bold font-sans-serif mb-3 mb-lg-4">Company</h4>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">About</a></li>
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">Careers</a></li>
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">Mobile</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 mb-lg-0 order-lg-2 order-md-3">
                <h4 class="footer-heading-color fw-bold font-sans-serif mb-3 mb-lg-4">Contact</h4>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">Help/FAQ</a></li>
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">Press</a></li>
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">Affiliate</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 mb-4 mb-lg-0 order-lg-3 order-md-4">
                <h4 class="footer-heading-color fw-bold font-sans-serif mb-3 mb-lg-4">More</h4>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">Airline Fees</a>
                    </li>
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">Airline</a></li>
                    <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="#!">Low Fare Tips</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-5 col-12 mb-4 mb-md-6 mb-lg-0 order-lg-4 order-md-1">
                <div class="icon-group mb-4">
                    <a class="text-decoration-none icon-item shadow-social" id="facebook" href="#!"><i
                                class="fab fa-facebook-f"></i></a>
                    <a class="text-decoration-none icon-item shadow-social" id="instagram" href="#!"><i
                                class="fab fa-instagram"></i></a>
                    <a class="text-decoration-none icon-item shadow-social" id="twitter" href="#!"><i
                                class="fab fa-twitter"></i></a>
                </div>
                <h4 class="fw-medium font-sans-serif text-secondary mb-3">Discover our app</h4>
                <div class="d-flex align-items-center">
                    <a href="#!"><img class="me-2" src="play-store.png" alt="Play Store"/></a>
                    <a href="#!"><img src="apple-store.png" alt="Apple Store"/></a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>




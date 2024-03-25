<?php global $conn;
include 'connexion.php';
include 'utilisateurs.php';
$emailErr = "";
$dateErr = "";
$passwordErr = "";
$validForm = true;


if (array_key_exists('save', $_POST)) {
    testAndSave();

}
if (array_key_exists('connect', $_POST)) {
    connect();

}
function testAndSave()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $GLOBALS['emailErr'] = "Email is required";
            $GLOBALS['validForm'] = false;
        } else {
            $email = htmlspecialchars($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $GLOBALS['emailErr'] = "Invalid email format";
                $GLOBALS['validForm'] = false;
            }
        }

        if (empty($_POST["date_nais"])) {
            $GLOBALS['dateErr'] = "date is required";

            $GLOBALS['validForm'] = false;
        } else {
            $date = htmlspecialchars($_POST["date_nais"]);
            // You may need additional validation for the date of birth
            if (!strtotime($date)) {
                $GLOBALS['dateErr'] = "Invalid date format";
                $GLOBALS['validForm'] = false;
            }
        }

        if (empty($_POST["password"])) {
            $GLOBALS['passwordErr'] = "password is required";
            $GLOBALS['validForm'] = false;
        } else {
            $password = htmlspecialchars($_POST["password"]);
            if (strlen($password) < 8) {
                $GLOBALS['passwordErr'] = "Invalid 8 characters min";
                $GLOBALS['validForm'] = false;
            }
        }

        if (isset($_POST['email']) && $GLOBALS['validForm']) {
            $sql = "INSERT INTO utilisateurs (email,date_nais,password) VALUES (:email, :date_nais, :password)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $utilisateur = new utilisateurs($_POST["email"], $_POST["date_nais"], $_POST["password"]);
            $stmt->execute([':email' => $utilisateur->getEmail(), ':date_nais' => $utilisateur -> getdate_nais(), ':password' => $utilisateur -> getpassword()]);
            $stmt = null;
        }

    }
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
            <form action="#" class="sign-in-form">
                <h2 class="title">Se connecter</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Adresse e-mail"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Mot de passe"/>
                </div>
                <input type="submit" name="connect" value="Connexion" class="btn solid"/>
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




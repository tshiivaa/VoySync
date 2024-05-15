<?php
require_once "../../Controller/inscriptioncontroller.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $utilisateurc = new utilisateurc();
    $utilisateurs = $utilisateurc->showUtilisateur($id);

}
include '../../Controller/DocumentVoyageC.php';

$documentC = new DocumentVoyageC();
?>
<!DOCTYPE html>
<!-- YouTube - CodingLab -->
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Voysync - Explorez le monde</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fichiers CSS supplémentaires -->
  <link rel="stylesheet" href="../../CSS/templatemo-woox-travel.css">
  <link rel="stylesheet" href="../../CSS/owl.css">
  <link rel="stylesheet" href="../../CSS/animate.css">
  <link rel="stylesheet" href="../../CSS/custom.css">
  <link rel="stylesheet" href="../../CSS/rappel.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/captcha.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="indexf.html" class="logo">
              <img src="../../View/images/logo.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
                        <li><a id="accueil-link" href="indexf.php?id=<?php echo $utilisateurs['id']; ?>" >Accueil</a>
                        </li>
                        <li><a id="about-link" href="about.php?id=<?php echo $utilisateurs['id']; ?>">À Propos</a></li>
                        <li><a id="deals-link" href="deals.php?id=<?php echo $utilisateurs['id']; ?>">Nos Offres</a>
                        </li>
                        <li><a id="contact-link"
                               href="reservation.php?id=<?php echo $utilisateurs['id']; ?>">Contact</a></li>
                        <li><a id="blog-link" href="reservation.php?id=<?php echo $utilisateurs['id']; ?>">Blog</a></li>
                        <li><a id="mission-link" href="FRMissionPage.php?id=<?php echo $utilisateurs['id']; ?>">Missions</a></li>
                
                        <li><a id="depenses-link"
                               href="Depenses_f.php?id=<?php echo $utilisateurs['id']; ?>"class="active">Dépenses</a></li>
                        <input type="submit" name="connect" value="Connexion" class="custom-btn" id="connect"/>

                    </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
    <div class="containerC">
      <header>Génerateur de Captcha</header>
      <div class="input_field captch_box">
        <input type="text" value="" disabled />
        <button class="refresh_button">
          <i class="fa-solid fa-rotate-right"></i>
        </button>
      </div>
      <div class="input_field captch_input">
        <input type="text" placeholder="Saisissez la captcha..." />
      </div>
      <div class="message">Correct</div>
      <div class="input_field button disabled">
      <input type="hidden" id="userId" value="<?php echo $utilisateurs['id']; ?>">
        <button>Soumettre</button>
      </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="../../js/isotope.min.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/js\wow.js"></script>
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
    <script src="../../js/captcha.js"></script>
  </body>
</html>

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
<html lang="fr">

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
  <link rel="stylesheet" href="../../CSS/expanding.css">
  <link rel="stylesheet" href="../../CSS/style.css">
  <link rel="stylesheet" href="../../CSS/devise.css">
  <link rel="stylesheet" href="../../CSS/rappel.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!--


  https://templatemo.com/tm-580-woox-travel

  -->

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
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
              <li><a href="indexf.html" >Accueil</a></li>
              <li><a href="about.html">À Propos</a></li>
              <li><a href="deals.html">Nos Offres</a></li>
              <li><a href="reservation.html">Contact</a></li>
              <li><a href="reservation.html">Blog</a></li>
              <li><a id="mission-link" href="FRMissionPage.php">Missions</a></li>
              <li><a href="Depenses_f.html"class="active">Dépenses</a></li>
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
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <div class="headerdevise" style="margin-top: 70px;">
    <h4>Bienvenue dans votre pochette de voyage virtuelle!</h4>
  </div>
  <div class="nour">
    <p>Découvrez comment simplifier votre voyage avec notre suite d'outils de voyage intelligents.</p>
  </div>

  <div class="main_body_f">
    <div class="expanding-flex-cards">
      <div class="expanding-flex-cards-item active" data-page="budget.php?id=<?php echo $utilisateurs['id']; ?>">
        <img src="../images/budget.jpg" alt="" class="expanding-flex-cards-item-img">

        <div class="expanding-flex-cards-item-footer">
          <div class="expanding-flex-cards-icon">1</div>
          <div class="expanding-flex-cards-title">Votre budget</div>
        </div>
      </div>
      <div class="expanding-flex-cards-item" data-page="Document.php?id=<?php echo $utilisateurs['id']; ?>">
        <img src="../images/doc.jpg" alt="" class="expanding-flex-cards-item-img">

        <div class="expanding-flex-cards-item-footer">
          <div class="expanding-flex-cards-icon">2</div>
          <div class="expanding-flex-cards-title">Vos documents de voyage</div>
        </div>
      </div>
      <div class="expanding-flex-cards-item" data-page="Rappels.php">
        <img src="../images/notif.jpg" alt="" class="expanding-flex-cards-item-img">

        <div class="expanding-flex-cards-item-footer">
          <div class="expanding-flex-cards-icon">3</div>
          <div class="expanding-flex-cards-title">Vos rappels</div>
        </div>
      </div>
      <div class="expanding-flex-cards-item" data-page="Devise.php">
        <img src="../images/devise.jpg" alt="" class="expanding-flex-cards-item-img">

        <div class="expanding-flex-cards-item-footer">
          <div class="expanding-flex-cards-icon">4</div>
          <div class="expanding-flex-cards-title">Vos Devises</div>
        </div>
      </div>
    </div>
  </div>
  <?php
$documents = $documentC->checkDocumentDue();
if (!is_null($documents) && count($documents) > 0) {
    echo '<div class="alert">';
    echo '<span class="fas fa-exclamation-circle"></span>';
    echo '<span class="msg">Vos documents expirés:';
    foreach ($documents as $document) {
        echo ' ' . $document['Type'] . ',';
    }
    echo '<div class="close-btn"><span class="fas fa-times"></span></div>';
    echo '</div>';
}
?>
  <div class="nour">
    <p>Que vous soyez un voyageur chevronné ou que vous prépariez votre premier voyage, notre pochette de voyage
      virtuelle est là pour vous aider à organiser, économiser et rester informé à chaque étape de votre périple.</p>
  </div>
  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Vous cherchez à voyager ?</h2>
          <h4>Réservez en cliquant sur le bouton</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="reservation.html">Réservez dès maintenant</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Droits d'auteur © 2024 <a href="#">Voysync</a>. Tous droits réservés.
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- JavaScript principal de Bootstrap -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="../../js/isotope.min.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/wow.js"></script>
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
  <script src="../../js/expand.js"></script>
  <script src="../../js/rappel.js"></script>


</body>

</html>
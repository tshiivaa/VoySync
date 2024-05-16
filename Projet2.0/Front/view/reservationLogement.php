<?php
include_once '../controller/ReservationC.php';

//$controller = new ReservationController();
// $data = $controller->getReservationData();

// $vol_id = isset($_GET['vol_id']) ? htmlspecialchars($_GET['vol_id']) : null;
// $date_reservation = isset($_GET['date_reservation']) ? htmlspecialchars($_GET['date_reservation']) : null;
// $destination = isset($_GET['destination']) ? htmlspecialchars($_GET['destination']) : null;
require_once '../controller/LogementC.php';
$logementC = new LogementC();
$logements = $logementC->listLogement();

$logement_id = isset($_GET['logement_id']) ? $_GET['logement_id'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Voysync - Explorez le monde</title>

  <!-- Bootstrap core CSS -->
  <link href="/Projet2.0/Front/view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Fichiers CSS supplémentaires -->
  <link rel="stylesheet" href="/Projet2.0/Front/CSS/templatemo-woox-travel.css">
  <link rel="stylesheet" href="/Projet2.0/Front/CSS/owl.css">
  <link rel="stylesheet" href="/Projet2.0/Front/CSS/animate.css">
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
                        <img src="/Projet2.0/Front/view/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    <li><a href="indexf.html" class="active">Accueil</a></li>
                    <li><a href="about.html">À Propos</a></li>
                    <!-- <li><a href="deals.html">Nos Offres</a></li> -->
                    <li><a href="ListLogementFront copy 2.php">Logements</a></li>
                    <li><a href="ListVolFront copy.php">Vols</a></li>
                    <li><a href="reservation.html">Contact</a></li>
                    <li><a href="reservation.html">Blog</a></li>
                    <li><a href="Depenses_front.html">Dépenses</a></li>
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
  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Obtenenez la meilleure offre.</h4>
          <h2>Faite votre reservation</h2>
          <p>Voysync vous aide à obtenir les meilleures offres. Nous vous facilitons l'accès à des tarifs avantageux pour vos voyages.</p>
          <div class="main-button"><a href="about.html">Discover More</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Appelez nous</h4>
            <a href="#">(+216) 71 882 971</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contactez nous via Email</h4>
            <a href="#">VoySync@gemail.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visitez nos Offices</h4>
            <a href="#">Tunisie</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="reservation-form">
        <div class="container">
        <form id="reservation-form" method="post" action="create_reservation_Logement.php" onsubmit="return confirmReservation()"> <!-- Action modifiée -->
        <?php foreach ($logements as $logement): ?>
          <?php if ($logement['IDlogement'] == $logement_id): ?>
              <input type="hidden" name="vol_id" value="<?= $logement['IDvol'] ?>">
              <input type="hidden" name="logement_id" value="<?= $logement['IDlogement'] ?>">
              <input type="hidden" name="Destination" value="<?= $logement['Adresse'] ?>">
              <input type="hidden" name="Guests" value="<?= $logement['Capacite'] ?>">
          <?php endif; ?>
        <?php endforeach; ?>
            <div class="row">
                <div class="col-lg-12">
                    <h4>Faites votre <em>réservation</em> ici</h4>
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label pour="Name">Nom</label>
                        <input type="text" name="Name" placeholder="Ex. John Doe" required>
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label pour="Number">Téléphone</label>
                        <input type="text" name="Number" placeholder="Ex. 216(votre numero)" required>
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label pour="mail">Adresse email</label>
                        <input type="text" name="mail" placeholder="Ex. abs@gmail.com" required>
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label pour="date_reservation">Date de reservation</label>
                        <input type="date" name="date_reservation" required>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" class="main-button">Réserver un logement maintenant</button>
                    </fieldset>
                </div>
            </div>
            
        </form>

                </div>
            </div>
        </div>
    </div>
    <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Voysync</a> Company. All rights reserved. 
          <!-- <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p> -->
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="/Projet2.0/Front/view/vendor/jquery/jquery.min.js"></script>
  <script src="/Projet2.0/Front/view/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="/Projet2.0/Front/js/isotope.min.js"></script>
  <script src="/Projet2.0/Front/js/owl-carousel.js"></script>
  <!-- <script src="../../js/wow.js"></script> -->
  <script src="/Projet2.0/Front/js/tabs.js"></script>
  <script src="/Projet2.0/Front/js/popup.js"></script>
  <script src="/Projet2.0/Front/js/custom.js"></script>


  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>
  <script>
function confirmReservation() {
  return confirm("En cliquant sur OK, vous recevrez un e-mail de confirmation à votre adresse e-mail ainsi qu'un SMS sur votre téléphone. Souhaitez-vous continuer?");
}
</script>
</body>
</html>

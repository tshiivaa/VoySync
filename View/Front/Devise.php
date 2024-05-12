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
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <title>Voysync</title>
  <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/devise.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/expanding.css" type="text/css">
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
              <li><a href="indexf.html" class="active">Accueil</a></li>
              <li><a href="about.html">À Propos</a></li>
              <li><a href="deals.html">Nos Offres</a></li>
              <li><a href="reservation.html">Contact</a></li>
              <li><a href="reservation.html">Blog</a></li>
              <li><a href="Depenses_f.html">Dépenses</a></li>
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
  <button class="back-button" style="margin-top:90px; margin-left:20px;" onclick="goBack()">
    <i class='bx bx-arrow-back'></i> <!-- Replace bx-arrow-back with the Boxicons class you want to use -->
  </button>
  <div class="headerdevise">
      <h4>Souhaitez-vous avoir une conversion de devise instantanée?</h4>
      <h5>Utilisez notre convertisseur de devise.</h5>
    </div>
  <div class="main_body_f">
    <div class="wrapper">
      <h3 style="font-weight: normal; padding-left: 10px;">Convertisseur Devise</h3>
      <form action="#">
        <div class="amount">
          <p>Saisissez votre somme</p>
          <input type="text" value="1">
        </div>
        <div class="drop-list">
          <div class="from">
            <p>De</p>
            <div class="select-box">
              <img src="https://flagcdn.com/48x36/us.png" alt="flag">
              <select> <!-- Options tag are inserted from JavaScript --> </select>
            </div>
          </div>
          <div class="icon"><i class="fas fa-exchange-alt"></i></div>
          <div class="to">
            <p>à</p>
            <div class="select-box">
              <img src="https://flagcdn.com/48x36/np.png" alt="flag">
              <select> <!-- Options tag are inserted from JavaScript --> </select>
            </div>
          </div>
        </div>

        <div class="exchange-rate">Obtenir le taux de change...</div>
        <button>Obtenir le taux de change</button>
      </form>
    </div>

    <script src="../../js/country-list.js"></script>
    <script src="../../js/script1.js"></script>

  </div>
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

  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function () {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });
    function goBack() {
      window.history.back();
    }
  </script>

</body>

</html>
<?php
//require_once "../../Model/utilisateurs.php";
require_once "../../Controller/inscriptioncontroller.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $utilisateurc = new utilisateurc();
    $utilisateurs = $utilisateurc->showUtilisateur($id);

}
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
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/nour.css">
    <link href="../../CSS/custom.css" rel="stylesheet">
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
                    <a href="indexf.php" class="logo">
                        <img src="../../View/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="accueil-link" href="indexf.php?id=<?php echo $utilisateurs['id']; ?>" class="active">Accueil</a></li>
                        <li><a id="about-link" href="about.php?id=<?php echo $utilisateurs['id']; ?>">À Propos</a></li>
                        <li><a id="deals-link" href="deals.php?id=<?php echo $utilisateurs['id']; ?>">Nos Offres</a></li>
                        <li><a id="mission-link" href="FRMissionPage.php?id=<?php echo $utilisateurs['id']; ?>">Missions</a></li>
                        <li><a id="blog-link" href="reservation.php?id=<?php echo $utilisateurs['id']; ?>">Blog</a></li>
                        <li><a id="depenses-link" href="Depenses_f.php?id=<?php echo $utilisateurs['id']; ?>">Dépenses</a></li>
                        <input type="submit" name="connect" value="Connexion" class="btn solid" id="connect" style="background-color:#FBCD5AFF;"/>
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
<section id="section-1">
    <div class="content-slider">
        <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
        <input type="radio" id="banner2" class="sec-1-input" name="banner">
        <input type="radio" id="banner3" class="sec-1-input" name="banner">
        <input type="radio" id="banner4" class="sec-1-input" name="banner">
        <div class="slider">
            <div id="top-banner-1" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption">
                        <h2>Jetez un coup d'œil au magnifique pays de :</h2>
                        <h1>Italie</h1>
                        <div class="border-button"><a href="about.php">Visitez</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-user"></i>
                                            <h4><span>Population :</span><br>44,48 M</h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-globe"></i>
                                            <h4><span>Territoire :</span><br>275 400 km<em>2</em></h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class='bx bx-home'></i>
                                            <h4><span>Prix moyen :</span><br>946 000 $</h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="main-button">
                                                <a href="about.php">En savoir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="top-banner-2" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption">
                        <h2>Jetez un coup d'œil au magnifique pays de :</h2>
                        <h1>Tunisie</h1>
                        <div class="border-button"><a href="about.php">Visitez</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-user"></i>
                                            <h4><span>Population :</span><br>8,66 M</h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-globe"></i>
                                            <h4><span>Territoire :</span><br>41 290 km<em>2</em></h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-home"></i>
                                            <h4><span>Prix moyen :</span><br>1 100 200 $</h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="main-button">
                                                <a href="about.php">En savoir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="top-banner-3" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption">
                        <h2>Jetez un coup d'œil au magnifique pays de :</h2>
                        <h1>France</h1>
                        <div class="border-button"><a href="about.php">Visitez</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-user"></i>
                                            <h4><span>Population :</span><br>67,41 M</h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-globe"></i>
                                            <h4><span>Territoire :</span><br>551 500 km<em>2</em></h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-home"></i>
                                            <h4><span>Prix moyen :</span><br>425 600 $</h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="main-button">
                                                <a href="about.php">En savoir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="top-banner-4" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption">
                        <h2>Jetez un coup d'œil au magnifique pays de :</h2>
                        <h1>Les états unis</h1>
                        <div class="border-button"><a href="about.php">Visitez</a></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-user"></i>
                                            <h4><span>Population :</span><br>69,86 M</h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-globe"></i>
                                            <h4><span>Territoire :</span><br>513 120 km<em>2</em></h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="bx bx-home"></i>
                                            <h4><span>Prix moyen :</span><br>165 450 $</h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="main-button">
                                                <a href="about.php">En savoir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="controls">
                <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                            class="text">1</span></label>
                <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                            class="text">2</span></label>
                <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                            class="text">3</span></label>
                <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                            class="text">4</span></label>
            </div>
        </nav>
    </div>
</section>
<!-- ***** Main Banner Area End ***** -->
<div class="visit-country">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading">
                    <h2>Visitez l'un de nos pays maintenant</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="items">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5">
                                        <div class="image">
                                            <img src="../images/country-01.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-7">
                                        <div class="right-content">
                                            <h4>SUISSE</h4>
                                            <span>Europe</span>
                                            <div class="main-button">
                                                <a href="about.php">En savoir plus</a>
                                            </div>
                                            <p>Voysync est un thème Bootstrap 5 professionnel HTML CSS pour votre site
                                                web. Vous pouvez
                                                utiliser cette mise en page pour votre travail commercial.</p>
                                            <ul class="info">
                                                <li><i class="bx bx-user"></i> 8,66 millions de personnes</li>
                                                <li><i class="bx bx-globe"></i> 41 290 km<sup>2</sup></li>
                                                <li><i class="bx bx-home"></i> 1 100 200 $</li>
                                            </ul>
                                            <div class="text-button">
                                                <a href="about.php">Besoin d'indications ? <i
                                                            class="bx bx-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5">
                                        <div class="image">
                                            <img src="../images/country-02.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-7">
                                        <div class="right-content">
                                            <h4>CARAÏBES</h4>
                                            <span>Amérique du Nord</span>
                                            <div class="main-button">
                                                <a href="about.php">En savoir plus</a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut
                                                labore et dolore magna aliqua.</p>
                                            <ul class="info">
                                                <li><i class="bx bx-user"></i> 44,48 millions de personnes</li>
                                                <li><i class="bx bx-globe"></i> 275 400 km<sup>2</sup></li>
                                                <li><i class="bx bx-home"></i> 946 000 $</li>
                                            </ul>
                                            <div class="text-button">
                                                <a href="about.php">Besoin d'indications ? <i
                                                            class="bx bx-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="item last-item">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5">
                                        <div class="image">
                                            <img src="../images/country-03.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-7">
                                        <div class="right-content">
                                            <h4>FRANCE</h4>
                                            <span>Europe</span>
                                            <div class="main-button">
                                                <a href="about.php">En savoir plus</a>
                                            </div>
                                            <p>Nous espérons que ce modèle WoOx vous sera utile, veuillez nous soutenir
                                                en <a
                                                        href="https://paypal.me/templatemo" target="_blank">versant une
                                                    petite somme via PayPal</a>
                                                à l'adresse info [at] templatemo.com pour notre survie. Nous apprécions
                                                vraiment votre
                                                contribution.</p>
                                            <ul class="info">
                                                <li><i class="bx bx-user"></i> 67,41 millions de personnes</li>
                                                <li><i class="bx bx-globe"></i> 551 500 km<sup>2</sup></li>
                                                <li><i class="bx bx-home"></i> 425 600 $</li>
                                            </ul>
                                            <div class="text-button">
                                                <a href="about.php">Besoin d'indications ? <i
                                                            class="bx bx-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <ul class="page-numbers">
                                <li><a href="#"><i class="bx bx-arrow-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="bx bxbx bx-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="side-bar-map">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="map">
                                <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth"
                                        width="100%" height="550px" frameborder="0"
                                        style="border:0; border-radius: 23px; "
                                        allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Nour PARTIE -->
<div class="cities-town">
    <div class="container">
      <div class="row">
        <div class="slider-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Votre <em>Pochette de voyage</em> vituelle!</h2>
            </div>
            <div class="col-lg-12">
              <div class="owl-cites-town owl-carousel">
                <div class="item">
                  <div class="thumb">
                    <img src="../images/budget2.jpg" alt="">
                    <h4 style="text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);">Gestion budgets</h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="../images/doc2.jpg" alt="">
                    <h4 style="text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);">Gestion des documents</h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="../images/notif2.jpg" alt="">
                    <h4 style="text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);">Systeme de rappels</h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="../images/devise2.jpg" alt="">
                    <h4 style="text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);">Convertisseur de devise LIVE</h4>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Nour PARTIE end -->
<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>Vous cherchez à voyager ?</h2>
                <h4>Réservez en cliquant sur le bouton</h4>
            </div>
            <div class="col-lg-4">
                <div class="border-button">
                    <a href="reservation.php">Réservez dès maintenant</a>
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
</script>

<script>
    document.getElementById("connect").addEventListener("click", function () {
        window.location.href = "inscriptionview.php";
    });
</script>

<script>
    var loggedIn = true; // Remplacez par votre logique de connexion

    function toggleButton() {
        var button = document.getElementById('connect');
        if (loggedIn) {
            button.value = 'Déconnexion';
        } else {
            button.value = 'Connexion';
        }

        button.onclick = function () {
            // Redirection en fonction de l'état de connexion
            var redirectUrl = loggedIn ? 'inscriptionview.php' : 'inscriptionview.php';
            window.location.href = redirectUrl;
        };
    }

    window.onload = toggleButton;
</script>

</body>

</html>
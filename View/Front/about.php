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
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
                    <a href="indexf.php" class="logo">
                        <img src="../images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="accueil-link" href="indexf.php?id=<?php echo $utilisateurs['id']; ?>" class="active">Accueil</a>
                        </li>
                        <li><a id="about-link" href="about.php?id=<?php echo $utilisateurs['id']; ?>">À Propos</a></li>
                        <li><a id="deals-link" href="deals.php?id=<?php echo $utilisateurs['id']; ?>">Nos Offres</a>
                        </li>
                        <li><a id="contact-link"
                               href="reservation.php?id=<?php echo $utilisateurs['id']; ?>">Contact</a></li>
                        <li><a id="blog-link" href="reservation.php?id=<?php echo $utilisateurs['id']; ?>">Blog</a></li>
                        <li><a id="depenses-link"
                               href="Depenses_f.php?id=<?php echo $utilisateurs['id']; ?>">Dépenses</a></li>
                        <input type="submit" name="connect" value="Connexion" class="btn solid" id="connect"
                               style="background-color:#FBCD5AFF;"/>
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
<div class="about-main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content">
                    <div class="blur-bg"></div>
                    <h4>EXPLORE OUR COUNTRY</h4>
                    <div class="line-dec"></div>
                    <h2>Welcome To Caribbean</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi
                        labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
                    <div class="main-button">
                        <a href="reservation.php">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<div class="cities-town">
    <div class="container">
        <div class="row">
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Caribbean’s <em>Cities &amp; Towns</em></h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-cites-town owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <img src="../images/cities-01.jpg" alt="">
                                    <h4>Havana</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <img src="../images/cities-02.jpg" alt="">
                                    <h4>Kingston</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <img src="../images/cities-03.jpg" alt="">
                                    <h4>George Town</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <img src="../images/cities-04.jpg" alt="">
                                    <h4>Santo Domingo</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <img src="../images/cities-01.jpg" alt="">
                                    <h4>Havana</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <img src="../images/cities-02.jpg" alt="">
                                    <h4>Kingston</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <img src="../images/cities-03.jpg" alt="">
                                    <h4>George Town</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <img src="../images/cities-04.jpg" alt="">
                                    <h4>Santo Domingo</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="weekly-offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading text-center">
                    <h2>Best Weekly Offers In Each City</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-weekly-offers owl-carousel">
                    <div class="item">
                        <div class="thumb">
                            <img src="../images/offers-01.jpg" alt="">
                            <div class="text">
                                <h4>Havana<br><span><i class="bx bx-users"></i> 234 Check Ins</span></h4>
                                <h6>$420<br><span>/person</span></h6>
                                <div class="line-dec"></div>
                                <ul>
                                    <li>Deal Includes:</li>
                                    <li><i class="bx bx-taxi"></i> 5 Days Trip > Hotel Included</li>
                                    <li><i class="bx bx-plane"></i> Airplane Bill Included</li>
                                    <li><i class="bx bx-building"></i> Daily Places Visit</li>
                                </ul>
                                <div class="main-button">
                                    <a href="reservation.php">Make a Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb">
                            <img src="../images/offers-02.jpg" alt="">
                            <div class="text">
                                <h4>Kingston<br><span><i class="bx bx-users"></i> 234 Check Ins</span></h4>
                                <h6>$420<br><span>/person</span></h6>
                                <div class="line-dec"></div>
                                <ul>
                                    <li>Deal Includes:</li>
                                    <li><i class="bx bx-taxi"></i> 5 Days Trip > Hotel Included</li>
                                    <li><i class="bx bx-plane"></i> Airplane Bill Included</li>
                                    <li><i class="bx bx-building"></i> Daily Places Visit</li>
                                </ul>
                                <div class="main-button">
                                    <a href="reservation.php">Make a Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb">
                            <img src="../images/offers-03.jpg" alt="">
                            <div class="text">
                                <h4>George Town<br><span><i class="bx bx-users"></i> 234 Check Ins</span></h4>
                                <h6>$420<br><span>/person</span></h6>
                                <div class="line-dec"></div>
                                <ul>
                                    <li>Deal Includes:</li>
                                    <li><i class="bx bx-taxi"></i> 5 Days Trip > Hotel Included</li>
                                    <li><i class="bx bx-plane"></i> Airplane Bill Included</li>
                                    <li><i class="bx bx-building"></i> Daily Places Visit</li>
                                </ul>
                                <div class="main-button">
                                    <a href="reservation.php">Make a Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb">
                            <img src="../images/offers-01.jpg" alt="">
                            <div class="text">
                                <h4>Havana<br><span><i class="bx bx-users"></i> 234 Check Ins</span></h4>
                                <h6>$420<br><span>/person</span></h6>
                                <div class="line-dec"></div>
                                <ul>
                                    <li>Deal Includes:</li>
                                    <li><i class="bx bx-taxi"></i> 5 Days Trip > Hotel Included</li>
                                    <li><i class="bx bx-plane"></i> Airplane Bill Included</li>
                                    <li><i class="bx bx-building"></i> Daily Places Visit</li>
                                </ul>
                                <div class="main-button">
                                    <a href="reservation.php">Make a Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb">
                            <img src="../images/offers-02.jpg" alt="">
                            <div class="text">
                                <h4>Kingston<br><span><i class="bx bx-users"></i> 234 Check Ins</span></h4>
                                <h6>$420<br><span>/person</span></h6>
                                <div class="line-dec"></div>
                                <ul>
                                    <li>Deal Includes:</li>
                                    <li><i class="bx bx-taxi"></i> 5 Days Trip > Hotel Included</li>
                                    <li><i class="bx bx-plane"></i> Airplane Bill Included</li>
                                    <li><i class="bx bx-building"></i> Daily Places Visit</li>
                                </ul>
                                <div class="main-button">
                                    <a href="reservation.php">Make a Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumb">
                            <img src="../images/offers-03.jpg" alt="">
                            <div class="text">
                                <h4>George Town<br><span><i class="bx bx-users"></i> 234 Check Ins</span></h4>
                                <h6>$420<br><span>/person</span></h6>
                                <div class="line-dec"></div>
                                <ul>
                                    <li>Deal Includes:</li>
                                    <li><i class="bx bx-taxi"></i> 5 Days Trip > Hotel Included</li>
                                    <li><i class="bx bx-plane"></i> Airplane Bill Included</li>
                                    <li><i class="bx bx-building"></i> Daily Places Visit</li>
                                </ul>
                                <div class="main-button">
                                    <a href="reservation.php">Make a Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="more-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-image">
                    <img src="../images/about-left-image.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Discover More About Our Country</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-item">
                            <h4>150.640 +</h4>
                            <span>Total Guests Yearly</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-item">
                            <h4>175.000+</h4>
                            <span>Amazing Accomoditations</span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="info-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>12.560+</h4>
                                    <span>Amazing Places</span>
                                </div>
                                <div class="col-lg-6">
                                    <h4>240.580+</h4>
                                    <span>Different Check-ins Yearly</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore.</p>
                <div class="main-button">
                    <a href="reservation.php">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>Are You Looking To Travel ?</h2>
                <h4>Make A Reservation By Clicking The Button</h4>
            </div>
            <div class="col-lg-4">
                <div class="border-button">
                    <a href="reservation.php">Book Yours Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © 2036 <a href="#">Voysync</a> Company. All rights reserved.
                    <br>Design: <a href="https://templatemo.com" target="_blank"
                                   title="free CSS templates">TemplateMo</a></p>
            </div>
        </div>
    </div>
</footer>


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="../../js/isotope.min.js"></script>
<script src="../../js/owl-carousel.js"></script>
<script src="../../js/wow.js"></script>
<script src="../../js/tabs.js"></script>
<script src="../../js/popup.js"></script>
<script src="../../js/custom.js"></script>

<script>
    $(".option").click(function () {
        $(".option").removeClass("active");
        $(this).addClass("active");
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

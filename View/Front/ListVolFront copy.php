<?php
require_once '../../Controller/VolC.php';
$volC = new VolC();
$vols = $volC->listVols();

if (isset($_GET['Arrive'])) {
  $Arrive = $_GET['Arrive'];
  $volC = new VolC();
  $vol = $volC->searchMissions($Arrive);
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
                    <a href="indexf.php" class="logo">
                        <img src="../../View/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="accueil-link" href="indexf.php" class="active">Accueil</a></li>
                        <li><a href="ListLogementFront copy 2.php">Logements</a></li>
                        <li><a href="ListVolFront copy.php">Vols</a></li>
                        <li><a id="mission-link" href="FRMissionPage.php">Missions</a></li>
                        <li><a id="blog-link" href="blog.php">Blog</a></li>
                        <li><a id="depenses-link" href="depenses_f.php">Dépenses</a></li>
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

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <h4>Découvrez nos offres hebdomadaires</h4>
          <h2>Des prix incroyables et plus</h2>
          <!-- <div class="border-button"><a href="about.html">Discover More</a></div> -->
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-2">
                <h4>Trier les offres</h4>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Location" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                          <option selected>Destinations</option>
                          <option type="checkbox" name="option1" value="Italie">Italie</option>
                          <option value="Tunisie">Tunisie</option>
                          <option value="France">France</option>
                          <option value="Suisse">Suisse</option>
                          <option value="Thaïlande">Thaïlande</option>
                          <option value="Australie">Australie</option>
                          <option value="Inde">Inde</option>
                          <option value="Indonésie">Indonésie</option>
                          <option value="Malaisie">Malaisie</option>
                          <option value="Singapour">Singapour</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                        <option selected>Gamme de prix</option>
                          <option value="100">00Dt - 100Dt</option>
                          <option value="100">100Dt - 250Dt</option>
                          <option value="250">250Dt - 500Dt</option>
                          <option value="500">500Dt - 1,000Dt</option>
                          <option value="1000">1,000Dt - 2,500Dt</option>
                          <option value="2500+">2,500Dt+</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-2">                        
                  <fieldset>
                      <button class="border-button">Résultats de la recherche</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="amazing-deals">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading text-center">
                    <h2>Voici les offres de vol disponibles</h2>
                    <p>Faites un tour pour voir nos offres et réserver un vol dans un endroit magique.</p>
                </div>
            </div>
        </div>

        <div class="row">
        <?php $i = 0; ?>
        <?php foreach ($vols as $vol): ?>
            <!-- Start a new row every two items -->
            <?php if ($i % 2 == 0 && $i != 0): ?>
                </div> <!-- End current row -->
                <div class="row"> <!-- Start a new row -->
            <?php endif; ?>
            
            <div class="col-lg-6 col-sm-6"> <!-- Container for each vol -->
                <div class="item"> <!-- Consistent class name -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="image">
                            <img src="../uploads/<?= $vol['File']; ?>" alt="Image du vol">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="content">
                                <h4><?= $vol['Compagnie']; ?> - <?= $vol['Num_vol']; ?></h4>
                                <p><?= $vol['Depart']; ?> - <?= $vol['Arrive']; ?></p>
                                <p>Du <?= $vol['DateDepart']; ?> jusqu'au <?= $vol['DateArrive']; ?></p>
                                <div class="row">
                                    <div class="col-6">
                                        <i class="fa fa-dollar-sign"></i>
                                        <span class="list"><?= $vol['Prix']; ?>Dt</span>
                                    </div>
                                    <div class="col-6">
                                      <i class="fa fa-star"></i>
                                      <span class="list"><?= $vol['Evaluation'] . ' ⭐️'; ?></span>
                                  </div>

                                </div>
                                <div class="main-button">
                                    <!-- Redirection vers reservation.php avec des paramètres GET -->
                                    <!-- <a href="reservation.php?vol_id=<?= $vol['IDvol']; ?>&date_reservation=<?= urlencode($vol['DateArrive']); ?>&destination=<?= urlencode($vol['Arrive']); ?>">Réserver logement correspondant</a> -->
                                    <a href="reservation copy 2.php?vol_id=<?= $vol['IDvol']; ?>&date_reservation=<?= urlencode($vol['DateArrive']); ?>&destination=<?= urlencode($vol['Arrive']); ?>">Réserver logement correspondant</a>
                                </div>
                                <div class="main-button">
                                        <a href="reservationVol.php?vol_id=<?= $vol['IDvol'] ?>">Réserver</a>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div> <!-- End item -->
            </div> <!-- End col -->

            <?php $i++; ?> <!-- Increment counter -->
        <?php endforeach; ?>
    </div> <!-- End final row -->
</div> <!-- End container -->

        
  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Are You Looking To Travel ?</h2>
          <h4>Make A Reservation By Clicking The Button</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="reservation.html">Book Yours Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
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
  <!-- <script src="../../js/wow.js"></script> -->
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>
  <!-- <script src="http://localhost/Projet2.0/js/script.js"></script> -->
</body>

</html>

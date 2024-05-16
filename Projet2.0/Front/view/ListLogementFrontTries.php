<?php
require_once '../controller/LogementC.php';
// Récupérer les valeurs de la requête (GET ou POST)
$vol_id = isset($_POST['vol_id']) ? intval($_POST['vol_id']) : null;
$date_reservation = isset($_POST['date_reservation']) ? htmlspecialchars($_POST['date_reservation']) : null;
$destination = isset($_POST['destination']) ? htmlspecialchars($_POST['destination']) : null;
$capacite = isset($_POST['Capacite']) ? intval($_POST['Capacite']) : null;
$nom = isset($_POST['Name']) ? htmlspecialchars($_POST['Name']) : null;
$telephone = isset($_POST['Number']) ? htmlspecialchars($_POST['Number']) : null;
$mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : null;

// Utiliser ces valeurs pour filtrer les logements
$logementC = new LogementC();
$logements = $logementC->getFilteredLogements($date_reservation, $destination, $capacite);
//$logements = $logementC->listLogement();
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
    <link href="http://localhost/Projet2.0/Front/view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
  
    <!-- Fichiers CSS supplémentaires -->
    <link rel="stylesheet" href="http://localhost/Projet2.0/Front/CSS/templatemo-woox-travel.css">
    <link rel="stylesheet" href="http://localhost/Projet2.0/Front/CSS/owl.css">
    <link rel="stylesheet" href="http://localhost/Projet2.0/Front/CSS/animate.css">
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
                        <img src="http://localhost/Projet2.0/Front/view/images/logo.png" alt="">
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

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Discover Our Weekly Offers</h4>
          <h2>Amazing Prices &amp; More</h2>
          <div class="border-button"><a href="about.html">Discover More</a></div>
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
                <h4>Sort Deals By:</h4>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Location" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                          <option selected>Destinations</option>
                          <option type="checkbox" name="option1" value="Italy">Italy</option>
                          <option value="France">France</option>
                          <option value="Switzerland">Switzerland</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Australia">Australia</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Singapore">Singapore</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                          <option selected>Price Range</option>
                          <option value="100">$100 - $250</option>
                          <option value="250">$250 - $500</option>
                          <option value="500">$500 - $1,000</option>
                          <option value="1000">$1,000 - $2,500</option>
                          <option value="2500+">$2,500+</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-2">                        
                  <fieldset>
                      <button class="border-button">Search Results</button>
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
                    <h2>Voici les offres de logement disponibles</h2>
                    <p>Faites un tour pour voir nos offres et réserver un logement dans un endroit magique.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php $i = 0; ?>
            <?php foreach ($logements as $logement): ?>
                <!-- Start a new row every two items -->
                <?php if ($i % 2 == 0 && $i != 0): ?>
                    </div>
                    <div class="row">
                <?php endif; ?>
                
                <div class="col-lg-6 col-sm-6">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image">
                                  <img src="../../Back/view/uploads/<?= $logement['File']; ?>" alt="Image du logement">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                    <div class="content">
                                        <h4><?= $logement['Nom']; ?> - <?= $logement['Adresse']; ?></h4>
                                        <p><?= $logement['Description']; ?></p>
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fa fa-tag"></i>
                                                <span class="list"><?= $logement['Type']; ?></span>
                                            </div>
                                            <div class="col-6">
                                                <i class="fa fa-dollar-sign"></i>
                                                <span class="list"><?= $logement['Prix']; ?>Dt</span>
                                            </div>
                                        </div>
                                        <div class="main-button">
                                          <form method="post" action="create_reservation.php" onsubmit="return confirmReservation()"> <!-- Assurez-vous que c'est la bonne action -->
                                              <input type="hidden" name="vol_id" value="<?= htmlspecialchars($vol_id); ?>"> <!-- Vérifiez la valeur -->
                                              <input type="hidden" name="logement_id" value="<?= htmlspecialchars($logement['IDlogement']); ?>"> <!-- Vérifiez la valeur -->
                                              <!-- Autres champs obligatoires -->
                                              <input type="hidden" name="date_reservation" value="<?= htmlspecialchars($date_reservation); ?>">
                                              <input type="hidden" name="destination" value="<?= htmlspecialchars($destination); ?>">
                                              <input type="hidden" name="guests" value="<?= htmlspecialchars($logement['Capacite']); ?>">
                                              <input type="hidden" name="Name" value="<?= htmlspecialchars($nom); ?>">
                                              <input type="hidden" name="Number" value="<?= htmlspecialchars($telephone); ?>">
                                              <input type="hidden" name="mail" value="<?= htmlspecialchars($mail); ?>">
                                              <button type="submit">Réserver</button>
                                          </form>
                                      </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $i++; ?>
            <?php endforeach; ?>
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
  <script src="http://localhost/Projet2.0/Front/view/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/Projet2.0/Front/view/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="http://localhost/Projet2.0/Front/js/isotope.min.js"></script>
  <script src="http://localhost/Projet2.0/Front/js/owl-carousel.js"></script>
  <!-- <script src="../../js/wow.js"></script> -->
  <script src="http://localhost/Projet2.0/Front/js/tabs.js"></script>
  <script src="http://localhost/Projet2.0/Front/js/popup.js"></script>
  <script src="http://localhost/Projet2.0/Front/js/custom.js"></script>
  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>
  <!-- <script src="http://localhost/Projet2.0/js/script.js"></script> -->
  <script>
function confirmReservation() {
  return confirm("En cliquant sur OK, vous recevrez un e-mail de confirmation à votre adresse e-mail ainsi qu'un SMS sur votre téléphone. Souhaitez-vous continuer?");
}
</script>

  </body>

</html>

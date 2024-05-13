<?php
include '../../Controller/MissionC.php';
include '../../Controller/ReviewC.php';
include '../../Model/Mission.php';
include '../../Model/Review.php';

$error ="";


if( isset($_GET['id_m'])) {
    $id_m = $_GET['id_m'];
    $MissionC = new MissionC();
    $mission= $MissionC->showMission($id_m);
    if(!$mission  || !isset($mission['title']) || !isset($mission['description']) || !isset($mission['place']) || !isset($mission['gift_point'])|| !isset($mission['rate'])){
      echo "mission post not found.";
    
        exit;
    }
  } else {
    // Handle the case where modifierid is not provided
    echo "modifierid parameter is missing.";
    exit;
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
    <link rel="stylesheet" href="../../CSS/templatemo-woox-travelA.css">
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
  
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="indexf.html" class="logo">
                        <img src="../imagesFront/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="indexf.html" class="active">Accueil</a></li>
                      <li><a href="about.html">À Propos</a></li>
                      <li><a href="deals.html">Nos Offres</a></li>
                      <li><a href="reservation.html">Contact</a></li>
                      <li><a href="reservation.html">Blog</a></li>
                      <li><a href="FRMissionPage.php">Missions</a></li>
                      <li><a href="../Back/MissionPage.php">Dépenses</a></li>
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
  <div class="info-container">
  <div class="info-box">
    <div class="col-lg-12">
      <div class="item">
        <div class="row">
          <div class="col-lg-6">
            <div class="image">
              <img src="<?php echo $mission['imageM']; ?>" alt="">
            </div>
          </div>
          <div class="col-lg-6 align-self-center">
            <div class="content">  
              <h4><?php echo $mission['title']; ?></h4>
              <div class="row">
                <div class="col-6">
                  <i class="fa fa-clock"></i>
                  <span class="list">$ <?php echo $mission['gift_point']; ?> </span>
                </div>
                <div class="col-6">
                  <i class="fa fa-map"></i>
                  <span class="list"><?php echo $mission['place']; ?></span>
                </div>
              </div>
              <p><strong><?php echo $mission['description']; ?></strong></p>
              <div class="row">
                <div class="col-lg-6">
                  <div class="main-button">
                    <a class="btn" href="HomePage.php" role="button">Retourner</a>          
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

    <script>
          const score =document.querySelector('.score');
          const ratings = document.querySelectorAll('.rating input');

          ratings.forEach((rating) => {
            rating.addEventListener('change', () => {
              const rate = rating.value;
              console.log(rate);
            });
          });
        </script>

</body>

</html>

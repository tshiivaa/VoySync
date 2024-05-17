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
if (isset($_POST['submitMission'])) {
  
  require_once "../../Controller/inscriptioncontroller.php";
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $utilisateurc = new utilisateurc();
      $utilisateurs = $utilisateurc->showUtilisateur($id);

  }

  $ReviewC = new ReviewC();
  
  $id_m = $_POST['id_m'];
  $image = $_FILES['image'];
  $imageName = $image['name'];
  $imageTmpName = $image['tmp_name'];
  $imageError = $image['error'];

  if ($imageError === 0) {
      $upload_image = '../images/missions/' . $imageName;
      move_uploaded_file($imageTmpName, $upload_image);

      $review = new Review( 
          null,
          null,
          $upload_image,
          $id_m
      );

      $ReviewC->addReviewSMS($review);
      header('Location: FRMissionPage.php');
      exit();
  } else {
      // Gérer les erreurs d'upload d'image
      die('Error uploading image.');
  }
}
if (isset($_POST['submitFeedback'])) {
  
  $ReviewC = new ReviewC();
  // Récupérer les données du formulaire
  $description = $_POST['description'];
  $rate = $_POST['rating'];
  $id_m = $_POST['id_m'];
  $id = $_POST['id'];

  $review = new Review( 
    $description,
    $rate,
    null,
    $id_m
    );
    $ReviewC->addReview($review);
    $ReviewC->updateMissionWithReview($id_m);
    if (ob_get_length() > 0) {
      ob_end_clean(); // Clear the output buffer
    }
    header('Location: FRMissionPage.php');
    exit();
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
                        <li><input type="submit" name="connect" value="Connexion" class="btn solid" id="connect" style="background-color:#FBCD5AFF;"/></li>
                        <li><a href="filtre_Magique.php" class="active"><i class='bx bxs-magic-wand'></i> Itineraire magique</a></li>
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
                    <a class="btn" id="mission" role="button">Faire la mission</a>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="main-button">
                    <a class="btn" id="feedback" role="button">Donner feedback</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

  <!--------------------------------------------------------Faire la mission--------------------------------------------------------------------------->
        <center>
        <section id="do-mission" class="site-section bg-light" style="display: none;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7">  
              <h2>Faire de mission</h2>
              <form  method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_m" value="<?php echo $mission['id_m'];?>" >
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" accept="image/*" >
                <button type="submit"  name="submitMission" class="btn btn-primary">Valider</button>
              </form>
            </div>
          </div>
        </div>
        </section>
        </center>

  <!---------------------------------------------------------feedback ------------------------------------------------------------------------------->
        <center>
        <section id="do-feedback" class="site-section bg-light" style="display: none;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7">  
              <h2>Feedback</h2>
              <form  method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $utilisateurs['id']; ?>" >

                <input type="hidden" name="id_m" value="<?php echo $mission['id_m'];?>" >
                <label for="description">Commentaire:</label>
                <textarea id="description" name="description" ></textarea><br>
                <label for="rate">Evaluation:</label>  
                <div class="rating">
                  <input type="radio" id="star5" name="rating" value="5" />
                  <label for="star5" title="5 stars"></label>
                  <input type="radio" id="star4" name="rating" value="4" />
                  <label for="star4" title="4 stars"></label>
                  <input type="radio" id="star3" name="rating" value="3" />
                  <label for="star3" title="3 stars"></label>
                  <input type="radio" id="star2" name="rating" value="2" />
                  <label for="star2" title="2 stars"></label>
                  <input type="radio" id="star1" name="rating" value="1" />
                  <label for="star1" title="1 star"></label>
                </div><br>
                <button type="submit"  name="submitFeedback" class="btn btn-primary">Ajouter feedback</button>
              </form>
            </div>
          </div>
        </div>
        </section>
        </center>
      </div>
    </div>
  </div>
</div>




    <script>
    document.getElementById('feedback').addEventListener('click', function() {
      document.getElementById('do-feedback').style.display = 'block';
    });
    document.getElementById('mission').addEventListener('click', function() {
      document.getElementById('do-mission').style.display = 'block';
    });
  </script>
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

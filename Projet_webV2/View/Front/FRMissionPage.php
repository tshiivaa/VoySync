
<?php
include '../../Controller/MissionC.php';
include '../../Model/Mission.php';


$MissionC = new MissionC();
$missions = $MissionC->listMission();

if (isset($_GET['searchQuery'])) {
  $searchQuery = $_GET['searchQuery'];
  $MissionC = new MissionC();
  $missions = $MissionC->searchMissions($searchQuery);
}

if (isset($_GET['trie'])) {
    $TrieQuery = $_GET['trie'];
    $MissionC = new MissionC();
    $missions = $MissionC->TrieMissions($TrieQuery);
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
    <link rel="stylesheet" href="../../CSS/search.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

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
          <div id="search-form">
            <div class="row">
              <div class="col-lg-2">
                <h4>Sort Deals By:</h4>
              </div>
              <div class="col-lg-5">
                  <fieldset>
                      <form id="trie-form" name="trieForm" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                          <select name="trie" class="form-select" aria-label="Default select example" id="chooseLocation" onchange="this.form.submit()">
                              <option selected disabled>trie</option>
                              <option value="title">Titre</option>
                              <option value="gift_point">Gift point</option>
                              <option value="place">Lieu</option>
                          </select>
                      </form>
                  </fieldset>
              </div>
              <div class="col-lg-5">
                <fieldset>
                  <form id="search-form" name="searchForm" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      <input type="text" id="searchInput" name="searchQuery" placeholder="Rechercher par titre..."/>
                      <button  type="submit" >Rechercher</button>
                  </form>
                </fieldset>
                
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
  </div>
  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
        <div class="row" id="searchResults">
          <?php
            $nbr = 0;
            foreach ($missions as $mission) {
          ?>
          <div class="col-lg-6 col-sm-6">
            <div class="item">
              <div class="row">
                <div class="col-lg-6">
                  <div class="image-container" style="overflow: hidden; position: relative; height: 342px;  border-top-left-radius: 23px; border-bottom-left-radius: 23px;justify-content: center; align-items: center;">
                      <img style="width: 100%; height: 342px; vertical-align: middle;" src="<?php echo $mission['imageM']; ?>" alt="">
                  </div>
                </div>
                <div class="col-lg-6 align-self-center">
                  <div class="content">
                    <center><div class="rating">
                      <?php
                        $rate = $mission['rate'];
                        if ($rate > 0)
                        {
                          $starsToShow = $rate > 0 ? $rate : 0; // Déterminer le nombre d'étoiles à afficher (rate si supérieur à 0, sinon 5)
                          for ($i = 5; $i >= 1; $i--) {
                            $checked = $i >= $starsToShow ? 'checked' : ''; // Vérifie si l'étoile doit être cochée
                            echo '<input type="radio" id="star' . $i . $nbr . '" name="rating' . $nbr . '" value="' . $i . '" ' . $checked . ' />';
                            echo '<label for="star' . $i . $nbr . '" title="' . $i . ' stars"></label>';
                          }
                        }else
                        {
                          $starsToShow = $rate > 0 ? $rate : 0; // Si le taux est supérieur à 0, affiche le taux, sinon affiche 0
                          for ($i = 5; $i >= 1; $i--) {
                              $checked = $i > $starsToShow ? '' : 'checked'; // Si l'étoile doit être cochée (taux non nul), sinon vide
                              echo '<input type="radio" id="star' . $i . $nbr . '" name="rating' . $nbr . '" value="' . $i . '" ' . $checked . ' />';
                              echo '<label for="star' . $i . $nbr . '" title="' . $i . ' stars"></label>';
                          }
                        }  
                      ?>
                    </div></center>
                    <h4><?php echo $mission['title']; ?></h4>
                    <div class="row">
                      <div class="col-lg-6">
                          <span class="list">$ <?php echo $mission['gift_point']; ?> </span>
                      </div>
                      <div class="col-lg-6">
                          <span class="list">&#128205;<?php echo $mission['place']; ?></span>
                      </div>
                    </div>
                    <p class ="description"><strong><?php echo $mission['description']; ?></strong></p>
                    <div class="main-button">
                        <a class="btn" href="info.php?id_m=<?= $mission['id_m']; ?>" role="button">Plus d'info</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
              $nbr++;
          }
          ?>
        </div>

        <div class="col-lg-12">
          <ul class="page-numbers">
            <li><a href="#"><i class="fa fa-arrow-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
          </ul>
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
  <script src="../../js/wow.js"></script>
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
<!--
  <script>
function searchMissions() {
    var searchQuery = document.getElementById('searchInput').value;
    $.ajax({
        type: 'GET',
        url: '../../Controller/MissionC.php',
        data: { action: 'searchMission', searchQuery: searchQuery },
        dataType: 'html',  // Change the data type back to HTML
        success: function(response) {
          console.log('AJAX Response:', response);
            var searchResultsContainer = document.getElementById('searchResults');
            console.log(searchResultsContainer.innerHTML)
            searchResultsContainer.innerHTML = response;  // Insert the HTML directly into the container
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

</script>
--> 
<script>
  function searchToggle(obj, evt){
      var container = $(obj).closest('.search-wrapper');
          if(!container.hasClass('active')){
              container.addClass('active');
              evt.preventDefault();
          }
          else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
              container.removeClass('active');
              // clear input
              container.find('.search-input').val('');
          }
  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </body>

</html>

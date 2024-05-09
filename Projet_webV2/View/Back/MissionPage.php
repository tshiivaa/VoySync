<?php
include '../../Controller/MissionC.php';
include '../../Controller/RewardC.php'; // Include the Reward controller
include '../../Model/Mission.php';
include '../../Model/Reward.php'; // Include the Reward model

$MissionC = new MissionC();
$RewardC = new RewardC();
if (isset($_POST['id_m'])) {
  $id_m = $_POST['id_m'];
  $MissionC->deleteMission($id_m);
  
  header("Location: MissionPage.php");
  exit();
}
$missions = $MissionC->listMissionWithReward(); // Update this method in your Mission controller

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Voysync</title>
    <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/styleTab.css" type="text/css">

</head>
<body>
    <nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="../images/logo.png" alt="">Voysync
    </div>
    <div class="search_bar">
        <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <img src="../images/profile.jpg" alt="" class="profile">
    </div>
  </nav>
  <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">
        <div class="menu_title menu_dahsboard"></div>
        <li class="item">
          <div href="index.html" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class="bx bx-home-alt"></i>
            </span>
            <span class="navlink">Home</span>
          </div>
        </li>
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-wallet'></i>
            </span>
            <span class="navlink">Pochette de voyage</span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>
          <ul class="menu_items submenu">
            <a href="Depenses_back.html" class="nav_link sublink">Back office</a>
            <a href="Depenses_front.html" class="nav_link sublink">Front office</a>
          </ul>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bxs-magic-wand"></i>
            </span>
            <span class="navlink">Itineraire magique</span>
          </a>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-chat'></i>
            </span>
            <span class="navlink">Blog</span>
          </a>
        </li>
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-wallet'></i>
            </span>
            <span class="navlink">Missions</span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>
          <ul class="menu_items submenu">
            <a href="HomePage.php" class="nav_link sublink">Back office</a>
            <a href="../Front/FRMissionPage.php" class="nav_link sublink">Front office</a>
          </ul>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-user-account'></i>
            </span>
            <span class="navlink">Compte</span>
          </a>
        </li>
      </ul>
      <ul class="menu_items">
        <div class="menu_title menu_setting"></div>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bx-medal"></i>
            </span>
            <span class="navlink">Award</span>
          </a>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bx-cog"></i>
            </span>
            <span class="navlink">Setting</span>
          </a>
        </li>
      </ul>
      <div class="bottom_content">
        <div class="bottom expand_sidebar">
          <span> Expand</span>
          <i class='bx bx-log-in'></i>
        </div>
        <div class="bottom collapse_sidebar">
          <span> Collapse</span>
          <i class='bx bx-log-out'></i>
        </div>
      </div>
    </div>
    </nav>
  <div class="main_body">
    <div class="tabs">
			 <input type="radio" name="tabs" id="tab1"  >
			 <label for="tab1">
				  <a  href="HomePage.php" class="icon home"></a><span>Home</span>
			 </label>
			 <input type="radio" name="tabs" id="tab2" checked>
			 <label for="tab2">
				  <a href="MissionPage.php" class="icon missionimg"></a><span>Mission</span>
			 </label>
			 <input type="radio" name="tabs" id="tab3">
			 <label for="tab3">
				  <a href="RewardPage.php" class="icon reward"></a><span>Reward</span>
			 </label>
    </div>
     <br> <br>
    <div id="Missions" class="tabcontent">
      <div class="row">
        <div class="col-5"></div>
      </div>
      <div>
				  <a href="CreateMission.php" class="btn">Ajouter Mission</a>
      </div> 
      <br>
      <div>
        <h2>Liste des Missions</h2>
          <?php 
          $nbr=0;
          foreach ($missions as $mission) {
            if ($nbr % 3 ==0) {
              echo '</div><div class="mission">';}
          ?>
          <div class="article">
            <center><img class="card-img-top" src="<?php echo $mission['imageM']; ?>" alt="Image de l'article"  height ="200">
            <h3><?php echo $mission['title']; ?></h3>
            <p><strong>Description :</strong> <?php echo $mission['description']; ?></p>
            <p><strong>Place:</strong> <?php echo $mission['place']; ?></p>
            <p><strong>Gift POINT:</strong> <?php echo $mission['gift_point']; ?></p>
            <p><strong>Reward:</strong> <?php echo $mission['reward_name']; ?></p> <!-- Display reward name -->

            <div class="rating">
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
            </div>

            <br><div class="button-container" >     
              <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return confirm('Do you want to delete this mission ?');">
                <input type="hidden" name="id_m" value="<?php echo $mission['id_m']; ?>">
                <button class="btn btn-danger" type="submit" name="delete" >Delete</button>
              </form>
              <a class="btn" href="UpdateMission.php?id_m=<?= $mission['id_m']; ?>" role="button">Update</a>          
            </div></center>
          </div>   
          <?php
            $nbr++;
            }
          ?>
      </div> 
    </div>
  </div>
        <script>
        
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
                document.getElementById('btnAjouter').addEventListener('click', function() 
                {
                  window.location.href = 'CreateMission.php';
                });
            }
        </script>
        <script src="../../js/script.js"></script>        

        
</body>
</html>
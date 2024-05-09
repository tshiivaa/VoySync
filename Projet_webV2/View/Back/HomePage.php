<?php
include '../../Controller/MissionC.php';
include '../../Model/Mission.php';
include '../../Controller/ReviewC.php';
include '../../Model/Review.php';
$ReviewC = new ReviewC();
$reviews = $ReviewC->listReviewWithMission();
$MissionC = new MissionC();
$missionsCoordinates = $MissionC->getAllMissionsCoordinates();

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
      .containerr th h1 {
          font-weight: bold;
          font-size: 1em;
        text-align: left;
        color: #dbe8ee;
      }
      
      .containerr td {
          font-weight: normal;
          font-size: 1em;
        -webkit-box-shadow: 0 2px 2px -2px #0E1119;
           -moz-box-shadow: 0 2px 2px -2px #0E1119;
                box-shadow: 0 2px 2px -2px #0E1119;
      }
      
      .containerr {
          text-align: left;
          overflow: hidden;
          width: 80%;
          
          margin: 0 auto;
        display: table;
        padding: 0 0 8em 0;
      }
      
      .containerr td, .containerr th {
          padding-bottom: 2%;
          padding-top: 2%;
        padding-left:2%; 
        border-radius: 5px; 
      }
      
      /* Background-color of the odd rows */
      .containerr tr:nth-child(odd) {
          background-color: #296097;
      }
      
      /* Background-color of the even rows */
      .containerr tr:nth-child(even) {
          background-color: #507fae;
      }
      
      .containerr th {
          background-color: #193c60;
      }
      
      .containerr td:first-child { color: #fbcd5a; }
      
      .containerr tr:hover {
         background-color: #464A52;
      -webkit-box-shadow: 0 6px 6px -6px #0E1119;
           -moz-box-shadow: 0 6px 6px -6px #0E1119;
                box-shadow: 0 6px 6px -6px #0E1119;
      }
      
      .containerr td:hover {
        background-color: #fbcd5a;
        color: #403E10;
        font-weight: bold;
        
        box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
        transform: translate3d(6px, -6px, 0);
        
        transition-delay: 0s;
          transition-duration: 0.4s;
          transition-property: all;
        transition-timing-function: line;
      }
      
      @media (max-width: 800px) {
      .containerr td:nth-child(4),
      .containerr th:nth-child(4) { display: none; }
      }
        
    </style>
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
			<input type="radio" name="tabs" id="tab1"  checked>
			<label for="tab1">
			  <a  href="HomePage.php" class="icon home"></a><span>Home</span>
			</label>
			<input type="radio" name="tabs" id="tab2" >
			<label for="tab2">
			  <a href="MissionPage.php" class="icon missionimg"></a><span>Mission</span>
			</label>
			<input type="radio" name="tabs" id="tab3">
			<label for="tab3">
			  <a href="RewardPage.php" class="icon reward"></a><span>Reward</span>
			</label>
    </div>
    <br> <br>
    <div>
          <!-- Button to generate PDF -->
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="generatePDF" value="true">
        <button type="submit" class="btn">Exporter PDF</button>
      </form>
    </div>
    <br><br>
    <h2>Localisation des missions</h2>
    <div id="map" style="height: 400px;"></div><br>
    <h2>Feedbacks</h2>
    <div>
      <table class="containerr">
        <thead>
          <tr>
            <th><h1>ID</h1></th>
            <th><h1>Feedback</h1></th>
            <th><h1>Rate</h1></th>
            <th><h1>Mission Title</h1></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($reviews as $review): ?>
              <tr>
                  <td><?php echo $review['id_rev']; ?></td>
                  <td><?php echo $review['description']; ?></td>
                  <td><?php echo $review['rate']; ?> étoile(s)</td>
                  <td><?php echo $review['mission_name']; ?></td>
              </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    
  </div>
  
        <script>
          var map = L.map('map').setView([34.8333, 9.5], 6.2); // Réglage initial de la carte sur la Tunisie
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); // Ajout de la couche de tuiles OpenStreetMap

          // Récupérer les coordonnées de toutes les missions
          var missionsCoordinates = <?php echo json_encode($missionsCoordinates); ?>;

          missionsCoordinates.forEach(function(coordinate) {
              var marker = L.marker([coordinate.latitude, coordinate.longitude]).addTo(map)
                  .bindPopup(coordinate.title); // Exemple de pop-up avec l'ID de la mission

              // Événement de clic sur le marqueur
              marker.on('dblclick', function() {
                  // Redirection vers la page des détails de la mission
                  window.location.href = 'DetailPage.php?id_m=' + coordinate.id_m;
              });
          });


        </script>
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
                
            }
        </script>
        <script src="../../js/script.js"></script>        

        
</body>
</html>
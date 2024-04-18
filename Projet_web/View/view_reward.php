<?php
include '../Controller/RewardC.php';
include '../Model/Reward.php';

$RewardC = new RewardC();

if (isset($_POST['submit'])) {
  // Récupérer les données du formulaire
  $type = $_POST['type'];
  $description = $_POST['description'];
  $prix_coins = $_POST['prix_coins'];

 
      $reward = new Reward(
          null, 
          $type,
          $description,
          $prix_coins,
      );

      $missionController = new RewardC();
      $missionController->addReward($reward);

      header('Location: MissionPage.php');
      exit(); 
}elseif (isset($_POST['id_r'])) {
  $id_r = $_POST['id_r'];
  
  $RewardC->deleteReward($id_r);
  
  header("Location: list_missions.php");
  exit();
}elseif (isset($_POST['update'])) {
  $id_r= $_POST['id_r'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $prix_coins = $_POST['prix_coins'];
      $reward = new Reward(
          $id_r, 
          $type,
          $description,
          $prix_coins
      );

      $missionController = new RewardC();
      $missionController->updateReward($reward,$id_r);

      header('Location: MissionPage.php');
      exit();
} 
$rewards = $RewardC->listReward();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Voysync</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }
        .tab a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .tab a:hover {
            background-color: #ddd;
        }
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border-top: none;
        }

        
        .crud {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            height: auto;
        }
        .containerC {
            max-width: 500px;
            margin: 30px ;
            
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1 0 calc(50% - 20px);
            border: 1px solid #7ba0c9;
            transition: box-shadow 0.3s;
        }
        .containerM {
            max-width: 500px;
            margin 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1 0 calc(50% - 20px);
            border: 1px solid #7ba0c9;
            transition: box-shadow 0.3s;
        }
        .container form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .container form input[type="text"],
        .container form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            /* Gris clair */
            border-radius: 5px;
            box-sizing: border-box;
        }

        .container form button {
            background-color: #7ba0c9;
            /* Bleu pétrole */
            color: #fff;
            /* Blanc */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .container form button:hover {
            background-color: #5a82ad;
        }
        .reward {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            height: auto;
            /* Change height to auto to allow it to grow based on content */
        }
        .article {
            flex: 1 0 calc(33.33% - 20px);
            border: 1px solid #7ba0c9;
            /* Bleu pétrole */
            border-radius: 20px;
            /* Increased border radius */
            padding: 30px;
            /* Increased padding */
            background-color: #f9f9f9;
            /* Gris clair */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

    </style>
    <script>
      function validateForm() {
          console.log("Form validation function called");
          var id_r = document.getElementById("id_r").value;
          var description = document.getElementById("description").value;
          var type = document.getElementById("type").value;
          var prix_coins = document.getElementById("prix_coins").value;
          

          console.log("id_r:", id_r);
          console.log("type:", type);
          console.log("Prix_coins:", prix_coins);
          console.log("Description:", description);
          
          if ( type == "" || prix_coins == "" || description == "") {
              alert("Veuillez remplir tous les champs");
              return false;
          }

          if (isNaN(id_r)) {
              alert("ID du logement doit être un nombre");
              return false;
          }

          if (isNaN(prix_coins)|| prix_coins<100) {
              alert("Le prix doit être un nombre>100");
              return false;
          }

          if (description.length > 150) {
              alert("La description ne peut pas dépasser 150 caractères");
              return false;
          }
          if (type="restaurant" ||type="vol" ||type="logement"  ) {
              alert("Le type doit etre restaurant ou vol ou logement");
              return false;
          }

          return true; 
      }
    </script>
</head>
<body>
<nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="images/logo.png" alt="">Voysync
    </div>
    <div class="search_bar">
      <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <img src="images/profile.jpg" alt="" class="profile">
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
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bx-map-alt'></i>
            </span>
            <span class="navlink">Missions</span>
          </a>
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
    <div class="tab">
        <a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Missions')">Créer une reward</a>
        <a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Awards')">Awards</a>
    </div>
    <div id="Missions" class="tabcontent">
      
    </div> 
      <div id="Awards" class="tabcontent">
        <div class="crud">
        <div class="containerC">
      
          <h2>Create reward</h2>
          <form id="missionForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
              
              <label for="type">Type:</label><br>
              <input type="text" id="type" name="type"  required><br>

              <label for="description">Description:</label><br>
              <textarea id="description" name="description" required></textarea><br>

              <label for="prix_coins">Prix coins:</label><br>
              <input type="number" id="prix_coins" name="prix_coins"  required><br>

              <button type="submit" name="submit">Ajouter</button>
          </form>
        </div>
        <div class="containerM">
          <h2>Modify reward</h2>
            <form id="modifyForm" method="post" enctype="multipart/form-data">
                <label for="id_r">Identifier:</label><br>
                <input type="number" id="id_r" name="id_r" required><br>              
                
                <label for="type">Titre:</label><br>
                <input type="text" id="type" name="type" required><br>

                <label for="description">Description:</label><br>
                <textarea id="description" name="description" required></textarea><br>

                <label for="prix_coins">Prix coins:</label><br>
                <input type="number" id="prix_coins" name="prix_coins" required><br>

                <button type="submit" name="update">Update</button>
            </form>

        </div>
        </div>
        <div class="reward">
          <h2>Liste des Missions</h2>
              <?php 
              $nbr=0;
              foreach ($rewards as $reward) {
                if ($nbr % 3 ==0) {
                  echo '</div><div class="reward">';}
                ?>
                  <div class="article">
                      <h2><?php echo $reward['type']; ?></h2>
                      <p><strong>Identifier :</strong> <?php echo $reward['id_r']; ?></p>
                      <p><strong>Description :</strong> <?php echo $reward['description']; ?></p>
                      <p><strong>Prix coins:</strong> <?php echo $reward['prix_coins']; ?></p>
                      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                          <input type="hidden" name="id_r" value="<?php echo $reward['id_r']; ?>">
                          <button type="submit">Supprimer</button>
                      </form>
                  </form>            
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
        }
    </script>
  <script src="script.js"></script>

    
</body>
</html>

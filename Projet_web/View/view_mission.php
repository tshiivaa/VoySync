<?php
include '../Controller/MissionC.php';
include '../Model/Mission.php';

$MissionC = new MissionC();

if (isset($_POST['submit'])) {
  // Récupérer les données du formulaire
  $title = $_POST['title'];
  $description = $_POST['description'];
  $place = $_POST['place'];
  $gift_point = $_POST['gift_point'];

  // Récupérer les données de l'image uploadée
  $image = $_FILES['image'];
  $imageName = $image['name'];
  $imageTmpName = $image['tmp_name'];
  $imageError = $image['error'];

  // Vérifier s'il n'y a pas d'erreur lors de l'upload
  if ($imageError === 0) {
      // Déplacer l'image téléchargée vers le répertoire d'upload
      $upload_image = 'images/' . $imageName;
      move_uploaded_file($imageTmpName, $upload_image);

      // Créer une nouvelle instance de la classe Mission et définir ses propriétés
      $mission = new Mission(
          null, // L'ID sera généré automatiquement
          $title,
          $description,
          $upload_image,
          $place,
          $gift_point
           // Utiliser le chemin de l'image comme valeur
      );

      // Ajouter la mission à la base de données
      $missionController = new MissionC();
      $missionController->addMission($mission);

      // Rediriger vers une autre page en cas de succès
      header('Location: MissionPage.php');
      exit(); // Arrêter l'exécution ultérieure
  } else {
      // Gérer les erreurs d'upload d'image
      die('Error uploading image.');
  }
}elseif (isset($_POST['id_m'])) {
  // Vérifier si le champ 'delete_id' est défini pour une suppression
  $id_m = $_POST['id_m'];
  
  // Appeler la méthode de suppression dans le contrôleur
  $MissionC->deleteMission($id_m);
  
  // Rediriger vers une autre page ou afficher un message de confirmation
  header("Location: list_missions.php");
  exit();
}elseif (isset($_POST['update'])) {
  // Récupérer les données du formulaire
  $id_m= $_POST['id_m'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $place = $_POST['place'];
  $gift_point = $_POST['gift_point'];

  // Récupérer les données de l'image uploadée
  $image = $_FILES['image'];
  $imageName = $image['name'];
  $imageTmpName = $image['tmp_name'];
  $imageError = $image['error'];

  // Vérifier s'il n'y a pas d'erreur lors de l'upload
  if ($imageError === 0) {
      // Déplacer l'image téléchargée vers le répertoire d'upload
      $upload_image = 'images/' . $imageName;
      move_uploaded_file($imageTmpName, $upload_image);

      // Créer une nouvelle instance de la classe Mission et définir ses propriétés
      $mission = new Mission(
          $id_m, // L'ID sera généré automatiquement
          $title,
          $description,
          $upload_image,
          $place,
          $gift_point
           // Utiliser le chemin de l'image comme valeur
      );

      // Ajouter la mission à la base de données
      $missionController = new MissionC();
      $missionController->updateMission($mission,$id_m);

      // Rediriger vers une autre page en cas de succès
      header('Location: MissionPage.php');
      exit(); // Arrêter l'exécution ultérieure
  } else {
      // Gérer les erreurs d'upload d'image
      die('Error uploading image.');
  }
}
$missions = $MissionC->listMission();


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

        /* Liens des onglets */
        .tab a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Changement de couleur en survol */
        .tab a:hover {
            background-color: #ddd;
        }

        /* Contenu des onglets */
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

            /* Change height to auto to allow it to grow based on content */
        }
        .containerC {
            max-width: 500px;
            margin: 30px ;
            
            background-color: #fff;
            /* Blanc */
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
            /* Blanc */
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
            /* Noir */
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
        .mission {
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
              var id_m = document.getElementById("id_m").value;
              var title = document.getElementById("title").value;
              var gift_point = document.getElementById("gift_point").value;
              var description = document.getElementById("description").value;
              var place = document.getElementById("place").value;

              console.log("ID_m:", id_m);
              console.log("Title:", title);
              console.log("gift_point:", gift_point);
              console.log("Description:", description);
              console.log("place:", place);

              // Check if any field is empty
              if (title == "" || gift_point == "" || description == "" || place == "" ) {
                  alert("Veuillez remplir tous les champs");
                  return false;
              }

              if (isNaN(gift_point) || gift_point<100) {
                  alert("Le gift_point doit être un nombre>100");
                  return false;
              }

              if (!isNaN(place) || place.length>10) {
                  alert("la place ne doit pas contenir des chiffres et ne depasse pas 10 lettres");
                  return false;
              }

              if (description.length > 100) {
                  alert("La description ne peut pas dépasser 100 caractères");
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
        <!-- Onglet pour la création de missions -->
        <a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Missions')">Créer une mission</a>
        <!-- Onglet pour les awards -->
        <a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Awards')">Awards</a>
    </div>
    <div id="Missions" class="tabcontent">
      <div class="crud">
      <div class="containerC">
    
        <h2>Create mission</h2>
        <form id="missionForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            
            <label for="title">Titre:</label><br>
            <input type="text" id="title" name="title"  required><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required></textarea><br>

            <label for="image">Image :</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>
            
            <label for="place">Lieu:</label><br>
            <input type="text" id="place" name="place"  required><br>

            <label for="gift_point">Gift Point:</label><br>
            <input type="number" id="gift_point" name="gift_point"  required><br>
            <!-- Bouton de soumission -->
            <button type="submit" name="submit">Ajouter</button>
        </form>
      </div>
      <div class="containerM">
        <h2>Modify mission</h2>
        <!-- Ajoutez ce formulaire dans la section HTML où vous affichez les missions -->
          <form id="modifyForm" method="post" enctype="multipart/form-data">
              <label for="id_m">Identifier:</label><br>
              <input type="number" id="id_m" name="id_m" required><br>              
              
              <label for="title">Titre:</label><br>
              <input type="text" id="title" name="title" required><br>

              <label for="description">Description:</label><br>
              <textarea id="description" name="description" required></textarea><br>

              <label for="place">Lieu:</label><br>
              <input type="text" id="place" name="place" required><br>

              <label for="gift_point">Gift Point:</label><br>
              <input type="number" id="gift_point" name="gift_point" required><br>

              <!-- Bouton de soumission -->
              <button type="submit" name="update">Update</button>
          </form>

      </div>
      </div>
      <div class="mission">
        <h2>Liste des Missions</h2>
            <?php 
            $nbr=0;
            foreach ($missions as $mission) {
              if ($nbr % 3 ==0) {
                echo '</div><div class="mission">';}
              ?>
                <div class="article">
                    <h2><?php echo $mission['title']; ?></h2>
                    <p><strong>ID :</strong> <?php echo $mission['id_m']; ?></p>
                    <p><strong>Description :</strong> <?php echo $mission['description']; ?></p>
                    <p><strong>Place:</strong> <?php echo $mission['place']; ?></p>
                    <p><strong>Gift POINT:</strong> <?php echo $mission['gift_point']; ?></p>
                    <!-- Affichage de l'image -->
                    <img src="<?php echo $mission['image']; ?>" alt="Image de l'article">
                    <!-- Bouton pour supprimer l'article -->
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="id_m" value="<?php echo $mission['id_m']; ?>">
                        <button type="submit">Supprimer</button>
                        <button type="button" onclick="fillForm(<?php echo json_encode($mission); ?>)">Modifier</button>

                    </form>
                    
                </form>            
                </div>
                <?php
                $nbr++;
            }
            ?>
      </div> 
    </div> 
      <div id="Awards" class="tabcontent">
        <!-- Insérez ici le contenu pour les awards -->
        <h2>Awards</h2>
        <!-- Vos éléments HTML pour les awards -->
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

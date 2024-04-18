<?php
include '../Controller/MissionC.php';
include '../Model/Mission.php';
$MissionC = new MissionC();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ 'id_m' est défini pour une modification
    if (
        isset($_POST['title']) &&
        isset($_POST['description']) &&
        isset($_POST['place']) &&
        isset($_POST['gift_point']) &&
        isset($_POST['score']) &&
        isset($_FILES['image'])&&
        $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        
        $id_m = $_POST['id_m'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $place = $_POST['place'];
        $image = $_FILES['image']; 
        $gift_point = $_POST['gift_point'];

        if ($image['error'] === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($image['tmp_name']);
        
        $mission = new Mission($id_m, $title, $description, $imageData, $place, $gift_point, NULL);

        $MissionC->updateMission($mission, $id_m);
        
        // Rediriger vers une autre page ou afficher un message de confirmation
        header("Location: list_missions.php");
        exit();
        }else {
          // Gérer les erreurs de téléchargement de l'image
          echo "Erreur lors du téléchargement de l'image.";
        }
    } elseif (isset($_POST['delete_id'])) {
      // Vérifier si le champ 'delete_id' est défini pour une suppression
      $delete_id = $_POST['delete_id'];
      
      // Appeler la méthode de suppression dans le contrôleur
      $MissionC->deleteMission($delete_id);
      
      // Rediriger vers une autre page ou afficher un message de confirmation
      header("Location: list_missions.php");
      exit();
    }else {
        // Si le champ 'id_m' n'est pas défini, cela signifie qu'il s'agit d'une création
        $title = $_POST['title'];
        $description = $_POST['description'];
        $place = $_POST['place'];
        $image = $_FILES['image']; 
        $gift_point = $_POST['gift_point'];

        if ($image['error'] === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($image['tmp_name']);
        
        $mission = new Mission(NULL, $title, $description, $imageData, $place, $gift_point, NULL);
        $MissionC->addMission($mission);
        
        // Rediriger vers une autre page ou afficher un message de confirmation
        header("Location: list_missions.php");
        exit();
        }else {
          // Gérer les erreurs de téléchargement de l'image
          echo "Erreur lors du téléchargement de l'image.";
        }
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
  <h2>Création/Modification/Suppression de Mission</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"enctype="multipart/form-data">
        <!-- Champ caché pour l'ID de la mission lors de la modification -->
        <input type="hidden" name="id_m" value="<?php echo $id_m; ?>" >

        <label for="title">Titre:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>" required><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?php echo $description; ?></textarea><br>

        <label for="image">Image :</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <label for="place">Lieu:</label><br>
        <input type="text" id="place" name="place" value="<?php echo $place; ?>" required><br>

        <label for="gift_point">Gift Point:</label><br>
        <input type="number" id="gift_point" name="gift_point" value="<?php echo $gift_point; ?>" required><br>

        <label for="score">Score:</label><br>
        <input type="number" id="score" name="score" value="<?php echo $score; ?>" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <h2>Liste des Missions</h2>
    <ul>
        <?php foreach ($missions as $mission) : ?>
            <li>
                <?php echo $mission['title']; ?> - 
                <?php echo $mission['description']; ?> -
                <img src="data:image/jpeg;base64,<?php echo base64_encode($mission['image']); ?>" alt="Mission Image" width="100" height="100"> - 
                <?php echo $mission['place']; ?> - 
                <?php echo $mission['gift_point']; ?> - 
                <?php echo $mission['score']; ?>

                <!-- Formulaire pour supprimer une mission -->
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="delete_id" value="<?php echo $mission['id_m']; ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul> 
  </div>

  <script src="script.js"></script>

    
</body>
</html>

<?php
require_once '../controller/LogementC.php';
$logementC = new LogementC();
$logements = $logementC->listLogement();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Voysync</title>
  <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/style.css" type="text/css">
  <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/logment.css" type="text/css">
  <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/expanding.css" type="text/css">
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
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-wallet'></i>
            </span>
            <span class="navlink">Offre</span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>
          <ul class="menu_items submenu">
            <a href="../view/ListLogementFront.php" class="nav_link sublink">Logement</a>
            <a href="../view/ListVolFront.php" class="nav_link sublink">Vol</a>
          </ul>
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
    <div class="header">
        <h1 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">Liste des logements</h1>
        <!-- <p >"Découvrez nos logements disponibles"</p> -->
        <br />


    </div>
    <div class="container">
        <?php foreach ($logements as $logement): ?>
            <div class="logement">
                <h2><?= $logement['Nom']; ?></h2>
                <p><strong>ID :</strong> <?= $logement['IDlogement']; ?></p>
                <p><?= $logement['Description']; ?></p>
                <p><strong>Type :</strong> <?= $logement['Type']; ?></p>
                <p><strong>Adresse :</strong> <?= $logement['Adresse']; ?></p>
                <p><strong>Prix :</strong> <?= $logement['Prix']; ?></p>
                <p><strong>Capacité :</strong> <?= $logement['Capacite']; ?></p>
                <p><strong>Évaluation :</strong> <?= $logement['Evaluation']; ?></p>
                <p><strong>Disponibilité :</strong> <?= $logement['Disponibilite']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
  <script src="http://localhost/Projet2.0/js/script.js"></script>
</body>

</html>
   
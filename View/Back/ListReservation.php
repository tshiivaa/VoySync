<?php
require_once '../../Controller/ReservationC.php';
$reservationC = new ReservationController();
$reservations = $reservationC->listReservation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Voysync</title>
  <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/vol.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/reservation.css" type="text/css">
</head>

<body>
<nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="../images/logo.png" alt="">
    </div>
    <div class="search_bar">
      <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <img src="../images/profileAsma.jpg" alt="" style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; " class="profile">
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
                    <a href="Depenses_back.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bx-wallet'></i>
                </span>
                        <span class="navlink">Pochette de voyage</span>
                    </a>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                        <i class='bx bxs-magic-wand'></i>
                        </span>
                        <span class="navlink">Itineraire magique</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="backofficeDestination.php" class="nav_link sublink">Destinations</a>
                        <a href="backofficeTransport.php" class="nav_link sublink">Transport</a>
                    </ul>
                </li>
                <li class="item">
                    <a href="afficherBlogBack.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bxs-chat'></i>
                </span>
                        <span class="navlink">Blog</span>
                    </a>
                </li>
                <li class="item">
                    <a href="HomePage.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bx-map-alt'></i>
                </span>
                        <span class="navlink">Missions</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../../Controller/index.php" class="nav_link">
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
                        <a href="ListLogement.php" class="nav_link sublink">Logement</a>
                        <a href="ListVol.php" class="nav_link sublink">Vol</a>
                        <a href="ListReservation.php" class="nav_link sublink">Reservation</a>
                    </ul>
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
        <h1 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">Liste des reservations</h1>
        <!-- <p>Découvrez nos vols disponibles</p> -->
        <br />
    </div>
    <div class="container">
    <?php foreach ($reservations as $reservation): ?>
    <div class="reservation">
        <h2>Réservation #<?= $reservation['id']; ?></h2>
        
        <p><strong>Nom :</strong> <?= $reservation['nom']; ?></p>
        <p><strong>Téléphone :</strong> <?= $reservation['telephone']; ?></p>
        <p><strong>Adresse mail :</strong> <?= $reservation['mail']; ?></p>
        
        <p><strong>Date de réservation :</strong> <?= $reservation['date_reservation']; ?></p>
        <p><strong>Destination :</strong> <?= $reservation['destination']; ?></p>
        
        <p><strong>Nombre de personnes :</strong> <?= $reservation['guests']; ?></p>

        <p><strong>Vol associé :</strong> <?= $reservation['vol_id']; ?></p>
        <p><strong>Logement associé :</strong> <?= $reservation['logement_id']; ?></p>
        
        <!-- You can add more details here if needed -->
        
    </div>
<?php endforeach; ?>
</div>
</div>
  <script src="../../js/script.js"></script>
</body>

</html>

<?php
require_once '../controller/ReservationC.php';
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
  <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/style.css" type="text/css">
  <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/vol.css" type="text/css">
  <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/expanding.css" type="text/css">
  <style>
        .main_body {
            margin-top: 270px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
            flex-direction: column;
        }
        form {
            width: 50%;
            max-width: 500px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
         
        form label,
        form input[type="text"],
        form input[type="date"],
        form input[type="number"],
        form select {
            margin-bottom: 10px; /* Add margin between each form element */
        }

        /* Adjusting spacing between the "Arrivée" and "Date de départ" */
        #Arrive,
        #DateDepart {
            margin-top: 20px; /* Add margin between specific elements */
        }

        /* Adjusting spacing between the "Date d'arrivée" and "Date limite de l'offre" */
        #DateArrive,
        #DureeOffre {
            margin-top: 20px; /* Add margin between specific elements */
        }

        /* Adjusting spacing between the "Évaluation" input and the submit button */
        #Evaluation {
            margin-bottom: 20px; /* Add margin between the input and the submit button */
        }

        input[type="submit"] {
            width: 100%;
            padding: 8px 16px;
            background-color: #1c4771; /* Background color */
            color: white; /* Text color */
            border: none; /* Remove border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none; /* Remove underline */
            font-weight: bold; /* Make text bold */
        }
        input[type="submit"]:hover {
            background-color: #145a8c;
            text-decoration: none;
        }
    </style>
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
            <a href="../view/ListLogement.php" class="nav_link sublink">Logement</a>
            <a href="../view/ListVol.php" class="nav_link sublink">Vol</a>
            <a href="../view/ListReservation.php" class="nav_link sublink">Reservation</a>
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
  <script src="http://localhost/Projet2.0/js/script.js"></script>
</body>

</html>

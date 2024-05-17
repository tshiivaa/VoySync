<?php
require_once '../../Controller/LogementC.php';
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
  <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/logment.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/expanding.css" type="text/css">
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
      <img src="../images/profile.jpg" alt="" style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; " class="profile">
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
                            <i class="bx bxs-magic-wand"></i>
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
        <h1 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">Liste des logements</h1>
        <!-- <p >"Découvrez nos logements disponibles"</p> -->
        <br />
        <div class="Ajouter" style="text-align: center; margin-bottom: 20px; margin-top: 0px;">
            <a href="AjouterLogement copy.php" class="btn btn-ajouter">Ajouter un logement</a>
            <!-- <a href="AjouterLogement.php" class="btn btn-ajouter">Ajouter un logement</a> -->
        </div>

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
                <!-- Affichage de l'image -->
                <?php if (!empty($logement['File'])): ?>
                    <img src="../uploads/<?= $logement['File']; ?>" alt="Image du logement">
                <?php else: ?>
                    <p>Aucune image disponible</p>
                <?php endif; ?>
                <div class="button-container">
                    
                    <a href="#" class="btn" onclick="return confirmModification('<?= $logement['IDlogement']; ?>')">Modifier</a>                    <!-- formulaire de suppression avec alerte de confirmation -->
                    <form method="post" action="DeleteLogement.php" onsubmit="return confirmSuppression()">
                        <!-- Champ caché pour passer l'ID du logement -->
                        <input type="hidden" name="IDlogement" value="<?= $logement['IDlogement']; ?>">
                        <!-- Bouton de suppression avec alerte -->
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>

                    <!-- script JavaScript pour l'alerte de confirmation -->
                    <script>
                    function confirmSuppression() {
                        // Demander à l'utilisateur s'il veut vraiment supprimer l'élément
                        return confirm("Voulez-vous vraiment supprimer cette offre ?");
                    }
                    function confirmModification(IDlogement) {
                    // Demander confirmation avant de modifier
                    if (confirm("Voulez-vous vraiment modifier cette offre ?")) {
                        // Si l'utilisateur confirme, rediriger vers la page de modification
                        window.location.href = 'UpdateLogement.php?IDlogement=' + IDlogement;
                    }
                    // Sinon, rester sur la page actuelle
                    return false;
                    }
                    </script>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
  <script src="../../js/script.js"></script>
</body>

</html>
   
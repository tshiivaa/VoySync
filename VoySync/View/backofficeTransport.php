<?php
include_once '../Controller/TransportC.php';

$transportController = new TransportController();

if (isset($_POST['create'])) {
    $type = $_POST['type'];
    $pays_depart = $_POST['pays_depart'];
    $pays_arrivee = $_POST['pays_arrivee'];
    $lieux_depart = $_POST['lieux_depart'];
    $lieux_arrivee = $_POST['lieux_arrivee'];
    $temps_depart = $_POST['temps_depart'];
    $temps_arrivee = $_POST['temps_arrivee'];
    $prix = $_POST['prix'];
    
    $transportController->createTransport($type, $pays_depart, $pays_arrivee, $lieux_depart, $lieux_arrivee, $temps_depart, $temps_arrivee, $prix);
} elseif (isset($_POST['update'])) {
    $id_transport = $_POST['id_transport'];
    $type = $_POST['type'];
    $pays_depart = $_POST['pays_depart'];
    $pays_arrivee = $_POST['pays_arrivee'];
    $lieux_depart = $_POST['lieux_depart'];
    $lieux_arrivee = $_POST['lieux_arrivee'];
    $temps_depart = $_POST['temps_depart'];
    $temps_arrivee = $_POST['temps_arrivee'];
    $prix = $_POST['prix'];
    
    $transportController->updateTransport($id_transport, $type, $pays_depart, $pays_arrivee, $lieux_depart, $lieux_arrivee, $temps_depart, $temps_arrivee, $prix);
} elseif (isset($_GET['delete'])) {
    $id_transport = $_GET['delete'];
    $transportController->deleteTransport($id_transport);
}

$listTransports = $transportController->listTransports();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-office Transports</title>
    <link rel="stylesheet" href="Back.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_back.css">

    <title>VoySync | Filter Magique</title>
</head>
<body>
<nav class="navbar">
<div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="./assets/images/logo.png" alt="">Voysync
    </div>
    <div class="search_bar">
        <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell'></i>
        <img src="./assets/images/profile.png" alt="" class="profile">
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
                <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bxs-user-account'></i>
            </span>
                    <span class="navlink">Compte</span>
                </div>
                <ul class="menu_items submenu">
                    <a href="../View/inscriptionview.php" class="nav_link sublink">Backus office</a>
                    <a href="../Controller/edit.php" class="nav_link sublink">Frontus office</a>
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
<script src="script_back.js"></script>
<script src="script_form.js"></script>
    <div class="itineraire-content">
        <div class="container">
            <h1>Gestion des Transports</h1>
            <div class="form-container">
                <h2>Créer un nouveau transport</h2>
                <form method="post" class="form" id="transportForm">
                    <div class="form-group">
                        <label for="type">Type :</label>
                        <input type="text" id="type" name="type">
                    </div>
                    <div class="form-group">
                        <label for="pays_depart">Pays de départ :</label>
                        <input type="text" id="pays_depart" name="pays_depart">
                    </div>
                    <div class="form-group">
                        <label for="pays_arrivee">Pays d'arrivée :</label>
                        <input type="text" id="pays_arrivee" name="pays_arrivee">
                    </div>
                    <div class="form-group">
                        <label for="lieux_depart">Lieux de départ :</label>
                        <input type="text" id="lieux_depart" name="lieux_depart">
                    </div>
                    <div class="form-group">
                        <label for="lieux_arrivee">Lieux d'arrivée :</label>
                        <input type="text" id="lieux_arrivee" name="lieux_arrivee">
                    </div>
                    <div class="form-group">
                        <label for="temps_depart">Temps de départ :</label>
                        <input type="datetime-local" id="temps_depart" name="temps_depart">
                    </div>
                    <div class="form-group">
                        <label for="temps_arrivee">Temps d'arrivée :</label>
                        <input type="datetime-local" id="temps_arrivee" name="temps_arrivee">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix :</label>
                        <input type="number" id="prix" name="prix">
                    </div>
                    <button type="submit" name="create" class="btn">Ajouter</button>
                </form>
            </div>
            <div class="transport-list">
                <h2>Liste des Transports</h2>
                <ul>
                    <?php foreach ($listTransports as $transport): ?>
                        <li>
                            <div class="transport-info">
                                <strong><?php echo $transport->getType(); ?></strong>
                                <span class="details">(<?php echo $transport->getLieuxDepart(); ?> to <?php echo $transport->getLieuxArrivee(); ?>)</span>
                            </div>
                            <a href="?delete=<?php echo $transport->getIdTransport(); ?>" class="delete-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce transport ?')">Supprimer</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="form-container">
                <h2>Modifier un transport</h2>
                <form method="post" class="form">
                    <div class="form-group">
                        <label for="transport">Choisir un transport :</label>
                        <select id="transport" name="id_transport">
                            <?php foreach ($listTransports as $transport): ?>
                                <option value="<?php echo $transport->getIdTransport(); ?>"><?php echo $transport->getType(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Nouveau type :</label>
                        <input type="text" id="type" name="type">
                    </div>
                    <div class="form-group">
                        <label for="pays_depart">Nouveau pays de départ :</label>
                        <input type="text" id="pays_depart" name="pays_depart">
                    </div>
                    <div class="form-group">
                        <label for="pays_arrivee">Nouveau pays d'arrivée :</label>
                        <input type="text" id="pays_arrivee" name="pays_arrivee">
                    </div>
                    <div class="form-group">
                        <label for="lieux_depart">Nouveaux lieux de départ :</label>
                        <input type="text" id="lieux_depart" name="lieux_depart">
                    </div>
                    <div class="form-group">
                        <label for="lieux_arrivee">Nouveaux lieux d'arrivée :</label>
                        <input type="text" id="lieux_arrivee" name="lieux_arrivee">
                    </div>
                    <div class="form-group">
                        <label for="temps_depart">Nouveau temps de départ :</label>
                        <input type="datetime-local" id="temps_depart" name="temps_depart">
                    </div>
                    <div class="form-group">
                        <label for="temps_arrivee">Nouveau temps d'arrivée :</label>
                        <input type="datetime-local" id="temps_arrivee" name="temps_arrivee">
                    </div>
                    <div class="form-group">
                        <label for="prix">Nouveau prix :</label>
                        <input type="number" id="prix" name="prix">
                    </div>
                    <button type="submit" name="update" class="btn">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

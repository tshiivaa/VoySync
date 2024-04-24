<?php
include_once '../Controller/DestinationC.php';

$destinationController = new DestinationController();

if (isset($_POST['create'])) {

    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $pays = $_POST['pays'];
    
    $destinationController->createDestination($nom, $description, $pays);
} elseif (isset($_POST['update'])) {

    $id_destination = $_POST['id_destination'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $pays = $_POST['pays'];
    
    $destinationController->updateDestination($id_destination, $nom, $description, $pays);
} elseif (isset($_GET['delete'])) {

    $id_destination = $_GET['delete'];
    
    $destinationController->deleteDestination($id_destination);
}


$listDestinations = $destinationController->listDestinations();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png">
    <title>Back-office Destinations</title>
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
                    <a href="backoffice.php" class="nav_link sublink">Destinations</a>
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
            <h1>Gestion des Destinations</h1>

            <div class="form-container">
                <h2>Créer une nouvelle destination</h2>
                <form method="post" class="form" id="destinationForm">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom">
                        <span class="error" id="nomError"></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description"></textarea>
                        <span class="error" id="descriptionError"></span>
                    </div>
                    <div class="form-group">
                        <label for="pays">Pays :</label>
                        <input type="text" id="pays" name="pays">
                        <span class="error" id="paysError"></span>
                    </div>
                    <button type="submit" name="create" class="btn">Ajouter</button>
                </form>

            </div>

            <div class="destination-list">
                <h2>Liste des Destinations</h2>
                <ul>
                    <?php foreach ($listDestinations as $destination): ?>
                        <li>
                            <div class="destination-info">
                                <strong><?php echo $destination->getNom(); ?></strong>
                                <span class="description">(<?php echo $destination->getDescription(); ?>), <?php echo $destination->getPays(); ?></span>
                            </div>
                            <a href="?delete=<?php echo $destination->getIdDestination(); ?>" class="delete-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette destination ?')">Supprimer</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="form-container">
                <h2>Modifier une destination</h2>
                <form method="post" class="form">
                    <div class="form-group">
                        <label for="destination">Choisir une destination :</label>
                        <select id="destination" name="id_destination">
                            <?php foreach ($listDestinations as $destination): ?>
                                <option value="<?php echo $destination->getIdDestination(); ?>"><?php echo $destination->getNom(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nouveau nom :</label>
                        <input type="text" id="nom" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="description">Nouvelle description :</label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pays">Nouveau pays :</label>
                        <input type="text" id="pays" name="pays">
                    </div>
                    <button type="submit" name="update" class="btn">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include '../controller/LogementC.php';
include '../model/Logement.php';

$logementC = new LogementC();
$s = 0;

// Check if all form fields are set
if (
    isset($_POST['idlogement']) &&
    isset($_POST['nom']) &&
    isset($_POST['type']) &&
    isset($_POST['adresse']) &&
    isset($_POST['prix']) &&
    isset($_POST['description']) &&
    isset($_POST['capacite']) &&
    isset($_POST['evaluation']) &&
    isset($_POST['disponibilite'])
) {
    // Create a new instance of the Logement class and set its properties
    $logement = new Logement(
        $_POST['idlogement'],  // IDLogement
        $_POST['nom'],         // Nom
        $_POST['type'],        // Type
        $_POST['adresse'],     // Adresse
        $_POST['prix'],        // Prix
        $_POST['description'], // Description
        $_POST['capacite'],    // Capacite
        $_POST['evaluation'],  // Evaluation
        $_POST['disponibilite']// Disponibilite
    );

    // Update the logement using the LogementController
    $logementC->updateLogement($logement, $_POST['idlogement']);

    // Set the flag to indicate that the data is valid
    $s = 1;
}

// Fetch the logement details to prepopulate the form
if (isset($_GET['idlogement'])) {
    $idlogement = $_GET['idlogement'];
    $logementDetails = $logementC->showLogement($idlogement);
} else {
    // Handle the case when IDlogement is not provided
    // Redirect to an error page or handle gracefully
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Voysync</title>
    <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/logment.css" type="text/css">
    <link rel="stylesheet" href="http://localhost/Projet2.0/CSS/expanding.css" type="text/css">
    <style>
        .main_body {
            margin-top: 170px;
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
    <h2>Modifier un logement</h2>
    <form method="POST" action="UpdateLogement.php">

    <!-- Hidden input field to pass IDlogement -->
    <input type="hidden" id="idlogement" name="idlogement" value="<?= $logementDetails['IDlogement']; ?>" required>

    <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom" value="<?= $logementDetails['Nom']; ?>" placeholder="Entrer Le nom de l'offre" required><br>
    
    <label for="type">Type:</label><br>
    <select id="type" name="type" required>
        <option value="hotel"<?= $logementDetails['Type'] == 'hotel' ? ' selected' : ''; ?>>Hôtel</option>
        <option value="maison d hote"<?= $logementDetails['Type'] == 'maison d hote' ? ' selected' : ''; ?>>Maison d'hôte</option>
        <option value="villa"<?= $logementDetails['Type'] == 'villa' ? ' selected' : ''; ?>>Villa</option>
        <option value="appartement"<?= $logementDetails['Type'] == 'appartement' ? ' selected' : ''; ?>>Appartement</option>
    </select>
    
    <label for="adresse">Adresse:</label><br>
    <input type="text" id="adresse" name="adresse" value="<?= $logementDetails['Adresse']; ?>" placeholder="Entrer Le pays" required><br>
    
    <label for="prix">Prix de la nuitée (Dt):</label><br>
    <input type="number" id="prix" name="prix" value="<?= $logementDetails['Prix']; ?>" placeholder="Prix par personne" required><br>
    
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" placeholder="Entrer plus d'informations sur l'offre" required><?= $logementDetails['Description']; ?></textarea><br>
    
    <label for="capacite">Capacité:</label><br>
    <input type="number" id="capacite" name="capacite" value="<?= $logementDetails['Capacite']; ?>" placeholder="La capacite est entre 1 et 20" required><br>
    
    <label for="evaluation">Evaluation:</label><br>
    <input type="number" id="evaluation" name="evaluation" min="0" max="5" value="<?= $logementDetails['Evaluation']; ?>"placeholder="Noter sur 5 étoiles" required><br>
    
    <label for="disponibilite">Disponibilité:</label><br>
    <select id="disponibilite" name="disponibilite" required>
        <option value="disponible" <?= $logementDetails['Disponibilite'] == 'disponible' ? ' selected' : ''; ?>>Disponible</option>
        <option value="non disponible" <?= $logementDetails['Disponibilite'] == 'non disponible' ? ' selected' : ''; ?>>Non disponible</option>
    </select><br><br>
    
    <input type="submit" value="Modifier">
</form>


    <?php if($s==1): ?>
        <script>alert('Vous avez modifié le logement');</script>
        <script>window.location.href='ListLogement.php'</script>
    <?php endif; ?>
    </div>
  <script src="http://localhost/Projet2.0/js/script.js"></script>
</body>
</html>

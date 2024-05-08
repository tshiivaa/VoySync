<?php
include '../controller/LogementC.php';
include '../model/Logement.php';

$logementC = new LogementC();
$s = 0;

// Check if all form fields are set
if (
    //isset($_POST['IDlogement']) &&
    isset($_POST['Nom']) &&
    isset($_POST['Type']) &&
    isset($_POST['Adresse']) &&
    isset($_POST['Prix']) &&
    isset($_POST['Description']) &&
    isset($_POST['Capacite']) &&
    isset($_POST['Evaluation']) &&
    isset($_POST['Disponibilite']) &&
    isset($_POST['IDvol'])
) {
    // Create a new instance of the Logement class and set its properties
    $logement = new Logement(
        //$_POST['IDlogement'],  // IDlogement
        $_POST['Nom'],
        $_POST['Type'],
        $_POST['Adresse'],
        $_POST['Prix'],
        $_POST['Description'],
        $_POST['Capacite'],
        $_POST['Evaluation'],
        $_POST['Disponibilite'],
        $_POST['IDvol']
    );
    try {
        $logementC->updateLogement($logement, $_POST['IDlogement']);
        $s = 1; // Set flag for successful update
    } catch (Exception $e) {
        echo 'Error updating logement: ' . $e->getMessage();
    }
    // Update the logement using the LogementController
}

// Fetch the logement details to prepopulate the form
$logementDetails = null; // Initialize to null
if (isset($_GET['IDlogement'])) {
    $IDlogement = $_GET['IDlogement'];
    $logementDetails = $logementC->showLogement($IDlogement);
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
    <h2>Modifier un logement</h2>
    <form method="POST" action="UpdateLogement.php">

    <!-- Hidden input field to pass IDlogement -->
    <input type="hidden" id="IDlogement" name="IDlogement" value="<?= isset($logementDetails['IDlogement']) ? $logementDetails['IDlogement'] : ''; ?>" required>

            <!-- Fields prefilled with existing data -->
            <label for="Nom">Nom :</label><br>
            <input type="text" id="Nom" name="Nom" placeholder="Entrer le nom du logement" required value="<?= isset($logementDetails['Nom']) ? $logementDetails['Nom'] : ''; ?>"><br>
            
            <label for="Type">Type :</label><br>
            <select id="Type" name="Type" required>
                <option value="hotel"<?= isset($logementDetails['Type']) && $logementDetails['Type'] == 'hotel' ? ' selected' : ''; ?>>Hôtel</option>
                <option value="maison d hote"<?= isset($logementDetails['Type']) && $logementDetails['Type'] == 'maison d hote' ? ' selected' : ''; ?>>Maison d'hôte</option>
                <option value="villa"<?= isset($logementDetails['Type']) && $logementDetails['Type'] == 'villa' ? ' selected' : ''; ?>>Villa</option>
                <option value="appartement"<?= isset($logementDetails['Type']) && $logementDetails['Type'] == 'appartement' ? ' selected' : ''; ?>>Appartement</option>
            </select><br>
            
            <label for="Adresse">Adresse :</label><br>
            <input type="text" id="Adresse" placeholder="Adresse du logement" required name="Adresse" value="<?= isset($logementDetails['Adresse']) ? $logementDetails['Adresse'] : ''; ?>"><br>
            
            <label for="Prix">Prix par nuitée (Dt) :</label><br>
            <input type="number" id="Prix" placeholder="Prix par nuitée" required name="Prix" value="<?= isset($logementDetails['Prix']) ? $logementDetails['Prix'] : ''; ?>"><br>
            
            <label for="Description">Description :</label><br>
            <textarea id="Description" name="Description" required placeholder="Description du logement"><?= isset($logementDetails['Description']) ? $logementDetails['Description'] : ''; ?></textarea><br>
            
            <label for="Capacite">Capacité :</label><br>
            <input type="number" id="Capacite" name="Capacite" placeholder="Capacité du logement" required value="<?= isset($logementDetails['Capacite']) ? $logementDetails['Capacite'] : ''; ?>"><br>
            
            <label for="Evaluation">Evaluation :</label><br>
            <input type="number" id="Evaluation" name="Evaluation" min="0" max="5" required value="<?= isset($logementDetails['Evaluation']) ? $logementDetails['Evaluation'] : ''; ?>"><br>
            
            <label for="Disponibilite">Disponibilité :</label><br>
            <select id="Disponibilite" name="Disponibilite" required>
                <option value="disponible" <?= isset($logementDetails['Disponibilite']) && $logementDetails['Disponibilite'] == 'disponible' ? ' selected' : ''; ?>>Disponible</option>
                <option value="non disponible" <?= isset($logementDetails['Disponibilite']) && $logementDetails['Disponibilite'] == 'non disponible' ? ' selected' : ''; ?>>Non disponible</option>
            </select><br><br>

            <label for="IDvol"></label>
            <input type="hidden" id="IDvol" name="IDvol" placeholder="IDvol" required value="<?= isset($logementDetails['IDvol']) ? $logementDetails['IDvol'] : ''; ?>">
            
            <input type="submit" value="Modifier">
        </form>


        <?php if ($s == 1): ?>
            <script>alert('Logement modifié avec succès');</script>
            <script>window.location.href='ListLogement.php';</script>
        <?php endif; ?>
    </div>
  <script src="http://localhost/Projet2.0/js/script.js"></script>
</body>
</html>

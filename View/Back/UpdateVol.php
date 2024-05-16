<?php
include '../../Controller/VolC.php';
include '../../Model/Vol.php';

$volC = new VolC();
$s = 0;

// Check if all form fields are set
if (
    //isset($_POST['IDvol']) &&
    isset($_POST['Compagnie']) &&
    isset($_POST['Num_vol']) &&
    isset($_POST['Depart']) &&
    isset($_POST['Arrive']) &&
    isset($_POST['DateDepart']) &&
    isset($_POST['DateArrive']) &&
    isset($_POST['DureeOffre']) &&
    isset($_POST['Prix']) &&
    isset($_POST['Classe']) &&
    isset($_POST['Evaluation']) 
) {
  if(isset($_FILES['File'])) {
    $file = $_FILES['File'];

    // File details
    $fileName = $_FILES['File']['name'];
    $fileTmpName = $_FILES['File']['tmp_name'];
    $fileSize = $_FILES['File']['size'];
    $fileError = $_FILES['File']['error'];
    $fileType = $_FILES['File']['type'];

    // Allowed file extensions
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    // Get the file extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Check if the file extension is allowed
    if (in_array($fileActualExt, $allowed)) {
        // Check for upload errors
        if($fileError === 0){
            // Check the file size
            if($fileSize < 100000000){ // Adjust the file size limit as needed
                // Generate a unique file name
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                // Set the file destination
                $fileDestination = '../uploads/'.$fileNameNew;
                // Move the uploaded file to the destination
                move_uploaded_file($fileTmpName, $fileDestination);
                // Create the new Logement instance with valid data including the file name
                // Create a new instance of the Vol class and set its properties
                $vol = new Vol(
                  //$_POST['IDvol'],           // IDvol
                  $_POST['Compagnie'],      // Compagnie
                  $_POST['Num_vol'],        // Num_vol
                  $_POST['Depart'],         // Depart
                  $_POST['Arrive'],         // Arrive
                  $_POST['DateDepart'],     // DateDepart
                  $_POST['DateArrive'],     // DateArrive
                  $_POST['DureeOffre'],     // DureeOffre
                  $_POST['Prix'],           // Prix
                  $_POST['Classe'],         // Classe
                  $_POST['Evaluation'],      // Evaluation
                  $fileNameNew
              );

              // Update the flight using the VolController
              try {
                  $volC->updateVol($vol, $_POST['IDvol']);
                  $s = 1; // Set flag for successful update
              } catch (Exception $e) {
                  echo 'Error updating vol: ' . $e->getMessage();
              }
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
} else {
    echo "No file uploaded!";
}
}

// Fetch the flight details to prepopulate the form
$volDetails = null; // Initialize to null
if (isset($_GET['IDvol'])) {
    $IDvol = $_GET['IDvol'];
    $volDetails = $volC->showVol($IDvol);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Voysync</title>
    <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/logment.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/expanding.css" type="text/css">
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
      <img src="../images/logo.png" alt="">Voysync
    </div>
    <div class="search_bar">
      <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <img src="../images/profileAsma.jpg" alt="" class="profile">
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
            <a href="ListLogement.php" class="nav_link sublink">Logement</a>
            <a href="ListVol.php" class="nav_link sublink">Vol</a>
            <a href="ListReservation.php" class="nav_link sublink">Reservation</a>
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
    <h2>Modifier un vol</h2>
    <form method="POST" action="UpdateVol.php" enctype="multipart/form-data">

        <!-- Hidden input field to pass IDvol -->
        <input type="hidden" id="IDvol" name="IDvol" value="<?= isset($volDetails['IDvol']) ? $volDetails['IDvol'] : ''; ?>" required>

        <label for="Compagnie">Compagnie:</label><br>
        <input type="text" id="Compagnie" name="Compagnie" value="<?= isset($volDetails['Compagnie']) ? $volDetails['Compagnie'] : ''; ?>" placeholder="Entrer le nom de la compagnie aérienne" required><br>
        
        <label for="Num_vol">Numéro de vol:</label><br>
        <input type="text" id="Num_vol" name="Num_vol" value="<?= isset($volDetails['Num_vol']) ? $volDetails['Num_vol'] : ''; ?>" placeholder="Le numéro doit etre un nombre" required><br>
        
        <label for="Depart">Départ:</label><br>
        <input type="text" id="Depart" name="Depart" value="<?= isset($volDetails['Depart']) ? $volDetails['Depart'] : ''; ?>" placeholder="Entrer le pays de départ" required><br>
        
        <label for="Arrive">Arrivée:</label><br>
        <input type="text" id="Arrive" name="Arrive" value="<?= isset($volDetails['Arrive']) ? $volDetails['Arrive'] : ''; ?>" placeholder="Entrer le pays de d'arrivée" required><br>
        
        <label for="DateDepart">Date de départ:</label><br>
        <input type="date" id="DateDepart" name="DateDepart" value="<?= isset($volDetails['DateDepart']) ? $volDetails['DateDepart'] : ''; ?>" required><br>
        
        <label for="DateArrive">Date d'arrivée:</label><br>
        <input type="date" id="DateArrive" name="DateArrive" value="<?= isset($volDetails['DateArrive']) ? $volDetails['DateArrive'] : ''; ?>" required><br>
        
        <label for="DureeOffre">Date limite de l'offre:</label><br>
        <input type="date" id="DureeOffre" name="DureeOffre" value="<?= isset($volDetails['DureeOffre']) ? $volDetails['DureeOffre'] : ''; ?>" required><br>
        
        <label for="Prix">Prix (Dt):</label><br>
        <input type="number" id="Prix" name="Prix" value="<?= isset($volDetails['Prix']) ? $volDetails['Prix'] : ''; ?>" placeholder="Entrer le prix du billet d'avion par personne" required><br>
        
        <label for="Classe">Classe:</label><br>
        <select id="Classe" name="Classe" required>
            <option value="Economique">Economique</option>
            <option value="Economique premium">Economique premium</option>
            <option value="Affaires">Affaires</option>
            <option value="Première classe">Première classe</option>
        </select>
        
        <label for="Evaluation">Évaluation:</label><br>
        <input type="number" id="Evaluation" name="Evaluation" min="0" max="5" value="<?= isset($volDetails['Evaluation']) ? $volDetails['Evaluation'] : ''; ?>" placeholder="Noter sur 5 étoiles" required><br><br>
        
        <label for="File">File :</label>
        <input type="file" id="File" name="File" accept="image/*">

        <input type="submit" value="Modifier">
    </form>

    <?php if($s==1): ?>
        <script>alert('Vous avez modifié le vol');</script>
        <script>window.location.href='ListVol.php'</script>
    <?php endif; ?>
    </div>
  <script src="../../js/script.js"></script>
</body>
</html>
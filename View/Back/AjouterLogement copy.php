<?php
include '../../Controller/LogementC.php';
include '../../Model/Logement.php';

$logementC = new LogementC();
$s = 0;

// Check if all required form fields are set
if (
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
                    $logement = new Logement(
                        $_POST['Nom'], 
                        $_POST['Type'], 
                        $_POST['Adresse'], 
                        $_POST['Prix'], 
                        $_POST['Description'], 
                        $_POST['Capacite'], 
                        $_POST['Evaluation'], 
                        $_POST['Disponibilite'], 
                        $_POST['IDvol'],
                        $fileNameNew // Pass the file name to the Logement constructor
                    );

                    $s = 1;
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
            margin-top: 250px;
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
    <!-- JavaScript for form validation -->
    <script>
/*function validateForm() {
    console.log("Form validation function called");
    //var idlogement = document.getElementById("idlogement").value;
    var nom = document.getElementById("nom").value;
    var type = document.getElementById("type").value;
    var adresse = document.getElementById("adresse").value;
    var prix = document.getElementById("prix").value;
    var description = document.getElementById("description").value;
    var capacite = document.getElementById("capacite").value;
    var evaluation = document.getElementById("evaluation").value;
    var disponibilite = document.getElementById("disponibilite").value;

    //console.log("IDLogement:", idlogement);
    console.log("Nom:", nom);
    console.log("Type:", type);
    console.log("Adresse:", adresse);
    console.log("Prix:", prix);
    console.log("Description:", description);
    console.log("Capacite:", capacite);
    console.log("Evaluation:", evaluation);
    console.log("Disponibilite:", disponibilite);

    // Check if any field is empty
    if ( nom == "" || type == "" || adresse == "" || prix == "" || description == "" || capacite == "" || evaluation == "" || disponibilite == "") {
        alert("Veuillez remplir tous les champs");
        return false;
    }

    if (isNaN(prix)) {
        alert("Le prix doit être un nombre");
        return false;
    }

    if (isNaN(capacite) || capacite < 1 || capacite > 20) {
        alert("La capacité doit être un nombre entre 1 et 20");
        return false;
    }

    if (isNaN(evaluation) || evaluation < 1 || evaluation > 5) {
        alert("L'évaluation doit être un nombre entre 1 et 5");
        return false;
    }

    // Additional validation for description length
    if (description.length > 100) {
        alert("La description ne peut pas dépasser 100 caractères");
        return false;
    }

    return true; // Submit the form if all validations pass
}*/
</script>


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
    <h2>Ajouter un logement</h2>
    <!-- <form method="POST" action="" onsubmit="return validateForm()"> -->
    <form method="POST" action="" enctype="multipart/form-data">

         <!-- <label for="idlogement">IDLogement:</label><br> -->
        <!-- <input type="number" id="idlogement" name="idlogement" placeholder="L'ID doit etre un nombre" required><br> -->

        <label for="Nom">Nom:</label><br>
        <input type="text" id="Nom" name="Nom" placeholder="Entrer Le nom de l'offre" required><br>
        
        <label for="Type">Type:</label><br>
        <select id="Type" name="Type" required>
            <option value="hotel">Hôtel</option>
            <option value="maison d hote">Maison d'hôte</option>
            <option value="villa">Villa</option>
            <option value="appartement">Appartement</option>
        </select>
        
        <label for="Adresse">Adresse:</label><br>
        <input type="text" id="Adresse" name="Adresse" placeholder="Entrer Le pays" required><br>
        
        <label for="Prix">Prix de la nuitée (Dt):</label><br>
        <input type="number" id="Prix" name="Prix" placeholder="Prix par personne" required><br>
        
        <label for="Description">Description:</label><br>
        <textarea id="Description" name="Description" placeholder="Entrer plus d'informations sur l'offre" required></textarea><br>
        
        <label for="Capacite">Capacité:</label><br>
        <input type="number" id="Capacite" name="Capacite" placeholder="La capacite est entre 1 et 20" required><br>
        
        <label for="Evaluation">Evaluation:</label><br>
        <input type="number" id="Evaluation" name="Evaluation" min="0" max="5" placeholder="Noter sur 5 étoiles" required><br>
        
        <label for="Disponibilite">Disponibilité:</label><br>
        <select id="Disponibilite" name="Disponibilite" required>
            <option value="disponible">Disponible</option>
            <option value="non disponible">Non disponible</option>
        </select>

        <label for="IDvol">IDvol:</label><br>
        <input type="text" id="IDvol" name="IDvol" placeholder="Entrer un IDvol existant" required><br><br>

        <!-- Ajouter ce champ pour le téléchargement de l'image -->
        <label for="File">File :</label>
        <input type="File" id="File" name="File" accept="File/*" required><br><br>

        
        <input type="submit" value="Ajouter">
    </form>

     
    <?php if($s==1)
    {
        $logementC->addLogement($logement);
        echo "<script>alert('Vous avez ajouté un logement');</script>";
        echo "<script>window.location.href='ListLogement.php'</script>";
    }
    ?>     
</div>
  <script src="http://localhost/Projet2.0/js/script.js"></script>
</body>
</html>

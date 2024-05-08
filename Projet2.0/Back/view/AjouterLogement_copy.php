<?php
include '../controller/LogementC.php';
include '../model/Logement.php';

$logementC = new LogementC();
$s = 0;

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les données des champs habituels
    $IDlogement = $_POST['idlogement'];
    $Nom = $_POST['nom'];
    $Type = $_POST['type'];
    $Adresse = $_POST['adresse'];
    $Prix = $_POST['prix'];
    $Description = $_POST['description'];
    $Capacite = $_POST['capacite'];
    $Evaluation = $_POST['evaluation'];
    $Disponibilite = $_POST['disponibilite'];
    $IDvol = $_POST['IDvol'];

    // Gérer l'upload de l'image
    $image = $_FILES['img'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageError = $image['error'];


    
    if ($imageError === 0) {
        $upload_image = '../uploads/' . $imageName;
        move_uploaded_file($imageTmpName, $upload_image);

        $sql = "INSERT INTO logement (IDLogement, Nom, Type, Adresse, Prix, Description, Capacite, Evaluation, Disponibilite, IDvol, img)  
                VALUES (:IDLogement, :Nom, :Type, :Adresse, :Prix, :Description, :Capacite, :Evaluation, :Disponibilite, :IDvol, :img)";
        $pdo = config::getConnexion();
        try {
            // Préparer la déclaration
         $stmt = $pdo->prepare($sql);
    // Créer un nouvel objet Logement avec le chemin de l'image
            $stmt->bindParam(':IDLogement', $IDLogement);
            $stmt->bindParam(':Nom', $Nom);
            $stmt->bindParam(':Type', $Type);
            $stmt->bindParam(':Adresse', $Adresse);
            $stmt->bindParam(':Prix', $Prix);
            $stmt->bindParam(':Description', $Description);
            $stmt->bindParam(':Capacite', $Capacite);
            $stmt->bindParam(':Evaluation', $Evaluation);
            $stmt->bindParam(':Disponibilite', $Disponibilite);
            $stmt->bindParam(':IDvol', $IDvol);
            $stmt->bindParam(':img', $upload_image);
            $stmt->execute();
            header('Location: ListLogement.php');
            exit();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    } else {
        // Gérer les erreurs d'upload d'image
        die('Error uploading image.');
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
document.getElementById('articleForm').addEventListener('submit', function (event) {
    var idlogement = document.getElementById("idlogement");
    var nom = document.getElementById("nom");
    var type = document.getElementById("type");
    var adresse = document.getElementById("adresse");
    var prix = document.getElementById("prix");
    var description = document.getElementById("description");
    var capacite = document.getElementById("capacite");
    var evaluation = document.getElementById("evaluation");
    var disponibilite = document.getElementById("disponibilite");
    if (!nom.value.trim() || !adresse.value.trim() || !prix.value.trim()|| !description.value.trim() || !capacite.value.trim()|| !evaluation.value.trim() ) {
    // Prevent the form from submittin
        event.preventDefault();
        // Display an alert message
        alert('Veuillez remplir tous les champs.');
       }

    // Additional validation logic for specific fields
    if (isNaN(idlogement)) {
        alert("ID du logement doit être un nombre");
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

});
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
    <h2>Ajouter un logement</h2>
    <form method="POST" action="" onsubmit="return validateForm()">


         <label for="idlogement">IDLogement:</label><br>
        <input type="number" id="idlogement" name="idlogement" placeholder="L'ID doit etre un nombre" required><br>

        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" placeholder="Entrer Le nom de l'offre" required><br>
        
        <label for="type">Type:</label><br>
        <select id="type" name="type" required>
            <option value="hotel">Hôtel</option>
            <option value="maison d hote">Maison d'hôte</option>
            <option value="villa">Villa</option>
            <option value="appartement">Appartement</option>
        </select>
        
        <label for="adresse">Adresse:</label><br>
        <input type="text" id="adresse" name="adresse" placeholder="Entrer Le pays" required><br>
        
        <label for="prix">Prix de la nuitée (Dt):</label><br>
        <input type="number" id="prix" name="prix" placeholder="Prix par personne" required><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" placeholder="Entrer plus d'informations sur l'offre" required></textarea><br>
        
        <label for="capacite">Capacité:</label><br>
        <input type="number" id="capacite" name="capacite" placeholder="La capacite est entre 1 et 20" required><br>
        
        <label for="evaluation">Evaluation:</label><br>
        <input type="number" id="evaluation" name="evaluation" min="0" max="5" placeholder="Noter sur 5 étoiles" required><br>
        
        <label for="disponibilite">Disponibilité:</label><br>
        <select id="disponibilite" name="disponibilite" required>
            <option value="disponible">Disponible</option>
            <!-- <option value="non disponible">Non disponible</option> -->
        </select>

        <label for="IDvol">IDvol:</label><br>
        <input type="text" id="IDvol" name="IDvol" placeholder="Entrer un IDvol existant" required><br><br>

        <label for="img">Image :</label>
        <input type="file" id="img" name="img" accept="img/*" required><br><br>
        
        <input type="submit" value="Ajouter">
    </form>    
</div>
  <script src="http://localhost/Projet2.0/js/script.js">
  </script>
</body>
</html>

<?php

$response = null;

if (isset($_POST["activite"]) && !empty($_POST["activite"])
    && isset($_POST["ville"]) && !empty($_POST["ville"])
    && isset($_POST["region"]) && !empty($_POST["region"])) {

    $activite = $_POST["activite"];
    $ville = $_POST["ville"];
    $region = $_POST["region"];

    // URL endpoint
    $key = "AIzaSyAYE5B7fzIpht9hNfvjLX2vaGto_wFg_5E";
    $url = 'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=' . $key;

    $text = "Donnez moi une activité de type $activite dans la ville: $ville et dans la région: $region";

    // Request data
    $data = array(
        'contents' => array(
            array(
                'parts' => array(
                    array(
                        'text' => $text
                    )
                )
            )
        )
    );

    // Convert data to JSON format
    $jsonData = json_encode($data);

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));

    // Execute cURL request
    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    }

    else {
        // Decode JSON response
        $responseData = json_decode($response, true);
        
        // Print response
        $response = $responseData["candidates"][0]["content"]["parts"][0]["text"];
    }

    // Close cURL session
    curl_close($ch);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adrenaline junkies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header>
        <div class="logo">
            <a href="index.html"> <span>adrenaline</span> junkies</a>
        </div>
        <ul class="menu">
            <li><a href="#">Acceuil</a></li>
            <li><a href="#a-propos">à propos</a></li>
            <li><a href="#popular-destination">activités</a></li>
            <li><a href="#contact">contact</a></li>
            <li><a href="../admin/index.php">admin</a></li>
        </ul>
        <a href="#" class="btn-reservation">Réserver Maintenant</a>

        <div class="responsive-menu"></div>
    </header>
    <!-- acceuil section -->
    <section id="home">
        <h2>Embarquez pour </h2>
        <h4>l'aventure sur notre site web</h4>
        <p>Notre site de d'aventures offre des aventures uniques pour ceux qui aiment l'adrénaline. Plongez dans des eaux profondes, escaladez des sommets ou survolez des paysages incroyables.</p>
        <p>Facile à explorer, notre site propose des expériences excitantes pour tous les niveaux d'aventure.</p>
        <a href="#" class="btn-reservation home-btn">Réserver Maintenant</a>
        <div class="find_trip">
            <form action="" method="POST">
                <div>
                    <label>activité</label>
                    <input type="text" placeholder="Entrez une activité" name="activite">
                </div>
                <div>
                    <label>Ville</label>
                    <input type="text" placeholder="Entrez une ville" name="ville">
                </div>
                <div>
                    <label>Région</label>
                    <input type="text" placeholder="Entrez une région" name="region">
                </div>
                <input type="submit" value="Suggérez">
            </form>
        </div>
    </section>
    
    <?php if (isset($response)) {
        ?>
        <section id="home">
            <h4>Découvrez les activités disponibles</h4>
            <p>
                <?= $response; ?>
            </p>
        </section>
    <?php
    }
    ?>
        


</body>
</html>
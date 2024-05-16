<?php
//require_once "../../Model/utilisateurs.php";
require_once "../../Controller/inscriptioncontroller.php";
if( isset($_GET['id'])) {
    $id = $_GET['id'];
    $utilisateurc = new utilisateurc();
    $utilisateurs = $utilisateurc->showUtilisateur($id);

}


include_once '../../Controller/ReservationC.php';

$controller = new ReservationController();
$data = $controller->getReservationData();

/*$vol_id = isset($_GET['vol_id']) ? $_GET['vol_id'] : null;
$date = isset($_GET['date']) ? $_GET['date'] : null;
$destination = isset($_GET['destination']) ? $_GET['destination'] : null;


$destinations = $data['destinations'];
$dates = $data['dates'];
$max_guests = $data['max_guests'];*/
$vol_id = isset($_GET['vol_id']) ? htmlspecialchars($_GET['vol_id']) : null;
$date_reservation = isset($_GET['date_reservation']) ? htmlspecialchars($_GET['date_reservation']) : null;
$destination = isset($_GET['destination']) ? htmlspecialchars($_GET['destination']) : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Voysync - Explorez le monde</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Fichiers CSS supplémentaires -->
  <link rel="stylesheet" href="../../CSS/templatemo-woox-travel.css">
  <link rel="stylesheet" href="../../CSS/owl.css">
  <link rel="stylesheet" href="../../CSS/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!--


  https://templatemo.com/tm-580-woox-travel

  -->
</head>
<body>
    <header>
        <!-- Logo et navigation -->
        <a href="indexf.html" class="logo">
            <img src="../images/logo.png" alt="">
        </a>
    </header>

    <div class="reservation-form">
        <div class="container">
        // Formulaire de réservation
        <form id="reservation-form" method="post" action="ListLogementFrontTries.php"> <!-- Action modifiée -->
            <!-- Valeurs cachées à passer lors de la redirection -->
            <input type="hidden" name="vol_id" value="<?= htmlspecialchars($vol_id) ?>">
            <input type="hidden" name="date_reservation" value="<?= htmlspecialchars($date_reservation) ?>">
            <input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">

            <div class="row">
                <div class="col-lg-12">
                    <h4>Faites votre <em>réservation</em> ici</h4>
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label pour="Name">Nom</label>
                        <input type="text" name="Name" placeholder="Ex. John Doe" required>
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label pour="Number">Téléphone</label>
                        <input type="text" name="Number" placeholder="Ex. 216(votre numero)" required>
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label pour="mail">Adresse email</label>
                        <input type="text" name="mail" placeholder="Ex. abs@gmail.com" required>
                    </fieldset>
                </div>
                <div class="col-lg-6">
                    <fieldset>
                        <label pour="Capacite">Capacité</label>
                        <input type="text" name="Capacite" placeholder="Ex. 1 personne ou +" required>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <button type="submit" class="main-button">Réserver un logement maintenant</button>
                    </fieldset>
                </div>
            </div>
        </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>

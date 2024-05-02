<?php
require_once '../controller/ReservationC.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $vol_id = isset($_POST['vol_id']) ? intval($_POST['vol_id']) : null;
    $logement_id = isset($_POST['logement_id']) ? intval($_POST['logement_id']) : null;
    $date_reservation = isset($_POST['date_reservation']) ? $_POST['date_reservation'] : null;
    $destination = isset($_POST['destination']) ? $_POST['destination'] : null;
    $guests = isset($_POST['guests']) ? intval($_POST['guests']) : null;
    //$telephone = isset($_POST['Number']) ? $_POST['Number'] : null;

    // Afficher les valeurs récupérées pour vérifier
    var_dump($vol_id, $logement_id, $date_reservation, $destination, $guests, $telephone);

    // Valider les champs obligatoires
    if (empty($vol_id) || empty($logement_id) || empty($date_reservation) || empty($destination) || empty($guests) /*|| empty($telephone)*/) {
        die('Tous les champs sont obligatoires.');
    }

    // Créer la réservation
    $reservationC = new ReservationController();
    try {
        $reservationC->createReservation2([
            'vol_id' => $vol_id,
            'logement_id' => $logement_id,
            'date_reservation' => $date_reservation,
            'destination' => $destination,
            'guests' => $guests,
            //'telephone' => $telephone
        ]);

        // Redirection après succès
        header("Location: ListLogementFrontTries.php");
        exit();
    } catch (Exception $e) {
        die('Erreur lors de la réservation: ' . $e->getMessage());
    }
}
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../controller/ReservationC.php';
require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $vol_id = isset($_POST['vol_id']) ? intval($_POST['vol_id']) : null;
    $logement_id = isset($_POST['logement_id']) ? intval($_POST['logement_id']) : null;
    $date_reservation = isset($_POST['date_reservation']) ? $_POST['date_reservation'] : null;
    $destination = isset($_POST['destination']) ? $_POST['destination'] : null;
    $guests = isset($_POST['guests']) ? intval($_POST['guests']) : null;
    $nom = isset($_POST['Name']) ? $_POST['Name'] : null;
    $telephone = isset($_POST['Number']) ? $_POST['Number'] : null;
    $mail = isset($_POST['mail']) ? $_POST['mail'] : null;

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
            'telephone' => $telephone,
            'nom' => $nom,
            'mail' => $mail
        ]);

        $mailer = new PHPMailer(true);
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'asmanegra@gmail.com'; // Your Gmail address
        $mailer->Password = 'upucfcnvzwthdmub'; // App-specific password
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port = 465;

        $mailer->setFrom('asmanegra@gmail.com', 'Voysync');
        $mailer->addAddress($mail); // Send to the reservation email
        $mailer->isHTML(true);
        $mailer->Subject = 'Confirmation de reservation';
        $mailer->Body = "
            Bonjour $nom,
        
            <br><br>
            Nous sommes ravis de vous informer que votre réservation a été confirmée!
            <br><br>
            Votre logement à $destination est réservé pour le $date_reservation.
            <br><br>
            Si vous avez des questions ou des demandes spéciales, n'hésitez pas à nous contacter.
            <br><br>
            Merci de nous avoir choisis pour votre séjour. Nous avons hâte de vous accueillir!
            <br><br>
            Cordialement,
            <br>
            L'équipe de Voysync
        ";
    
        $mailer->send();

        // Redirection après succès
        // header("Location: ListLogementFrontTries.php");
        header("Location: indexf.html");
        exit();
    } catch (Exception $e) {
        die('Erreur lors de la réservation: ' . $e->getMessage());
    }
}
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require_once '../controller/ReservationC.php';
require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
require __DIR__ . "/SMS/vendor/autoload.php";

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


         // Envoyer un SMS de confirmation
         $apiURL = "e1kmg2.api.infobip.com"; // Nom d'hôte Infobip
         $apiKey = "3a4ec6672757536d86a10e691e834b62-2da3a4b0-6838-4fa0-8e73-318aa8c18c62"; // Votre clé API
 
         $configuration = new Configuration(
             host: $apiURL,
             apiKey: $apiKey
         );
 
         $api = new SmsApi(config: $configuration);
 
         $destinationSms = new SmsDestination(to: $telephone); // Numéro de téléphone
         $smsMessage = new SmsTextualMessage(
             destinations: [$destinationSms],
             text: "Bonjour $nom, votre réservation a été confirmée pour le $date_reservation à $destination. Merci de nous avoir choisis!",
             from: "VoySync"
         );
 
         $request = new SmsAdvancedTextualRequest(messages: [$smsMessage]);
         $api->sendSmsMessage($request);
 

        // Redirection après succès
        // header("Location: ListLogementFrontTries.php");
        header("Location: indexf.html");
        exit();
    } catch (Exception $e) {
        die('Erreur lors de la réservation: ' . $e->getMessage());
    }
}
?>

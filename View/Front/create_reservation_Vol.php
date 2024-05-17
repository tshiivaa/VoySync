<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use Infobip\Configuration;
// use Infobip\Api\SmsApi;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;
// use Infobip\Model\SmsAdvancedTextualRequest;

// require_once '../controller/ReservationC.php';
// require '../../phpmailer/src/Exception.php';
// require '../../phpmailer/src/PHPMailer.php';
// require '../../phpmailer/src/SMTP.php';
// require __DIR__ . "/SMS/vendor/autoload.php";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Instantiate the ReservationController
//     $reservationController = new ReservationController();


//     // Afficher les valeurs récupérées pour vérifier
//     




    

//     try {
//         // Create reservation with the submitted form data
//         $reservationController->createReservation($_POST);

//         // Redirect to a success page
//         header("Location: success.php");
//         exit();
//     } catch (Exception $e) {
//         // Handle any exceptions
//         echo 'Erreur lors de la réservation: ' . $e->getMessage();
//     }

//         $mailer = new PHPMailer(true);
//         $mailer->isSMTP();
//         $mailer->Host = 'smtp.gmail.com';
//         $mailer->SMTPAuth = true;
//         $mailer->Username = 'asmanegra@gmail.com'; // Your Gmail address
//         $mailer->Password = 'upucfcnvzwthdmub'; // App-specific password
//         $mailer->SMTPSecure = 'ssl';
//         $mailer->Port = 465;

//         $mailer->setFrom('asmanegra@gmail.com', 'Voysync');
//         $mailer->addAddress($mail); // Send to the reservation email
//         $mailer->isHTML(true);
//         $mailer->Subject = 'Confirmation de reservation';
//         $mailer->Body = "
//             Bonjour $nom,
        
//             <br><br>
//             Nous sommes ravis de vous informer que votre réservation a été confirmée!
//             <br><br>
//             Votre logement à $destination est réservé pour le $date_reservation.
//             <br><br>
//             Si vous avez des questions ou des demandes spéciales, n'hésitez pas à nous contacter.
//             <br><br>
//             Merci de nous avoir choisis pour votre séjour. Nous avons hâte de vous accueillir!
//             <br><br>
//             Cordialement,
//             <br>
//             L'équipe de Voysync.
//         ";
    
//         $mailer->send();


//          // Envoyer un SMS de confirmation
//          $apiURL = "e1kmg2.api.infobip.com"; // Nom d'hôte Infobip
//          $apiKey = "3a4ec6672757536d86a10e691e834b62-2da3a4b0-6838-4fa0-8e73-318aa8c18c62"; // Votre clé API
 
//          $configuration = new Configuration(
//              host: $apiURL,
//              apiKey: $apiKey
//          );
 
//          $api = new SmsApi(config: $configuration);
 
//          $destinationSms = new SmsDestination(to: $telephone); // Numéro de téléphone
//          $smsMessage = new SmsTextualMessage(
//              destinations: [$destinationSms],
//              text: "Bonjour $nom, votre réservation a été confirmée pour le $date_reservation à $destination. Merci de nous avoir choisi!",
//              from: "VoySync"
//          );
 
//          $request = new SmsAdvancedTextualRequest(messages: [$smsMessage]);
//          $api->sendSmsMessage($request);
 

//         // Redirection après succès
//         // header("Location: ListLogementFrontTries.php");
//     } else {
//         // If the form is not submitted, redirect to the reservation page
//         header("Location: reservationLogement.php");
//         exit();
//     }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require_once '../../Controller/ReservationC.php';
require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
// require __DIR__ . "/SMS/vendor/autoload.php";
require_once "../SMS/vendor/autoload.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Instantiate the ReservationController
    $reservationController = new ReservationController();

    try {
        // Create reservation with the submitted form data
        $reservationController->createReservationLog($_POST);

        // Send confirmation email
        sendConfirmationEmail($_POST['nom'], $_POST['mail'], $_POST['destination'], $_POST['date_reservation']);

        // Send confirmation SMS
        sendConfirmationSMS($_POST['nom'], $_POST['telephone'], $_POST['destination'], $_POST['date_reservation']);

        // Redirect to a success page
        header("Location: indexf.php");
        exit();
    } catch (Exception $e) {
        // Handle any exceptions gracefully
        // You can redirect the user to an error page or display a user-friendly error message
        echo 'Erreur lors de la réservation: ' . $e->getMessage();
    }
} else {
    // If the form is not submitted, redirect to the reservation page
    header("Location: reservationLogement.php");
    exit();
}

function sendConfirmationEmail($nom, $mail, $destination, $date_reservation) {
    echo "Sending confirmation email...<br>";

    try {
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
        L'équipe de Voysync.
    ";

    $mailer->send();
    echo "Confirmation email sent successfully.<br>";
    } catch (Exception $e) {
        echo 'Error sending confirmation email: ' . $e->getMessage() . '<br>';
    }

}

function sendConfirmationSMS($nom, $telephone, $destination, $date_reservation) {
    echo "Sending confirmation SMS...<br>";
    try {
    $apiURL = "e1kmg2.api.infobip.com"; // Infobip hostname
    $apiKey = "3a4ec6672757536d86a10e691e834b62-2da3a4b0-6838-4fa0-8e73-318aa8c18c62"; // Your API key

    $configuration = new Configuration(
        host: $apiURL,
        apiKey: $apiKey
    );

    $api = new SmsApi(config: $configuration);

    $destinationSms = new SmsDestination(to: $telephone); // Phone number
    $smsMessage = new SmsTextualMessage(
        destinations: [$destinationSms],
        text: "Bonjour $nom, votre réservation a été confirmée pour le $date_reservation à $destination. Merci de nous avoir choisi!",
        from: "VoySync"
    );

    $request = new SmsAdvancedTextualRequest(messages: [$smsMessage]);
    $api->sendSmsMessage($request);
    echo "Confirmation SMS sent successfully.<br>";
    } catch (Exception $e) {
        echo 'Error sending confirmation SMS: ' . $e->getMessage() . '<br>';
    }
}


?>

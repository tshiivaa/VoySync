<?php

// use Infobip\Configuration;
// use Infobip\Api\SmsApi;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;
// use Infobip\Model\SmsAdvancedTextualRequest;

// require __DIR__ . "/vendor/autoload.php";
// $message = $_POST["message"];
// $phoneNumber = $_POST["phoneNumber"];
// $apiURL = "e1kmg2.api.infobip.com";
// $apiKey = "3a4ec6672757536d86a10e691e834b62-2da3a4b0-6838-4fa0-8e73-318aa8c18c62";
// $configuration = new Configuration(host: $apiKey, apiKey: $apiKey);
// $api = new SmsApi(config: $configuration);

// $destination = new SmsDestination(to: $phoneNumber);
// $theMessage = new SmsTextualMessage(
//     destinations: [$destination],
//     text: $message,
//     from: "VoySync"
// );

// $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
// $response = $api->sendSmsMessage($request);

// echo 'SMS Message sent';
 
?>
<?php

require __DIR__ . "/vendor/autoload.php";

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

// Définissez le bon nom d'hôte pour l'API Infobip
$apiURL = "e1kmg2.api.infobip.com"; // Utilisez le bon nom d'hôte
$apiKey = "3a4ec6672757536d86a10e691e834b62-2da3a4b0-6838-4fa0-8e73-318aa8c18c62"; // Votre clé API

$configuration = new Configuration(
    host: $apiURL, // Utilisez l'URL correcte ici
    apiKey: $apiKey // Utilisez la clé API ici
);

$api = new SmsApi(config: $configuration);

$message = $_POST["message"];
$phoneNumber = $_POST["phoneNumber"];

$destination = new SmsDestination(to: $phoneNumber);
$theMessage = new SmsTextualMessage(
    destinations: [$destination],
    text: $message,
    from: "VoySync"
);

$request = new SmsAdvancedTextualRequest(messages: [$theMessage]);

$response = $api->sendSmsMessage($request);

echo 'SMS Message sent';

?>

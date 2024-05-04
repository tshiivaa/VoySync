<?php
$response = null;

// Check if destination is provided via POST
if (isset($_POST["destination"]) && !empty($_POST["destination"])) {

    // Debugging: Print out the destination received via POST
    echo "Destination received: " . $_POST["destination"] . "<br>";

    $destination = $_POST["destination"];

    // URL endpoint
    $key = "AIzaSyDbEjwo2d9tdx-VmELQ7ynm6el4LTks5ns"; // Replace this with your actual API key
    $url = 'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=' . $key;

    $text = "Donne-moi des idées de choses à faire à $destination";

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

    // Check if the cURL request was successful
    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        // Decode JSON response
        $responseData = json_decode($response, true);

        // Check if response contains expected data
        if (isset($responseData["candidates"][0]["content"]["parts"][0]["text"])) {
            // Print response
            $response = $responseData["candidates"][0]["content"]["parts"][0]["text"];
        } else {
            echo "Error: Unexpected response format";
        }
    }

    // Close cURL session
    curl_close($ch);

} else {
    // Error: Destination not provided
    echo "Error: Destination not provided";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if ($response !== null) {
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

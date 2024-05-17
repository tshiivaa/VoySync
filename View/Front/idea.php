<?php
$response = null;

// Check if destination is provided via POST
if (isset($_GET["destinationide"]) && !empty($_GET["destinationide"])) {

    $destinationide = $_GET["destinationide"];

    // URL endpoint
    $key = "AIzaSyDbEjwo2d9tdx-VmELQ7ynm6el4LTks5ns"; // Replace this with your actual API key
    $url = 'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=' . $key;

    $text = "Donne-moi des idées de choses à faire à $destinationide";

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
        if (isset($responseData["candidates"])) {
            // Display each pair of categories within one card
            $categories = []; // Initialize an array to store categories

            foreach ($responseData["candidates"] as $candidate) {
                // Check if the response contains the expected data
                if (isset($candidate["content"]["parts"][0]["text"])) {
                    // Extract the response text
                    $responseText = $candidate["content"]["parts"][0]["text"];

                    // Split the response into categories
                    $categories = explode("**", $responseText);
                }
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoySync | Filter Magique</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="back.css">
    <style>
            @media print {
        /* Define styles for printing */
        /* You can hide elements, adjust layout, etc. */
        .no-print {
            display: none;
        }
    }
    </style>
</head>
<body>
    <div>
    <button id="download-pdf" class="next-step" onclick="window.print()">Download PDF</button>

    </div>
    <div class="main">
        
        <div class="sidebar">
            <img src="../assets/images/bg-sidebar-desktop.svg" alt="side-bar" class="side-bar">
        </div>
        <div class="form-container">
            <?php
                // Group categories into pairs and display within one card
                for ($i = 1; $i < count($categories); $i += 2) {
                    // Display a pair of categories within one card
                    echo "<div class='card'>";
                    echo "<div class='card-inner'>";
                    if (isset($categories[$i])) {
                        echo "<h3>" . trim($categories[$i]) . "</h3>";
                    }
                    if (isset($categories[$i + 1])) {
                        // Split each line starting with * into separate paragraphs
                        $lines = explode("*", trim($categories[$i + 1]));
                        foreach ($lines as $line) {
                            if (!empty(trim($line))) {
                                echo "<p>" . trim($line) . "</p> <br>";
                            }
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="sidebar_right ">
            <img src="../assets/images/bg-sidebar-desktop.svg" alt="side-bar" class="side-bar">
        </div>
    </div>
</body>
</html>

<?php
        } else {
            // Display error message if no candidates found
            echo "<div style='color: red; font-weight: bold;'>Error: No candidates found</div>";
        }
    }

    // Close cURL session
    curl_close($ch);

} else {
    // Error: Destination not provided
    echo "Error: Destination not provided";
}
?>

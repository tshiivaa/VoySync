<?php
include_once '../Controller/DestinationC.php';
include_once '../Controller/TransportC.php';

$DestinationController = new DestinationController();
$listDestinations = $DestinationController->listDestinations();
$listCountries = $DestinationController->listCountries();
$TransportController = new TransportController();
$listTransport = $TransportController->listTransports();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="back.css">
  <title>VoySync | Filter Magique</title>
</head>
<body>
<div class="main">
  <div class="sidebar">
      <img src="./assets/images/bg-sidebar-desktop.svg" alt="side-bar" class="side-bar">
      <div class="step">
        <div class="step-1">
          <h2 class="number step-indicator">1</h2>
          <div class="flex-steps">
            <p>Step 1</p>
            <h3>Destination</h3>
          </div>
        </div>
        <div class="step-2">
          <h2 class="number step-indicator">2</h2>
          <div class="flex-steps">
            <p>Step 2</p>
            <h3>Date</h3>
          </div>
        </div>
        <div class="step-3">
          <h2 class="number step-indicator">3</h2>
          <div class="flex-steps">
            <p>Step 3</p>
            <h3>Budget </h3>
          </div>
        </div>
        <div class="step-4 ">
          <h2 class="number step-indicator">4</h2>
          <div class="flex-steps">
            <p>Step 4</p>
            <h3>Transport</h3>
          </div>
        </div>
        <div class="step-5 ">
          <h2 class="number step-indicator">5</h2>
          <div class="flex-steps">
            <p>Step 5</p>
            <h3>Hébergement</h3>
          </div>
        </div>
      </div>
    </div>
  <div class="form-container">
      <div class="form-step" data-step="1">
      <h1 class="title">Destination :</h1>
      <p class="step-description"> Veuillez choisir le pays </p>
      <!-- Destination -->
      <h2>Destination</h2>
      <label for="select">Pays</label>
      <select id="country" name="country" class="my-select-menu" onchange="formDestinations()">
          <option value="">Choisir un pays</option>
          <?php foreach ($listCountries as $country): ?>
              <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
          <?php endforeach; ?>
      </select>

      <br>

      <label for="select">Lieu</label>

      <select id="destination" name="destination" class="my-select-menu">
      </select>

            <!-- Actuelle -->
            <h2>Lieu actuelle</h2>
            <label for="select">Pays</label>
      <select id="country2" name="country2" class="my-select-menu" onchange="formDestinations2()">
          <option value="">Choisir un pays</option>
          <?php foreach ($listCountries as $country): ?>
              <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
          <?php endforeach; ?>
      </select>

      <br>

      <label for="select">Lieu</label>

      <select id="destination2" name="destination2" class="my-select-menu">
      </select>

      <button class="next-step" onclick="save()">Next</button>


    </div>


    <div class="form-step" data-step="2" style="display: none;">
      <h1 class="title">Date :</h1>
      <p class="step-description"> Veuillez donner la date </p>
      <input type="date" id="dateInput">
      <button class="prev-step">Previous</button>
      <button class="next-step" id="nextDateStep">Next</button>
    </div>

    <div class="form-step" data-step="3" style="display: none;">
      <h1 class="title">Budget :</h1>
      <p class="step-description"> Veuillez donner votre budget </p>
      <input type="number" placeholder="Enter budget" id="budgetInput" pattern="\d+" title="Please enter numbers only" required>
      <select id="currency" name="currency" class="my-select-menu">
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
        <option value="TND">TND</option>
      </select>
      <button class="prev-step">Previous</button>
      <button class="next-step" id="nextBudgetStep">Next</button>
    </div>

    <div class="form-step" data-step="4" style="display: none;">
      <h1 class="title">Transport :</h1>
      <label for="select">Transport</label>
      <select id="transport" name="transport" class="my-select-menu">
      </select>
      <button class="prev-step">Previous</button>
      <button class="next-step" id="nextTransportStep">Next</button>
    </div>

    <div class="form-step" data-step="5" style="display: none;">
      <h1 class="title">Hebergement :</h1>
      <p class="step-description"> Veuillez donner votre Accommodation </p>
          <div class="radio-inputs">
      <label class="radio">
        <input type="radio" name="radio" checked="">
        <span class="name">Hotel</span>
      </label>
      <label class="radio">
        <input type="radio" name="radio">
        <span class="name">Maison d'Hote</span>
      </label>
          
      <label class="radio">
        <input type="radio" name="radio">
        <span class="name">AirBnb</span>
      </label>
    </div>
    <br>
      <button class="prev-step">Previous</button>

      <form id="myForm" action="idea.php" method="post">
        <input type="text" id="destinationide" name="destination" style="display: none;">
        <button type="submit" id="submitButton" class="submit">Get Ideas</button>
      </form>
    </div>
  </div>
</div>
<script src="filtre.js"></script>
</body>
</html>

<?php
include_once '../Controller/DestinationC.php';
include_once '../Controller/TransportC.php';

$DestinationController = new DestinationController();
$listDestinations = $DestinationController->listDestinations();
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
          <p class="step-description"> Veuillez donner la destination </p>
          <form>
            <label for="select">Destination</label>
            <select id="destination" name="destination" class="my-select-menu">
                <?php foreach ($listDestinations as $destination): ?>
                    <option value=""><?php echo $destination->getNom(); ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="select">Position Actuelle</label>
            <select id="destination" name="destination" class="my-select-menu">
                <?php foreach ($listDestinations as $destination): ?>
                    <option value=""><?php echo $destination->getNom(); ?></option>
                <?php endforeach; ?>
            </select>
          </form>
      <button class="next-step">Next</button>
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
      <input type="number" placeholder="Enter budget" id="budgetInput">
      <button class="prev-step">Previous</button>
      <button class="next-step" id="nextBudgetStep">Next</button>
    </div>
    <div class="form-step" data-step="4" style="display: none;">
    <h1 class="title">Transport :</h1>
    <form>
            <label for="select">Transport</label>
            <select id="transport" name="transport" class="my-select-menu">
                <?php foreach ($listTransport as $Transport): ?>
                    <option value="" id="TransportInput"><?php echo $Transport->getType(); ?></option>
                <?php endforeach; ?>
            </select>
            <button class="prev-step">Previous</button>
            <button class="next-step" id="nextTransportStep">Next</button>
          </form>
    </div>
    <div class="form-step" data-step="5" style="display: none;">
      <h1 class="title">Accommodation :</h1>
      <p class="step-description"> Veuillez donner votre Accommodation </p>
      <select id="hebergement" name="hebergement" class="my-select-menu">
            <option value="Hotel">Hotel</option>
            <option value="Maison">Maison d'hote</option>
            <option value="Hotel">Airbnb</option>
      </select>
      <button class="prev-step">Previous</button>
      <button class="submit">Submit</button>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const formSteps = document.querySelectorAll('.form-step');
    const nextButtons = document.querySelectorAll('.next-step');
    const prevButtons = document.querySelectorAll('.prev-step');

    // Function to show the next step
    function showNextStep(currentStep) {
      const nextStep = currentStep.nextElementSibling;
      currentStep.style.display = 'none';
      if (nextStep) {
        nextStep.style.display = 'block';
      }
    }

    // Function to show the previous step
    function showPrevStep(currentStep) {
      const prevStep = currentStep.previousElementSibling;
      currentStep.style.display = 'none';
      if (prevStep) {
        prevStep.style.display = 'block';
      }
    }

    // Event listeners for next buttons
    nextButtons.forEach(button => {
      button.addEventListener('click', function() {
        const currentStep = this.parentElement;
        if (currentStep.dataset.step === '2') {
          // Check if the date input is filled
          const dateInput = document.getElementById('dateInput');
          if (!dateInput.value) {
            alert('Please enter a date.');
            return;
          }
        } else if (currentStep.dataset.step === '3') {
          // Check if the budget input is filled
          const budgetInput = document.getElementById('budgetInput');
          if (!budgetInput.value) {
            alert('Please enter a budget.');
            return;
          }
        } else if (currentStep.dataset.step === '4') {
          const budgetInput = document.getElementById('TransportInput');
          if (!budgetInput.value) {
            alert('Please enter a budget.');
            return;
          }
        }
        showNextStep(currentStep);
      });
    });

    // Event listeners for previous buttons
    prevButtons.forEach(button => {
      button.addEventListener('click', function() {
        const currentStep = this.parentElement;
        showPrevStep(currentStep);
      });
    });
  });
</script>
</body>
</html>

<?php
include_once '../Controller/DestinationC.php';

$DestinationController = new DestinationController();
$listDestinations = $DestinationController->listDestinations();
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
            <h3>Hébergement</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="main-form">
      <div class="form-step" index="1">
        <div class="form-input-1 ">
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
        </div>
      </div>
      <div class="form-step" index="2" id="form-step-2">
        <div class="form-input-2">
          <h1 class="title">Select your plan</h1>
          <p class="step-description"> You have the option of monthly or yearly billing.</p>
          <div class="cards">
            <div class="card" data-name="arcade">
              <img src="./assets/images/icon-arcade.svg" alt="arcade-icon" class="card-img">
              <h4 class="plan-name">Arcade</h4>
              <p class="plan-description">$9<span class="yearly-description">0</span>/<span class="yr">mo</span></p>
              <span class="yearly-offer">2 months free</span>
            </div>
            <div class="card" data-name="advanced">
              <img src="./assets/images/icon-advanced.svg" alt="advance-icon" class="card-img">
              <h4 class="plan-name">Advanced</h4>
              <p class="plan-description"> $12<span class="yearly-description">0</span>/<span class="yr">mo</span>
              </p>
              <span class="yearly-offer">2 months free</span>
            </div>
            <div class="card pro" data-name="pro">
              <img src="./assets/images/icon-pro.svg" alt="pro-icon" class="card-img">
              <h4 class="plan-name">Pro</h4>
              <p class="plan-description"> $15<span class="yearly-description">0</span>/<span class="yr">mo</span>
              </p>
              <span class="yearly-offer">2 months free</span>
            </div>
          </div>
          <section id="Toggle-Dark-Mode" class="panel-element">
            <div class="toggle-contents-wrapper">
              <p class="monthly-subscription">Monthly</p>
              <div id="Dark-Mode-Switch" class="toggle-wrapper">
                <div class="toggle-dot"></div>
              </div>
              <p class="yearly-subscription">Yearly</p>
            </div>
          </section>

        </div>


      </div>
      <div class="form-step" index="3">
        <h1 class="title"> Pick add-ons</h1>
        <p class="step-description"> Add-ons help enhance your gaming experience.</p>
        <div class="add-on-options">
          <div class="option1 opts">
            <input type="checkbox" onclick=checkAddOns()>
            <label class="container1">
              <h3>Online service</h3>
              <p class="des">Access to multiplayer games</p>
            </label>
            <p class="option-price">+$1<span class="yearly-description">0</span>/<span class="yr">mo</span></p>
          </div>
          <div class="option2 opts">
            <input type="checkbox" onclick=checkAddOns()>
            <label class="container1">
              <h3>Larger storage</h3>
              <p class="des">Extra 1TB of cloud save</p>
            </label>
            <p class="option-price">+$2<span class="yearly-description">0</span>/<span class="yr">mo</span></p>
          </div>
          <div class="option3 opts">
            <input type="checkbox" onclick=checkAddOns()>
            <label class="container1">
              <h3>Customizable Profile</h3>
              <p class="des">Custom theme on your profile</p>
            </label>
            <p class="option-price">+$2<span class="yearly-description">0</span>/<span class="yr">mo</span></p>
          </div>
        </div>
      </div>
      <div class="form-step" index="4">
        <h1 class="title"> Finishing up</h1>
        <p class="step-description"> Double-check everything looks OK before confirming.</p>
        <div class="user-selection">
          <div class="final-box">
            <div class="user-plan">
              <div class="user-plan-flex">
                <h3 class="plan-selected">Arcade(<span class="duration">Monthly</span>)</h3>
                <a href="#form-step-2">Change Plan</a>
              </div>
              <h3 class="final-plan-price">$9/mo</h3>
            </div>
            <div class="user-selected-add-ons">
              <div class="add-on-1">
                <p class="add-on-1 light">No add-Ons</p>
                <p class="add-on-price"></p>
              </div>
            </div>
          </div>
          <div class="final-price">
            <p class="total1 light">Total(<span class="yr">mo</span>)</p>
            <p class="total">$12/<span class="duration final">mo</span></p>
          </div>

        </div>



      </div>

      <div class="form-step" index="5">
        <div class="thank">
          <img src="./assets/images/icon-thank-you.svg" alt="thanks">
          <h1 class="thanksu">Thank you!</h1>
          <p>
            Thanks for confirming your subscription! We hope you have fun
            using our platform. If you ever need support, please feel free
            to email us at support@loremgaming.com
          </p>
        </div>
      </div>

      <div class="buttons">

        <button class="go-back-button"> Go Back</button>
        <button class="next-step">Next Step</button>
      </div>
    </div>
  </div>
  <footer>
  
  </footer>

  <script src="script.js"></script>
</body>

</html>
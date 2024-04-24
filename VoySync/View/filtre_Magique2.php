<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Step-by-Step Form</title>
</head>
<body>
  <div class="form-container">
    <div class="form-step" data-step="1">
      <h2>Step 1: Destination</h2>
      <input type="text" placeholder="Enter destination">
      <button class="next-step">Next</button>
    </div>
    <div class="form-step" data-step="2" style="display: none;">
      <h2>Step 2: Date</h2>
      <input type="date">
      <button class="prev-step">Previous</button>
      <button class="next-step">Next</button>
    </div>
    <div class="form-step" data-step="3" style="display: none;">
      <h2>Step 3: Budget</h2>
      <input type="number" placeholder="Enter budget">
      <button class="prev-step">Previous</button>
      <button class="next-step">Next</button>
    </div>
    <div class="form-step" data-step="4" style="display: none;">
      <h2>Step 4: Accommodation</h2>
      <input type="text" placeholder="Enter accommodation details">
      <button class="prev-step">Previous</button>
      <button class="submit">Submit</button>
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

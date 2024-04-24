document.addEventListener('DOMContentLoaded', function () {
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
    button.addEventListener('click', function () {
      const currentStep = this.parentElement;
      showNextStep(currentStep);
    });
  });

  // Event listeners for previous buttons
  prevButtons.forEach(button => {
    button.addEventListener('click', function () {
      const currentStep = this.parentElement;
      showPrevStep(currentStep);
    });
  });
});
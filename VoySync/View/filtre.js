console.log("test");

let selectedDestination = ""; // Variable globale pour stocker la destination sélectionnée
let selectedDestination2 = ""; // Variable globale pour stocker la destination sélectionnée

function getGeminiResponse() {
    // ... other request options as needed
    fetch('https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=AIzaSyDbEjwo2d9tdx-VmELQ7ynm6el4LTks5ns', {
        method: 'POST',
        // ... other request options as needed
    })

        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error("Error:", data.error.message);
                // Handle API error (e.g., display an alert to the user)
                return;
            }
            const generatedText = data.candidates[0].content.parts[0].text;
            document.getElementById("gemini_response").innerHTML = generatedText;
        })
        .catch(error => {
            console.error("Error:", error);
            // Handle other errors (e.g., network issues)
        });
}

function save() {
    selectedDestination = document.getElementById("destination").value;
    selectedDestination2 = document.getElementById("destination2").value;

    // Vérifiez si les deux destinations ont été sélectionnées
    if (selectedDestination && selectedDestination2) {
        // Appelez la fonction pour mettre à jour la liste des transports
        formTransports(selectedDestination, selectedDestination2);
    } else {
        // Gérez le cas où une ou les deux destinations ne sont pas sélectionnées
        console.log("Veuillez sélectionner une destination et une position actuelle.");
    }
}



function formDestinations() {
    var selectedCountry = document.getElementById("country").value;
    var destinationSelect = document.getElementById("destination");

    // Effacer les options précédentes
    destinationSelect.innerHTML = "";

    // Si aucun pays n'est sélectionné, ne rien faire
    if (selectedCountry === "") {
        return;
    }

    // Appeler la fonction PHP pour récupérer les destinations associées au pays sélectionné
    fetch('../Controller/DestinationC.php?country=' + encodeURIComponent(selectedCountry))
        .then(response => response.text())
        .then(options => {
            destinationSelect.innerHTML = options;
            selectedDestination = destinationSelect.value;
        });
}

// Appel de la fonction formDestinations après le chargement du DOM
document.addEventListener('DOMContentLoaded', function () {
    formDestinations();
});

function formDestinations2() {
    var selectedCountry = document.getElementById("country2").value;
    var destinationSelect = document.getElementById("destination2");


    // Effacer les options précédentes
    destinationSelect.innerHTML = "";

    // Si aucun pays n'est sélectionné, ne rien faire
    if (selectedCountry === "") {
        return;
    }

    // Appeler la fonction PHP pour récupérer les destinations associées au pays sélectionné
    fetch('../Controller/DestinationC.php?country=' + encodeURIComponent(selectedCountry))
        .then(response => response.text())
        .then(options => {
            destinationSelect.innerHTML = options;
            selectedDestination2 = destinationSelect.value;
        });

}


// Appel de la fonction formDestinations après le chargement du DOM
document.addEventListener('DOMContentLoaded', function () {
    formDestinations2();
});

function formTransports(selectedDestination2, selectedDestination) {

    var transportSelect = document.getElementById("transport");
    var ide = document.getElementById("destinationide");
    console.log(selectedDestination, "to ", selectedDestination2)


    // Effacer les options précédentes
    transportSelect.innerHTML = "";

    // Si aucune destination ou aucun lieu actuel n'est sélectionné, ne rien faire
    if (!selectedDestination || !selectedDestination2) {
        return;
    }

    // Appeler la fonction PHP pour récupérer les transports associés à la destination et au lieu actuel sélectionnés
    fetch('../Controller/TransportC.php?destination=' + encodeURIComponent(selectedDestination) + '&currentLocation=' + encodeURIComponent(selectedDestination2))
        .then(response => response.text()) // Récupérer la réponse en tant que texte
        .then(options => {
            console.log("Response from server:", options);
            // Ajouter les options HTML à la liste déroulante
            transportSelect.innerHTML = options;
            ide.innerHTML = selectedDestination2;
        });
}



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

            // Assigner les valeurs sélectionnées aux variables globales
            const destinationSelect = document.getElementById('destination');
            const destinationSelect2 = document.getElementById('destination2');
            selectedDestination = destinationSelect.value;
            selectedDestination2 = destinationSelect2.value;
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
            if (currentStep.dataset.step === '1') {
                // Check if a destination is selected
                const destinationSelect = document.getElementById('destination');
                const destinationSelect2 = document.getElementById('destination2');
                selectedDestination = destinationSelect.value;
                selectedDestination2 = destinationSelect2.value;
                if (!selectedDestination) {
                    alert('Please select a destination.');
                    return;
                }
            } else if (currentStep.dataset.step === '2') {
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
                if (!/^\d+$/.test(budgetInput.value)) {
                    alert('Please enter numbers only for the budget.');
                    return;
                }

            }
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



    // Call the function from another part of your Javascript code (e.g., after a user action on the "Hébergement" step)


});

console.log("test");

let selectedDestination = ""; // Variable globale pour stocker la destination sélectionnée
let selectedDestination2 = "";
let dateInput = "";
let budgetInput = ""; // Variable globale pour stocker la destination sélectionnée
let currency = "";
let transportInput = "";


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
function savedate() {
    dateInput = document.getElementById("dateInput").value;
}
function savebudg() {
    budgetInput = document.getElementById("budgetInput").value;
    currency = document.getElementById("currency").value;
}
function savetrans() {
    transportInput = document.getElementById("transport").value;
}
function result() {

    // Make sure depart and arrive are selected
    if (!selectedDestination || !selectedDestination2) {
        console.log("Please select both depart and arrive destinations.");
        return;
    }

    // Make the fetch request to ResultC.php with the query
    fetch(`../Controller/ResultC.php?depart=${encodeURIComponent(selectedDestination)}&arrive=${encodeURIComponent(selectedDestination2)}`)
        .then(response => response.text())
        .then(data => {
            const resultContainer = document.getElementById("result-container");
            resultContainer.innerHTML = ""; // Clear previous results
            const jsonData = JSON.parse(data);

            // Loop through each item in the JSON data and create HTML elements to display it
            jsonData.forEach(item => {
                const resultItem = document.createElement("div");
                resultItem.classList.add("result-item");

                // Display relevant information
                const title = document.createElement("h2");
                title.textContent = `${item.Compagnie} - Vol ${item.Num_vol}`;
                resultItem.appendChild(title);

                const details = document.createElement("p");
                details.textContent = `Depart: ${item.Depart} | Arrive: ${item.Arrive} | Date: ${item.DateDepart}`;
                resultItem.appendChild(details);

                const price = document.createElement("p");
                price.textContent = `Price: ${item.Prix} | Class: ${item.Classe}`;
                resultItem.appendChild(price);

                // Additional details if needed
                const additionalDetails = document.createElement("p");
                additionalDetails.classList.add("details");
                additionalDetails.textContent = `Duration: ${item.DureeOffre} | Evaluation: ${item.Evaluation}`;
                resultItem.appendChild(additionalDetails);

                // Append the result item to the container
                resultContainer.appendChild(resultItem);
                budgetInput = budgetInput - item.Prix;
                console.log("bugetnow= " + budgetInput);
            });

        })
    GetAccom();

}
function GetAccom() {
    fetch(`../Controller/ResultC.php?prix=${encodeURIComponent(budgetInput)}&adresse=${encodeURIComponent(selectedDestination2)}&heb=${encodeURIComponent(hebb)}`)
        .then(response2 => response2.text())
        .then(data2 => {
            const accomContainer = document.getElementById("accommodation-container");
            accomContainer.innerHTML = ""; // Clear previous results
            const jsonData2 = JSON.parse(data2);

            jsonData2.forEach(item2 => {
                const accomItem = document.createElement("div");
                accomItem.classList.add("accom-item");

                const title2 = document.createElement("h2");
                title2.textContent = `${item2.Nom} - ${item2.Adresse}`;
                accomItem.appendChild(title2);

                const details2 = document.createElement("p");
                details2.textContent = `Price: ${item2.Prix} | Capacity: ${item2.Capacite}`;
                accomItem.appendChild(details2);

                // Additional details if needed
                const additionalDetails2 = document.createElement("p");
                additionalDetails2.classList.add("details");
                additionalDetails2.textContent = `Rating: ${item2.Evaluation} | Availability: ${item2.Disponibilite}`;
                accomItem.appendChild(additionalDetails2);

                accomContainer.appendChild(accomItem);

                const rp = document.createElement("h2");
                rp.textContent = `Reste de votre Budget :  ${budgetInput = budgetInput - item2.Prix}`;
                accomItem.appendChild(rp);
            });
        })
        .catch(error2 => {
            console.error('Error fetching accommodation data:', error2);
        });
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

    // Set the value of the destinationide input field to selectedDestination2
    ide.value = selectedDestination;

    // Appeler la fonction PHP pour récupérer les transports associés à la destination et au lieu actuel sélectionnés
    fetch('../Controller/TransportC.php?destination=' + encodeURIComponent(selectedDestination) + '&currentLocation=' + encodeURIComponent(selectedDestination2))
        .then(response => response.text()) // Récupérer la réponse en tant que texte
        .then(options => {
            console.log("Response from server:", options);
            // Ajouter les options HTML à la liste déroulante
            transportSelect.innerHTML = options;
            console.log("test AI", ide.value)
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


function formatDate(dateString) {
  const date = new Date(dateString);
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const day = String(date.getDate()).padStart(2, '0');
  return `${year}-${month}-${day}`;
}
// Get reference to the form section and the form itself
const formSection = document.getElementById('transactionFormSection');
const form = document.getElementById('transactionForm');

// Get all "Modifier" buttons
const modifierButtons = document.querySelectorAll('.modifier-btn');

// Add click event listener to each "Modifier" button
modifierButtons.forEach(button => {
  button.addEventListener('click', function () {
    // Prevent default behavior
    event.preventDefault();

    // Change the header text to "Modifier dépense"
    formSection.querySelector('h2').textContent = 'Modifier dépense';

    // Get reference to the form section
    const transactionFormSection = document.getElementById('transactionFormSection');

    // Scroll to the form section when Modifier button is clicked
    transactionFormSection.scrollIntoView({ behavior: 'smooth' });

    // Set the "Modifier" radio button as checked
    document.getElementById('modify').checked = true;

    // Retrieve the information of the corresponding expense item
    const expenseItem = this.closest('.expense-item');
    const name = expenseItem.querySelector('.name h4').textContent;
    const amount = expenseItem.querySelector('.details .amount').textContent;
    const category = expenseItem.querySelector('.details .category').textContent;
    const date = expenseItem.querySelector('.name p').textContent;
    const currency = expenseItem.querySelector('.details .currency').textContent;
    const location = expenseItem.querySelector('.details .location').textContent;
    const id = expenseItem.querySelector('.details p:last-child span').textContent;
    const formattedDate = formatDate(date);
    // Populate the form fields with the retrieved information
    form.IDdep.value = id;
    form.id.value = id;
    form.Nom.value = name;
    form.Montant.value = amount;
    form.Date.value = formattedDate;
    form.Categorie.value = category;
    form.Currency.value = currency;
    form.Lieu.value = location;
  });
});

// Get reference to the button and the header
const addExpenseBtn = document.getElementById('addExpenseBtn');
const header = document.querySelector('#transactionFormSection h2');

// Add click event listener to the button
addExpenseBtn.addEventListener('click', function () {
  document.getElementById('add').checked = true;
  // Change the header text back to "Ajouter budget"
  header.textContent = 'Ajouter budget';

  // Get reference to the form section
  const transactionFormSection = document.getElementById('transactionFormSection');

  // Scroll to the form section when Ajouter button is clicked
  transactionFormSection.scrollIntoView({ behavior: 'smooth' });
  form.IDdep.value = null;
  form.Nom.value = null;
  form.Montant.value = null;
  form.Date.value = null;
  form.Categorie.value = null;
  form.Currency.value = null;
  form.Lieu.value = null;
});

const prevButton = document.querySelector('.prev-btn');
const nextButton = document.querySelector('.next-btn');
const cardContainer = document.querySelector('.card-container');

// Variables to keep track of current position
let currentPosition = 0;
const cardWidth = document.querySelector('.card').offsetWidth;

// Function to move cards to the left
const moveLeft = () => {
  if (currentPosition < 0) {
    currentPosition += cardWidth;
    cardContainer.style.transform = `translateX(${currentPosition}px)`;
  }
};

// Function to move cards to the right
const moveRight = () => {
  const maxPosition = -(cardContainer.offsetWidth - cardWidth);
  if (currentPosition > maxPosition) {
    currentPosition -= cardWidth;
    cardContainer.style.transform = `translateX(${currentPosition}px)`;
  }
};

// Event listeners for prev and next buttons
prevButton.addEventListener('click', moveLeft);
nextButton.addEventListener('click', moveRight);


function handleLocationCardClick(location) {

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Update the expense list with the fetched data
          document.getElementById("transactionList").innerHTML = xhr.responseText;
          
          // Call the additional PHP function here
          callTotalBalanceL(location);
        } else {
          console.error('Failed to fetch expenses for location: ' + location);
        }
      }
    };
    xhr.open("GET", "fetchExpenses.php?location=" + encodeURIComponent(location), true);
    xhr.send();
  }
  
  function callTotalBalanceL(location) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Parse the JSON response
          var resultats = JSON.parse(xhr.responseText);
          
          // Update the HTML elements with the new values
          document.getElementById("balance").innerHTML = '$' + resultats['total_general'].toFixed(2);
          document.getElementById("income").innerHTML = '$' + resultats['total_positif'].toFixed(2);
          document.getElementById("expense").innerHTML = '$' + Math.abs(resultats['total_negatif']).toFixed(2);
        } else {
          console.error('Failed to call TotalBalanceL.php for location: ' + location);
        }
      }
    };
    
    // Modify the URL to call TotalBalanceL.php with the location parameter
    xhr.open("GET", "TotalBalanceL.php?location=" + encodeURIComponent(location), true);
    xhr.send();
  }
  
  

function handleTotalBudgetCardClick() {
  // Reload the page
  location.reload();
}

function confirmDelete(event) {
  // Prompt the user for confirmation
  if (!confirm("Voulez-vous vraiment supprimer cette dépense ?")) {
    // If the user cancels, prevent the default link behavior
    event.preventDefault(); // Prevent the default link behavior
    return false; // Cancel the action
  }
  // If the user confirms, continue with the default link behavior
  return true; // Proceed with the action
}
function goBack() {
  window.history.back();
}
function confirmModify(event) {
  // Prompt the user for confirmation
  if (!confirm("Voulez-vous proceder ?")) {
    // If the user cancels, prevent the default link behavior
    event.preventDefault(); // Prevent the default link behavior
    return false; // Cancel the action
  }
  // If the user confirms, continue with the default link behavior
  return true; // Proceed with the action
}

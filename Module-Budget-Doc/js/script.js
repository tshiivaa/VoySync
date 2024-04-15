const body = document.querySelector("body");
const darkLight = document.querySelector("#darkLight");
const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");
const mainBody = document.querySelector('.main_body'); // Add this line to select the main body

sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

sidebarClose.addEventListener("click", () => {
  sidebar.classList.add("close", "hoverable");
  mainBody.style.marginLeft = '80px'; // Adjust main body margin when sidebar collapses
});

sidebarExpand.addEventListener("click", () => {
  sidebar.classList.remove("close", "hoverable");
  mainBody.style.marginLeft = '260px'; // Adjust main body margin when sidebar expands
});

sidebar.addEventListener("mouseenter", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.remove("close");
    mainBody.style.marginLeft = '260px';
  }
});

sidebar.addEventListener("mouseleave", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
    mainBody.style.marginLeft = '80px';
  }
});

darkLight.addEventListener("click", () => {
  body.classList.toggle("dark");
  if (body.classList.contains("dark")) {
    darkLight.classList.replace("bx-sun", "bx-moon");
  } else {
    darkLight.classList.replace("bx-moon", "bx-sun");
  }
});

submenuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    item.classList.toggle("show_submenu");
    submenuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show_submenu");
      }
    });
  });
});

if (window.innerWidth < 768) {
  sidebar.classList.add("close");
  mainBody.style.marginLeft = '0'; // Adjust main body margin for smaller screens
} else {
  sidebar.classList.remove("close");
  mainBody.style.marginLeft = '260px'; // Adjust main body margin for larger screens
}

const ExpandingFlexCard = document.querySelectorAll('.expanding-flex-cards')

ExpandingFlexCard.forEach(efcEl => {
  efcEl.querySelectorAll('.expanding-flex-cards-item:not(active)').forEach(item => {
    item.addEventListener('click', function (e) {
      e.preventDefault()
      efcEl.querySelector('.expanding-flex-cards-item.active').classList.remove('active')
      this.classList.add('active')
    })
  })
})

window.addEventListener('DOMContentLoaded', () => {
  const expandingFlexCards = document.querySelectorAll('.expanding-flex-cards-item');
  let previousCard = null; // To keep track of the previously clicked card

  expandingFlexCards.forEach(expandingFlexCard => {
    expandingFlexCard.addEventListener('click', function () {
      // Check if this card was previously clicked
      if (this === previousCard) {
        const page = this.getAttribute('data-page');
        if (page) {
          // Trigger animation before redirecting
          this.classList.add('redirect-animation');
          // Redirect to the specified page after the animation
          setTimeout(() => {
            window.location.href = page;
          }, 800); // Adjust delay as needed to match the animation duration
          return;
        }
      }

      // Show text of the clicked card
      const title = this.querySelector('.expanding-flex-cards-title');
      title.style.display = 'block';

      // Hide text of other cards
      expandingFlexCards.forEach(card => {
        if (card !== this) {
          card.querySelector('.expanding-flex-cards-title').style.display = 'none';
        }
      });

      // Update the previous card
      previousCard = this;
    });
  });
});

const formatter = new Intl.NumberFormat("en-US", {
  style: "currency",
  currency: "USD",
  signDisplay: "always",
});
////////////////////////////CRUD 
const status = document.getElementById("status");
const balance = document.getElementById("balance");
const income = document.getElementById("income");
const expense = document.getElementById("expense");

function updateTotal() {
    const incomeTotal = transactions
        .filter(trx => trx.type === "income")
        .reduce((total, trx) => total + trx.amount, 0);

    const expenseTotal = transactions
        .filter(trx => trx.type === "expense")
        .reduce((total, trx) => total + trx.amount, 0);

    const balanceTotal = incomeTotal - expenseTotal;

    balance.textContent = formatter.format(balanceTotal).substring(1);
    income.textContent = formatter.format(incomeTotal);
    expense.textContent = formatter.format(expenseTotal * -1);
}

function showModifySection(event, data) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Stop event propagation to prevent the form from submitting
  event.stopPropagation();

  // Log the data for troubleshooting
  console.log('Data:', data);

  // Get references to form fields
  var form = document.getElementById("modifyTransactionForm");
  var nomInput = form.elements["Nom1"];
  var montantInput = form.elements["Montant1"];
  var dateInput = form.elements["Date1"];
  var categorieInput = form.elements["Categorie1"];
  var currencyInput = form.elements["Currency1"];
  var lieuInput = form.elements["Lieu1"];

  // Populate form fields with expense item data
  nomInput.value = data['Nom'];
  montantInput.value = data['Montant'];
  dateInput.value = data['Date'];
  categorieInput.value = data['Categorie'];
  currencyInput.value = data['Currency'];
  lieuInput.value = data['Lieu'];

  // Display the overlay
  var overlay = document.getElementById('overlay');
  overlay.style.display = 'flex';

  // Apply blur effect to the body
  var body = document.getElementsByTagName('body')[0];
  body.classList.add('blur');
}
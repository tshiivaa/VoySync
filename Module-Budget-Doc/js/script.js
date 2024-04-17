document.addEventListener('DOMContentLoaded', function() {
  const body = document.querySelector("body");
  const darkLight = document.querySelector("#darkLight");
  const sidebar = document.querySelector(".sidebar");
  const submenuItems = document.querySelectorAll(".submenu_item");
  const sidebarOpen = document.querySelector("#sidebarOpen");
  const sidebarClose = document.querySelector(".collapse_sidebar");
  const sidebarExpand = document.querySelector(".expand_sidebar");
  const mainBody = document.querySelector('.main_body');

  sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

  sidebarClose.addEventListener("click", () => {
    sidebar.classList.add("close", "hoverable");
    mainBody.style.marginLeft = '80px'; // Adjust main body margin when sidebar collapses
  });

  sidebarExpand.addEventListener("click", () => {
    sidebar.classList.remove("close", "hoverable");
    mainBody.style.marginLeft = '290px'; // Adjust main body margin when sidebar expands
  });

  sidebar.addEventListener("mouseenter", () => {
    if (sidebar.classList.contains("hoverable")) {
      sidebar.classList.remove("close");
      mainBody.style.marginLeft = '290px';
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
  });

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

  const formatter = new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
    signDisplay: "always",
  });

  // Get reference to the form section and the form itself
  const formSection = document.getElementById('transactionFormSection');
  const form = document.getElementById('transactionForm');

  // Get all "Modifier" buttons
  const modifierButtons = document.querySelectorAll('.modifier-btn');

  // Add click event listener to each "Modifier" button
  modifierButtons.forEach(button => {
    button.addEventListener('click', function() {
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
      const date = expenseItem.querySelector('.details p:nth-child(2)').textContent;
      const currency = expenseItem.querySelector('.details .currency').textContent;
      const location = expenseItem.querySelector('.details .location').textContent;
      const id = expenseItem.querySelector('.details p:last-child span').textContent;
  
      // Populate the form fields with the retrieved information
      form.IDdep.value = id;
      form.id.value = id;
      form.Nom.value = name;
      form.Montant.value = amount;
      form.Date.value = date;
      form.Categorie.value = category;
      form.Currency.value = currency;
      form.Lieu.value = location;
    });
  });
 
  // Get reference to the button and the header
  const addExpenseBtn = document.getElementById('addExpenseBtn');
  const header = document.querySelector('#transactionFormSection h2');

  // Add click event listener to the button
  addExpenseBtn.addEventListener('click', function() {
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

}); 

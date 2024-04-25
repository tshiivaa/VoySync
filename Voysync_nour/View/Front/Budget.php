<?php
include '../../Controller/DepenseC.php';

$depenseC = new DepenseC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if "Ajouter" radio button is checked
  if (isset($_POST['action']) && $_POST['action'] == 'add') {
    // Addition
    $type = isset($_POST['type']) && $_POST['type'] == 'on' ? 'income' : 'expense';
    $amount = $_POST['Montant'] * ($type === 'expense' ? -1 : 1);

    $depense = new Depense(
      NULL,
      $amount,
      $_POST['Categorie'],
      $_POST['Date'],
      $_POST['Currency'],
      $_POST['Lieu'],
      $_POST['Nom']
    );
    $depenseC->addDepense($depense);

    // Redirect after addition
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
  // Check if "Modifier" radio button is checked
  elseif (isset($_POST['action']) && $_POST['action'] == 'modify') {
    // Modification
    if (isset($_POST['id'])) {
      $id = $_POST['id'];
      $depense = new Depense(
        $id,
        $_POST['Montant'],
        $_POST['Categorie'],
        $_POST['Date'],
        $_POST['Currency'],
        $_POST['Lieu'],
        $_POST['Nom']
      );
      $rowCount = $depenseC->updateDepense($depense, $id);
      if ($rowCount > 0) {
        // Redirect after modification
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
      } else {
        echo "Failed to update expense item.";
      }
    } else {
      // Handle the case when no ID is provided for modification
      echo "Failed to update expense item: No ID provided.";
    }
  } else {
    // Handle the case when neither "Ajouter" nor "Modifier" is selected
    echo "Invalid action selected.";
  }
  exit();
}
$listeDepense= $depenseC->listDepenses();
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Voysync - Explorez le monde</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fichiers CSS supplémentaires -->
  <link rel="stylesheet" href="../../CSS/templatemo-woox-travel.css">
  <link rel="stylesheet" href="../../CSS/owl.css">
  <link rel="stylesheet" href="../../CSS/animate.css">
  <link rel="stylesheet" href="../../CSS/expanding.css">
  <link rel="stylesheet" href="../../CSS/style.css">
  <link rel="stylesheet" href="../../CSS/budget.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!--


  https://templatemo.com/tm-580-woox-travel

  -->

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="indexf.html" class="logo">
              <img src="../../View/images/logo.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="indexf.html" class="active">Accueil</a></li>
              <li><a href="about.html">À Propos</a></li>
              <li><a href="deals.html">Nos Offres</a></li>
              <li><a href="reservation.html">Contact</a></li>
              <li><a href="reservation.html">Blog</a></li>
              <li><a href="Depenses_f.html">Dépenses</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <div class="main_body_f">
  <h1 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">Vos Budgets</h1>
    <section class="sliding-cards">
        <div class="card-container">
        <div class="card" onclick="handleTotalBudgetCardClick()">Budget Total</div>
        <?php
// Get the unique locations from the database
$uniqueLocations = $depenseC->listUniqueLocations();
// Loop through each unique location and create a card for it
foreach ($uniqueLocations as $location) {
    // Output the card with onclick attribute calling the handleLocationCardClick function
    echo '<div class="card" onclick="handleLocationCardClick(\'' . $location . '\')">' . $location . '</div>';
}
?>


        </div>
        <button class="prev-btn">Prev</button>
        <button class="next-btn">Next</button>
    </section>
    <h1 style="text-align:left; margin-bottom: 20px;">Budget de __</h1>
    <div class="budget">
      <div>
        <h5>Total Balance</h5>
        <span id="balance">$0.00</span>
      </div>
      <div>
        <h5>Total Income</h5>
        <span id="income">$0.00</span>
      </div>
      <div>
        <h5>Total Expenses</h5>
        <span id="expense">$0.00</span>
      </div>
    </div>

    <section id="transactionList">
      <div class="addandtitle">
        <h2 style="padding: 10px;">Liste des dépenses</h2>
        <button id="addExpenseBtn" class="add-btn">Ajouter</button>
      </div>
      <div class="expense-list">
        <?php foreach ($listeDepense as $dep): ?>
          <div class="expense-item">
            <div class="name">
              <h4><?= $dep['Nom'] ?></h4>
              <p><?= date('M d, Y', strtotime($dep['Date'])) ?></p>
            </div>
            <div class="details">
              <p>Montant: <span class="amount"><?= $dep['Montant'] ?></span> <span
                  class="currency"><?= $dep['Currency'] ?></span></p>
              <p>Catégorie: <span class="category"><?= $dep['Categorie'] ?></span></p>
              <p>Lieu: <span class="location"><?= $dep['Lieu'] ?></span></p>
              <p>ID: <span><?= $dep['IDdep'] ?></span></p>
            </div>
            <div class="actions">
              <!-- Modify button -->
              <button type="submit" class="modifier-btn">Modifier</button>
              <input type="hidden" name="id" value="<?= $dep['IDdep'] ?>">
              <!-- Delete button -->
              <a class="delete-btn" href="deleteD.php?id=<?= $dep['IDdep'] ?>" onclick="return confirmDelete(event)">Supprimer</a>
            </div>
          </div>
        <?php endforeach; ?>
    </section>
  </div>

  <section id="transactionFormSection">
  <h2 style="margin: 20px;">Ajout dépense</h2> <!-- Initial header -->
  <form id="transactionForm" method="POST">
    <div class="radioun">
      <label for="add">
        <input type="radio" name="action" value="add" id="add" checked>
        <span>Ajouter</span>
      </label>
      <label for="modify">
        <input type="radio" name="action" value="modify" id="modify">
        <span>Modifier</span>
      </label>
    </div>
    <label for="type">
      <input type="checkbox" name="type" id="type" />
      <div class="option">
        <span>Dépense</span>
        <span>Revenu</span>
      </div>
    </label>
    <div>
      <label for="IDdep">Id</label>
      <input type="number" name="IDdep" id="IDdep" />
      <input type="hidden" name="id" id="id" value="">
    </div>
    <div>
      <label for="Nom">Nom</label>
      <input type="text" name="Nom" id="Nom" required />
    </div>
    <div>
      <label for="Montant">Montant</label>
      <input type="number" name="Montant" id="Montant" value="0" min="-10000000000" step="0.25" required />
    </div>
    <div>
      <label for="Date">Date</label>
      <input type="date" name="Date" id="Date" required />
    </div>
    <div>
      <label for="Categorie">Catégorie</label>
      <select name="Categorie" id="Categorie" required>
        <option value="food">Alimentation</option>
        <option value="transportation">Transport</option>
        <option value="entertainment">Divertissement</option>
        <option value="flight">Documents de vol</option>
        <option value="accommodation">Logement</option>
      </select>
    </div>
    <div>
      <label for="Currency">Devise</label>
      <select name="Currency" id="Currency" required>
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
        <option value="GBP">GBP</option>
        <option value="CAD">CAD</option>
        <option value="JPY">JPY</option>
        <option value="CHF">CHF</option>
      </select>
    </div>
    <div>
      <label for="Lieu">Lieu</label>
      <input type="text" name="Lieu" id="Lieu" list="countries" required />
      <datalist id="countries">
        <option value="USA">
        <option value="Canada">
        <!-- Other country options -->
      </datalist>
    </div>
    <button type="submit">Soumettre</button>
  </form>
</section>

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Vous cherchez à voyager ?</h2>
          <h4>Réservez en cliquant sur le bouton</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="reservation.html">Réservez dès maintenant</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Droits d'auteur © 2024 <a href="#">Voysync</a>. Tous droits réservés.
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- JavaScript principal de Bootstrap -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="../../js/isotope.min.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/wow.js"></script>
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
  <script src="../../js/expand.js"></script>
  <script src="C:\wamp64\www\Voysync_nour\js\script.js"></script>
  <script>
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


// Function to handle click on location card
function handleLocationCardClick(location) {
 console.log('Clicked on location: ' + location);
 
 var xhr = new XMLHttpRequest();
 xhr.onreadystatechange = function() {
   if (xhr.readyState === XMLHttpRequest.DONE) {
     if (xhr.status === 200) {
         // Update the expense list with the fetched data
       document.getElementById("transactionList").innerHTML = xhr.responseText;
     } else {
       console.error('Failed to fetch expenses for location: ' + location);
     }
   }
 };
 xhr.open("GET", "fetchExpenses.php?location=" + encodeURIComponent(location), true);
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
    </script>


</body>

</html>
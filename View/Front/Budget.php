<?php
include '../../Controller/DepenseC.php';
$depenseC = new DepenseC();
$resultats = $depenseC->TotalB();
require_once "../../Controller/inscriptioncontroller.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $utilisateurc = new utilisateurc();
    $utilisateurs = $utilisateurc->showUtilisateur($id);}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Check if "Ajouter" radio button is checked
      if (isset($_POST['action']) && $_POST['action'] == 'add') {
          // Addition
          $type = isset($_POST['type']) && $_POST['type'] == 'on' ? 'income' : 'expense';
          $amount = $_POST['Montant'] * ($type === 'expense' ? -1 : 1);
  
          // Extract user_id from URL
          if (isset($_GET['id'])) {
              $user_id = $_GET['id'];
  
              // Create Depense object with user_id included
              $depense = new Depense(
                  NULL,
                  $amount,
                  $_POST['Categorie'],
                  $_POST['Date'],
                  $_POST['Currency'],
                  $_POST['Lieu'],
                  $_POST['Nom'],
                  $user_id
              );
              $depenseC->addDepense($depense);
  
              // Redirect after addition
              header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $user_id);
              exit();
          } else {
              // Handle error, user_id not found in URL
              echo "User ID not found in URL";
          }
      }
      // Check if "Modifier" radio button is checked
      elseif (isset($_POST['action']) && $_POST['action'] == 'modify') {
          // Modification
          if (isset($_POST['id'])) {
              $user_id = $_GET['id'];
              $id = $_POST['id'];
              $depense = new Depense(
                  $id,
                  $_POST['Montant'],
                  $_POST['Categorie'],
                  $_POST['Date'],
                  $_POST['Currency'],
                  $_POST['Lieu'],
                  $_POST['Nom'],
                  $user_id
              );
              $rowCount = $depenseC->updateDepense($depense, $id);
              if ($rowCount > 0) {
                  // Redirect after modification
                  header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $user_id);
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
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $depenseC = new DepenseC();
    $listeDepense = $depenseC->showDepense($id);

    // Now, $userDepenses contains the list of expenses specific to the user
    // You can iterate through $userDepenses to display them
}
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
  <link rel="stylesheet" href="../../CSS/custom.css">
  <link rel="stylesheet" href="../../CSS/rappel.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    

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
   <!--***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
        <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="indexf.php" class="logo">
                        <img src="../../View/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="accueil-link" href="indexf.php" class="active">Accueil</a></li>
                        <li><a href="ListLogementFront copy 2.php">Logements</a></li>
                        <li><a href="ListVolFront copy.php">Vols</a></li>
                        <li><a id="mission-link" href="FRMissionPage.php">Missions</a></li>
                        <li><a id="blog-link" href="blog.php">Blog</a></li>
                        <li><a id="depenses-link" href="depenses_f.php">Dépenses</a></li>
                        <li><input type="submit" name="connect" value="Connexion" class="btn solid" id="connect" style="background-color:#FBCD5AFF;"/></li>
                        <li><a href="filtre_Magique.php" class="active"><i class='bx bxs-magic-wand'></i> Itineraire magique</a></li>
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
  <style>
.parallax {
  /* The image used */
  background-image: url("https://i0.wp.com/travelexperta.com/wp-content/uploads/2018/01/sponsor-image.jpg");

  /* Set a specific height */
  min-height: 600px;

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>


<!-- Container element -->
<div class="parallax"></div>
  <button class="back-button" onclick="goBack()">
    <i class='bx bx-arrow-back' style="margin-top:90px; margin-left:20px;"></i>
    <!-- Replace bx-arrow-back with the Boxicons class you want to use -->
  </button>
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
    <div class="budget">
      <div>
        <h5>Votre Solde</h5>
        <span
          id="balance">$<?php echo isset($resultats['total_general']) ? number_format($resultats['total_general'], 2) : '0.00'; ?></span>
      </div>
      <div>
        <h5>Revenu Total</h5>
        <span
          id="income">$<?php echo isset($resultats['total_positif']) ? number_format($resultats['total_positif'], 2) : '0.00'; ?></span>
      </div>
      <div>
        <h5>Dépenses Totales</h5>
        <span
          id="expense">$<?php echo isset($resultats['total_negatif']) ? number_format(abs($resultats['total_negatif']), 2) : '0.00'; ?></span>
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
              <a class="delete-btn" href="deleteD.php?id=<?= $dep['IDdep'] ?>"
                onclick="return confirmDelete(event)">Supprimer</a>
            </div>
          </div>
        <?php endforeach; ?>
    </section>


    <section id="transactionFormSection">
      <h2 style="margin: 20px;">Ajout dépense</h2> <!-- Initial header -->
      <form id="transactionForm" method="POST" action="budget.php?id=<?php echo $id; ?>">
        <div class="radioun" style="display: none;">
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
        <button type="submit" onclick="return confirmModify(event)">Soumettre</button>
      </form>
    </section>
  </div>
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
  <script src="../../js/js\wow.js"></script>
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
  <script src="../../js/expand.js"></script>
  <script src="../../js/script.js"></script>
  <script src="../../js/budget.js"></script>
  <script src="../../js/rappel.js"></script>

</body>

</html>
<?php
include '../Controller/DepenseC.php';


$depenseC = new DepenseC();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
  $id = $_POST['id'];
  echo $id;
  $depDel = $depenseC->deleteDepense($id);
  if ($depDel) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } else {
    echo "Failed to delete expense item.";
  }
}

$listeDepense = $depenseC->listDepenses();
?>

<?php
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
   echo json_encode($listeDepense);
    exit();
}

$listeDepense = $depenseC->listDepenses();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Voysync</title>
  <link rel="stylesheet" href="../CSS/style.css" type="text/css">
  <link rel="stylesheet" href="../CSS/budget.css" type="text/css">
  <link rel="stylesheet" href="../CSS/expanding.css" type="text/css">
</head>

<body>
  <nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="images/logo.png" alt="">Voysync
    </div>
    <div class="search_bar">
      <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <img src="images/profile.jpg" alt="" class="profile">
    </div>
  </nav>
  <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">
        <div class="menu_title menu_dahsboard"></div>
        <li class="item">
          <div href="index.html" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class="bx bx-home-alt"></i>
            </span>
            <span class="navlink">Home</span>
          </div>
        </li>
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-wallet'></i>
            </span>
            <span class="navlink">Pochette de voyage</span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>
          <ul class="menu_items submenu">
            <a href="Depenses_back.html" class="nav_link sublink">Back office</a>
            <a href="Depenses_front.html" class="nav_link sublink">Front office</a>
          </ul>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bxs-magic-wand"></i>
            </span>
            <span class="navlink">Itineraire magique</span>
          </a>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-chat'></i>
            </span>
            <span class="navlink">Blog</span>
          </a>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bx-map-alt'></i>
            </span>
            <span class="navlink">Missions</span>
          </a>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-user-account'></i>
            </span>
            <span class="navlink">Compte</span>
          </a>
        </li>
      </ul>
      <ul class="menu_items">
        <div class="menu_title menu_setting"></div>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bx-medal"></i>
            </span>
            <span class="navlink">Award</span>
          </a>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bx-cog"></i>
            </span>
            <span class="navlink">Setting</span>
          </a>
        </li>
      </ul>
      <div class="bottom_content">
        <div class="bottom expand_sidebar">
          <span> Expand</span>
          <i class='bx bx-log-in'></i>
        </div>
        <div class="bottom collapse_sidebar">
          <span> Collapse</span>
          <i class='bx bx-log-out'></i>
        </div>
      </div>
    </div>
  </nav>
  <script src="../js/script.js"></script>
</body>
<!--
BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB
-->
<div class="main_body">
  <h1 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">Vos Budgets</h1>
  <section class="sliding-cards">
    <div class="card-container">
      <div class="card">Budget de Paris</div>
      <div class="card">Budget de Lyon</div>
      <div class="card">Budget de Toulouse</div>
      <div class="card">Budget de Tunis</div>
      <div class="card">Budget de Hawaii</div>
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
      <h2 style="padding: 10px">List of Expenses</h2>
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
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
              <input type="hidden" name="id" value="<?= $dep['IDdep'] ?>">
              <button type="submit" class="delete-btn">Supprimer</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
  </section>



  <section id="transactionFormSection">
    <h3 style="margin: 20px;">Ajout dépense</h3> <!-- Initial header -->
    <form id="transactionForm" method="POST">
    <div class="radioun">
  <label for="add">Ajouter</label>
  <input type="radio" name="action" value="add" id="add" checked>
  <label for="modify">Modifier</label>
  <input type="radio" name="action" value="modify" id="modify">
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
        <input type="number" name="IDdep" id="IDdep"  />
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
          <option value="United Kingdom">
          <option value="Germany">
          <option value="France">
          <option value="Spain">
          <option value="Italy">
          <option value="Portugal">
          <option value="Austria">
          <option value="Switzerland">
          <option value="Netherlands">
          <option value="Belgium">
          <option value="Poland">
          <option value="Russia">
          <option value="Tunisia">
          <option value="Morocco">
          <option value="Algerie">
          <option value="Mali">
        </datalist>
      </div>
      <button type="submit">Soumettre</button>
    </form>
  </section>
</div>

</html>
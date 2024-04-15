<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Voysync</title>
  <link rel="stylesheet" href="../View/style.css" type="text/css">
  <link rel="stylesheet" href="../View/budget.css" type="text/css">
  <link rel="stylesheet" href="../View/expanding.css" type="text/css">
  
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
    <section >
    <ul id="transactionList">
      <h2 style="padding: 1rem;">List of Expenses</h2>
      <?php foreach ($listeDepense as $dep): ?>
        <div class="budget-item">
          <div class="name">
            <h4><?= $dep['Nom'] ?></h4>
            <p><?= date('M d, Y', strtotime($dep['Date'])) ?></p>
          </div>
          <div class="details">
            <p>Montant: <span class="amount"><?= $dep['Montant'] ?></span> <span
                class="currency"><?= $dep['Currency'] ?></span></p>
            <p>Catégorie: <span class="category"><?= $dep['Categorie'] ?></span></p>
            <p>Lieu: <span class="location"><?= $dep['Lieu'] ?></span></p>
          </div>
        </div>
      <?php endforeach; ?>
    </ul>
    </section>

    <section>
      <h3 style="margin: 20px;">Ajout Transaction</h3>
      <form id="transactionForm" method="POST" onsubmit="return validateForm()">
        <label for="type">
          <input type="checkbox" name="type" id="type" />
          <div class="option">
            <span>Dépense</span>
            <span>Revenu</span>
          </div>
        </label>
        <div>
          <label for="Nom">Nom</label>
          <input type="text" name="Nom" id="Nom" required />
        </div>
        <div>
          <label for="Montant">Montant</label>
          <input type="number" name="Montant" id="Montant" value="0" min="0.01" step="0.01" required />
        </div>
        <div>
          <label for="Date">Date</label>
          <input type="date" name="Date" id="Date" required />
        </div>
        <div>
          <label for="Categorie">Catégorie</label>
          <select name="Categorie" id="Categorie" required>
            <option value="">Sélectionnez une catégorie</option>
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
            <option value="">Sélectionnez une devise</option>
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
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $depense = new Depense(
          NULL,
          $_POST['Montant'],
          $_POST['Categorie'],
          $_POST['Date'],
          $_POST['Currency'],
          $_POST['Lieu'],
          $_POST['Nom']
        );
        $depenseC->addDepense($depense);
      }
      ?>
    </section>
  </div>
  <script src="script.js"></script>
</body>

</html>
<?php
include '../../Controller/DocumentVoyageC.php';
$depenseC = new DepenseC();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'])) {
  $userId = $_POST['userId'];
  $listeDepense = $depenseC->listDepensesByUserId($userId);
}
$documentC = new DocumentVoyageC();
$documentList = $documentC->listDocumentVoyages();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Voysync</title>
  <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/budget.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/expanding.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/document.css" type="text/css">
</head>
<style>
  /* Form */
  #IDuser form {
    margin-top: 20px;
    margin-left: 20px;
  }

  /* Label */
  #IDuser label {
    font-weight: bold;
    margin-bottom: 5px;
  }

  /* Input field */
  #IDuser input[type="text"] {
    width: 30%;
    padding: 10px;
    border: 1px solid #fff;
    border-radius: 5px;
    margin-bottom: 5px;
    height: 42px;
    font-family: "Poppins", sans-serif;
    font-size: 1rem;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
  }

  /* Input field focus */
  #IDuser input[type="text"]:focus {
    border-color: var(--blue-color);
  }

  /* Submit button */
  #IDuser button[type="submit"] {
    background-color: var(--blue-color);
    color: var(--white-color);
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
  }

  /* Submit button hover */
  #IDuser button[type="submit"]:hover {
    background-color: #0d3c5f;
  }
</style>

<body>
  <nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="../images/logo.png" alt="">
    </div>
    <div class="search_bar">
      <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <img src="../images/profile.jpg" alt="" style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; " class="profile">
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
                    <a href="Depenses_back.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bx-wallet'></i>
                </span>
                        <span class="navlink">Pochette de voyage</span>
                    </a>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bxs-magic-wand"></i>
                        </span>
                        <span class="navlink">Itineraire magique</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="backofficeDestination.php" class="nav_link sublink">Destinations</a>
                        <a href="backofficeTransport.php" class="nav_link sublink">Transport</a>
                    </ul>
                </li>
                <li class="item">
                    <a href="afficherBlogBack.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bxs-chat'></i>
                </span>
                        <span class="navlink">Blog</span>
                    </a>
                </li>
                <li class="item">
                    <a href="HomePage.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bx-map-alt'></i>
                </span>
                        <span class="navlink">Missions</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../../Controller/index.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bxs-user-account'></i>
                </span>
                        <span class="navlink">Compte</span>
                    </a>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                        <i class='bx bx-wallet'></i>
                        </span>
                        <span class="navlink">Offre</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="ListLogement.php" class="nav_link sublink">Logement</a>
                        <a href="ListVol.php" class="nav_link sublink">Vol</a>
                        <a href="ListReservation.php" class="nav_link sublink">Reservation</a>
                    </ul>
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
    <section id="IDuser">
      <form method="POST">
        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId">
        <button type="submit">Submit</button>
      </form>
    </section>
    <section id="transactionList">
      <div class="addandtitle">
        <h2 style="padding: 10px;">Liste des dépenses</h2>
      </div>
      <div class="expense-list">
        <?php if (isset($listeDepense) && !empty($listeDepense)): ?>
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
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>Aucune dépense trouvée pour cet utilisateur.</p>
        <?php endif; ?>
      </div>
    </section>
    <section id="documentList">
      <div class="addandtitle">
        <h2 style="padding: 10px;">Liste des dépenses</h2>
      </div>
      <div class="document-list">
        <?php foreach ($documentList as $document): ?>
          <div class="expense-item">
            <div class="name">
              <h4><?= $document['Type'] ?></h4>
              <!-- You can display other details as needed -->
              <p><?= date('M d, Y', strtotime($document['DateExp'])) ?></p>
            </div>
            <div class="details">
              <!-- Display other details like type, lieuSto, etc. -->
              <p>Numero de serie: <span class="NumSerie"><?= $document['NumSerie'] ?></span></p>
              <p>Lieu de stockage: <span class="lieuSto"><?= $document['LieuSto'] ?></span></p>
              <!-- Add more details here -->
            </div>

          </div>
        <?php endforeach; ?>
      </div>
    </section>
  </div>
  <!-- JavaScript -->
  <script src="../js/script.js"></script>
</body>

</html>
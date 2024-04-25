<?php 
include '../Controller/DocumentVoyageC.php';
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
  <link rel="stylesheet" href="../CSS/style.css" type="text/css">
  <link rel="stylesheet" href="../CSS/budget.css" type="text/css">
  <link rel="stylesheet" href="../CSS/document.css" type="text/css">
  <link rel="stylesheet" href="../../CSS/style.css">
  <link rel="stylesheet" href="../../CSS/budget.css">
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
  <section id="documentList">
    <div class="addandtitle">
        <h2 style="padding: 10px;">Liste des documents de voyage</h2>
        <!-- Add button for adding documents -->
        <button id="addDocumentBtn" class="add-btn">Ajouter</button>
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
                <div class="actions">
                    <!-- Modify button -->
                    <button type="submit" class="modifier-btn">Modifier</button>
                    <!-- Delete button -->
                    <a class="delete-btn" href="deleteDocument.php?id=<?= $document['NumSerie'] ?>">Supprimer</a>
                 <!-- Affich button -->
            <button class="view-photo-btn" onclick="viewPhoto('<?= base64_encode($document['Photodoc']) ?>')">Voir la photo</button>
          </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Modal for viewing the photo -->
    <div id="modal-overlay" class="modal-overlay">
  <div class="modal-content">
    <section class="modal-content-header">
      <h3>Voici le document de voyage</h3>
      <span class="close-modal-btn" onclick="closeModal()">
        <i class='bx bx-x'></i>
      </span>
    </section>
    <img id="modal-image" src="" alt="Photo">
  </div>
</div>



</section>

<section id="categoriser">

</section>
  </div>
  <script src="../js/script.js"></script>
</body>

</html>
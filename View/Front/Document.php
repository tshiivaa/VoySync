<?php 
include 'C:\wamp64\www\Voysync_nour\Controller\DocumentVoyageC.php';
require_once "../../Controller/inscriptioncontroller.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $utilisateurc = new utilisateurc();
    $utilisateurs = $utilisateurc->showUtilisateur($id);}
$documentC = new DocumentVoyageC();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $documentList = $documentC->showDocumentVoyage($id);
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
  <link rel="stylesheet" href="../../CSS/style.css">
  <link rel="stylesheet" href="../../CSS/budget.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

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
  <!-- ***** Main Banner Area End ***** -->
  <button class="back-button"style="margin-top:90px; margin-left:20px;" onclick="goBack()">
      <i class='bx bx-arrow-back'></i> <!-- Replace bx-arrow-back with the Boxicons class you want to use -->
    </button>
 <div class="main_body_f">
 <section id="documentList">
    <div class="addandtitle">
        <h2 style="padding: 10px;">Liste des documents de voyage</h2>
        <!-- Add button for adding documents -->
        <button id="addDocumentBtn" class="add-btn">Ajouter</button>
    </div>
    <div class="document-list" action="budget.php?id=<?php echo $id; ?>">
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
                    <button type="submit" id="ModDocumentBtn" class="modifier-btn">Modifier</button>
                    <!-- Delete button -->
                    <a class="delete-btn" href="deleteDo.php?id=<?= $document['NumSerie'] ?>" onclick="return confirmDelete(event)">Supprimer</a>
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
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
  <script src="C:\wamp64\www\Voysync_nour\js\script.js"></script>
  <script src="../../js/document.js"></script>

</body>

</html>
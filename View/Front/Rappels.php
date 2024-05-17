<?php
include '../../Controller/DocumentVoyageC.php';

$documentC = new DocumentVoyageC();
$listeDocuments = $documentC->listDocumentWithDate(); // Correction du nom de la méthode
?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
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
<link rel="stylesheet" href="../../CSS/devise.css">
<link rel="stylesheet" href="../../CSS/rappel.css">
<link rel="stylesheet" href="../../CSS/budget.css">
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<!--

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
<style>
    .main_body_f{
  display: grid;
  place-items: center;
  overflow: hidden;
}
</style>
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
  background-image: url("https://motif-blog-assets.motifphotos.com/motif-blog/wp-content/uploads/2019/11/iCloud-1-1024x611.jpg?x98050");

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
<div class="headerdevise" style="margin-top: 70px;">
    <h4>Vos Rappels</h4>
</div>
<div class="nour">
    <p>Vous pouvez maintenant voir vos rappels et renouveler vos documents de voyage</p>
</div>

<?php
$documents = $documentC->checkDocumentDue();
if (!is_null($documents) && count($documents) > 0) {
    echo '<div class="alert">';
    echo '<span class="fas fa-exclamation-circle"></span>';
    echo '<span class="msg">Vos documents expirés:';
    foreach ($documents as $document) {
        echo ' ' . $document['Type'] . ',';
    }
    echo '<div class="close-btn"><span class="fas fa-times"></span></div>';
    echo '</div>';
}
?>



<div class="main_body_f">
    <ul class="sortable-list">
        <?php foreach ($listeDocuments as $document) { ?>
            <li class="item" draggable="true">
                <i class='bx bxs-bell-ring bx-flip-horizontal bx-tada'></i>
                <div class="details">
                    <span><?php echo $document['Type']; ?></span>
                    <span class="date"><?php echo date('d F Y', strtotime($document['DateExp'])); ?></span>
                </div>
                <i class="uil uil-draggabledots"></i>
                <div class="actions">
                    <button type="submit" id="ModDocumentBtn" class="modifierR-btn">Modifier</button>
                </div>
            </li>
        <?php } ?>
    </ul>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<script src="../../js/wow.js"></script>
<script src="../../js/tabs.js"></script>
<script src="../../js/popup.js"></script>
<script src="../../js/custom.js"></script>
<script src="../../js/rappel.js" defer></script>


</body>

</html>
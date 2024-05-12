<?php
include '../../Controller/DocumentVoyageC.php';

$documentC = new DocumentVoyageC();
$document = $documentC->checkDocumentDue();
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
                        <li><a href="indexf.html">Accueil</a></li>
                        <li><a href="about.html">À Propos</a></li>
                        <li><a href="deals.html">Nos Offres</a></li>
                        <li><a href="reservation.html">Contact</a></li>
                        <li><a href="reservation.html">Blog</a></li>
                        <li><a href="Depenses_f.html" class="active">Dépenses</a></li>
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
<div class="headerdevise" style="margin-top: 70px;">
    <h4>Vos Rappels</h4>
</div>
<div class="nour">
    <p>Vous pouvez maintenant voir vos rappels et renouveler vos documents de voyage</p>
</div>
<div class="alert">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Warning: This is a warning alert!</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>
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

<script>
    $(document).ready(function () {
        <?php
        // Check if there are documents due and show alert if any
        if (!empty($document)) {
            echo "$('.alert').addClass('show');";
        }
        ?>

        $('.close-btn').click(function () {
            $('.alert').removeClass("show");
            $('.alert').addClass("hide");
        });
    });
</script>

</body>

</html>
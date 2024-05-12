<?php

include '../../Controller/DocumentVoyageC.php';

$documentVoyageC = new DocumentVoyageC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        // Addition
        $documentVoyage = new DocumentVoyage(
            $_POST['NumSerie'],
            $_POST['Type'],
            $_POST['DateExp'],
            $_POST['LieuSto'],
            $_FILES['Photodoc']['name'] // Assuming 'Photodoc' is the name of the file input field
        );
        $fraisDocument = $_POST['FraisDocument'];
        if ($fraisDocument === "oui") {
            $somme = $_POST['Somme'];
            if (!empty($somme)) {
                $currentDate = date("Y-m-d H:i:s");
                // Créez l'objet Depense avec les valeurs souhaitées
                $depense = new Depense(
                    NULL,
                    $somme,
                    "Document",
                    $currentDate,
                    "EUR",
                    $_POST['LieuSto'],
                    $_POST['Type']
                );

               // Use the method from DocumentVoyageC to add a document with associated depense
                $documentVoyageC->addDocumentVoyageWithDepense($documentVoyage, $depense);
            } else {
                // If no somme is provided, add the document without associated depense
                $documentVoyageC->addDocumentVoyage($documentVoyage);
            }
        } else {
            // If fraisDocument is not "oui", add the document without associated depense
            $documentVoyageC->addDocumentVoyage($documentVoyage);
        }
        header("Location:Document.php");
        exit();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'modify') {
        // Modification
        if (isset($_POST['NumSerie'])) {
            $NumSerie = $_POST['NumSerie'];
            $documentVoyage = new DocumentVoyage(
                $NumSerie,
                $_POST['Type'],
                $_POST['DateExp'],
                $_POST['LieuSto'],
                $_FILES['Photodoc']['name'] // Assuming 'Photodoc' is the name of the file input field
            );
            $rowCount = $documentVoyageC->updateDocumentVoyage($documentVoyage, $NumSerie);
            if ($rowCount > 0) {
                // Redirect after modification
                header("Location:Document.php");
                exit();
            } else {
                echo "Failed to update document.";
            }
        } else {
            echo "Failed to update document: No NumSerie provided.";
        }
    } else {
        echo "Invalid action selected.";
    }
    exit();
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
  <link rel="stylesheet" href="../../CSS/document.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/tesseract.js/4.1.1/tesseract.min.js"></script>
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

  <!-- ***** Main Banner Area Start ***** -->
  <button class="back-button" style="margin-top:90px; margin-left:20px;" onclick="goBack()">
      <i class='bx bx-arrow-back'></i> <!-- Replace bx-arrow-back with the Boxicons class you want to use -->
    </button>
  <div class="main_body_f">
    <section id="documentFormSection">
      <h2 style="margin: 20px;">Ajout de document</h2> <!-- Initial header -->
      <form id="documentForm" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" id="actionInput">
    <div>
        <label for="NumSerie">Numéro de série</label>
        <input type="text" name="NumSerie" id="NumSerie" required />
    </div>
    <div>
        <label for="Type">Type de document</label>
      <input type="text" name="Type" id="Type" required />
    </div>
    <div>
        <label for="DateExp">Date d'expiration</label>
        <input type="date" name="DateExp" id="DateExp" required />
    </div>
    <div>
        <label for="LieuSto">Lieu de stockage</label>
        <input type="text" name="LieuSto" id="LieuSto" required />
    </div>
    <div>
        <label for="Photodoc">Photo du document</label>
        <input type="file" name="Photodoc" id="Photodoc" accept="image/*" required />
    </div>
    <div>
    <label for="FraisDocument">Le document comporte-t-il des frais ?</label>
    <select name="FraisDocument" id="FraisDocument" >
    <option value="non">Non</option>
        <option value="oui">Oui</option>
    </select>
</div>
<div id="sommeContainer" style="display: none;">
    <label for="Somme">Frais de dépense :</label>
    <input type="text" name="Somme" id="Somme"/>
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
  <script src="../../js/wow.js"></script>
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
  <script src="../../js/ocr.js"></script>
  <script src="../../js/document.js"></script>
  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function () {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });

    function goBack() {
      window.history.back();
    }
    document.addEventListener("DOMContentLoaded", function() {
  // Get the action parameter from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const action = urlParams.get('action');


// Set the value of the hidden input field
const actionInput = document.getElementById("actionInput");
actionInput.value = action;
  // Get the header element
  const header = document.querySelector("h2");

  // Adjust the header text based on the action parameter
  if (action === 'add') {
    header.textContent = "Ajout de document";
  } else if (action === 'modify') {
    header.textContent = "Modifier un document";
    
    // Get the form fields
    const numSerieInput = document.getElementById("NumSerie");
    const typeInput = document.getElementById("Type");
    const dateExpInput = document.getElementById("DateExp");
    const lieuStoInput = document.getElementById("LieuSto");

    // Get the document details from the URL parameters
    const numSerie = urlParams.get('NumSerie');
    const type = urlParams.get('Type');
    const dateExp = urlParams.get('DateExp');
    const lieuSto = urlParams.get('LieuSto');
    const formattedDateExp = formatDate(dateExp);
    // Set the values of the form fields
    numSerieInput.value = numSerie;
    typeInput.value = type;
    dateExpInput.value = formattedDateExp;
    lieuStoInput.value = lieuSto;
  }
  const fraisSelect = document.getElementById("FraisDocument");
    const sommeContainer = document.getElementById("sommeContainer");
    const sommeInput = document.getElementById("Somme");

    fraisSelect.addEventListener("change", function() {
        if (fraisSelect.value === "oui") {
            sommeContainer.style.display = "block"; // Afficher le champ de saisie
        } else {
            sommeContainer.style.display = "none"; // Masquer le champ de saisie
            sommeInput.value = ""; // Réinitialiser la valeur du champ de saisie
        }
    });
});
function confirmModify(event) {
    // Prompt the user for confirmation
    if (!confirm("Voulez-vous vraiment modifier ce document ?")) {
      // If the user cancels, prevent the default link behavior
      event.preventDefault(); // Prevent the default link behavior
      return false; // Cancel the action
    }
    // If the user confirms, continue with the default link behavior
    return true; // Proceed with the action
  }
function formatDate(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}
  function goBack() {
  window.history.back(); 
}
  </script>

</body>

</html>
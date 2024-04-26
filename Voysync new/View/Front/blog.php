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
  <link rel="stylesheet" href="../../CSS/blog.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!-- https://templatemo.com/tm-580-woox-travel-->
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
              <li><a href="blog.php">Blog</a></li>
              <li><a href="Depenses_front.html">Dépenses</a></li>
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
    <div class="header">
      <br>
      <br>
      <br>
      <br>
      <br>
      <h1>Blogs</h1>
      <p>" Un voyage, une histoire. Inspirez-vous, partagez vos aventures "</p>
      <br>
      <a href="ajouterBlog.php" class="btn btn-primary">Rédiger un article</a>
    </div>
    <div class="container">
      <?php
      include '../../Controller/BlogController.php';
      $c = new BlogC();
      $tab = $c->listBlog();
      $count = 0;
      foreach ($tab as $res) {
        if ($res['etat'] == "verifie") {
          if ($count % 2 == 0) {
            echo '</div><div class="container">';
          }
          ?>
          <div class="article">
            <h2><?php echo $res['TitreArt']; ?></h2>
            <p><strong>ID :</strong> <?php echo $res['IDart']; ?></p>
            <p><?php echo $res['ContenuArt']; ?></p>
            <p><strong>Date de publication:</strong> <?php echo $res['DatePubArt']; ?></p>
            <p><strong>Auteur:</strong> <?php echo $res['AuteurArt']; ?></p>
            <?php if (!empty($res['img'])): ?>
              <img src="<?php echo $res['img']; ?>" alt="Image">
            <?php endif; ?>
            <div class="button-group">
              <button class="btn btn-modifier"
                onclick="return confirmModification(<?php echo $res['IDart']; ?>)">Modifier</button>
              <form method="post" action="supprimerBlog.php">
                <input type="hidden" name="IDart" value="<?= $res['IDart']; ?>">
                <button type="submit" class="btn btn-danger btn-supprimer"
                  onclick="return confirmSuppression()">supprimer</button>
              </form>
            </div>
            <!-- Affichage des détails de commentaires -->
            <div class="comment-section">
              <br>
              <br>
              <h3> Commentaires</h3>
              <div class="comment-form">
                <form id="commentForm_<?php echo $res['IDart']; ?>"
                  onsubmit="return addComment(<?php echo $res['IDart']; ?>)">
                  <textarea name="ContenuComm" id="ContenuComm_<?php echo $res['IDart']; ?>"
                    placeholder="Votre commentaire"></textarea>
                  <button type="submit" class="icon-button">
                    <i class='bx bx-send'></i>
                  </button>
                </form>
                <button class="icon-button" onclick="showCommentsForArticle(<?php echo $res['IDart']; ?>)">
                  <i class='bx bx-show'></i>
                </button>
              </div>
              <div id="comments_<?php echo $res['IDart']; ?>"></div>
            </div>
            <div class="Comment" id="Comment_<?php echo $res['IDart']; ?>"></div>
            <a href="comments.php?IDart=<?php echo $res['IDart']; ?>">Comments</a>
          </div>
          <?php
          $count++;
        }
      }
      ?>
    </div>
    <script>
      function confirmSuppression() {
        return confirm("Voulez-vous vraiment supprimer cet article ?");
      }
      function confirmModification(idart) {
        if (confirm("Voulez-vous vraiment modifier cet article ?")) {
          window.location.href = 'modifierBlog.php?modifierid=' + idart;
        }
        return false;
      }
    </script>
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
  </script>
</body>

</html>
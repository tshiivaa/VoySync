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
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <style>
    .header {
      text-align: center;
      margin-bottom: 20px;
      font-family: 'Montserrat', sans-serif;
      background-image: url('../images/about-content-bg.jpg');
      background-size: cover;
      background-position: center;
      padding: 100px 0;
    }

    .header h1 {
      font-size: 5rem;
      color: #333;
    }

    .header p {
      font-size: 1.2rem;
      color: #555;
    }


    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #e7f2fd;
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      padding: 20px;
      height: auto;
    }

    .article {
      flex: 1 0 calc(33.33% - 20px);
      border: 1px solid #7ba0c9;
      border-radius: 20px;
      padding: 30px;
      background-color: #f9f9f9;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s;
    }

    .article:hover {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .article h2 {
      margin-top: 0;
      color: #7ba0c9;
      font-size: 1.5rem;
    }

    .article p {
      margin-bottom: 10px;
      color: #666;
      font-size: 1rem;
      line-height: 1.5;
    }

    .article img {
      width: 300px;
      height: 300px;
      display: block;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 10px;
    }

    .article .button-group {
      text-align: right;
    }

    .article .button-group button {
      cursor: pointer;
      background-color: #ffcc00;
      border: none;
      color: #7ba0c9;
      padding: 5px 10px;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s;
      font-size: 1rem;
      font-weight: bold;
      margin-left: 5px;
    }

    .article .button-group button.btn-danger {
      background-color: #7ba0c9;
      color: #fff;
    }

    .article .button-group button:hover {
      background-color: #ffdb4d;
    }

    .article .button-group button.btn-danger:hover {
      background-color: #5a82ad;
    }

    .article .button-group button.btn-modifier {
      float: left;
    }

    .article .button-group button.btn-supprimer {
      float: right;
    }


    .comment-section {
      margin-top: 20px;
    }

    .comment-form {
      display: flex;
      align-items: center;
    }

    .comment-section textarea {
      flex: 1;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      resize: vertical;
    }

    .comment-section .icon-button {
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-left: 10px;
    }

    .comment-section .icon-button:hover {
      background-color: #0056b3;
    }

    .comments {
      margin-top: 20px;
    }

    .comment {
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .comment p {
      margin: 0;
    }

    .card {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .button-container {
      margin-top: 1rem;
    }

    .stars-container {
      display: flex;
    }

    .star {
      font-size: 2rem;
      margin: 0 0.5rem;
    }

    .one {
      color: rgb(255, 0, 0);
    }

    .two {
      color: rgb(255, 106, 0);
    }

    .three {
      color: rgb(255, 255, 0);
    }

    .four {
      color: rgb(230, 255, 120);
    }

    .five {
      color: rgb(24, 159, 14);
    }

    .box {
      position: relative;
      margin-top: 20px;
    }

    .menu {
      position: absolute;
      top: -25px;
      left: 70px;
      display: none;
    }

    #checkbox {
      width: 65px;
      height: 65px;
      cursor: pointer;
      appearance: none;
      -moz-appearance: none;
      -webkit-appearance: none;
      outline: none;
      background: white;
      position: relative;
    }

    #checkbox:hover {
      background: rgba(255, 255, 255, .7);
    }

    #checkbox::before {
      content: '\f1e0';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-family: 'font awesome 5 free';
      font-weight: 700;
      font-size: 1.5rem;
      color: rgb(41, 41, 41);
      transition: all 1.5s;
    }

    #checkbox:checked::before {
      content: '\f00d';
    }

    #checkbox:checked~.menu {
      width: 264px;
    }

    .menuItems {
      font-size: 1.5rem;
      background-color: #ffffff;
      display: inline-block;
      padding: 10px;
      margin: 10px;
      border-radius: 50%;
    }

    .menuItems a {
      color: #000000;
      text-decoration: none;
    }

    .menu .menuItems:hover {
      background: rgba(255, 255, 255, .7);
    }

    .menuOptions {
      display: none;
    }

    .menuOptions li a {
      color: white;
      text-decoration: none;
    }

    .menuOptions li a:hover {
      color: #ccc;
    }

    .search_bar {
      margin-top: 13px;
      text-align: center;
      margin-left: -180px;

    }

    .search_bar input[type="text"] {
      padding: 10px;
      width: 300px;
      border: 2px solid #ccc;
      border-radius: 25px;
      font-size: 16px;
      transition: border-color 0.3s;
    }
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var menuTrigger = document.getElementById("menuTrigger");
      var menuOptions = document.getElementById("menuOptions");
      menuTrigger.addEventListener("click", function () {
        if (menuOptions.style.display === "none") {
          menuOptions.style.display = "block";
        } else {
          menuOptions.style.display = "none";
        }
      });
    });

  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var searchInput = document.getElementById("searchInput");
      var articles = document.querySelectorAll(".article");

      searchInput.addEventListener("input", function () {
        var searchTerm = searchInput.value.toLowerCase();

        articles.forEach(function (article) {
          var title = article.querySelector("h2").innerText.toLowerCase();

          if (title.includes(searchTerm)) {
            article.style.display = "block";
          } else {
            article.style.display = "none";
          }
        });
      });
    });
  </script>
</head>

<body>
  <!-- ***** Preloader End ***** -->
  <header class="header-area header-sticky">
    <div class="container2">
      <div class="row">
        <div class="col-12">
        <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="indexf.php" class="logo">
                        <img src="../../View/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <div class="search_bar">
                      <input type="text" id="searchInput" placeholder="Rechercher par titre...">
                    </div>
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="accueil-link" href="indexf.php" >Accueil</a></li>
                        <li><a href="ListLogementFront copy 2.php">Logements</a></li>
                        <li><a href="ListVolFront copy.php">Vols</a></li>
                        <li><a id="mission-link" href="FRMissionPage.php">Missions</a></li>
                        <li><a id="blog-link" href="blog.php" class="active">Blog</a></li>
                        <li><a id="depenses-link" href="depenses_f.php">Dépenses</a></li>
                        <li><input type="submit" name="connect" value="Connexion" class="btn solid" id="connect" style="background-color:#FBCD5AFF;"/></li>
                        <li><a href="filtre_Magique.php"><i class='bx bxs-magic-wand'></i> Itineraire magique</a></li>
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
      require_once '../../Controller/BlogController.php';
      $c = new BlogC();
      $tab = $c->listBlog();
      $count = 0;
      foreach ($tab as $res) {
        if ($res['etat'] == "verifie") {
          if ($count % 2 == 0) {
            echo '</div><div class="container">';
          }
          ?>
          <div class="article" data-blogid="<?php echo $res['IDart']; ?>" data-titre="<?php echo $res['TitreArt']; ?>"
            data-auteur="<?php echo $res['AuteurArt']; ?>" data-image="<?php echo $res['img']; ?>">
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
              <a href="comments.php?IDart=<?php echo $res['IDart']; ?>" class="btn btn-secondary">Commentaires</a>
            </div>
            <br>
            <div class="card">
              <div class="stars-container">
                <span onclick="gfg(1, <?php echo $res['IDart']; ?>)" class="star">★</span>
                <span onclick="gfg(2, <?php echo $res['IDart']; ?>)" class="star">★</span>
                <span onclick="gfg(3, <?php echo $res['IDart']; ?>)" class="star">★</span>
                <span onclick="gfg(4, <?php echo $res['IDart']; ?>)" class="star">★</span>
                <span onclick="gfg(5, <?php echo $res['IDart']; ?>)" class="star">★</span>
              </div>
              <div class="button-container">
                <form method="POST" action="ajouterNotation.php">
                  <input type="hidden" name="IDart" value="<?php echo $res['IDart']; ?>">
                  <input type="hidden" name="rating" id="rating_<?php echo $res['IDart']; ?>" value="">
                  <button type="submit" class="btn btn-primary" onclick="submitRating(<?php echo $res['IDart']; ?>)"><i
                      class='bx bx-send'></i></button>
                </form>
              </div>
              <br>
              <?php
              require_once '../../Controller/BlogController.php';
              $notationC = new notationC();
              $IDart = $res['IDart'];
              $averageRating = $notationC->calculateAverageRating($IDart);
              ?>
              <h6 id="output_<?php echo $res['IDart']; ?>">Rating is:
                <?php echo isset($averageRating) ? number_format($averageRating, 1) : "N/A"; ?>/5
              </h6>
              <br>
            </div>
            <br>
            <div class="box" id="box_<?php echo $res['IDart']; ?>">
              <div id="checkbox_<?php echo $res['IDart']; ?>" class="checkbox">
                <i class="fas fa-share"></i>
              </div>
              <div class="menu menu_<?php echo $res['IDart']; ?>">
                <a href="#" class="share-btn" data-social="whatsapp">
                  <div class="menuItems">
                    <i class="fab fa-whatsapp"></i>
                  </div>
                </a>
                <a href="#" class="share-btn" data-social="facebook">
                  <div class="menuItems">
                    <i class="fab fa-facebook"></i>
                  </div>
                </a>
                <a href="#" class="share-btn" data-social="twitter">
                  <div class="menuItems">
                    <i class="fab fa-twitter"></i>
                  </div>
                </a>
              </div>
            </div>
            <br>
          </div>
          <?php
          $count++;
        }
      }
      ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
      function submitRating(id) {
        let stars =
          document.getElementsByClassName("star");
        let rating = 0;
        for (let i = 0; i < stars.length; i++) {
          if (stars[i].classList.contains("one")) {
            rating = 1;
          } else if (stars[i].classList.contains("two")) {
            rating = 2;
          } else if (stars[i].classList.contains("three")) {
            rating = 3;
          } else if (stars[i].classList.contains("four")) {
            rating = 4;
          } else if (stars[i].classList.contains("five")) {
            rating = 5;
          }
          document.getElementById("rating_" + id).value = rating;
        }
      }
    </script>
    <script>
      function gfg(n, id) {
        let stars =
          document.getElementsByClassName("star");
        let output =
          document.getElementById("output_" + id);
        let rating = 0;
        for (let i = 0; i < n; i++) {
          if (n == 1) {
            cls = "one";
            rating = 1;
          } else if (n == 2) {
            cls = "two";
            rating = 2;
          } else if (n == 3) {
            cls = "three";
            rating = 3;
          } else if (n == 4) {
            cls = "four";
            rating = 4;
          } else if (n == 5) {
            cls = "five";
            rating = 5;
          }
          stars[i].className = "star " + cls;
        }
        output.innerText = "Rating is: " + n + "/5";
      }
      $(document).ready(function () {
        $(".checkbox").click(function () {
          var articleId = $(this).attr('id').split('_')[1];
          var menu = $(".menu_" + articleId);
          if (menu.css("display") === "none") {
            menu.css("display", "block");
          } else {
            menu.css("display", "none");
          }
        });
      });
      function getArticleContent(articleId) {
        var articleElement = document.querySelector("[data-blogid='" + articleId + "']");
        var articleTitle = articleElement.dataset.titre;
        var articleUrlElement = articleElement.querySelector('.btn-secondary');
        var articleUrl = articleUrlElement ? articleUrlElement.getAttribute('href') : '';

        // Ajoutez la partie manquante du lien
        var missingPart = "/mariem/Voysync%20new/View/Front/";

        // Concaténer la partie manquante avec l'URL extraite
        var completeUrl = window.location.origin + missingPart + articleUrl;

        // Retourner les détails de l'article avec le titre et le lien
        return "Titre: " + articleTitle + "\n" +
          "Lien: Cliquez ici pour lire l'article : " + completeUrl;
      }






      function shareOnWhatsapp(articleContent) {
        var whatsappLink = "https://api.whatsapp.com/send?text=" + encodeURIComponent(articleContent);
        window.open(whatsappLink, "_blank");
      }

      function shareOnFacebook(articleContent) {
        var facebookLink = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href);
        window.open(facebookLink, "_blank");
      }

      function shareOnTwitter(articleContent) {
        var twitterLink = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(articleContent);
        window.open(twitterLink, "_blank");
      }

      var shareButtons = document.querySelectorAll(".share-btn");
      shareButtons.forEach(function (btn) {
        btn.addEventListener("click", function () {
          var articleId = this.closest(".article").dataset.blogid;
          var articleContent = getArticleContent(articleId);
          var socialMedia = this.dataset.social;
          if (socialMedia === "whatsapp") {
            shareOnWhatsapp(articleContent);
          } else if (socialMedia === "facebook") {
            shareOnFacebook(articleContent);
          } else if (socialMedia === "twitter") {
            shareOnTwitter(articleContent);
          }
        });
      });


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
          <p>Droits d'auteur © 2024 <a href="#">Voysync</a>. Tous droits réservés.</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- JavaScript principal de Bootstrap -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../js/isotope.min.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/tabs.js"></script>
  <script src="../../js/popup.js"></script>
  <script src="../../js/custom.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Voysync - Explorez le monde</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css”>
  <style>
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
  </style>
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fichiers CSS supplémentaires -->
  <link rel="stylesheet" href="../../CSS/templatemo-woox-travel.css">
  <link rel="stylesheet" href="../../CSS/owl.css">
  <link rel="stylesheet" href="../../CSS/animate.css">
  <link rel="stylesheet" href="../../CSS/blog.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#checkbox").change(function () {
        if (this.checked) {
          $(".menu").css("display", "block");
        } else {
          $(".menu").css("display", "none");
        }
      });
    });
  </script>
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
          <div class="article" data-blogid="<?php echo $res['IDart']; ?>">
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
            <!-- HTML -->
            <div class="box" id="box_<?php echo $res['IDart']; ?>">
              <div id="checkbox_<?php echo $res['IDart']; ?>" class="checkbox">
                <i class="fas fa-share"></i> <!-- Remplacez fas fa-share par la classe d'icône souhaitée -->
              </div>
              <div class="menu menu_<?php echo $res['IDart']; ?>">
                <a href="#" class="share-btn" data-social="whatsapp">
                  <div class="menuItems">
                    <i class="fab fa-whatsapp"></i>
                  </div>
                </a>
                <a href="#" class="share-btn" data-social="instagram">
                  <div class="menuItems">
                    <i class="fab fa-instagram"></i>
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
      //var articleId = this.closest('.box').id.split('_')[1];

      function getArticleContent(articleId) {
        var article = {
          TitreArt: document.getElementById("TitreArt_" + articleId) ? document.getElementById("TitreArt_" + articleId).innerText : "",
          ContenuArt: document.getElementById("ContenuArt_" + articleId) ? document.getElementById("ContenuArt_" + articleId).innerText : "",
          AuteurArt: document.getElementById("AuteurArt_" + articleId) ? document.getElementById("AuteurArt_" + articleId).innerText : "",
          img: document.getElementById("img_" + articleId) ? document.getElementById("img_" + articleId).getAttribute('src') : ""
        };

        var articleContent = "Titre: " + article.TitreArt + "\n" +
          "Contenu: " + article.ContenuArt + "\n" +
          "Auteur: " + article.AuteurArt + "\n" +
          "Image: " + article.img;

        return articleContent;
      }



      function shareOnWhatsapp(content) {
        var whatsappLink = "https://api.whatsapp.com/send?text=" + encodeURIComponent(content);
        window.open(whatsappLink, "_blank");
      }

      function shareOnInstagram(content) {
        alert("Instagram ne permet pas de partager directement depuis un site web.");
      }

      function shareOnFacebook(content) {
        var facebookLink = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href);
        window.open(facebookLink, "_blank");
      }

      function shareOnTwitter(content) {
        var twitterLink = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(content);
        window.open(twitterLink, "_blank");
      }

      var shareBtns = document.querySelectorAll('.share-btn');

      shareBtns.forEach(function (btn) {
        btn.addEventListener('click', function (event) {
          event.preventDefault();

          // Récupérez l'ID de l'article à partir de l'attribut data-article-id
          var articleId = this.getAttribute('data-article-id');
          var articleContent = getArticleContent(articleId);

          // Récupérez le réseau social à partir de l'attribut data-social
          var social = this.dataset.social;

          // Appelez la fonction de partage appropriée en fonction du réseau social
          if (social === 'whatsapp') {
            shareOnWhatsapp(articleContent);
          } else if (social === 'instagram') {
            shareOnInstagram(articleContent);
          } else if (social === 'facebook') {
            shareOnFacebook(articleContent);
          } else if (social === 'twitter') {
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
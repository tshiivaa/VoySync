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
        <?php
        if (!isset($_GET['IDart'])) {
            // Rediriger si l'ID de l'article n'est pas présent
            header('Location: ' . $_SERVER['REQUEST_URI'] . '?IDart=VOTRE_IDART_PAR_DEFAUT');
            exit();
        }
        include '../../Controller/BlogController.php';
        if (isset($_GET['IDart'])) {
            $IDart = $_GET['IDart'];

            // Instancier les contrôleurs
            $BlogController = new BlogC();
            $commentaireController = new CommentaireC();

            // Récupérer l'article et les commentaires associés
            $blog = $BlogController->showBlog($IDart);
            $commentaires = $commentaireController->getCommentairesByArticleId($IDart);

            // Vérifier si l'article existe
            if ($blog) {
                ?>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="article p-5 mx-auto col-md-6">
                    <h2><?php echo $blog['TitreArt']; ?></h2>
                    <p><strong>ID :</strong> <?php echo $blog['IDart']; ?></p>
                    <p><?php echo $blog['ContenuArt']; ?></p>
                    <p><strong>Date de publication:</strong> <?php echo $blog['DatePubArt']; ?></p>
                    <p><strong>Auteur:</strong> <?php echo $blog['AuteurArt']; ?></p>
                    <?php if (!empty($blog['img'])): ?>
                        <img src="<?php echo $blog['img']; ?>" alt="Image de l'article" width="150" height="150">
                    <?php endif; ?>
                    <div class="text-right">
                        <div class="button-group">
                            <a href="blog.php" class="btn btn-primary mt-3">Retour</a>
                            <button class="btn btn-modifier"
                                onclick="return confirmModification(<?php echo $blog['IDart']; ?>)">Modifier</button>
                            <form method="post" action="supprimerBlog.php">
                                <input type="hidden" name="IDart" value="<?= $blog['IDart']; ?>">
                                <button type="submit" class="btn btn-danger btn-supprimer"
                                    onclick="return confirmSuppression()">Supprimer</button>
                            </form>

                        </div>
                    </div>
                    <br>
                    <br>
                    <form action="ajouterCommentaire.php" method="post">
                        <input type="hidden" name="IDart" value="<?php echo $IDart; ?>">
                        <textarea name="ContenuComm" placeholder="Ajouter un commentaire"></textarea>
                        <button type="submit">Ajouter</button>
                    </form>

                    <?php
                    // Afficher les commentaires s'il y en a
                    if ($commentaires) {
                        echo '<h3>Commentaires</h3>';
                        foreach ($commentaires as $commentaire) {
                            echo '<div class="comment">';
                            //echo '<p class="user">' . $commentaire['AuteurComm'] . '</p>';
                            echo '<p>' . $commentaire['ContenuComm'] . '</p>';
                            //echo '<p class="date">' . $commentaire['DateComm'] . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Aucun commentaire pour le moment.</p>';
                    }
            } else {
                echo '<p>L\'article demandé n\'existe pas.</p>';
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
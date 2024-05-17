<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Voysync</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://localhost/mariem\gestiongBlog\CSS\style.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/templatemo-woox-travel.css">
    <link rel="stylesheet" href="../../CSS/owl.css">
    <link rel="stylesheet" href="../../CSS/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        /* .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            height: auto;
        } */

        .article {
            flex: 1 0 calc(10% - 60px);
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

        .comment-form {
            margin-top: 20px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .comment-input {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #007bff;
            border-radius: 5px;
            resize: none;
            transition: border-color 0.3s ease;
        }

        .comment-input:focus {
            border-color: #0056b3;
        }

        .comment-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
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
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a id="accueil-link" href="indexf.php" class="active">Accueil</a></li>
                        <li><a href="ListLogementFront copy 2.php">Logements</a></li>
                        <li><a href="ListVolFront copy.php">Vols</a></li>
                        <li><a id="mission-link" href="FRMissionPage.php">Missions</a></li>
                        <li><a id="blog-link" href="blog.php">Blog</a></li>
                        <li><a id="depenses-link" href="depenses_f.php">Dépenses</a></li>
                        <input type="submit" name="connect" value="Connexion" class="btn solid" id="connect" style="background-color:#FBCD5AFF;"/>
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
        <div class="container">
            <?php
            if (!isset($_GET['IDart'])) {
                header('Location: ' . $_SERVER['REQUEST_URI'] . '?IDart=VOTRE_IDART_PAR_DEFAUT');
                exit();
            }
            include '../../Controller/BlogController.php';
            if (isset($_GET['IDart'])) {
                $IDart = $_GET['IDart'];

                $BlogController = new BlogC();
                $commentaireController = new CommentaireC();

                $blog = $BlogController->showBlog($IDart);
                $commentaires = $commentaireController->getCommentairesByArticleId($IDart);

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
                                        onclick="return confirmSuppressionB()">Supprimer</button>
                                </form>

                            </div>
                        </div>
                        <br>
                        <br>
                        <form action="ajouterCommentaire.php" method="post" class="comment-form">
                            <input type="hidden" name="IDart" value="<?php echo $IDart; ?>">
                            <textarea name="ContenuComm" placeholder="Ajouter un commentaire" class="comment-input"></textarea>
                            <button type="submit" class="comment-button">Ajouter</button>
                        </form>

                        <br>
                        <?php
                        if ($commentaires) {
                            echo '<h3>Commentaires</h3>';
                            echo '<br>';
                            foreach ($commentaires as $commentaire) {
                                echo '<div class="comment" style="display: flex; align-items: center;">';
                                echo '<p style="flex: 1;">' . $commentaire['ContenuComm'] . '</p>';
                                echo '<form id="form-' . $commentaire['IDcomm'] . '" method="post" action="supprimerCommentaire.php" style="margin-left: 10px;">';
                                echo '<input type="hidden" name="IDcomm" value="' . $commentaire['IDcomm'] . '">';
                                echo '<input type="hidden" name="IDart" value="' . $IDart . '">';
                                echo '<button type="button" class="btn btn-link" style="color: grey;" onclick="confirmDelete(' . $commentaire['IDcomm'] . ')"><i class="bx bx-trash"></i></button>';
                                echo '</form>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>Aucun commentaire pour le moment.</p>';
                        }
                }
            }
            ?>
            </div>
            <script>
                function confirmSuppressionB() {
                    return confirm("Voulez-vous vraiment supprimer cet article ?");
                }
                function confirmModification(idart) {
                    if (confirm("Voulez-vous vraiment modifier cet article ?")) {
                        window.location.href = 'modifierBlog.php?modifierid=' + idart;
                    }
                    return false;
                }
                function confirmDelete(IDcomm) {
                    if (confirm("Voulez-vous vraiment supprimer ce commentaire ?")) {
                        document.getElementById("form-" + IDcomm).submit();
                    }
                }
            </script>
        </div>
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
<!DOCTYPE html>
<html lang="fr">
jhgfdfghjklm

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog d'aventure ou de voyage</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffcc00;
            /* Jaune */
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
            /* Change height to auto to allow it to grow based on content */
        }


        .article {
            flex: 1 0 calc(33.33% - 20px);
            border: 1px solid #7ba0c9;
            /* Bleu pétrole */
            border-radius: 20px;
            /* Increased border radius */
            padding: 30px;
            /* Increased padding */
            background-color: #f9f9f9;
            /* Gris clair */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .article:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .article h2 {
            margin-top: 0;
            color: #7ba0c9;
            /* Bleu pétrole */
            font-size: 1.5rem;
        }

        .article p {
            margin-bottom: 10px;
            color: #666;
            /* Gris */
            font-size: 1rem;
            line-height: 1.5;
        }

        .article img {
            width: 300px;
            /* Assurez-vous que l'image ne dépasse pas la largeur du conteneur */
            height: 300px;
            /* Assurez-vous que l'image conserve son ratio d'aspect */
            display: block;
            /* Pour supprimer les marges blanches autour de l'image */
            border-radius: 10px;
            /* Pour ajouter des coins arrondis */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Ajoute une ombre légère */
            margin-bottom: 10px;
            /* Ajoute un espace en bas de l'image */
        }

        .article .btn {
            cursor: pointer;
            background-color: #ffcc00;
            /* Jaune */
            border: none;
            color: #7ba0c9;
            /* Bleu pétrole */
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            font-size: 1rem;
            font-weight: bold;
            margin-right: 5px;
            text-align: right;

        }

        .article .btn:hover {
            background-color: #ffdb4d;
            /* Jaune plus clair */
        }

        .article .btn-danger {
            background-color: #7ba0c9;
            /* Bleu pétrole */
            color: #fff;
            /* Blanc */
            text-align: right;
        }

        .article .btn-danger:hover {
            background-color: #5a82ad;
            /* Bleu pétrole plus foncé */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Montserrat', sans-serif;
            /* Changement de police */
        }

        .header h1 {
            font-size: 2rem;
            color: #333;
            /* Noir */
            font-family: 'Montserrat', sans-serif;
            /* Changement de police */
        }

        .header p {
            font-size: 1.2rem;
            color: #555;
            /* Gris plus foncé */
            font-family: 'Montserrat', sans-serif;
            /* Changement de police */
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Blogs</h1>
        <p>" Un voyage, une histoire. Inspirez-vous, partagez vos aventures "</p>
    </div>
    <div class="container">
        <?php
        include '../../Controller/BlogController.php';
        $c = new BlogC();
        $tab = $c->listBlog();
        $count = 0;
        foreach ($tab as $res) {
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
                <button class="btn"><a href="modifierBlog.php?modifierid=<?php echo $res['IDart']; ?>">Modifier</a></button>
                <button class="btn btn-danger"><a
                        href="supprimerBlog.php?supprimer=<?php echo $res['IDart']; ?>">Supprimer</a></button>
            </div>
            <?php
            $count++;
        }
        ?>
    </div>
</body>

</html>
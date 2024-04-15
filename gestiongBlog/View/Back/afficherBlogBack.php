<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BackOffice - Affichage des Articles</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .article {
            flex: 1 0 calc(33.33% - 20px);
            border: 1px solid #7ba0c9;
            border-radius: 10px;
            padding: 20px;
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

        .article .btn {
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
            margin-right: 5px;
        }

        .article .btn:hover {
            background-color: #ffdb4d;
        }

        .article .btn-danger {
            background-color: #7ba0c9;
            color: #fff;
        }

        .article .btn-danger:hover {
            background-color: #5a82ad;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2rem;
            color: #333;
        }

        .header p {
            font-size: 1.2rem;
            color: #555;
        }

        .article img {
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>BackOffice - Blogs</h1>
        <p>" Un voyage, une histoire. Inspirez-vous, partagez vos aventures "</p>
    </div>
    <div class="container">
        <?php
        include '../../Controller/BlogController.php';
        $c = new BlogC();
        $tab = $c->listBlog();
        foreach ($tab as $res) {
            ?>
            <div class="article">
                <h2><?php echo $res['TitreArt']; ?></h2>
                <p><strong>ID :</strong> <?php echo $res['IDart']; ?></p>
                <p><?php echo $res['ContenuArt']; ?></p>
                <p><strong>Date de publication:</strong> <?php echo $res['DatePubArt']; ?></p>
                <p><strong>Auteur:</strong> <?php echo $res['AuteurArt']; ?></p>
                <!-- Affichage de l'image -->
                <img src="<?php echo $res['img']; ?>" alt="Image de l'article">
                <!-- Bouton pour supprimer l'article -->
                <button class="btn btn-danger"><a
                        href="supprimerBlogBack.php?supprimer=<?php echo $res['IDart']; ?>">supprimer</a></button>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>
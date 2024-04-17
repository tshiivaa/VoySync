<?php
// Include the LogementController and retrieve the list of logements
require_once '../controller/LogementC.php';
$logementC = new LogementC();
$logements = $logementC->listLogement();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des logements</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffcc00;
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

        .logement {
            flex: 1 0 calc(33.33% - 20px);
            border: 1px solid #7ba0c9;
            border-radius: 20px;
            padding: 30px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .logement:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .logement h2 {
            margin-top: 0;
            color: #7ba0c9;
            font-size: 1.5rem;
        }

        .logement p {
            margin-bottom: 10px;
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }

        .logement img {
            width: 300px;
            height: 300px;
            display: block;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .logement .btn {
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
            text-align: right;
        }

        .logement .btn:hover {
            background-color: #ffdb4d;
        }

        .logement .btn-danger {
            background-color: #7ba0c9;
            color: #fff;
            text-align: right;
        }

        .logement .btn-danger:hover {
            background-color: #5a82ad;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Montserrat', sans-serif;
        }

        .header h1 {
            font-size: 2rem;
            color: #333;
        }

        .header p {
            font-size: 1.2rem;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Liste des logements</h1>
        <p>"Découvrez nos logements disponibles"</p>
    </div>
    <div class="container">
        <?php foreach ($logements as $logement): ?>
            <div class="logement">
                <h2><?= $logement['Nom']; ?></h2>
                <p><strong>ID :</strong> <?= $logement['IDlogement']; ?></p>
                <p><?= $logement['Description']; ?></p>
                <p><strong>Type :</strong> <?= $logement['Type']; ?></p>
                <p><strong>Adresse :</strong> <?= $logement['Adresse']; ?></p>
                <p><strong>Prix :</strong> <?= $logement['Prix']; ?></p>
                <p><strong>Capacité :</strong> <?= $logement['Capacite']; ?></p>
                <p><strong>Évaluation :</strong> <?= $logement['Evaluation']; ?></p>
                <p><strong>Disponibilité :</strong> <?= $logement['Disponibilite']; ?></p>
                <!-- Add image display if needed -->
                <a href="UpdateLogement.php?idlogement=<?= $logement['IDlogement']; ?>" class="btn">Modifier</a>
                <form method="post" action="DeleteLogement.php">
                <!-- Add a hidden input field to pass the IDlogement -->
                <input type="hidden" name="IDlogement" value="<?= $logement['IDlogement']; ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>
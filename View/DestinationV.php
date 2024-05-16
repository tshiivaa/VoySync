<?php
include_once '../Controller/DestinationC.php';

$DestinationController = new DestinationController();
$listDestinations = $DestinationController->listDestinations();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Destinations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Liste des Destinations</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Pays</th>
        </tr>
        <?php foreach ($listDestinations as $destination): ?>
        <tr>
            <td><?php echo $destination->getIdDestination(); ?></td>
            <td><?php echo $destination->getNom(); ?></td>
            <td><?php echo $destination->getDescription(); ?></td>
            <td><?php echo $destination->getPays(); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

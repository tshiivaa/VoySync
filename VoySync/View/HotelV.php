<?php
include_once '../Controller/HotelC.php'; 

$hotelController = new HotelController();
$listHotels = $hotelController->listHotels();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Hôtels</title>
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
    <h2>Liste des Hôtels</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Nombre d'étoiles</th>
            <th>ID Destination</th>
        </tr>
        <?php foreach ($listHotels as $hotel): ?>
        <tr>
            <td><?php echo $hotel['id_hotel']; ?></td>
            <td><?php echo $hotel['nom']; ?></td>
            <td><?php echo $hotel['adresse']; ?></td>
            <td><?php echo $hotel['description']; ?></td>
            <td><?php echo $hotel['prix']; ?></td>
            <td><?php echo $hotel['nbr_etoiles']; ?></td>
            <td><?php echo $hotel['id_destination']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
?>

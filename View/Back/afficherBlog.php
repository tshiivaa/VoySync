<?php
include '../../Controller/BlogController.php';
$c = new BlogC();
$tab = $c->listBlog();
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .btn {
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Titre d'article</th>
                <th>Contenu</th>
                <th>Date de publication</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab as $res) { ?>
                <tr>
                    <td><?php echo $res['IDart']; ?></td>
                    <td><?php echo $res['TitreArt']; ?></td>
                    <td><?php echo $res['ContenuArt']; ?></td>
                    <td><?php echo $res['DatePubArt']; ?></td>
                    <td><?php echo $res['AuteurArt']; ?></td>
                    <td>
                        <button class="btn btn-primary"><a
                                href="modifierBlog.php?modifierid=<?php echo $res['IDart']; ?>">modifier</a></button>
                        <button class="btn btn-danger"><a
                                href="supprimerBlog.php?supprimer=<?php echo $res['IDart']; ?>">supprimer</a></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    $total_pages = $c->countBlogPages();
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
    ?>
</body>

</html>
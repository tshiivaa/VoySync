<?php
include '../Controller/DepenseC.php';

if (isset($_GET['location'])) {
  $location = $_GET['location'];
   $depenseC = new DepenseC();
  $listeDepense = $depenseC->listExpensesByLocationLike($location);
  echo '<div class="addandtitle">';
  echo  '<h2 style="padding: 10px;">Liste des dépenses</h2>';
  echo  '<button id="addExpenseBtn" class="add-btn">Ajouter</button>';
  echo '</div>';
  // Output the fetched data
  foreach ($listeDepense as $dep) {
    // Output the HTML for each expense item
    echo '<div class="expense-item">';
    echo '<div class="name">';
    echo '<h4>' . $dep['Nom'] . '</h4>';
    echo '<p>' . date('M d, Y', strtotime($dep['Date'])) . '</p>';
    echo '</div>';
    echo '<div class="details">';
    echo '<p>Montant: <span class="amount">' . $dep['Montant'] . '</span> <span class="currency">' . $dep['Currency'] . '</span></p>';
    echo '<p>Catégorie: <span class="category">' . $dep['Categorie'] . '</span></p>';
    echo '<p>Lieu: <span class="location">' . $dep['Lieu'] . '</span></p>';
    echo '<p>ID: <span>' . $dep['IDdep'] . '</span></p>';
    echo '</div>';
    echo '<div class="actions">';
    echo '<button type="submit" class="modifier-btn">Modifier</button>';
    echo '<input type="hidden" name="id" value="' . $dep['IDdep'] . '">';
    echo '<a class="delete-btn" href="deleteD.php?id=' . $dep['IDdep'] . '">Supprimer</a>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo 'Error: No location provided.';
}

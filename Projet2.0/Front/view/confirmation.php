<?php
require_once '../controller/ReservationC.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationC = new ReservationController();
    $reservationC->createReservation(); // Assurez-vous que cela fonctionne correctement
    echo "Réservation réussie!";
} else {
    echo "Erreur: Méthode de soumission invalide.";
}
?>
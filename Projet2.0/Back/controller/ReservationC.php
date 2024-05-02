<?php
include_once '../model/Reservation.php';

class ReservationController {
    private $model;

    public function __construct() {
        $this->model = new Reservation();
    }

    public function getReservationData() {
        $commonDestinations = $this->model->getCommonDestinations();
        $commonDates = $this->model->getCommonDates();
        $guestCapacity = $this->model->getGuestCapacity();

        return [
            'destinations' => $commonDestinations,
            'dates' => $commonDates,
            'max_guests' => $guestCapacity
        ];
    }

    public function createReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['Name'];
            $telephone = $_POST['Number'];
            $guests = $_POST['Guests'];
            $date_reservation = $_POST['date_reservation'];
            $destination = $_POST['Destination'];
            $logement_id = $_POST['logement_id']; 
            $vol_id = $_POST['vol_id']; 
            
            // Valider les données
            if (empty($nom) || empty($telephone) || empty($date_reservation) || empty($destination)) {
                die('Tous les champs sont obligatoires.');
            }

            // Valider le nombre de personnes
            if ($guests > $this->model->getGuestCapacity()) {
                die('Nombre de personnes dépasse la capacité maximale.');
            }

            // Utiliser le modèle pour créer une réservation
            try {
                $this->model->createReservation([
                    'nom' => $nom,
                    'telephone' => $telephone,
                    'guests' => $guests,
                    'date_reservation' => $date_reservation,
                    'destination' => $destination,
                    'logement_id' => $logement_id,
                    'vol_id' => vol_id
                ]);

                header('reservation.php'); // Redirection vers une page de succès
            } catch (Exception $e) {
                echo 'Erreur lors de la réservation: ' . $e->getMessage();
            }
        }
    }
}

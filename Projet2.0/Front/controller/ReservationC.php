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
            echo "Form submitted.";
            // Assurez-vous que les clés attendues sont définies
            $nom = isset($_POST['Name']) ? $_POST['Name'] : null;
            $telephone = isset($_POST['Number']) ? $_POST['Number'] : null;
            $guests = isset($_POST['Guests']) ? $_POST['Guests'] : null;
            $date_reservation = isset($_POST['date_reservation']) ? $_POST['date_reservation'] : null;
            $destination = isset($_POST['Destination']) ? $_POST['Destination'] : null;
            $logement_id = isset($_POST['logement_id']) ? $_POST['logement_id'] : null;
            $vol_id = isset($_POST['vol_id']) ? $_POST['vol_id'] : null;
            $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
            
            var_dump($vol_id, $logement_id, $date_reservation, $destination, $guests, $telephone);            
            // Valider les données
            if ( empty($telephone) || empty($date_reservation) || empty($destination) || empty($vol_id)) {
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
                    'vol_id' => $vol_id,
                    'mail' => $mail
                ]);
            
                echo "Réservation créée avec succès !";
                // Redirection
                header("Location: ListLogementFrontTries.php.php");
                
                exit();
            
            } catch (Exception $e) {
                echo 'Erreur lors de la réservation: ' . $e->getMessage();
            }
            
            
        }
    }
    public function createReservationLog() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            echo "Form submitted.";
            // Assurez-vous que les clés attendues sont définies
            $nom = isset($_POST['Name']) ? $_POST['Name'] : null;
            $telephone = isset($_POST['Number']) ? $_POST['Number'] : null;
            $guests = isset($_POST['Guests']) ? $_POST['Guests'] : null;
            $date_reservation = isset($_POST['date_reservation']) ? $_POST['date_reservation'] : null;
            $destination = isset($_POST['Destination']) ? $_POST['Destination'] : null;
            $logement_id = isset($_POST['logement_id']) ? $_POST['logement_id'] : null;
            $vol_id = isset($_POST['vol_id']) ? $_POST['vol_id'] : null;
            $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
            
            var_dump($vol_id, $logement_id, $date_reservation, $destination, $guests, $telephone);            
            // Valider les données
            if ( empty($telephone) || empty($date_reservation) || empty($destination) || empty($vol_id)) {
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
                    'vol_id' => $vol_id,
                    'mail' => $mail
                ]);

                
            
                echo "Réservation créée avec succès !";
                // Redirection
                 header("Location: indexf.html");
                
                exit();
            
            } catch (Exception $e) {
                echo 'Erreur lors de la réservation: ' . $e->getMessage();
            }
            
            
        }
    }
    
    public function createReservation2($data) {
        // Assurez-vous que tous les champs obligatoires sont présents
        $requiredFields = ['vol_id', 'logement_id', 'nom', 'telephone', 'date_reservation', 'destination', 'guests', 'mail'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                throw new Exception("Field '$field' is required.");
            }
        }
    
        try {
            $this->model->createReservation($data);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la réservation: " . $e->getMessage());
        }
    }
    
}

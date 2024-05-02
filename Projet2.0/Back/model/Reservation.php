<?php
include '../configPW.php';

class Reservation {
    private $db;

    public function __construct() {
        $this->db = config::getConnexion();
    }

    public function getCommonDestinations() {
        // Jointure pour obtenir les destinations communes
        $sql = "SELECT DISTINCT v.Arrive AS destination
                FROM vol v
                JOIN logement l ON l.IDvol = v.IDvol
                WHERE l.Disponibilite = 'disponible'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommonDates() {
        // Jointure pour obtenir les dates communes
        $sql = "SELECT DISTINCT v.DateDepart, v.DateArrive
                FROM vol v
                JOIN logement l ON l.IDvol = v.IDvol
                WHERE l.Disponibilite = 'disponible'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGuestCapacity() {
        // Obtenir la capacité maximale de tous les logements
        $sql = "SELECT MAX(Capacite) AS max_guests FROM logement";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC)['max_guests'];
    }

    public function createReservation($data) {
        // Utilisez une transaction pour assurer l'intégrité des données
        try {
            $this->db->beginTransaction();

            $sql = "INSERT INTO reservation (nom, telephone, guests, date_reservation, destination, logement_id, vol_id)
                    VALUES (:nom, :telephone, :guests, :date_reservation, :destination, :logement_id, :vol_id)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':nom', $data['nom']);
            $stmt->bindParam(':telephone', $data['telephone']);
            $stmt->bindParam(':guests', $data['guests']);
            $stmt->bindParam(':date_reservation', $data['date_reservation']);
            $stmt->bindParam(':destination', $data['destination']);
            $stmt->bindParam(':logement_id', $data['logement_id']);
            $stmt->bindParam(':vol_id', $data['vol_id']);

            $stmt->execute();

            $this->db->commit();

            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw new Exception('Erreur lors de la réservation: ' . $e->getMessage());
        }
    }
}

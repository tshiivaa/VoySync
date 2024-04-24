<?php
include_once '../Model/Transport.php';
include_once '../config.php';

class TransportController {
    
    // Méthode pour lister tous les transports
    public function listTransports() {
        $query = "SELECT * FROM transport";
        $pdo = config::getConnexion();
        try {
            $stmt = $pdo->query($query);
            $listTransports = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $transport = new Transport(
                    $row['id_transport'],
                    $row['type'],
                    $row['pays_depart'],
                    $row['pays_arrivee'],
                    $row['lieux_depart'],
                    $row['lieux_arrivee'],
                    $row['temps_depart'],
                    $row['temps_arrivee'],
                    $row['prix']
                );
                $listTransports[] = $transport;
            }
            return $listTransports;
        } catch(Exception $e) {
            die('erreur:' . $e->getMessage());
        }
    }

    // Méthode pour créer un nouveau transport
    public function createTransport($type, $pays_depart, $pays_arrivee, $lieux_depart, $lieux_arrivee, $temps_depart, $temps_arrivee, $prix) {
        $pdo = config::getConnexion();
        $query = "INSERT INTO transport (type, pays_depart, pays_arrivee, lieux_depart, lieux_arrivee, temps_depart, temps_arrivee, prix) VALUES (:type, :pays_depart, :pays_arrivee, :lieux_depart, :lieux_arrivee, :temps_depart, :temps_arrivee, :prix)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':pays_depart', $pays_depart);
        $stmt->bindParam(':pays_arrivee', $pays_arrivee);
        $stmt->bindParam(':lieux_depart', $lieux_depart);
        $stmt->bindParam(':lieux_arrivee', $lieux_arrivee);
        $stmt->bindParam(':temps_depart', $temps_depart);
        $stmt->bindParam(':temps_arrivee', $temps_arrivee);
        $stmt->bindParam(':prix', $prix);
        $stmt->execute();
    }

    // Méthode pour mettre à jour un transport existant
    public function updateTransport($id_transport, $type, $pays_depart, $pays_arrivee, $lieux_depart, $lieux_arrivee, $temps_depart, $temps_arrivee, $prix) {
        $pdo = config::getConnexion();
        $query = "UPDATE transport SET type = :type, pays_depart = :pays_depart, pays_arrivee = :pays_arrivee, lieux_depart = :lieux_depart, lieux_arrivee = :lieux_arrivee, temps_depart = :temps_depart, temps_arrivee = :temps_arrivee, prix = :prix WHERE id_transport = :id_transport";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':pays_depart', $pays_depart);
        $stmt->bindParam(':pays_arrivee', $pays_arrivee);
        $stmt->bindParam(':lieux_depart', $lieux_depart);
        $stmt->bindParam(':lieux_arrivee', $lieux_arrivee);
        $stmt->bindParam(':temps_depart', $temps_depart);
        $stmt->bindParam(':temps_arrivee', $temps_arrivee);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':id_transport', $id_transport);
        $stmt->execute();
    }

    // Méthode pour supprimer un transport
    public function deleteTransport($id_transport) {
        $pdo = config::getConnexion();
        $query = "DELETE FROM transport WHERE id_transport = :id_transport";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_transport', $id_transport);
        $stmt->execute();
    }
}
?>

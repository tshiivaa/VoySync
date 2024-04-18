<?php
include_once '../Model/Hotel.php';
include_once '../config.php';

class HotelController {
    public function listHotels() {
        $query = "SELECT * FROM hotel";
        $pdo = config::getConnexion();
        try {
            $list = $pdo->query($query);
            return $list;
        } catch(Exception $e) {
            die('erreur:' . $e->getMessage());
        }
    }
}
?>

<?php
class Hotel {
    private $id_hotel;
    private $nom;
    private $adresse;
    private $description;
    private $prix;
    private $nbr_etoiles;
    private $id_destination;

    public function __construct($id_hotel, $nom, $adresse, $description, $prix, $nbr_etoiles, $id_destination) {
        $this->id_hotel = $id_hotel;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->description = $description;
        $this->prix = $prix;
        $this->nbr_etoiles = $nbr_etoiles;
        $this->id_destination = $id_destination;
    }

    public function getIdHotel() {
        return $this->id_hotel;
    }

    public function setIdHotel($id_hotel) {
        $this->id_hotel = $id_hotel;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function getNbrEtoiles() {
        return $this->nbr_etoiles;
    }

    public function setNbrEtoiles($nbr_etoiles) {
        $this->nbr_etoiles = $nbr_etoiles;
    }

    public function getIdDestination() {
        return $this->id_destination;
    }

    public function setIdDestination($id_destination) {
        $this->id_destination = $id_destination;
    }
}
?>

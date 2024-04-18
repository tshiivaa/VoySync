<?php
class Destination {
    private $id_destination;
    private $nom;
    private $description;
    private $pays;

    public function __construct($id_destination, $nom, $description, $pays) {
        $this->id_destination = $id_destination;
        $this->nom = $nom;
        $this->description = $description;
        $this->pays = $pays;
    }

    public function getIdDestination() {
        return $this->id_destination;
    }

    public function setIdDestination($id_destination) {
        $this->id_destination = $id_destination;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }
}
?>

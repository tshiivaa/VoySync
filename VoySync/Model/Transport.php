<?php
class Transport {
    private $id_transport;
    private $type;
    private $pays_depart;
    private $pays_arrivee;
    private $lieux_depart;
    private $lieux_arrivee;
    private $temps_depart;
    private $temps_arrivee;
    private $prix;

    public function __construct($id_transport, $type, $pays_depart, $pays_arrivee, $lieux_depart, $lieux_arrivee, $temps_depart, $temps_arrivee, $prix) {
        $this->id_transport = $id_transport;
        $this->type = $type;
        $this->pays_depart = $pays_depart;
        $this->pays_arrivee = $pays_arrivee;
        $this->lieux_depart = $lieux_depart;
        $this->lieux_arrivee = $lieux_arrivee;
        $this->temps_depart = $temps_depart;
        $this->temps_arrivee = $temps_arrivee;
        $this->prix = $prix;
    }

    public function getIdTransport() {
        return $this->id_transport;
    }

    public function setIdTransport($id_transport) {
        $this->id_transport = $id_transport;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getPaysDepart() {
        return $this->pays_depart;
    }

    public function setPaysDepart($pays_depart) {
        $this->pays_depart = $pays_depart;
    }

    public function getPaysArrivee() {
        return $this->pays_arrivee;
    }

    public function setPaysArrivee($pays_arrivee) {
        $this->pays_arrivee = $pays_arrivee;
    }

    public function getLieuxDepart() {
        return $this->lieux_depart;
    }

    public function setLieuxDepart($lieux_depart) {
        $this->lieux_depart = $lieux_depart;
    }

    public function getLieuxArrivee() {
        return $this->lieux_arrivee;
    }

    public function setLieuxArrivee($lieux_arrivee) {
        $this->lieux_arrivee = $lieux_arrivee;
    }

    public function getTempsDepart() {
        return $this->temps_depart;
    }

    public function setTempsDepart($temps_depart) {
        $this->temps_depart = $temps_depart;
    }

    public function getTempsArrivee() {
        return $this->temps_arrivee;
    }

    public function setTempsArrivee($temps_arrivee) {
        $this->temps_arrivee = $temps_arrivee;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }
}
?>

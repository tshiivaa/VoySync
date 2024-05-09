<?php
class Vol {
    private $id_vol;
    private $compagnie;
    private $num_vol;
    private $depart;
    private $arrive;
    private $date_depart;
    private $date_arrive;
    private $duree_offre;
    private $prix;
    private $classe;
    private $evaluation;

    public function __construct($id_vol, $compagnie, $num_vol, $depart, $arrive, $date_depart, $date_arrive, $duree_offre, $prix, $classe, $evaluation = null) {
        $this->id_vol = $id_vol;
        $this->compagnie = $compagnie;
        $this->num_vol = $num_vol;
        $this->depart = $depart;
        $this->arrive = $arrive;
        $this->date_depart = $date_depart;
        $this->date_arrive = $date_arrive;
        $this->duree_offre = $duree_offre;
        $this->prix = $prix;
        $this->classe = $classe;
        $this->evaluation = $evaluation;
    }

    // Getters and Setters
    public function getIdVol() {
        return $this->id_vol;
    }

    public function setIdVol($id_vol) {
        $this->id_vol = $id_vol;
    }

    public function getCompagnie() {
        return $this->compagnie;
    }

    public function setCompagnie($compagnie) {
        $this->compagnie = $compagnie;
    }

    public function getNumVol() {
        return $this->num_vol;
    }

    public function setNumVol($num_vol) {
        $this->num_vol = $num_vol;
    }

    public function getDepart() {
        return $this->depart;
    }

    public function setDepart($depart) {
        $this->depart = $depart;
    }

    public function getArrive() {
        return $this->arrive;
    }

    public function setArrive($arrive) {
        $this->arrive = $arrive;
    }

    public function getDateDepart() {
        return $this->date_depart;
    }

    public function setDateDepart($date_depart) {
        $this->date_depart = $date_depart;
    }

    public function getDateArrive() {
        return $this->date_arrive;
    }

    public function setDateArrive($date_arrive) {
        $this->date_arrive = $date_arrive;
    }

    public function getDureeOffre() {
        return $this->duree_offre;
    }

    public function setDureeOffre($duree_offre) {
        $this->duree_offre = $duree_offre;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function getClasse() {
        return $this->classe;
    }

    public function setClasse($classe) {
        $this->classe = $classe;
    }

    public function getEvaluation() {
        return $this->evaluation;
    }

    public function setEvaluation($evaluation) {
        $this->evaluation = $evaluation;
    }
}
?>
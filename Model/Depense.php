<?php
class Depense {
    private $IDdep;
    private $Categorie;
    private $Currency;
    private $Lieu;
    private $Date;
    private $Montant;
    private $Nom;
    private $user_id; // Foreign key

    public function __construct($IDdep, $Montant, $Categorie, $Date, $Currency, $Lieu, $Nom, $user_id) {
        $this->setIDdep($IDdep);
        $this->setCategorie($Categorie);
        $this->setCurrency($Currency);
        $this->setLieu($Lieu);
        $this->setDate($Date);
        $this->setMontant($Montant);
        $this->setNom($Nom);
        $this->setUserID($user_id);
    }

    // Getters and setters for user_id
    public function getUserID() {
        return $this->user_id;
    }

    public function setUserID($user_id) {
        $this->user_id = $user_id;
    }

    public function getIDdep() {
        return $this->IDdep;
    }

    public function setIDdep($IDdep) {
        $this->IDdep = $IDdep;
    }

    public function getCategorie() {
        return $this->Categorie;
    }

    public function setCategorie($Categorie) {
        $this->Categorie = $Categorie;
    }

    public function getCurrency() {
        return $this->Currency;
    }

    public function setCurrency($Currency) {
        $this->Currency = $Currency;
    }

    public function getLieu() {
        return $this->Lieu;
    }

    public function setLieu($Lieu) {
        $this->Lieu = $Lieu;
    }

    public function getDate() {
        return $this->Date;
    }

    public function setDate($Date) {
        $this->Date = $Date;
    }

    public function getMontant() {
        return $this->Montant;
    }

    public function setMontant($Montant) {
        $this->Montant = $Montant;
    }

    public function getNom() {
        return $this->Nom;
    }

    public function setNom($Nom) {
        $this->Nom = $Nom;
    }
} 
?>

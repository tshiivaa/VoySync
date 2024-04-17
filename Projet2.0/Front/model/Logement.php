<?php
class Logement
{
    private $IDlogement;
    private $Nom;
    private $Type;
    private $Adresse;
    private $Prix;
    private $Description;
    private $Capacite;
    private $Evaluation;
    private $Disponibilite;

    function getIDlogement()
    {
        return $this->IDlogement;
    }

    function getNom()
    {
        return $this->Nom;
    }

    function getType()
    {
        return $this->Type;
    }

    function getAdresse()
    {
        return $this->Adresse;
    }

    function getPrix()
    {
        return $this->Prix;
    }

    function getDescription()
    {
        return $this->Description;
    }

    function getCapacite()
    {
        return $this->Capacite;
    }

    function getEvaluation()
    {
        return $this->Evaluation;
    }

    function getDisponibilite()
    {
        return $this->Disponibilite;
    }

    function setIDlogement($IDlogement)
    {
        $this->IDlogement = $IDlogement;
    }

    function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    function setType($Type)
    {
        $this->Type = $Type;
    }

    function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;
    }

    function setPrix($Prix)
    {
        $this->Prix = $Prix;
    }

    function setDescription($Description)
    {
        $this->Description = $Description;
    }

    function setCapacite($Capacite)
    {
        $this->Capacite = $Capacite;
    }

    function setEvaluation($Evaluation)
    {
        $this->Evaluation = $Evaluation;
    }

    function setDisponibilite($Disponibilite)
    {
        $this->Disponibilite = $Disponibilite;
    }

    function __construct($IDlogement, $Nom, $Type, $Adresse, $Prix, $Description, $Capacite, $Evaluation, $Disponibilite)
    {
        $this->IDlogement = $IDlogement;
        $this->Nom = $Nom;
        $this->Type = $Type;
        $this->Adresse = $Adresse;
        $this->Prix = $Prix;
        $this->Description = $Description;
        $this->Capacite = $Capacite;
        $this->Evaluation = $Evaluation;
        $this->Disponibilite = $Disponibilite;
    }
}
?>

<?php
class Vol
{
    private $IDvol;
    private $Compagnie;
    private $Num_vol;
    private $Depart;
    private $Arrive;
    private $DateDepart;
    private $DateArrive;
    private $DureeOffre;
    private $Prix;
    private $Classe;
    private $Evaluation;
    private $File;

    function getIDvol()
    {
        return $this->IDvol;
    }

    function getCompagnie()
    {
        return $this->Compagnie;
    }

    function getNum_vol()
    {
        return $this->Num_vol;
    }

    function getDepart()
    {
        return $this->Depart;
    }

    function getArrive()
    {
        return $this->Arrive;
    }

    function getDateDepart()
    {
        return $this->DateDepart;
    }

    function getDateArrive()
    {
        return $this->DateArrive;
    }

    function getDureeOffre()
    {
        return $this->DureeOffre;
    }

    function getPrix()
    {
        return $this->Prix;
    }

    function getClasse()
    {
        return $this->Classe;
    }

    function getEvaluation()
    {
        return $this->Evaluation;
    }

    function setIDvol($IDvol)
    {
        $this->IDvol = $IDvol;
    }

    function setCompagnie($Compagnie)
    {
        $this->Compagnie = $Compagnie;
    }

    function setNum_vol($Num_vol)
    {
        $this->Num_vol = $Num_vol;
    }

    function setDepart($Depart)
    {
        $this->Depart = $Depart;
    }

    function setArrive($Arrive)
    {
        $this->Arrive = $Arrive;
    }

    function setDateDepart($DateDepart)
    {
        $this->DateDepart = $DateDepart;
    }

    function setDateArrive($DateArrive)
    {
        $this->DateArrive = $DateArrive;
    }

    function setDureeOffre($DureeOffre)
    {
        $this->DureeOffre = $DureeOffre;
    }

    function setPrix($Prix)
    {
        $this->Prix = $Prix;
    }

    function setClasse($Classe)
    {
        $this->Classe = $Classe;
    }

    function setEvaluation($Evaluation)
    {
        $this->Evaluation = $Evaluation;
    }

    function getFile()
    {
        return $this->File;
    }

    // Méthode pour définir le nom du fichier de l'image
    function setFile($File)
    {
        $this->File = $File;
    }
    function __construct($Compagnie, $Num_vol, $Depart, $Arrive, $DateDepart, $DateArrive, $DureeOffre, $Prix, $Classe, $Evaluation, $File)
    {
        $this->Compagnie = $Compagnie;
        $this->Num_vol = $Num_vol;
        $this->Depart = $Depart;
        $this->Arrive = $Arrive;
        $this->DateDepart = $DateDepart;
        $this->DateArrive = $DateArrive;
        $this->DureeOffre = $DureeOffre;
        $this->Prix = $Prix;
        $this->Classe = $Classe;
        $this->Evaluation = $Evaluation;
        $this->File = $File;
    }

}
?>

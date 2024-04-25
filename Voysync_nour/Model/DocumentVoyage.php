<?php 
class DocumentVoyage {
    private $NumSerie;
    private $Type;
    private $Nom;
    private $DateExp;
    private $LieuSto;
    private $Photodoc;

    public function __construct($NumSerie, $Type, $Nom, $DateExp, $LieuSto, $Photodoc) {
        $this->setNumSerie($NumSerie);
        $this->setType($Type);
        $this->setNom($Nom);
        $this->setDateExp($DateExp);
        $this->setLieuSto($LieuSto);
        $this->setPhotodoc($Photodoc);
    }

    public function getNumSerie() {
        return $this->NumSerie;
    }

    public function setNumSerie($NumSerie) {
        $this->NumSerie = $NumSerie;
    }

    public function getType() {
        return $this->Type;
    }

    public function setType($Type) {
        $this->Type = $Type;
    }

    public function getNom() {
        return $this->Nom;
    }

    public function setNom($Nom) {
        $this->Nom = $Nom;
    }

    public function getDateExp() {
        return $this->DateExp;
    }

    public function setDateExp($DateExp) {
        $this->DateExp = $DateExp;
    }

    public function getLieuSto() {
        return $this->LieuSto;
    }

    public function setLieuSto($LieuSto) {
        $this->LieuSto = $LieuSto;
    }

    public function getPhotodoc() {
        return $this->Photodoc;
    }

    public function setPhotodoc($Photodoc) {
        $this->Photodoc = $Photodoc;
    }
}

?>

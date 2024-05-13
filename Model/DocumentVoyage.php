<?php 
class DocumentVoyage {
    private $NumSerie;
    private $Type;
    private $DateExp;
    private $LieuSto;
    private $Photodoc;
    private $user_id; // Adding user_id attribute

    public function __construct($NumSerie, $Type, $DateExp, $LieuSto, $Photodoc, $user_id) {
        $this->setNumSerie($NumSerie);
        $this->setType($Type);
        $this->setDateExp($DateExp);
        $this->setLieuSto($LieuSto);
        $this->setPhotodoc($Photodoc);
        $this->setUserID($user_id); // Set user_id during object creation
    }

    // Getter and setter for user_id
    public function getUserID() {
        return $this->user_id;
    }

    public function setUserID($user_id) {
        $this->user_id = $user_id;
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

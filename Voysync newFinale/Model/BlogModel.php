<?php
class Blog
{
    private ?int $IDart = null;
    private string $TitreArt;
    private string $ContenuArt;
    private string $DatePubArt = "";
    private string $AuteurArt;
    private ?string $img = null;
    private string $etat = "en attente";
    private int $note;

    public function __construct(string $TitreArt, string $ContenuArt, string $AuteurArt, string $img)
    {
        $this->IDart = null;
        $this->TitreArt = $TitreArt;
        $this->ContenuArt = $ContenuArt;
        $this->DatePubArt = "";
        $this->AuteurArt = $AuteurArt;
        $this->img = $img;
    }

    public function getIDart()
    {
        return $this->IDart;
    }

    public function getTitreArt()
    {
        return $this->TitreArt;
    }

    public function setTitreArt($TitreArt)
    {
        return $this->TitreArt = $TitreArt;
    }

    public function getContenuArt()
    {
        return $this->ContenuArt;
    }

    public function setContenuArt($ContenuArt)
    {
        return $this->ContenuArt = $ContenuArt;
    }

    public function getDatePubArt()
    {
        return $this->DatePubArt;
    }

    public function setDatePubArt($DatePubArt)
    {
        return $this->DatePubArt = $DatePubArt;
    }

    public function getAuteurArt()
    {
        return $this->AuteurArt;
    }

    public function setAuteurArt($AuteurArt)
    {
        return $this->AuteurArt = $AuteurArt;
    }

    public function getImage()
    {
        return $this->img;
    }

    public function setImage($img)
    {
        return $this->img = $img;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function setEtat($etat)
    {
        return $this->etat = $etat;
    }
    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        return $this->note = $note;
    }

}
class Comment
{
    private ?int $IDcomm = null;
    private string $ContenuComm;
    private int $IDart;


    public function __construct(string $ContenuComm, int $IDart)
    {
        $this->IDcomm = null;
        $this->ContenuComm = $ContenuComm;
        $this->IDart = $IDart;
    }

    public function getIDcomm()
    {
        return $this->IDcomm;
    }

    public function getContenuComm()
    {
        return $this->ContenuComm;
    }

    public function setContenuComm($ContenuComm)
    {
        return $this->ContenuComm = $ContenuComm;
    }
    public function getIDart()
    {
        return $this->IDart;
    }

    public function setIDart($IDart)
    {
        return $this->IDart = $IDart;
    }


}
class notation
{
    private ?int $IDnot = null;
    private int $rating;
    private int $IDart;


    public function __construct(int $rating, int $IDart)
    {
        $this->IDnot = null;
        $this->rating = $rating;
        $this->IDart = $IDart;
    }

    public function getIDnot()
    {
        return $this->IDnot;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        return $this->rating = $rating;
    }
    public function getIDart()
    {
        return $this->IDart;
    }

    public function setIDart($IDart)
    {
        return $this->IDart = $IDart;
    }


}
?>
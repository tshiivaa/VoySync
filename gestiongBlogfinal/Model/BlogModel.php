<?php
class Blog
{
    private ?int $IDart = null;
    private string $TitreArt;
    private string $ContenuArt;
    private string $DatePubArt = "";
    private string $AuteurArt;
    private ?string $img = null; // Added attribute

    public function __construct(string $TitreArt, string $ContenuArt, string $AuteurArt, string $img) // Updated constructor
    {
        $this->IDart = null;
        $this->TitreArt = $TitreArt;
        $this->ContenuArt = $ContenuArt;
        $this->DatePubArt = "";
        $this->AuteurArt = $AuteurArt;
        $this->img = $img; // Set image attribute
    }

    // Getters and setters for existing attributes
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

    // Getter and setter for the 'image' attribute
    public function getImage()
    {
        return $this->img;
    }

    public function setImage($img)
    {
        return $this->img = $img;
    }
}
?>
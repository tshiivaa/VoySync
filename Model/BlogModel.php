<?php
class blog
{
    private ?int $IDart = null;
    private string $TitreArt;
    private string $ContenuArt;
    private string $DatePubArt = "";
    private string $AuteurArt;
    public function __construct(string $TitreArt, string $ContenuArt, string $AuteurArt)
    {
        $this->IDart = null;
        $this->TitreArt = $TitreArt;
        $this->ContenuArt = $ContenuArt;
        $this->DatePubArt = "";
        $this->AuteurArt = $AuteurArt;
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
}


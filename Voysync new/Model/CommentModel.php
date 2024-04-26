<?php
class Comment
{
    private ?int $IDcomm = null;
    private string $ContenuComm;
    private string $DatePubComm = "";
    private string $AuteurComm;
    private ?int $IDart = null;

    public function __construct(string $ContenuComm, string $AuteurComm, int $IDart)
    {
        $this->IDcomm = null;
        $this->ContenuComm = $ContenuComm;
        $this->DatePubComm = "";
        $this->AuteurComm = $AuteurComm;
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

    public function getDatePubComm()
    {
        return $this->DatePubComm;
    }

    public function setDatePubComm($DatePubComm)
    {
        return $this->DatePubComm = $DatePubComm;
    }

    public function getAuteurComm()
    {
        return $this->AuteurComm;
    }

    public function setAuteurComm($AuteurComm)
    {
        return $this->AuteurComm = $AuteurComm;
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
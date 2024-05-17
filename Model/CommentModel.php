<?php
class Commentaire
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
?>
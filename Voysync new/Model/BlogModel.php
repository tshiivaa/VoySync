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
    public function getComments($IDart)
    {
        // Connexion à la base de données
        $db = Configuration::getConnexion();

        try {
            // Préparation de la requête SQL pour récupérer les commentaires de l'article spécifié
            $sql = "SELECT * FROM commentaire WHERE IDart = :IDart";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':IDart', $IDart);
            $stmt->execute();

            // Récupération des résultats
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retourne les commentaires récupérés
            return $comments;
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur lors de la récupération des commentaires: " . $e->getMessage();
            return [];
        }
    }
    public function addComment($IDcomm, $ContenuComm, $DatePubComm, $AuteurComm, $IDart)
    {
        // Connexion à la base de données
        $db = Configuration::getConnexion();

        try {
            // Préparation de la requête SQL pour ajouter un nouveau commentaire
            $sql = "INSERT INTO commentaire (IDcomm, ContenuComm, DatePubComm, AuteurComm,IDart) 
                VALUES (:IDcomm, :ContenuComm, :DatePubComm, :AuteurComm, :IDart)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':IDcomm', $IDcomm);
            $stmt->bindParam(':ContenuComm', $ContenuComm);
            $stmt->bindParam(':DatePubComm', $DatePubComm);
            $stmt->bindParam(':AuteurComm', $AuteurComm);
            $stmt->bindParam(':IDart', $IDart);
            $stmt->execute();

            // Retourne vrai si l'insertion a réussi, sinon retourne faux
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur lors de l'ajout du commentaire: " . $e->getMessage();
            return false;
        }
    }

}
?>
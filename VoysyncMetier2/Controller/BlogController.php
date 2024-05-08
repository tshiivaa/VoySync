<?php
include "Configuration.php";
class BlogC
{
    public function listBlog()
    {
        $sql = "SELECT * FROM blog";
        $db = Configuration::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteBlog($IDart)
    {
        $sql = "DELETE FROM blog WHERE IDart = :IDart";
        $db = Configuration::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':IDart', $IDart);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addBlog($blog)
    {
        $sql = "INSERT INTO blog(IDart, TitreArt, ContenuArt, DatePubArt, AuteurArt, img, etat) VALUES (:IDart, :TitreArt, :ContenuArt, :DatePubArt, :AuteurArt, :img, :etat)";
        $db = Configuration::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IDart' => $blog->getIDart(),
                'TitreArt' => $blog->getTitreArt(),
                'ContenuArt' => $blog->getContenuArt(),
                'DatePubArt' => $blog->getDatePubArt(),
                'AuteurArt' => $blog->getAuteurArt(),
                'img' => $blog->getImage(),
                'etat' => $blog->getEtat(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showBlog($IDart)
    {
        $sql = "SELECT * from blog where IDart = $IDart";
        $db = Configuration::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $blog = $query->fetch();
            return $blog;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateBlog($blog, $IDart)
    {
        try {
            $db = Configuration::getConnexion();
            $query = $db->prepare(
                'UPDATE blog SET  
                TitreArt = :TitreArt, 
                ContenuArt = :ContenuArt,
                AuteurArt = :AuteurArt,
                img = :img,
                etat = :etat
            WHERE IDart = :IDart'
            );

            $query->execute([
                'IDart' => $IDart,
                'TitreArt' => $blog->getTitreArt(),
                'ContenuArt' => $blog->getContenuArt(),
                'AuteurArt' => $blog->getAuteurArt(),
                'img' => $blog->getImage(),
                'etat' => $blog->getEtat(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function publierArticle($IDart)
    {
        $db = Configuration::getConnexion();
        try {
            $sql = "UPDATE blog SET etat = 'verifie' WHERE IDart = :IDart";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':IDart', $IDart);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la publication de l'article : " . $e->getMessage();
            return false;
        }
    }
    public function countTotalBlogEntries()
    {
        $db = Configuration::getConnexion();
        $query = "SELECT COUNT(*) AS total FROM blog";
        $stmt = $db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function countBlogPages()
    {
        $totalEntries = $this->countTotalBlogEntries();
        $limit = 3;
        $totalPages = ceil($totalEntries / $limit);
        return $totalPages;
    }
}
class notationC
{
    public function calculateAverageRating($IDart)
    {
        $db = Configuration::getConnexion();
        try {
            $sql = "SELECT AVG(rating) AS averageRating FROM notation WHERE IDart = :IDart";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':IDart', $IDart);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['averageRating'];
        } catch (PDOException $e) {
            echo "Erreur lors de la publication de l'article : " . $e->getMessage();
        }
    }
}

class CommentaireC
{
    public function getCommentairesByArticleId($IDart)
    {
        $sql = "SELECT * FROM commentaire WHERE IDart = $IDart";
        $db = Configuration::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commentaires = $query->fetchAll(); // Utiliser fetchAll au lieu de fetch
            return $commentaires; // Retourner tous les commentaires
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function ajouterCommentaire($commentaire)
    {
        $sql = "INSERT INTO commentaire (IDcomm, ContenuComm,IDart) VALUES (:IDcomm, :ContenuComm,:IDart)";
        $db = Configuration::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IDcomm' => $commentaire->getIDcomm(),
                'ContenuComm' => $commentaire->getContenuComm(),
                'IDart' => $commentaire->getIDart(),
            ]);
            return $db->lastInsertId();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
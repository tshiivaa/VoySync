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
                'etat' => $blog->getEtat(), // Ajout de l'attribut 'etat'
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
                'etat' => $blog->getEtat(), // Mise à jour de l'attribut 'etat'
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
class CommentC
{


    public function addComment($ContenuComm, $AuteurComm, $IDart)
    {
        try {
            $Comment = new Comment($ContenuComm, $AuteurComm, $IDart);

            $db = Configuration::getConnexion();
            $sql = "INSERT INTO commentaire (ContenuComm, AuteurComm, IDart) VALUES (:ContenuComm, :AuteurComm, :IDart)";
            $query = $db->prepare($sql);
            $query->execute([
                "ContenuComm" => $Comment->getContenuComm(),
                "AuteurComm" => $Comment->getAuteurComm(),
                "IDart" => $Comment->getIDart()
            ]);
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    function deleteComment($IDComm)
    {
        $sql = "DELETE FROM commentaire WHERE IDComm = :IDComm";
        $db = Configuration::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':IDComm', $IDComm);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function updateComment($comment, $IDComm)
    {
        try {
            $db = Configuration::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire SET  
                ContenuComm = :ContenuComm,
                DatePubComm = :DatePubComm,
                AuteurComm = :AuteurComm
            WHERE IDComm = :IDComm'
            );

            $query->execute([
                'IDComm' => $IDComm,
                'ContenuComm' => $comment->getContenuComm(),
                'DatePubComm' => $comment->getDatePubComm(),
                'AuteurComm' => $comment->getAuteurComm(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showCommentsForArticle($IDart)
    {
        $sql = "SELECT * FROM commentaire WHERE IDart = :IDart";
        $db = Configuration::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':IDart', $IDart);
            $query->execute();
            $comments = $query->fetchAll();
            return $comments;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function countTotalCommentsForArticle($IDart)
    {
        $sql = "SELECT COUNT(*) AS total FROM commentaire WHERE IDart = :IDart";
        $db = Configuration::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':IDart', $IDart);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
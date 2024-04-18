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
        $sql = "INSERT INTO blog(IDart, TitreArt, ContenuArt, DatePubArt, AuteurArt, img) VALUES (:IDart, :TitreArt, :ContenuArt, :DatePubArt, :AuteurArt, :img)";
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
                img = :img
            WHERE IDart = :IDart'
            );

            $query->execute([
                'IDart' => $IDart,
                'TitreArt' => $blog->getTitreArt(),
                'ContenuArt' => $blog->getContenuArt(),
                'AuteurArt' => $blog->getAuteurArt(),
                'img' => $blog->getImage(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
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
        $limit = 3; // Pagination limit
        $totalPages = ceil($totalEntries / $limit);
        return $totalPages;
    }
}
?>
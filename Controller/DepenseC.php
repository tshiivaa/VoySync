<?php
include 'config.php';
include '../../Model/Depense.php';


class DepenseC
{
    public function listDepenses()
    {
        $sql = "SELECT * FROM `depense`;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return null;
        }
    }

    function deleteDepense($id)
    {
        $sql = "DELETE FROM `depense` WHERE IDdep = :Id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Id', $id);
    
        try {
            $req->execute();
            return true;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function addDepense($depense)
    {
        $sql = "INSERT INTO `depense` (`IDdep`, `Categorie`, `Currency`, `Lieu`, `Date`, `Montant`, `Nom`, `user_id`) 
                VALUES (NULL, :Categorie, :Currency, :Lieu, :Date, :Montant, :Nom, :user_id)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Categorie' => $depense->getCategorie(),
                'Currency' => $depense->getCurrency(),
                'Lieu' => $depense->getLieu(),
                'Date' => $depense->getDate(),
                'Montant' => $depense->getMontant(),
                'Nom' => $depense->getNom(),
                'user_id' => $depense->getUserID(), // Add the user_id parameter
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
     
    function updateDepense($depense, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE `depense` SET 
                    Categorie = :Categorie, 
                    Currency = :Currency, 
                    Lieu = :Lieu, 
                    Date = :Date, 
                    Montant = :Montant, 
                    Nom = :Nom
                WHERE IDdep = :Id'
            );
            $query->execute([
                'Categorie' => $depense->getCategorie(),
                'Currency' => $depense->getCurrency(),
                'Lieu' => $depense->getLieu(),
                'Date' => $depense->getDate(),
                'Montant' => $depense->getMontant(),
                'Nom' => $depense->getNom(),
                'Id' => $id // Add this line to bind the IDdep parameter
            ]);
            $rowCount = $query->rowCount();
            echo $rowCount . " records UPDATED successfully <br>";
            return $rowCount;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return -1;
        }
    }
    

    function showDepense($id)
    {
        $sql = "SELECT * FROM `depense` WHERE user_id = :user_id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['user_id' => $id]);
    
            // Fetch all rows (expenses) specific to the user
            $depenses = $query->fetchAll();
            return $depenses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
  // Function to retrieve a list of all unique locations
  public function listUniqueLocations()
  {
      $sql = "SELECT DISTINCT Lieu FROM depense";
      $db = config::getConnexion();
      try {
          $liste = $db->query($sql);
          return $liste->fetchAll(PDO::FETCH_COLUMN);
      } catch (Exception $e) {
          return null;
      }
  }

  // Function to retrieve a list of expenses where lieu = given location
  public function listExpensesByLocationLike($location)
  {
      $sql = "SELECT * FROM `depense` WHERE `Lieu` LIKE :location";
      $db = config::getConnexion();
      try {
          $query = $db->prepare($sql);
          $query->execute([':location' => '%' . $location . '%']);
          return $query->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
          return null;
      }
  }
 
  public function listDepensesByUserId($user_id)
{
    $sql = "SELECT * FROM `depense` WHERE user_id = :user_id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([':user_id' => $user_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return null;
    }
}

    public function TotalB() {
        $sql = "SELECT 
            SUM(CASE WHEN montant >= 0 THEN montant ELSE 0 END) AS total_positif,
            SUM(CASE WHEN montant < 0 THEN montant ELSE 0 END) AS total_negatif,
            SUM(montant) AS total_general
        FROM depense;";

        // Exécuter la requête SQL et retourner les résultats
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function TotalB_Lieu($lieu) {
        $sql = "SELECT 
            SUM(CASE WHEN montant >= 0 THEN montant ELSE 0 END) AS total_positif,
            SUM(CASE WHEN montant < 0 THEN montant ELSE 0 END) AS total_negatif,
            SUM(montant) AS total_general
        FROM depense
        WHERE Lieu = :lieu";

        // Exécuter la requête SQL avec le paramètre $lieu et retourner les résultats
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([':lieu' => $lieu]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }



}
?>

<?php 
include '../Controller/config.php';
include '../Model/Depense.php';

$depenseC = new DepenseC();
$transactions = $depenseC->listDepenses();

// Check if transactions data is available
if ($transactions !== null) {
    // Set the response header to JSON
  
    // Output the transactions data as JSON
    echo json_encode($transactions);
} else {
    // Return an empty array if no transactions are found
    echo json_encode([]);
}
class DepenseC
{
    public function listDepenses()
    {
        $sql = "SELECT * FROM `depense`;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            // Fetch all rows from the result set as an array
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            // Instead of terminating the script, return null or an empty array
            // You can handle the error in the calling code
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
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addDepense($depense)
    {
        $sql = "INSERT INTO `depense`
        VALUES (NULL, :IDdep, :Categorie, :Currency, :Lieu, :Date, :Montant, :Nom)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IDdep' => $depense->getIDdep(),
                'Categorie' => $depense->getCategorie(),
                'Currency' => $depense->getCurrency(),
                'Lieu' => $depense->getLieu(),
                'Date' => $depense->getDate(),
                'Montant' => $depense->getMontant(),
                'Nom' => $depense->getNom()
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
                    IDdep = :IDdep,
                    Categorie = :Categorie, 
                    Currency = :Currency, 
                    Lieu = :Lieu, 
                    Date = :Date, 
                    Montant = :Montant, 
                    Nom = :Nom
                WHERE IDdep = :Id'
            );
            $query->execute([
                'IDdep' => $depense->getIDdep(),
                'Id' => $id,
                'Categorie' => $depense->getCategorie(),
                'Currency' => $depense->getCurrency(),
                'Lieu' => $depense->getLieu(),
                'Date' => $depense->getDate(),
                'Montant' => $depense->getMontant(),
                'Nom' => $depense->getNom()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showDepense($id)
    {
        $sql = "SELECT * FROM `depense` WHERE IDdep = :Id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['Id' => $id]);

            $depense = $query->fetch();
            return $depense;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>

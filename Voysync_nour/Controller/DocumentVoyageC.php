<?php 
include "C:\wamp64\www\Voysync_nour\Model\DocumentVoyage.php";
include "C:\wamp64\www\Voysync_nour\Controller\DepenseC.php";
class DocumentVoyageC
{
    public function listDocumentVoyages()
    {
        $sql = "SELECT * FROM projetweb.documentvoyage";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteDocumentVoyage($NumSerie)
    {
        $sql = "DELETE FROM projetweb.documentvoyage WHERE NumSerie = :NumSerie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':NumSerie', $NumSerie);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addDocumentVoyage($documentvoyage)
    {
        $sql = "INSERT INTO projetweb.documentvoyage 
        VALUES (:NumSerie, :Type, :DateExp, :LieuSto, :Photodoc)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'NumSerie' => $documentvoyage->getNumSerie(),
                'Type' => $documentvoyage->getType(),
                'DateExp' => $documentvoyage->getDateExp(),
                'LieuSto' => $documentvoyage->getLieuSto(),
                'Photodoc' => $documentvoyage->getPhotodoc()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateDocumentVoyage($documentvoyage, $NumSerie)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE projetweb.documentvoyage SET 
                    Type = :Type, 
                    DateExp = :DateExp, 
                    LieuSto = :LieuSto, 
                    Photodoc = :Photodoc
                WHERE NumSerie = :NumSerie'
            );
            $query->execute([
                'Type' => $documentvoyage->getType(),
                'DateExp' => $documentvoyage->getDateExp(),
                'LieuSto' => $documentvoyage->getLieuSto(),
                'Photodoc' => $documentvoyage->getPhotodoc(),
                'NumSerie' => $NumSerie // Bind NumSerie parameter
            ]);
            $rowCount = $query->rowCount();
            echo $rowCount . " records UPDATED successfully <br>";
            return $rowCount;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return -1;
        }
    }
    


    function showDocumentVoyage($NumSerie)
    {
        $sql = "SELECT * FROM projetweb.documentvoyage WHERE NumSerie = :NumSerie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['NumSerie' => $NumSerie]);

            $documentvoyage = $query->fetch();
            return $documentvoyage;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function addDocumentVoyageWithDepense($documentvoyage, $depense)
    {
        $db = config::getConnexion();
        $db->beginTransaction(); // Start a transaction to ensure data integrity
        
        try {
            // Add the expense
            $depenseC = new DepenseC();
            $depenseC->addDepense($depense);
            
            // Get the ID of the last inserted expense
            $idDepense = $db->lastInsertId();
            
            // Associate the expense ID with the document voyage
            $sql = "INSERT INTO projetweb.documentvoyage (NumSerie, Type, DateExp, LieuSto, Photodoc, IDdep)
                    VALUES (:NumSerie, :Type, :DateExp, :LieuSto, :Photodoc, :IDdep)";
            $query = $db->prepare($sql);
            $query->execute([
                'NumSerie' => $documentvoyage->getNumSerie(),
                'Type' => $documentvoyage->getType(),
                'DateExp' => $documentvoyage->getDateExp(),
                'LieuSto' => $documentvoyage->getLieuSto(),
                'Photodoc' => $documentvoyage->getPhotodoc(),
                'IDdep' => $idDepense
            ]);
            
            $db->commit(); // Commit the transaction
        } catch (Exception $e) {
            $db->rollback(); // Rollback the transaction in case of error
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
?>

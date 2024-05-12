<?php 
include '../Controller/config.php';
include '../Model/DocumentVoyage.php';

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
        VALUES (:NumSerie, :Type, :Nom, :DateExp, :LieuSto, :Photodoc)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'NumSerie' => $documentvoyage->getNumSerie(),
                'Type' => $documentvoyage->getType(),
                'Nom' => $documentvoyage->getNom(),
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
                    Nom = :Nom, 
                    DateExp = :DateExp, 
                    LieuSto = :LieuSto, 
                    Photodoc = :Photodoc
                WHERE NumSerie = :NumSerie'
            );
            $query->execute([
                'NumSerie' => $NumSerie,
                'Type' => $documentvoyage->getType(),
                'Nom' => $documentvoyage->getNom(),
                'DateExp' => $documentvoyage->getDateExp(),
                'LieuSto' => $documentvoyage->getLieuSto(),
                'Photodoc' => $documentvoyage->getPhotodoc()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
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
}
?>

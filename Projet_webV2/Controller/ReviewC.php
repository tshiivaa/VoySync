<!--
private function getData($sqlQuery) {
    $stmt = $this->pdo->query($sqlQuery);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}	
private function getNumRows($sqlQuery) {
    $stmt = $this->pdo->query($sqlQuery);
    $numRows = $stmt->rowCount();
    return $numRows;
}   
public function getItemList(){
    $sqlQuery = "
        SELECT * FROM ".$this->itemTable;
    return  $this->getData($sqlQuery);    
}
public function getItem($itemId){
    $sqlQuery = "
        SELECT * FROM ".$this->itemTable."
        WHERE id='".$itemId."'";
    return  $this->getData($sqlQuery);    
}
public function getItemRating($id_m){
    $sqlQuery = "SELECT r.*, m.title
    FROM review r
    LEFT JOIN mission m ON r.id_m = m.id_m;";
    return  $this->getData($sqlQuery);        
}


public function getRatingAverage($id_m){
    $itemRating = $this->getItemRating($id_m);
    $ratingNumber = 0;
    $count = 0;		
    foreach($itemRating as $itemRatingDetails){
        $ratingNumber+= $itemRatingDetails['ratingNumber'];
        $count += 1;			
    }
    $average = 0;
    if($ratingNumber && $count) {
        $average = $ratingNumber/$count;
    }
    return $average;	
}
public function saveRating($POST, $id_m){      
    $insertRating = "INSERT INTO mission (itemId, userId, ratingNumber, title, comments, created, modified) 
                     VALUES ('".$POST['itemId']."', '".$userID."', '".$POST['rating']."', '".$POST['title']."', '".$POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
    $this->dbConnect->exec($insertRating);    
}
-->
<?php
require_once "../../config.php";

class ReviewC
{
    private $pdo;
    private $itemTable = 'item'; 
    private $itemRatingTable = 'item_rating';
   


    public function listReviewWithMission()
{
    $sql = "SELECT r.*, m.title
            FROM review r
            LEFT JOIN mission m ON r.id_m = m.id_m;";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

public function listReview()
    {
        $sql = "SELECT * FROM review;";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addReview($review)
{
    $sql = "INSERT INTO review (id_rev,description,rate,id_m)
            VALUES (:id_rev, :description, :rate, :id_m)";
            
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_rev' => $review->getIdRev(),
            'description' => $review->getDescription(),
            'rate'=> $review->getRate(),
            'id_m'=> $review->getIdM()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    
    function showReview($id_rev)
    {
        $sql = "SELECT * FROM `review` WHERE id_rev = :id_rev";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_rev' => $id_rev]);

            $mission = $query->fetch();
            return $mission;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
}
?>

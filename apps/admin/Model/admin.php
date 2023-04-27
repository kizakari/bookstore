<?php 
require_once('model.php');
class admin extends Model{
    
    public function getProductSingle($id) {
        $db = new Connection();
        $query = "SELECT * FROM product WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
}
?>
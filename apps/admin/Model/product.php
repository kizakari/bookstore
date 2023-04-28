<?php 
require_once('model.php');

class Product {
    public function getListAll() {
        $db = new Connection();
        $query = "SELECT * FROM book ";

        $result = $db->getList($query);
        return $result;
    }
}
?>

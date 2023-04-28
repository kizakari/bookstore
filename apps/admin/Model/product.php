<?php 
require_once('model.php');

class Product {
    public function getListAll() {
        $db = new Connection();
        $query = "SELECT * FROM product";

        $result = $db->getList($query);
        return $result;
    }
}
?>

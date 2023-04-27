<?php 
require_once('model.php');
    
class Detail extends Model {
    function detail_book($id)
    {
        $query =  "SELECT product.id, product_name, price, category_id , product_image, category_name 
        FROM product JOIN product_category  ON product.category_id = product_category.id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
}
?>
<?php 
require_once('model.php');
class Admin extends Model{
    
    public function getProductSingle($id) {
        $db = new Connection();
        $query = "SELECT * FROM product WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function getUserSingle($id) {
        $db = new Connection();
        $query = "SELECT * FROM site_user WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
    
    public function getAllUser() {
        $db = new Connection();
        $query = "SELECT * FROM site_user ";
        $result = $db->getList($query);
        return $result;
    }

    public function updateUser($id, $name, $email, $phone, $role) {
        $db = new Connection();
        $query = "UPDATE site_user SET name='$name', email='$email', phone_number='$phone', role=$role WHERE id = $id";
        $db->Exec($query);
    }

    public function createUser($data) {
        $db = new Connection();
        $query = "INSERT INTO site_user (name, email, phone_number, password, role)
        VALUE 
        ('" . $data['name'] ."', '" . $data['email'] ."', '" . $data['phone_number'] ."',  '" . $data['password'] ."', ". $data['role'].")";
        $db->Exec($query);
    }

    public function deleteUser($id) {
        $db = new Connection();
        $query = "DELETE FROM site_user WHERE id = $id";
        $db->Exec($query);
    }

    public function getAllCategory() {
        $db = new Connection();
        $query = "SELECT * FROM product_category ";
        $result = $db->getList($query);
        return $result;
    }

    public function getSingleCategory($id) {
        
        $query = "SELECT * FROM product_category WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function createCategory($data) {
        $db = new Connection();
        $query = "INSERT INTO product_category (category_name) VALUE ('" . $data['name'] ."')";
        $db->Exec($query);
    }

    public function updateCategory($id, $name) {
        $db = new Connection();
        $query = "UPDATE product_category SET
        category_name = '$name'
        WHERE id = $id;
        ";
        $db->Exec($query);
    }

    public function deleteCategory($id) {
        $db = new Connection();
        $query = "DELETE FROM product_category WHERE id = $id";
        $db->Exec($query);
    }

    public function updateProduct($id, $data) {
        $db = new Connection();
        $query = "UPDATE product SET 
        product_name = '" . $data['name'] . "',
        price = '" . $data['price'] . "',
        quantity = '" . $data['quantity'] . "',
        description = '" . $data['description'] . "'
        WHERE id = $id;
        ";
        $db->Exec($query);
    }

    public function createProduct($data) {
        $db = new Connection();
        $query = "INSERT INTO product (product_name, price, quantity, product_image, description)
        VALUE ( '" . $data['name'] ."', '" . $data['price'] ."', '" . $data['quantity'] ."', '" . $data['image'] ."', '" . $data['description'] ."')";
        $db->Exec($query);
    }

    public function deleteProduct($id) {
        $db = new Connection();
        $query = "DELETE FROM product WHERE id = $id";
        $db->Exec($query);
    }

}
?>
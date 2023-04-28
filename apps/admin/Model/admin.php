<?php 
require_once('model.php');
class Admin extends Model{
    
    public function getProductSingle($id) {
        $db = new Connection();
        $query = "SELECT * FROM book WHERE id = $id";
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
        $query = "SELECT * FROM book_category ";
        $result = $db->getList($query);
        return $result;
    }

    public function getSingleCategory($id) {
        
        $query = "SELECT * FROM book_category WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function createCategory($data) {
        $db = new Connection();
        $query = "INSERT INTO book_category (category_name) VALUE ('" . $data['name'] ."')";
        $db->Exec($query);
    }

    public function updateCategory($id, $name) {
        $db = new Connection();
        $query = "UPDATE book_category SET
        category_name = '$name'
        WHERE id = $id;
        ";
        $db->Exec($query);
    }

    public function deleteCategory($id) {
        $db = new Connection();
        $query = "DELETE FROM book_category WHERE id = $id";
        $db->Exec($query);
    }

    public function updateProduct($id, $data) {
        $db = new Connection();
        $query = "UPDATE book SET 
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
        $query = "INSERT INTO book (product_name, price, quantity, product_image, description)
        VALUE ( '" . $data['name'] ."', '" . $data['price'] ."', '" . $data['quantity'] ."', '" . $data['image'] ."', '" . $data['description'] ."')";
        $db->Exec($query);
    }

    public function deleteProduct($id) {
        $db = new Connection();
        $query = "DELETE FROM book WHERE id = $id";
        $db->Exec($query);
    }

    public function getAllOrder() {
        $db = new Connection();
        $query = "SELECT shop_order.*, site_user.name, site_user.email FROM shop_order, site_user WHERE shop_order.user_id = site_user.id ORDER by shop_order.id ASC";
        $result = $db->getList($query);
        return $result;
    }

    public function getSingleOrder($id) {
        $db = new Connection();
        $query = "SELECT * FROM shop_order WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function updateOrder($id, $userId, $date, $total, $status ) {
        $db = new Connection();
        $query = "UPDATE shop_order SET user_id = $userId, order_date = $date, order_total = $total, order_status = $status WHERE id = $id";
        $db->Exec($query);
    }

}
?>
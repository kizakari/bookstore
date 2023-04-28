<?php
class Account{
    public $name;
    public $email;
    public $password;
    public $id;
    public $phone;
    public $pdo;

    function __construct($pdo){
        $this->pdo = $pdo;
    }
    function isExist(){
        $stmt = $this->pdo->query("SELECT COUNT(1) FROM site_user WHERE email = '".$this->email."'");
        $result = $stmt->fetch();
        if ((int)$result['COUNT(1)'] == 1) {
            return 1;
        }
        else 
            return 0;
    }
    function save(){
        $sql = "INSERT INTO site_user (name, email, password) VALUES (?,?,?)";
        $stmt= $this->pdo->prepare($sql);
        try {
            $stmt->execute([$this->name, $this->email, $this->password]);
          }
          catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function isValidate(){
        $stmt = $this->pdo->query("SELECT COUNT(1) FROM site_user WHERE email = '".$this->email."' AND password = '".$this->password."'");
        $result = $stmt->fetch();
        if ((int)$result['COUNT(1)'] == 1) {
            return 1;
        }
        else 
            return 0;
        return true;
    }
    function getId(){
        $stmt = $this->pdo->query("SELECT * FROM site_user WHERE email = '".$this->email."' AND password = '".$this->password."'");
        $result = $stmt->fetch();
        return $result['id'];
    }

    function getImage(){
        $stmt = $this->pdo->query("SELECT image FROM site_user WHERE id = ".$this->id);
        $result = $stmt->fetch();
        return $result['image'];
    }

    function getPersonalInfo($user_id){
        #Get personal info
        $stmt = $this->pdo->query("SELECT * FROM site_user WHERE id = $user_id");
        $result = $stmt->fetch();
        $this->name = $result['name'];
        $this->email = $result['email'];
        $this->password = $result['password'];
        if(isset($result['phone_number'])){
            $this->phone = $result['phone_number'];
        }
        $this->id = $user_id;
    }
        #Get favList
    function getFavList(){
        $favList = array();
        $stmt = $this->pdo->query("SELECT * FROM book_category
        JOIN favourite_category
        ON book_category.id = favourite_category.category_id;");
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                array_push($favList,$row['id']);
            }
        }
        return $favList;
    }

    function updatePersonalInfo(){
        try{
            $sql = "UPDATE site_user 
                    SET name=?, 
                    email=?, 
                    phone_number=?,
                    password = ? 
                    WHERE id=?;";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute([$this->name, 
                            $this->email, 
                            $this->phone, 
                            $this->password,
                            $this->id]);
        }
        catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
            } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>".$e->getMessage();
        }
    }

    function updateFav($listFav){
        #Xoa het
        try{
            $sql = "DELETE FROM favourite_category WHERE user_id=?";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute([$this->id]);

            foreach($listFav as $cate){
                $sql = "INSERT INTO favourite_category (user_id, category_id) VALUES (?,?)";
                $stmt= $this->pdo->prepare($sql);
                $stmt->execute([$this->id, $cate]);
            }
        }
        catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
            } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>".$e->getMessage();
        }
        #Them het
    }

    function updateAddr($listAddr,$def){
        $i = 1;
        //Xoa o bang chung
        try{
            $sql = "DELETE FROM user_address WHERE user_id=?";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute([$this->id]);

            foreach($listAddr as $addr){
                $sql = "INSERT INTO user_address (user_id, address,is_default) VALUES (?,?,?)";
                $stmt= $this->pdo->prepare($sql);
                if($i == $def)
                    $stmt->execute([$this->id, $addr, 1]);
                else 
                    $stmt->execute([$this->id, $addr, 0]);
                $i=$i+1;
            }
        }
        catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
            } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>".$e->getMessage();
        }
    }

    function updateImage($link){
        try{
            $sql = "UPDATE site_user 
                    SET image=?
                    WHERE id=?;";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute([$link,$this->id]);
        }
        catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
            } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>".$e->getMessage();
        }
    }

    function getPaymentMethodList($user_id){
        return;
    }

    function getAddressList($user_id){
        return;
    }
}
?>
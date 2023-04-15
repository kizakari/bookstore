<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/model/connect.db.php';
class Account{
    private $name,$email,$password;
    function __construct($name,$email,$password){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    function getName(){
        return $this->name;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
}

class sign_upModelClass{
    function checkAccountExist($account){
        global $pdo;
        $stmt = $pdo->query("SELECT COUNT(1) FROM user WHERE email = '".$account->getEmail()."'");
        $result = $stmt->fetch();
        if ((int)$result['COUNT(1)'] == 1) {
            return 1;
        }
        else 
            return 0;
    }
    function addNewAccount($account){
        global $pdo;
        $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$account->getName(), $account->getEmail(), $account->getPassword()]);
    }
}

class sign_inModelClass{
    function validateAccount($email,$password){
        global $pdo;
        $stmt = $pdo->query("SELECT COUNT(1) FROM user WHERE email = '".$email."' AND password = '".$password."'");
        $result = $stmt->fetch();
        if ((int)$result['COUNT(1)'] == 1) {
            return 1;
        }
        else 
            return 0;
    }
}

$sign_upModel = new sign_upModelClass;
$sign_inModel = new sign_inModelClass;
?>
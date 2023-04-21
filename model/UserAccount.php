<?php
class Account{
    public $name,$email,$password,$id,$pdo;
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
}
?>
<?php
class News{
    public $id,$author,$date,$name,$content,$pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
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

    function getId(){
        $stmt = $this->pdo->query("SELECT * FROM site_user WHERE email = '".$this->email."' AND password = '".$this->password."'");
        $result = $stmt->fetch();
        return $result['id'];
    }

    function getPolicy(){
        $stmt = $this->pdo->query("SELECT * FROM news WHERE name = 'policy'");
        return $stmt;
    }
}
?>
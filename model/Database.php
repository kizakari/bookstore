<?php
class Database{
    private $host = 'localhost';
    private $db_name = 'BKStore';
    private $user_name = 'root';
    private $password = '';
    private $pdo;

    public function connect(){
        $this->pdo = NULL;
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user_name, $this->password);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }
          catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->pdo;
    }
}
?>
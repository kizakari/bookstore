<?php 
    class Connection{
        var $conn;
        function __construct()
        {
            
            $severname ="localhost"; 
            $username ="root";
            $password =""; 
            $db_name ="bkstore";
 
            
            $this->conn = new mysqli($severname,$username,$password,$db_name);
            $this->conn->set_charset("utf8");

            
            if ($this->conn->connect_error) {
		        die("Connection failed: " . $this->conn->connect_error);
		    }
        }

        public function getList($query) {
            $result = $this->conn->query($query);
            return $result;
        }

        public function Exec($query){
            $result = $this->conn->execute_query($query);
            return $result;
        }

    }
?>
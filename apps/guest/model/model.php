<?php 
    require_once('connection.php');
    
    class Model {
        var $conn;
        function __construct()
        {
            $conn_obj = new connection();
            $this->conn = $conn_obj->conn;
        }
    }
?>
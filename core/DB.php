<?php 
//Require config for $db config
require_once __DIR__.'/../config.php';

function connect(){
    global $db;
    try{
        $conn = new PDO("mysql:host={$db['host']};dbname=BookStore",
            $db['username'],$db['password']);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOExeption $exception){
        exit($exception->getMessage());
    }
}
?>
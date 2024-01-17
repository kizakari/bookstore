<?php 
header("Access-Control-Allow-Origin: *");

ini_set('display_error',1);
error_reporting(E_ALL);
try{
    require __DIR__."/../core/bootstrap.php";
}
catch(Exception $exception){
    echo json_encode($exception->getMessage());  
}
?>
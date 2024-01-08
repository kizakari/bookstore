<?php 
$http_origin = $_SERVER['HTTP_ORIGIN'];
if($http_origin == 'http://localhost' | $http_origin == 'http://127.0.0.1'){
    header("Access-Control-Allow-Origin: $http_origin");
}

ini_set('display_error',1);
error_reporting(E_ALL);
try{
    require __DIR__."/../core/bootstrap.php";
}
catch(Exception $exception){
    echo json_encode($exception->getMessage());  
}
?>
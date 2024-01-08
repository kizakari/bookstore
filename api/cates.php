<?php 
require_once __DIR__.'/../core/DB.php';
require_once __DIR__.'/../config.php';

$conn = connect();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    global $cateList;
    echo json_encode($cateList,JSON_UNESCAPED_UNICODE);
}
?>
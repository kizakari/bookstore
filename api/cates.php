<?php 
require_once __DIR__.'/../config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    global $cateList;
    echo json_encode($cateList,JSON_UNESCAPED_UNICODE);
}
?>
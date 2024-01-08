<?php 
$url = $_SERVER['REQUEST_URI'];
if(strpos($url,'api') !== false){
    require __DIR__.'/../api/index.php';
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Trang chủ</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
</head>
<body>
<?php 
require_once('./template/header.php');
?>
<div id='main'></div>
<?php
require_once('./template/footer.php');
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" 
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="/js/homepage.js"></script>
<script src="/js/header.js"></script>
</body>
</html>
<?php 
 }//For else at line 6
?>
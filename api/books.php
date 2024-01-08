<?php 
require_once __DIR__.'/../core/DB.php';

$conn = connect();


if(preg_match("/\/api\/books\?cate=(.+)&index=([0-9]+)&num=([0-9]+)/",$_SERVER['REQUEST_URI'],$matches) && 
$_SERVER['REQUEST_METHOD'] == 'GET'){
    $category = urldecode($matches[1]);
    $index = urldecode($matches[2]);
    $quantity = urldecode($matches[3]);
    $books = getSubListBooks($category,$index,$quantity,$conn);
    echo json_encode($books);
}
else{
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    echo json_encode(array("success" => false, "message" => "Some thing wrong, sorry!"));
    return;
}

function getSubListBooks(string $category,int $index,int $quantity, $conn){
    $statement = $conn->prepare("CALL getSubListBooks('$category',$index,$quantity)");
    $statement->execute();
    $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
    return $statement->fetchAll();
}

?>
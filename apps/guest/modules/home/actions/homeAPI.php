<?php    
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Book.php';

    $database = new Database();
    $db = $database->connect();

    $book = new Book($db);

    $result = $book->getAll();

    $num = $result->rowCount();
    if($num > 0){
        $row = $result->fetch();
        $p_item = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'author' => $row['author'],
            'content' => $row['content'],
            'date' => $row['created_date']
        );
        http_response_code("200");
        echo json_encode($p_item);
    }
    else{
        http_response_code("400");  
        echo json_encode(
            array('message'=>'No Product Found')
        );
    }
?>
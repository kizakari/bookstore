<?php    
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/News.php';

    $database = new Database();
    $db = $database->connect();

    $news = new News($db);

    $result = $news->getNewsList();

    $num = $result->rowCount();

    if($num > 0){
        $news_arr = array();
        while($row = $result->fetch()){
            $p_item = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'author' => $row['author'],
                'content' => $row['content'],
                'date' => $row['created_date'],
                'image' => $row['image']
            );
            array_push($news_arr,$p_item);
        }
        http_response_code("200");
        echo json_encode($news_arr);
    }
    else{
        http_response_code("400");  
        echo json_encode(
            array('message'=>'No Product Found')
        );
    }
?>
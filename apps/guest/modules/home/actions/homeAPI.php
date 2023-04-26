<?php    
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Book.php';

    $database = new Database();
    $db = $database->connect();

    $book = new Book($db);

    $cateList = $book->getCateList();

    $result = array();

    while($category = $cateList->fetch()['category_name']){
        $carousel = array('category' => $category);
        $carousel['data'] = array();
        $bookList = $book->getListBooks($category);
        if($bookList->rowCount() > 0){
            while($row = $bookList->fetch()){
                $book_product = array(
                    'id' => $row['id'],
                    'name' => $row['product_name'],
                    'price' => $row['price'],
                    'description' => $row['description'],
                    'image' => $row['product_image'],
                    'year' => $row['public_year']
                );
                array_push($carousel['data'],$book_product);
            }
        }
        else{
            http_response_code("200");  
            echo json_encode(
                array('message'=>'No Product Found')
            );
        }
        array_push($result,$carousel);
    }
    http_response_code("200");
    echo json_encode($result);
?>
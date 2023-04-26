<?php    
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Book.php';

    $database = new Database();
    $db = $database->connect();

    $book = new Book($db);

    if(!isset($_GET['id'])){

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
                        'image' => $row['product_image'],
                    );
                    array_push($carousel['data'],$book_product);
                }
            }
            else{
                http_response_code("400");  
                echo json_encode(
                    array('message'=>'No Product Found')
                );
            }
            array_push($result,$carousel);
        }
        http_response_code("200");
        echo json_encode($result);
    }
    else{
        $detail = $book->getDetail($_GET['id'])->fetch();

        $book = array(
            'name' => $detail['product_name'],
            'price' => $detail['price'],
            'image' => $detail['product_image'],
            'description' => $detail['description'],
            'publisher' => $detail['publisher'],
            'public_year' => $detail['public_year'],
            'num_page' => $detail['num_page'],
            'lang' => $detail['lang'],
            'type' => "Bìa cứng",
            'critic' => $detail['critic']
        );
        $author = array(
            'name' => $detail['name'],
            'about' => $detail['about']
        );

        $result = array(
            'book' => $book,
            'author' => $author
        );
        http_response_code("200");
        echo json_encode($result);
    }
?>
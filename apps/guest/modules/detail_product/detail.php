<?php 
    if(isset($_GET['id'])){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Database.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Book.php';

        $database = new Database();
        $db = $database->connect();

        $book = new Book($db);

        $detail = $book->getDetail($_GET['id'])->fetch();

        $book_product = array(
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

        
    }
?>

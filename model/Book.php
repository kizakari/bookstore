<?php
class Book{
    public $id;
    public $category;
    public $author;
    public $variation;
    public $name;
    public $price;
    public $description;
    public $image;
    public $public_year;
    public $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    function save(){
        //$sql = "INSERT INTO book (name, category_id,author_id,variation_id) VALUES (?,?,?)";
        $stmt= $this->pdo->prepare($sql);
        try {
            $stmt->execute([$this->name, $this->email, $this->password]);
          }
          catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function getListBooks($category){
        $stmt = $this->pdo->query("SELECT * FROM book 
        INNER JOIN book_category ON book.category_id = book_category.id;");
        return $stmt;
    }

    function getCateList(){
        $stmt = $this->pdo->query("SELECT * FROM book_category");
        return $stmt;
    }

    function getDetail($book_id){
        $stmt = $this->pdo->query("SELECT * FROM book 
        INNER JOIN author ON book.author_id = author.id
        WHERE book.id=".$book_id);
        return $stmt;
    }
}   
?>
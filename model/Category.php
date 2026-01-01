<?php 
class Category{
    public $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    function getListCategory(){
        $cateList = array();
        $stmt = $this->pdo->query("SELECT * FROM book_category;");
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                array_push($cateList,array('id' => $row['id'],
                                    'name'=>$row['category_name']));
            }
        }
        else{
            echo "oh no";
        }
        return $cateList;
    }
}
?>
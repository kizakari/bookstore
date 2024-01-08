<?php 
class BookBrief{
    public string $id;
    public string $name;
    public string $image;
    
    function __construct($id,$name,$image){
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
    }
}

class Book{
    
}
?>
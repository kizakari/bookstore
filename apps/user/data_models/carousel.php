<?php
class Carousel{
    public string $name;
    public array $listBook;
    function __construct($name,$listBook){
        $this->name = $name;
        $this->listBook = $listBook;
    }
};
?>
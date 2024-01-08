<?php 
require_once __DIR__ . "/../classes/Book.php";
require_once __DIR__ . "/../classes/Carousel.php";

$book1 = new BookBrief(
    "1",
    "Trăm năm cô đơn",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZml-oaPdbU7PkSfzGCeqfN5ycXNDrSlL9zIQ98zpFYHu0_spfE18udDdk_snSUrEKirg&usqp=CAU"
);
$book2 = new BookBrief(
    "2",
    "Vạn dặm dưới đáy biển",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWYNCTdZGK62Xbpam6HGOvzvSgMN9NdNp9I53Z7NK7j7ycFaK1Op7XUUpVQp2Jirq58Fo&usqp=CAU"
);
$book3 = new BookBrief(
    "3",
    "Con sò huyết",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-55k6TbE6-9xXJeRyOq6J7xlv5_DumvE8u5Faci2Ke66mJDtSri7I8UH6sj2MYwdTZVU&usqp=CAU"
);
$book4 = new BookBrief(
    "4",
    "Trăm năm cô đơn",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZml-oaPdbU7PkSfzGCeqfN5ycXNDrSlL9zIQ98zpFYHu0_spfE18udDdk_snSUrEKirg&usqp=CAU"
);
$book5 = new BookBrief(
    "5",
    "Vạn dặm dưới đáy biển",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWYNCTdZGK62Xbpam6HGOvzvSgMN9NdNp9I53Z7NK7j7ycFaK1Op7XUUpVQp2Jirq58Fo&usqp=CAU"
);
$book6 = new BookBrief(
    "6",
    "Con sò huyết",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-55k6TbE6-9xXJeRyOq6J7xlv5_DumvE8u5Faci2Ke66mJDtSri7I8UH6sj2MYwdTZVU&usqp=CAU"
);
$book7 = new BookBrief(
    "7",
    "Trăm năm cô đơn",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZml-oaPdbU7PkSfzGCeqfN5ycXNDrSlL9zIQ98zpFYHu0_spfE18udDdk_snSUrEKirg&usqp=CAU"
);
$book8 = new BookBrief(
    "8",
    "Vạn dặm dưới đáy biển",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWYNCTdZGK62Xbpam6HGOvzvSgMN9NdNp9I53Z7NK7j7ycFaK1Op7XUUpVQp2Jirq58Fo&usqp=CAU"
);
$book9 = new BookBrief(
    "9",
    "Con sò huyết",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-55k6TbE6-9xXJeRyOq6J7xlv5_DumvE8u5Faci2Ke66mJDtSri7I8UH6sj2MYwdTZVU&usqp=CAU"
);

$listBooks = array($book1,$book2,$book3,$book4,$book5,$book6,
                    $book7,$book8,$book9);

class CarouselModeler{
    public function carousel(string $name){
        global $listBooks;
        return new Carousel($name,$listBooks);
    }
    public function allCarousel(){
        global $listBooks;
        return array(new Carousel("Abcd",$listBooks)); 
    }
}
?>
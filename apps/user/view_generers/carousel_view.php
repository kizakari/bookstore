<?php 
require_once __DIR__ . "/InterfaceView.php";
require_once __DIR__ . "/../classes/Book.php";
require_once __DIR__ . "/../classes/Carousel.php";

function showItem(BookBrief $book){
    echo "
        <div class='carousel-item' id='".$book->id."'>
            <img src='".$book->image."' alt='".$book->name."'>
        </div>
        ";
}


function showCarousel(Carousel $carousel){
    $cate = $carousel->name;
    $list = $carousel->listBook;
    echo "
    <div class='carousel-wrapper'>
        <div class='carousel-header'>
                <span class='carousel-name'>$cate</span>
                <span class='carousel-viewAll'><a href='#'>Xem tất cả</a></span>
        </div>
        <div id='$cate' class='carousel'>
            <div class='carousel-inner'>
        ";

    foreach($list as $item){
        showItem($item)
    }
    echo "
            </div>
            <button class='carousel-control-prev' type='button' data-bs-target='#carouselExample' data-bs-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='visually-hidden'>Previous</span>
            </button>
            <button class='carousel-control-next' type='button' data-bs-target='#carouselExample' data-bs-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='visually-hidden'>Next</span>
            </button>
        </div>
    </div>
    ";
}
?>


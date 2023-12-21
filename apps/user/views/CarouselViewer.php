<?php 
include_once("InterfaceViewer.php");

class ItemViewer implements Viewer{
    function show($item){
        echo "
        <div class='carousel-item' id='".$item['id']."'>
            <img src='".$item['image']."' alt='".$item['name']."'>
        </div>
        ";
    }
}

class CarouselViewer implements Viewer{
    function show($data){
        $cate = $data['category'];
        $list = $data['listItem'];
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
            $itemViewer = new ItemViewer();
            $itemViewer->show($item);
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
}
class ListCarouselViewer implements Viewer{
    function show($data){
        foreach($data as $cate=>$list){
            $newCarousel = new CarouselViewer();
            $data = array("category"=>$cate, 
                        "listItem"=>$list);
            $newCarousel->show($data);
        }
    }
}
?>


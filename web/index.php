<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/carousel.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Trang chủ</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
</head>
<body>
    
<?php
include_once("./template/header.php");
require_once("../apps/user/views/CarouselViewer.php");
$book1 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZml-oaPdbU7PkSfzGCeqfN5ycXNDrSlL9zIQ98zpFYHu0_spfE18udDdk_snSUrEKirg&usqp=CAU",
    "id" => "1",
    "name" => "Trăm năm cô đơn"
);
$book2 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWYNCTdZGK62Xbpam6HGOvzvSgMN9NdNp9I53Z7NK7j7ycFaK1Op7XUUpVQp2Jirq58Fo&usqp=CAU",
    "id" => "2",
    "name" => "Vạn dặm dưới đáy biển"
);
$book3 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-55k6TbE6-9xXJeRyOq6J7xlv5_DumvE8u5Faci2Ke66mJDtSri7I8UH6sj2MYwdTZVU&usqp=CAU",
    "id" => "3",
    "name" => "Con sò huyết"
);
$book4 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZml-oaPdbU7PkSfzGCeqfN5ycXNDrSlL9zIQ98zpFYHu0_spfE18udDdk_snSUrEKirg&usqp=CAU",
    "id" => "4",
    "name" => "Trăm năm cô đơn"
);
$book5 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWYNCTdZGK62Xbpam6HGOvzvSgMN9NdNp9I53Z7NK7j7ycFaK1Op7XUUpVQp2Jirq58Fo&usqp=CAU",
    "id" => "5",
    "name" => "Vạn dặm dưới đáy biển"
);
$book6 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-55k6TbE6-9xXJeRyOq6J7xlv5_DumvE8u5Faci2Ke66mJDtSri7I8UH6sj2MYwdTZVU&usqp=CAU",
    "id" => "6",
    "name" => "Con sò huyết"
);
$book7 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZml-oaPdbU7PkSfzGCeqfN5ycXNDrSlL9zIQ98zpFYHu0_spfE18udDdk_snSUrEKirg&usqp=CAU",
    "id" => "7",
    "name" => "Trăm năm cô đơn"
);
$book8 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWYNCTdZGK62Xbpam6HGOvzvSgMN9NdNp9I53Z7NK7j7ycFaK1Op7XUUpVQp2Jirq58Fo&usqp=CAU",
    "id" => "8",
    "name" => "Vạn dặm dưới đáy biển"
);
$book9 = array("image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-55k6TbE6-9xXJeRyOq6J7xlv5_DumvE8u5Faci2Ke66mJDtSri7I8UH6sj2MYwdTZVU&usqp=CAU",
    "id" => "9",
    "name" => "Con sò huyết"
);

$listBooks = array($book1,$book2,$book3,$book4,$book5,$book6,
                    $book7,$book8,$book9);

$data = array("Văn học" => $listBooks,
              "Nước ngoài" => $listBooks);
$view = new ListCarouselViewer();
$view->show($data);
include_once("./template/footer.php");
include_once("../apps/user/models/DbConnector.php");
?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" 
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/js/carousel.js"></script>
    <script src="/js/header.js"></script>
</body>
</html>
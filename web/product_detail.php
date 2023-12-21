<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/product_detail.css">
    <title>Chi tiết</title>

</head>
<body>
    
<?php
$data = array(
    "name" => "Travelers",
    "image" => "https://images-us.bookshop.org/ingram/9780399590535.jpg?height=500&v=v2-6401f41911b907ceb4d66806f59b75fd",
    "authors" => "Dasha Kiper",
    "price" => "10000",
    "available_status" => "Có sẵn",
    "publisher" => "NXB Kim Đồng",
    "publish_year" => "2000",
    "num_pages" => "200",
    "lang" => "Tiếng Việt",
    "type" => "Bìa cứng",
    "author_detail" => "Dasha Kiper is the consulting clinical director of support groups at CaringKind (formerly the Alzheimer's Association) and holds an MA in clinical psychology from Columbia University. She works with dementia patients and caregivers.",
    "critic" => "\"This book will forever change the way we see people with dementia disorders--and the people who care for them. Dasha Kiper compassionately illuminates the complex bond between us and our loved ones suffering from cognitive decline, surprising us with what we can learn about ourselves through this experience and the ways our own minds both deceive us and make us uniquely human.\"--Lori Gottlieb, author of Maybe You Should Talk To Someone"
);

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if($_GET['id']!=''){
        include_once("./template/header.php");
        require_once("../apps/user/views/product_detail/index.php");
        $viewProduct->showProductDetail($data);
        include_once("./template/footer.php");
    }
}
?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" 
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="./js/header.js"></script>
</body>
</html>
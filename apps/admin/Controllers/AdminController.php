<?php 
$act = "allproduct";
if(isset($_GET["act"])) {
    $act = $_GET["act"];
}
switch($act) {
    case "allproduct":
        include "./view/AllProduct.php";
        break;
}
    
?>
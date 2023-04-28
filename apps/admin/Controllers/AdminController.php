<?php 
$act = "allproduct";
if(isset($_GET["act"])) {
    $act = $_GET["act"];
}
switch($act) {
    case "allproduct":
        include "./view/AllProduct.php";
        break;
    case "editproduct":
        include "./view/EditProduct.php";
        break;
    case "addproduct":
        include "./view/AddProduct.php";
        break;
    case "alluser":
        include "./view/AllUser.php";
        break;
    case "edituser":
        include "./view/EditUser.php";
        break;
    case "adduser":
        include "./view/AddUser.php";
        break;
    case "allcategory":
        include "./view/AllCategory.php";
        break;
    case "addcategory":
        include "./view/AddCategory.php";
        break;
    case "editcategory":
        include "./view/EditCategory.php";
        break;

}
    
?>
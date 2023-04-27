<?php 
    $act = isset($_GET['action']) ? $_GET['action'] : "home";
    switch($action) {
        case "home":
            require_once('/bookstore/apps/guest/modules/home/actions/homepage.controller.php');
            break;
        case "detail":
            require_once('/bookstore/apps/guest/view/productDetail.php');
            break;
        case "cart":
            $action = isset($_GET['xuli']) ? $_GET['xuli'] : "add";
            require_once('../Controllers/CartController.php');
            $controller_obj = new CartController();
            switch ($action) {
                case 'add':
                    $controller_obj->add_cart();
                    break;
                
            }
                break; 
        
    }
?>
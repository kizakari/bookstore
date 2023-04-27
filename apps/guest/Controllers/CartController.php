<?php 
    require_once("../model/cart.php");

    class CartController {
        var $cart_model;

        public function __construct() {
            $this->cart_model = new Cart();
        }

        function list_cart() {
            $count = 0;
            if (isset($_SESSION['sanpham'])) {
                foreach ($_SESSION['sanpham'] as $value) {
                    $count += $value['ThanhTien'];
                }
            }
            require_once('../view/index.php');
        }

        function add_cart() {
            $id = $_GET['id'];
            $data = $this->cart_model->detail_book($id);
            $count = 0;
            if (isset($_SESSION['product'][$id])) {
                $arr = $_SESSION['product'][$id];
                $arr['quantity'] = $arr['quantity'] + 1;
                $arr['price'] = $arr['quantity'] * $arr["price"];
                $_SESSION['product'][$id] = $arr;
            } else {
                $arr['id'] = $data['bookid'];
                $arr['product_name'] = $data['bookname'];
                $arr['price'] = $data['price'];
                $arr['quantity'] = 1;
                $arr['price'] = $data['price'];
                $arr['product_image'] = $data['product_image'];
                $_SESSION['product'][$id] = $arr;
            }

            foreach ($_SESSION['product'] as $value) {
                $count += $value['price'];
            }

            header('Location:?action=cart#dxd');
            }
        }
?>
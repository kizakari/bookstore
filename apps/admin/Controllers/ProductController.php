<?php 
if(isset($_GET['act'])) {
    switch($_GET['act']) {     
        case "editPr":
            if(isset($_POST['id']))  {
                $ad = new Admin();
                $uploadCheck = true;
                $id = $_POST['id'];
                if($uploadCheck) {
                    $product = array (
                        'name' => $_POST['name'],
                        'price' => $_POST['price'],
                        'quantity' => $_POST['quantity'],
                        'description' => $_POST['description'],
                    );
                    $ad->updateProduct($id, $product);
                    
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allproduct"/>';
                } else {
                    
                    include "../view/EditProduct.php";
                }
            }
            break;
        
            case "createPr":
                $ad = new Admin();
                $uploadCheck = true;
                $image = $_FILES['image'];
                $target_dir = $_SERVER['DOCUMENT_ROOT']."/bookstore/web/assets/img";
                $target_image = $target_dir . "/" . basename($image['name']);
                $name_image = basename($image['name']);
                $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));
                if ($image["size"] > 500000) {
                    echo "<script>alert('Sorry, your file is too large.')</script>";
                    $uploadCheck = false;
                }
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                    $uploadCheck = false;
                }
    
                if ($uploadCheck == false) {
                    echo "<script>alert('Sorry, your file was not uploaded.')</script>";
                } else {
                    move_uploaded_file($image["tmp_name"], $target_image);
                }

                $product = array (
                    'name' => $_POST["name"],
                    'author' => $_POST["author"],
                    'price' => $_POST["price"],
                    'quantity' => $_POST["quantity"],
                    'image' => $target_image,
                    'year' => $_POST["year"],
                    'description' => $_POST["description"]
                );

                $ad->createProduct($product);
                echo "<script>alert('Add product success')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allproduct"/>';

                break;

            case "deletePr":
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $ad = new Admin();
                    $product = $ad->getProductSingle($id);

                    if ($product) {
                        $ad->deleteProduct($id);
                        echo "<script>alert('Delete product Success')</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allproduct"/>';
                    } else {
                        echo "<script>alert('Product not exists')</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allproduct"/>';
                    }
                } else {
                    echo "<script>alert('Delete product Fail')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allproduct"/>';
                }
                break;
            
            case "createCtg":
                $ad = new Admin();                  
                $category = array (
                    'name' => $_POST["name"]
                );

                $ad->createCategory($category);
                echo "<script>alert('Add Category success')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allcategory"/>';
                    
                break;

            case 'updateCtg':
                if(isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];

                    $ad = new Admin();
                    $category = $ad->getSingleCategory($id);

                    if($category) {
                        $ad->updateCategory($id, $name);
                        echo "<script>alert('Update Category success')</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allcategory"/>';
                    } else {
                        echo "<script>alert('Update Category fail')</script>";
                        include "./view/EditCategory.php";
                    }
                }
                break;
            
            case "deleteCtg":
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $ad = new Admin();
                    $category = $ad->getSingleCategory($id);

                    if ($category) {
                        $ad->deleteCategory($id);
                        echo "<script>alert('Delete Category Success')</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allcategory"/>';
                    } else {
                        echo "<script>alert('Category not exists')</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allcategory"/>';
                    }
                } else {
                    echo "<script>alert('Category product Fail')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allcategory"/>';
                }
                break;
            
            case 'updateOrder':
                if(isset($_POST['id']) && isset($_POST['userId'])) {
                    $id = $_POST['id'];
                    $userId = $_POST['userId'];
                    $date_string = $_POST['date'];
                    $date = date('Y-m-d ', strtotime($date_string));
                    $total = $_POST['total'];
                    $status = $_POST['status'];
        
                    $ad = new Admin();
                    $order = $ad->getSingleOrder($id);
    
                    if($order) {
                        $ad->updateOrder($id, $userId, $date, $total, $status);
                        echo "<script>alert('Update Hóa đơn thành công')</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Admin&act=allorder"/>';
                    } else {
                        echo "<script>alert('Update Order fail')</script>";
                        include "./view/EditOrder.php";
                    }
                }
                break;
    
    }
}

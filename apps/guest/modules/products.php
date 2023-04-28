<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/bookstore/web/css/listProduct.css" />
        <link
          href="https://fonts.googleapis.com/css?family=Roboto"
          rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
        <title>BK Bookstore</title>
    </head>

    <body>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bkstore";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";
        
        session_start();
    if($_SESSION['user_id']!=''){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/Database.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/bookstore/model/UserAccount.php';
        $database = new Database();
        $db = $database->connect();
        $user = new Account($db);
        $user->id = $_SESSION['user_id'];
        require_once $_SERVER['DOCUMENT_ROOT']."/bookstore/web/html/header2.html";
        echo "<script>document.getElementById('pic').src='".$user->getImage()."'</script>";
    }
    else
        require_once $_SERVER['DOCUMENT_ROOT']."/bookstore/web/html/header1.html";
        ?>
        
        <div class="content">
            

            <div class=left-side>
                
                <ul class="cat-list">
                    <li><h2>Categories</h2></li>
                    <li>
                        <label>
                            <input type="checkbox" value="Văn học">
                            Văn học
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" value="Kinh tế">
                            Kinh tế
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" value="Giáo dục">
                            GIáo dục
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" value="Ngoại ngữ">
                            Ngoại ngữ
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" value="Thiếu nhi">
                            Thiếu nhi
                        </label>
                    </li>
                </ul>
            </div>

            <div class="right-side">
                <div class="NB-container">
                <?php 
                        $sql = "SELECT book.id, product_name, price, category_id , product_image, category_name 
                        FROM book JOIN book_category  ON book.category_id = book_category.id";
                        $product = $conn->query($sql);

                        if ($product->num_rows > 0) {
                            while($row = $product->fetch_assoc()) {
                    ?>
                    <div class="NB-items" 
                    onclick="window.location='productDetail.php?action=detail&id=<?php echo $row['id'] ?>'">
                        <img src="<?php echo $row["product_image"] ?>" alt="" class="NBi-image" />
                        <div class="NBi-category"><?php echo $row["category_name"] ?></div>
                        <div class="NBi-name"><?php echo $row["product_name"] ?></div>
                        <div class="NBi-author">Kiley Reid</div>
                        <div class="NBi-price"><?php echo $row["price"] ?></div>
                    </div>
                    
                    <?php
                    }
                    } else {
                        echo "No products available";
                    }
                ?>                    
                </div> 
            </div>
        </div>

        <div class="footer" >
            <div class="subscribe">
                <div class="sub-content">
                    <input 
                    class="sub-input" 
                    placeholder="Nhập email của bạn"
                    type="text"
                    />
                    <button class="sub-btn button-hover">Đăng ký</button>
                </div>
            </div>



            <div class="footer-content">
                <div class="FC-item">
                    <ul class="FCi-list"> 
                        <div class="FCi-name">Giới thiệu</div>
                        <li class="FCi-topic">Về chúng tôi</li>
                        <li class="FCi-topic">Show room</li>
                        <li class="FCi-topic">Tin tức</li>
                        <li class="FCi-topic">Liên hệ</li>
                    </ul>
                </div>
       
                <div class="FC-item">
                    <ul class="FCi-list"> 
                        <div class="FCi-name">Chính sách</div>
                        <li class="FCi-topic">Chính sách bảo hành</li>
                        <li class="FCi-topic">Chính sách vận chuyển</li>
                        <li class="FCi-topic">Chính sách thanh toán</li>
                        <li class="FCi-topic">Chính sách đổi trả</li>
                        <li class="FCi-topic">Chính sách bảo mật</li>
                    </ul>
                </div>
                
                <div class="FC-item">
                    <ul class="FCi-list">
                        <div class="FCi-name">Tin tức</div>           
                        <li class="FCi-topic">Tin tức công nghệ</li>
                        <li class="FCi-topic">Chia sẻ tư vấn</li>
                        <li class="FCi-topic">Đánh giá sản phẩm</li>
                        <li class="FCi-topic">Hướng dẫn, giải đáp</li>
                        <li class="FCi-topic">Chính sách bảo mật</li>
                    </ul>
                </div>
       
                <div class="FC-item">
                    <ul class="FCi-list"> 
                        <div class="FCi-name">Kết nối với chúng tôi</div>                       
                        <li class="FCi-topic">
                            <img src="../assets/img/fb_icon.png" style="width:5%;" alt="">
                            BK Robotic</li>
                        <li class="FCi-topic">
                            <img src="../assets/img/zalo-icon.png" style="width:5%;" alt="">
                            0987654321</li>
                        <li class="FCi-topic">
                            <img src="../assets/img/gmail_icon.png" style="width:5%;" alt="">
                            BK_Robotic@tmdt.com</li>
                        <img src="../assets/img/footer_note.png" style="width:100%;" alt="">
                    </ul>
                </div>          
            </div>
            <div class="footer-end">Copyright © 2022 - BK Robotic . All Rights Reserved.</div>
        </div>
    </body>
</html>
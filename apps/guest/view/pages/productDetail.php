<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="/bookstore/web/css/productDetail.css" rel="stylesheet">
    <title>Product Detail</title>
    <style>
        .set-width{max-width: 900px;}
        h2{
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
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
      ?>
    <div class="container" style="max-width: 900px;">
        <div class="row">
            <?php
                  $id = $_GET['id'];
                  $sql = "SELECT * FROM product WHERE id = $id";
                  $query = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($query);
                ?>
            <div class="col col-lg-4">
                <img src="<?php echo $row["product_image"] ?>" 
                class="img-fluid" alt="Book cover" style="box-shadow: 10px 10px 5px;">
            </div>
            <div class="col col-lg-8">
                <div class="book-name"><?php echo $row["product_name"] ?></div>
                <div class="author my-2">
                    <a href="#">Dasha Kiper</a> <span class="text-light-emphasis">(Author)</span>, <a href="#">Norman Doidge</a> <span class="text-light-emphasis">(Foreword by)</span>
                </div>
                <div class="format my-3">
                    <span style="font-weight: 500;font-size:small">Định dạng</span><br>
                    <button><span style="color:rgb(83,60,157)">Bìa cứng</span><br><span style="font-weight: bold;">$26.04</span></button>
                </div>
                <div class="available my-3">
                    AVAILABLE
                </div>
                <div class="buy my-3">
                    <button type="submit" class="add-to-cart" onclick="location.href='?action=cart&xuli=add&id=<?php echo $row['id'] ?>'">Thêm vào giỏ hàng</button>
                    <button class="add-to-wishlist">Thêm vào danh sách yêu thích</button>
                <div class="get-audio my-1">
                    <a href="#">TẢI SÁCH ÂM THANH</a>
                </div>
                </div>
                <div class="description mt-4">
                    <h2>Mô tả</h2>
                    <p><?php echo $row["description"] ?></div>
                <div class="pro-detail mt-4">
                    <h2>Chi tiết sản phẩm</h2>
                    <table>
                        <tr class=price>
                          <td class="td-left text-light-emphasis">Giá</td>
                          <td class="td-right"><?php echo $row["price"] ?></td> 
                        </tr>
                        <tr class="publisher">
                          <td class="td-left text-light-emphasis">Nhà xuất bản</td>
                          <td class="td-right">Nxb Kim Đồng</td> 
                        <tr class="publish-date">
                            <td class="td-left text-light-emphasis">Ngày xuất bản</td>
                            <td class="td-right">18-2-2022</td>
                        </tr>
                        <tr class="pages">
                            <td class="td-left text-light-emphasis">Số trang</td>
                            <td class="td-right">200</td>
                        </tr>
                        <tr class="lang">
                            <td class="td-left text-light-emphasis">Ngôn ngữ</td>
                            <td class="td-right">Tiếng Việt</td>
                        </tr>
                        <tr class="type">
                            <td class="td-left text-light-emphasis">Loại</td>
                            <td class="td-right">Bìa cứng</td>
                        </tr>
                      </table>
                </div>
                <div class="about-author mt-4">
                    <h2>Về tác giả</h2>
                    Dasha Kiper is the consulting clinical director of support groups at CaringKind (formerly the Alzheimer's Association) and holds an MA in clinical psychology from Columbia University. She works with dementia patients and caregivers.   
                </div>
                <div class="review mt-4">
                    <h2>Nhận xét</h2>
                    "This book will forever change the way we see people with dementia disorders--and the people who care for them. Dasha Kiper compassionately illuminates the complex bond between us and our loved ones suffering from cognitive decline, surprising us with what we can learn about ourselves through this experience and the ways our own minds both deceive us and make us uniquely human."--Lori Gottlieb, author of Maybe You Should Talk To Someone
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" style="max-width: 1000px; margin-top: 100px;">
        <h2>Những cuốn sách bán chạy trong tuần</h2>
        <div id="carouselExample" class="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card">
                    <a class="nostyle" href="https://www.facebook.com">
                    <div class="img-wrapper">
                        <img src="https://image-us.24h.com.vn/upload/4-2020/images/2020-11-24/Nguoi-dep-noi-len-nho-canh-nude-nam-19-tuoi-so-huu-vong-1-eegfq_ovoaatm2a-1606187090-960-width965height961.jpg" alt="...">
                    </div>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <a href="#">
                        <div class="img-wrapper">
                            <img src="https://image-us.24h.com.vn/upload/4-2020/images/2020-11-24/Nguoi-dep-noi-len-nho-canh-nude-nam-19-tuoi-so-huu-vong-1-eegfq_ovoaatm2a-1606187090-960-width965height961.jpg" alt="...">
                        </div>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <a href="#">
                        <div class="img-wrapper">
                            <img src="https://image-us.24h.com.vn/upload/4-2020/images/2020-11-24/Nguoi-dep-noi-len-nho-canh-nude-nam-19-tuoi-so-huu-vong-1-eegfq_ovoaatm2a-1606187090-960-width965height961.jpg" alt="...">
                        </div>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <a href="#">
                        <div class="img-wrapper">
                            <img src="https://image-us.24h.com.vn/upload/4-2020/images/2020-11-24/Nguoi-dep-noi-len-nho-canh-nude-nam-19-tuoi-so-huu-vong-1-eegfq_ovoaatm2a-1606187090-960-width965height961.jpg" alt="...">
                        </div>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <a href="#">
                        <div class="img-wrapper">
                            <img src="https://image-us.24h.com.vn/upload/4-2020/images/2020-11-24/Nguoi-dep-noi-len-nho-canh-nude-nam-19-tuoi-so-huu-vong-1-eegfq_ovoaatm2a-1606187090-960-width965height961.jpg" alt="...">
                        </div>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <a href="#">
                        <div class="img-wrapper">
                            <img src="https://image-us.24h.com.vn/upload/4-2020/images/2020-11-24/Nguoi-dep-noi-len-nho-canh-nude-nam-19-tuoi-so-huu-vong-1-eegfq_ovoaatm2a-1606187090-960-width965height961.jpg" alt="...">
                        </div>
                    </a>
                </div>
            </div>  
            <div class="carousel-item">
                <div class="card">
                    <a href="#">
                        <div class="img-wrapper">
                            <img src="https://image-us.24h.com.vn/upload/4-2020/images/2020-11-24/Nguoi-dep-noi-len-nho-canh-nude-nam-19-tuoi-so-huu-vong-1-eegfq_ovoaatm2a-1606187090-960-width965height961.jpg" alt="...">
                        </div>
                    </a>
                </div>
            </div>    
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>









    <script src="https://code.jquery.com/jquery-3.6.4.min.js" 
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../../public/js/productDetail.js"></script>
</body>
</html>
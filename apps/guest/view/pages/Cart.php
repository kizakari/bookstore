<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="/bookstore/web/css/cart.css" />
        <link
          href="https://fonts.googleapis.com/css?family=Roboto"
          rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Gio hang</title>
    </head>
    <body>
    <div class="header">
            <div class="header-logo">
                <div class="header-logo-img button-hover">
                    <img src="../assets/img/icon.png" alt="">
                </div>
                <div class="header-logo-text button-hover">BK Bookstore</div>
            </div>
            <ul class="header-slider">
                <a href="./home.php"><li class="header-slider-item">Trang chủ</li></a>
                <a href="./products.php"><li class="header-slider-item">Sản phẩm</li></a>
                <li class="header-slider-item">Show room</li>
                <li class="header-slider-item">Tin tức</li>
                <li class="header-slider-item">Bảo hành</li>
            </ul>
            <div class="header-right">
                <button class="header-login-btn button-hover">Đăng nhập</button>
            </div>   
        </div>
        <div class="search-ground">
                <div class="search-content" >
                    <input 
                    class="search-input" 
                    placeholder="Bạn thích sách nào?"
                    type="text"
                    />
                    <button class="search-icon button-hover">
                        <i class="bi bi-search icon-color"></i>
                    </button>
                </div>
            </div>
        
        <div class="content">
        <section class="h-100 h-custom">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="h5">Shopping Bag</th>
                <th scope="col">Delete</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if (isset($_SESSION['product'])) {
                foreach ($_SESSION['product'] as $value) { ?>
                  <tr>
                <th scope="row">
                  <div class="d-flex align-items-center">
                    <img src="<?= $value['product_image'] ?>" class="img-fluid rounded-3"
                      style="width: 120px;" alt="Book">
                    <div class="flex-column ms-4">
                      <p class="mb-2"><?= $value['product_name'] ?></p>
                      <p class="mb-0">Daniel Kahneman</p>
                    </div>
                  </div>
                </th>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;"><i class="bi bi-trash"></i></p>
                </td>
                <td class="align-middle">
                  <div class="d-flex flex-row">
                    <button class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fas fa-minus"></i>
                    </button>

                    <input id="form1" min="0" name="quantity" value="2" type="number"
                      class="form-control form-control-sm" style="width: 50px;" />

                    <button class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;"><?= number_format($value['price']) ?> VNĐ</p>
                </td>
              </tr>
                <?php }
              } ?>
              
              
            </tbody>
          </table>
        </div>

        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

            <div class="row">
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                <form>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1v"
                        value="" aria-label="..." checked />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                        Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel2v"
                        value="" aria-label="..." />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel3v"
                        value="" aria-label="..." />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                      </p>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-6">
                <div class="row">
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                        placeholder="John Smith" />
                      <label class="form-label" for="typeName">Name on card</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY"
                        size="7" id="exp" minlength="7" maxlength="7" />
                      <label class="form-label" for="typeExp">Expiration</label>
                    </div>
                  </div>
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                        placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                      <label class="form-label" for="typeText">Card Number</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="password" id="typeText" class="form-control form-control-lg"
                        placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                      <label class="form-label" for="typeText">Cvv</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-2">Subtotal</p>
                  <p class="mb-2"><?= number_format($count) ?></p>
                </div>

                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-0">Shipping</p>
                  <p class="mb-0">0 VNĐ</p>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                  <p class="mb-2">Total (tax included)</p>
                  <p class="mb-2"><?=number_format($count)?></p>
                </div>

                <button type="button" class="btn btn-primary btn-block btn-lg">
                  <div class="d-flex justify-content-between">
                    <span>Checkout</span>
                    <span><?=number_format($count)?></span>
                  </div>
                </button>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
        </div>
        <div class="footer" >
            <div class="subscribe">
                <div class="sub-content">
                    <input 
                    class="search-input" 
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
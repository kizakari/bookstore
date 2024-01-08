<?php 

//Cần phải làm rõ $data là gì, implicit dependency vào kiểu của data làm tăng độ phức tạp
function showProductDetail($data){
    echo "
    <div class='container' style='max-width: 900px;'>
    <div class='row'>
        <div class='col-12 col-lg-4'>
            <img src='$data[image]' class='img-fluid' alt='$data[name]' style='box-shadow: 10px 10px 5px;'>
        </div>
        <div class='col-12 col-lg-8'>
            <div class='book-name' id='book-name'>
            </div>
            <div class='author my-2'>
                <a href='#' id='author'>$data[authors]</a> <span class='text-light-emphasis'>(Author)</span>
            </div>
            <div class='format my-3'>
                <span style='font-weight: 500;font-size:small'>Định dạng</span><br>
                <button>
                    <span style='color:rgb(83,60,157)'>Bìa cứng</span><br><span style='font-weight: bold;' id='price'>
                        $data[price]
                    </span>
                </button>
            </div>
            <div class='available my-3'>
                $data[available_status]
            </div>
            <div class='buy my-3'>
                <button class='add-to-cart'>Thêm vào giỏ hàng</button>
                <button class='add-to-wishlist'>Thêm vào danh sách yêu thích</button>
            </div>
            <div class='description mt-4'>
                <h2>Mô tả</h2>
                <p id='description'></p>
            </div>
            <div class='pro-detail mt-4'>
                <h2>Chi tiết sản phẩm</h2>
                <table>
                    <tr class=price>
                        <td class='td-left text-light-emphasis'>Giá</td>
                        <td class='td-right' id='price2'>$data[price] vnd</td> 
                    </tr>
                    <tr class='publisher'>
                        <td class='td-left text-light-emphasis'>Nhà xuất bản</td>
                        <td class='td-right' id='publisher'>$data[publisher]</td> 
                    <tr class='publish-date'>
                        <td class='td-left text-light-emphasis'>Năm xuất bản</td>
                        <td class='td-right' id='public_year'>$data[publish_year]</td>
                    </tr>
                    <tr class='pages'>
                        <td class='td-left text-light-emphasis'>Số trang</td>
                        <td class='td-right' id='num_page'>$data[num_pages]</td>
                    </tr>
                    <tr class='lang'>
                        <td class='td-left text-light-emphasis'>Ngôn ngữ</td>
                        <td class='td-right' id='lang'>$data[lang]</td>
                    </tr>
                    <tr class='type'>
                        <td class='td-left text-light-emphasis'>Loại</td>
                        <td class='td-right'>$data[type]</td>
                    </tr>
                    </table>
            </div>
            <div class='about-author mt-4'>
                <h2>Về tác giả</h2>
                <span id='about'>$data[author_detail]</span>   
            </div>
            <div class='review mt-4'>
                <h2>Phê bình</h2>
                <span id='critic'>$data[critic]</span>
            </div>
        </div>
    </div>
</div>
    ";
}
?>
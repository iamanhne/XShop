<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73a0f52767.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/Css/user/product.css">
    <link rel="stylesheet" href="style.css">
    <title>XShop</title>
</head>
<body>
    <?php include "header.php" ?>

    <section class="product">
        <div class="container">
            <div class="product-top row">
                <div class="cartegory-top row">
                    <a href="index.php">Home</a>
                    <span class="icon-next"><i class="fa-solid fa-arrow-right"></i></span>
                    <a href="brands.php">Brands</a>
                    <span class="icon-next"><i class="fa-solid fa-arrow-right"></i></span>
                    <?php 
                        include "./logic/connectDB.php";
                        $id = $_POST['id'];
                        $sql1 = "select * from brands where id=$id";
                        $result1 = mysqli_query($conn,$sql1);
                        while($brand = mysqli_fetch_assoc($result1)) {
                            echo 
                            '<a href="#" onclick="postData(\'brands.php\', '.$id.');">
                                '.$brand['name'].'
                            </a>
                            <span class="icon-next"><i class="fa-solid fa-arrow-right"></i></span>
                            ';
                        }
                        $sql2 = "select * from products where id=$id";  
                        $result2 = mysqli_query($conn,$sql2);
                        while($product = mysqli_fetch_assoc($result2)) {
                            echo '<p>'.$product['name'].'</p>';
                        }

                    ?>
                </div>
            </div>
            <div class="product-content row">
                <div class="product-content-left">
                    <div class="product-content-left-big-img">
                        <?php
                            include "./logic/connectDB.php";
                            $id = $_POST['id'];
                            $sql = "select * from products where id=$id";  
                            $result = mysqli_query($conn,$sql);
                            while($product = mysqli_fetch_assoc($result)) {
                                echo '<img src="'.$product['img'].'" alt="">';
                            }
                        ?>
                    </div>
                    <div class="product-content-left-small-img">
                        <img src="./images/aidas.jpg" alt="">
                        <img src="./images/aidas.jpg" alt="">
                        <img src="./images/aidas.jpg" alt="">
                        <img src="./images/aidas.jpg" alt="">
                    </div>
                </div>
                <div class="product-content-right">
                    <?php
                        include "./logic/connectDB.php";
                        $id = $_POST['id'];
                        $sql = "select * from products where id=$id";
                        $result = mysqli_query($conn, $sql);
                        while ($product = mysqli_fetch_assoc($result)) {
                            $sizes = explode(',', $product['size']);
                            echo 
                            '    <div class="product-content-right-product-name">
                                    <div class="loves">Yêu thích</div>
                                    <span>'.$product['name'].'</span>
                                </div>
                                <div class="product-content-right-product-price">
                                    <p>'.number_format($product['price'],0,',','.').'<sup>đ</sup></p>
                                </div>
                                <div class="product-content-right-product-color">
                                    <p><span>Màu sắc: </span>Trắng </p>
                                </div>
                                <div class="product-content-right-product-size row">
                                    <p>Kích cỡ</p>
                                    <ul class="row">';
                                    foreach($sizes as $size) {
                                        echo '<li>'.trim($size).'</li>';
                                    }
                                    echo '</ul>
                                </div>
                                <div class="product-content-right-product-quantity">
                                    <p>Số lượng</p>
                                    <div class="click row">
                                        <button class="decrease" data-max="'.$product['quantity'].'">-</button>
                                        <p class="id" data-current="0">0</p>
                                        <button class="increase" data-max="'.$product['quantity'].'">+</button>
                                    </div>
                                    <p class="check">Vui lòng chọn size</p> 
                                </div>
                                <div class="product-content-right-product-button row">
                                    <input type="hidden" id="product_id" value="'.$product['id'].'">
                                    <input type="hidden" id="product_img" value="'.$product['img'].'">
                                    <input type="hidden" id="product_size" value="0">
                                    <input type="hidden" id="product_allsize" value="'.$product['size'].'">
                                    <input type="hidden" id="product_price" value="'.$product['price'].'">
                                    <input type="hidden" id="product_maxqtt" value="'.$product['quantity'].'">

                                    <button type="button" id="add-to-cart-btn">
                                        <i class="fa-solid fa-cart-plus"></i>
                                        Thêm vào giỏ hàng
                                    </button>                                                                           
                                    <a id="pay_quick">
                                        <button type="button" class="quickpay" id="add-to-cart-btn2">Mua ngay</button>
                                    </a>
                                </div>
                                <div class="product-content-right-bottom">
                                    <div class="product-content-right-bottom-top">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="product-content-right-bottom-content-big">
                                        <div class="product-content-right-bottom-content-title row">
                                            <div class="tab-item active">
                                                <p>Chi tiết</p>
                                            </div>
                                            <div class="tab-item">
                                                <p>Bảo quản</p>
                                            </div>
                                            <div class="tab-item">
                                                <p>Tham khảo size</p>
                                            </div>
                                            <div class="line"></div>
                                        </div>
                                        <div class="product-content-right-bottom-content">
                                            <div class="product-content-right-bottom-content-chitiet activePane">
                                                <p>Luôn luôn cập nhật những mẫu mã mới , đa dạng – shop hứa hẹn sẽ luôn đem lại cho bạn những sản phẩm thời trang ưng ý và hoàn hảo nhất . Chúng tôi bán hàng rẻ nhất, chúng tôi bán hàng chất lượng nhất.</p>
                                                <p>MUA 1 ĐÔI GIÀY SHOP</p>
                                                <p>Cam kết: Ad Chính Hãng Samba Vegan OG Giày Thể Thao Đá Banh Đa Năng Phong Cách Giản</p> 
                                                <p>1. Đổi trả nếu có lỗi sản xuất, nhầm size.</p>
                                                <p>2. Hoàn tiền 100% nếu nhận sản phẩm không giống hình. Tất cả các sản phẩm đã được chọn lựa kỹ trước khi cung cấp cho khách hàng </p>
                                                <p>3. Thời gian giao hàng : từ 1-3 ngày tùy tỉnh , huyện hay nội thành Giao nội tỉnh HCM – HN thường 1-2 ngày, tỉnh và huyện thường lâu hơn 1 chút.</p>
                                                <p>4. Sản phẩm bao gồm đầy đủ : hộp, tag, giấy gói và phụ kiện</p>
                                                <p>5. Hỗ trợ đổi hàng nếu các bạn đi không vừa.</p>
                                                <p>6. Chat với shop để được tư vấn nếu cần nhé.</p>
                                            </div>
                                            <div class="product-content-right-bottom-content-chitiet">
                                                <p>HƯỚNG DẪN BẢO QUẢN</p> 
                                                <p>✔️ Để giày ở nơi khô ráo thoáng mát để giữ giày được bền đẹp hơn</p>
                                                <p>✔️ Vệ sinh giày, dùng khăn hay bàn trải lông mềm để chải sạch giày cùng với nước tẩy rửa giày chuyên dụng với da hay da Pu</p>
                                                <p>✔️ Có thể giặt giày cùng với chất tẩy rửa nhẹ</p>
                                                <p>---------------------------------------------</p>
                                                <p>❌ KHUYẾN CÁO</p>
                                                <p>⛔ Không dùng hóa chất hay bột giặt có hoạt tính tẩy rửa mạnh</p>
                                                <p>⛔ Không dùng bàn chải cứng để vệ sinh giày sẽ làm hư </p>
                                                <p>⛔ Không đi mưa ngâm nước lâu, không phơi giày trực tiếp dưới ngoài trời nắng gắt</p>
                                            </div>
                                            <div class="product-content-right-bottom-content-chitiet">
                                                <p>CHUẨN LỰA CHỌN SIZE PHÙ HỢP :</p>
                                                <p>Chiều dài bàn chân Size Nam/nữ:</p>
                                                <p>size Kích thước chân size Kích thước chân </p>
                                                <p>36 Dài 22.5cm, ngang 8.5cm 41 Dài 25.5cm, ngang 10cm </p>
                                                <p>37 Dài 23cm, ngang 8.5-9cm 42 Dài 26cm, ngang 10-10.5cm </p>
                                                <p>38 Dài 23.5cm, ngang 9cm 43 Dài 27cm, ngang 10.5cm </p>
                                            </div>
                                        </div>
                                </div>
                                ';
                            }
                        ?>
                </div>
            </div>
        </div>
    </section>
    <h2>Đánh giá sản phẩm</h2>
    <section class="rate">
        <div class="rate-container">
            <div class="rate-left">
                <div class="rate-left-img">
                    <img src="../assets/img/img_logo/logo2.jpg" alt="">
                </div>
            </div>
            <div class="rate-right">
                <p>User name</p>
                <div class="rating-star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="date-rating">
                    <span>2024-16-04</span>
                    <span>Phân loại hàng: </span>
                </div>
                <p>Chất lượng sản phẩm: </p>
                <p>Đúng với mô tả: </p>
                <p>Sản phẩm sắc nét. Chất lượng ổn. Tuyệt vời. Hihi. Dây Led không làm tới chân. Thì mới sáng đẹp. Huhuhuhihuhuh</p>
                <div class="img-detail">
                    <img src="../assets/img/img_Nike/Nike-Air-Force-1-Shadow-Full-Trang-Rep-1-1.jpg" alt="">
                    <img src="../assets/img/img_Nike/Nike-Air-Force-1-Shadow-Full-Trang-Rep-1-1.jpg" alt="">
                    <img src="../assets/img/img_Nike/Nike-Air-Force-1-Shadow-Full-Trang-Rep-1-1.jpg" alt="">
                </div>                
            </div>  
        </div>
    </section>

    <!-- Product related
    <section class="product-related">
        <div class="product-related-title">
            SẢN PHẨM LIÊN QUAN
        </div>
        <div class="product-content">
            <div class="product-related-item">
                <img src="./images/aidas.jpg" alt="">
                <h1>Adidas Rey Galle Kem Xanh Ngọc REP 1:1</h1>
                <p>600.000đ</p>
                <button><a href="product.html">Mua ngay</a></button>
            </div>
            <div class="product-related-item">
                <img src="./images/aidas.jpg" alt="">
                <h1>Adidas Rey Galle Kem Xanh Ngọc REP 1:1</h1>
                <p>600.000đ</p>
                <button><a href="product.html">Mua ngay</a></button>
            </div>
            <div class="product-related-item">
                <img src="./images/aidas.jpg" alt="">
                <h1>Adidas Rey Galle Kem Xanh Ngọc REP 1:1</h1>
                <p>600.000đ</p>
                <button><a href="product.html">Mua ngay</a></button>
            </div>
            <div class="product-related-item">
                <img src="./images/aidas.jpg" alt="">
                <h1>Adidas Rey Galle Kem Xanh Ngọc REP 1:1</h1>
                <p>600.000đ</p>
                <button><a href="product.html">Mua ngay</a></button>
            </div>
        </div>
    </section>
    <div class="notify-container">
        <div class="notify">
            <div class="message">
                <div class="icon-notify">
                    
                </div>
                <div class="content-notify">    
                               
                </div>
            
            </div>
            <div class="exit">
                <button>OK</button>
            </div>
        </div>
    </div> -->
    <?php include "footer.php" ?>

    <script src="../assets/Js/user/product.js"></script>
</body>
</html>
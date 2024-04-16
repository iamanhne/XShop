<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73a0f52767.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/Css/user/cart.css">
    <link rel="stylesheet" href="../assets/Css/user/style.css">
    <link rel="stylesheet" href="../assets/Css/user/product.css">
    <link rel="stylesheet" href="../assets/Css/user/brands.css">
    <title>XShop</title>
</head>
<body class="light">
    <!-- Header -->
    <?php include "header.php" ?>

    <!-- Cart body -->
    <section class="cart">
        <div class="container">
            <div class="cart-content">
                <div class="cart-content-top">
                    <table>
                        <tr>
                            <th><input type="checkbox" class="selectAll"></th>
                            <th>Sản phẩm</th>
                            <th></th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Số tiền</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php 
                            include "./logic/connectDB.php";
                            $sql = 'SELECT * FROM cart';
                            $result = mysqli_query($conn, $sql);
                            while ($cart = mysqli_fetch_assoc($result)) {
                                $sizes = explode(',', $cart['product_allsize']);
                                echo
                                '<tr id="product-'.$cart['id'].'">
                                   <td><input type="checkbox" class="select-item"></td>
                                    <td><img src="'.$cart['img'].'" alt=""></td>
                                    <td class="container-type">
                                        <button class="chooseType">
                                            <span>Phân loại size </span>
                                            <i class="fa-solid fa-caret-down" id="animation"></i>
                                            <span class="first_choose">'.$cart['size'].'</span>
                                        </button>
                                        <div class="selection">
                                            <div>
                                                <div class="inner"></div>
                                                <div class="size-item">
                                                    <p>Kích cỡ</p>
                                                    <ul class="after_choose_container row">';
                                                    foreach($sizes as $size) {
                                                        echo '<li class="after_choose">'.trim($size).'</li>';
                                                    }
                                                    echo '</ul>
                                                </div>
                                                <div class="confirm">
                                                    <button class="back">Trở lại</button>
                                                    <button class="accept">Xác nhận</button>
                                                </div>
                                            </div> 
                                        </div>
                                    </td>
                                    <td class="price">'.$cart['price'].'</td>
                                    <td>
                                        <div class="product-content-right-product-quantity">
                                            <div class="click">
                                                <button class="decrease">-</button>
                                                <p class="id">'.$cart['quantity'].'</p>
                                                <button class="increase" data-max="'.$cart['max_quantity'].'">+</button>
                                            </div>
                                            <div class="noti-container">
                                                <div class="notification">
                                                    <div class="warn">
                                                        <div class="icon-notify">
                                                            <i class="fa-solid fa-triangle-exclamation" style="color: #FFD43B;"></i>
                                                        </div>
                                                        <div class="content-notify">    
                                                            <span>Bạn chắc chắn muốn bỏ sản phẩm này?</span>
                                                            <div class="re_confirm">
                                                                <button id="No">Trở lại</button>
                                                                <button id="OK">Xác nhận</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </td>
                                    <td class="unit-price"></td>
                                    <td>
                                        <button class="deleteButton" onclick="deleteCartItem('.$cart['id'].')">Xoá</button>
                                    </td>
                                </tr>
                                ';
                            }
                        ?>
                    </table>
                </div>
                <section class="cart-content-mid box-shadow">
                    <div class="mid-top">
                        <span>XShop Voucher</span>
                        <button><a href="#a">Chọn hoặc nhập mã giảm giá</a></button>
                    </div>
                    <div class="mid-mid">

                    </div>
                    <div class="mid-bottom">
                        <table>
                            <tr>
                                <td class="col1">
                                    <input type="checkbox" class="selectAll">
                                    <span class="chooseAll">Chọn tất cả (<span class="seAll"></span>)</span>
                                    <button class="deleteButton">Xoá</button>
                                </td>
                                
                                <td class="col2">
                                    Tổng thanh toán (<span class="allItem">0</span> Sản phẩm):
                                    <span class="total">0</span>
                                    <a href="https://youtube.com"><button class="pay-merch">Mua hàng</button></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </section>
                <div class="cartegory-right-content">
                    <p class="more">Có thể bạn cũng thích</p>
                    <section class="cart-content-bottom">
                        <div class="cartegory-right-content-item">
                            <img src="../assets/img/img_Vans/Vans-Vault-Slip-on-Caro-Den-Trang-Rep-1-1.jpg" alt="">
                            <h1>Adidas Rey Galle Kem Xanh Ngọc REP 1:1</h1>
                            <p>600.000đ</p>
                            <button><a href="product.html">Mua ngay</a></button>
                        </div>
                        <div class="cartegory-right-content-item">
                            <img src="../assets/img/aidas.jpg" alt="">
                            <h1>Adidas Rey Galle Kem Xanh Ngọc REP 1:1</h1>
                            <p>600.000đ</p>
                            <button><a href="product.html">Mua ngay</a></button>
                        </div>
                        <div class="cartegory-right-content-item">
                            <img src="../assets/img/aidas.jpg" alt="">
                            <h1>Adidas Rey Galle Kem Xanh Ngọc REP 1:1</h1>
                            <p>600.000đ</p>
                            <button><a href="product.html">Mua ngay</a></button>
                        </div>
                        <div class="cartegory-right-content-item">
                            <img src="../assets/img/aidas.jpg" alt="">
                            <h1>Adidas Rey Galle Kem Xanh Ngọc REP 1:1</h1>
                            <p>600.000đ</p>
                            <button><a href="product.html">Mua ngay</a></button>
                        </div>
                    </section>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "footer.php" ?>
    <script src="../assets/Js/user/cart.js"></script>
</body>
</html>
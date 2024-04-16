<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/Css/user/deliveryaddress.css">
    <title>XShop</title>
</head>
<body class="light">
    <div class="form-container">
        <div class="container">
            <h2>Địa chỉ mới</h2>
            <p>Để đặt hàng, vui lòng chọn địa chỉ nhận hàng</p>
            <form action="">
                <div class="nameandphone">
                    <input type="text" name="fullname" id="name" placeholder="Họ và tên">
                    <input type="text" name="phone" id="phone" placeholder="Số điện thoại">
                </div>
                <div class="option_country">
                    <input type="text" name="" placeholder="Tỉnh/thành phố, Quận/Huyện, Phường/Xã" disabled> 
                    <div class="address-container row">
                        <div class="tab-item active">
                            <p>Tỉnh/Thành phố</p>
                        </div>
                        <div class="tab-item">
                            <p>Quận/Huyện</p>
                        </div>
                        <div class="tab-item">
                            <p>Phường/Xã</p>
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="address-container">
                        <div class="address-chitiet activePane">
                            <ul id="province-list"></ul> 
                        </div>
                        <div class="address-chitiet">
                            <p>b</p>
                            <p>b</p>         
                            <p>b</p>         
                            <p>b</p>         
                            <p>b</p>         
                        </div>
                        <div class="address-chitiet">
                            <p>c</p>
                            <p>c</p>                     
                            <p>c</p>                     
                            <p>c</p>                     
                            <p>c</p>                     
                            <p>c</p>                     
                        </div>
                    </div>
                </div>
                <div class="address">
                    <input type="text" name="address" placeholder="Địa chỉ cụ thể">
                </div>
                <span>Loại địa chỉ</span>
                <ul>
                    <li>Nhà riêng</li>
                    <li>Văn phòng</li>
                </ul>
            </form>
        </div>
    </div>
    <script src="../assets/Js/user/delivery.js"></script>
</body>
</html>
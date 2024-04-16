<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/Css/user/payment.css">
    <title>XShop</title>
</head>
<body>
    <?php include "header.php" ?>

    <section class="delivery">
        <div class="delivery-container">
            <form action="" method="POST">
                <div class="delivery-form">
                    <label for="username">Họ và tên người nhận</label>
                    <input type="text" name="username" class="delivery-control">
                </div>
                <div class="delivery-form">
                    <label for="phone">Số điện thoại người nhận</label>
                    <input type="text" name="phone" class="delivery-control">
                </div>
                <div class="delivery-form">
                    <label for="address">Địa chỉ nhận hàng</label>
                    <input type="text" name="address" class="delivery-control">
                </div>
                <div>
                    <label for="">Phương thức thanh toán</label>
                    <select class="delivery-control select">
                        <option>Chọn phương thức thanh toán</option>
                        <option>Thanh toán khi nhận hàng</option>
                        <option>Thanh toán qua mã QR</option>
                    </select>
                </div>
                <div class="QR-payment">
                    <a href="https://img.vietqr.io/image/mbbank-520485201314-qr-only.jpg?amount=50000&addInfo=test&accountName=Dao%20Hoang%20Anh"></a>
                    <img src="https://img.vietqr.io/image/mbbank-520485201314-qr-only.jpg?amount=50000&addInfo=test&accountName=Dao%20Hoang%20Anh" alt="" style="width: 150px; height: 150px">
                </div>
                <div class="confirm-payment">
                    <button>Trở lại</button>
                    <button type="submit">Xác nhận</button>   
                </div>
            </form>
        </div>
    </section>


    <?php include "footer.php" ?>
    <script src="../assets/Js/user/payment.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73a0f52767.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/Css/user/brands.css">
    <title>XShop</title>
</head>
<body class="light">
    <?php include "header.php" ?>
    <!-- Cartegory -->
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
                <a href="index.php">Home</a>
                <span class="icon-next"><i class="fa-solid fa-arrow-right"></i></span>
                <a href="brands.php">Brands</a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="cartegory-left">
                        <ul>
                            <?php 
                            include "./logic/connectDB.php";
                            $sql1 = "select * from brands";
                            $result1 = mysqli_query($conn,$sql1);
                            while($brand = mysqli_fetch_assoc($result1)) {
                                echo 
                                '<li class="cartegory-left-li">
                                    <a href="#" onclick="postData(\'brands.php\', '.$brand['id'].');">
                                        '.$brand['name'].'
                                    </a>
                                </li>
                                ';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="cartegory-right row">
                        <div class="cartegory-right-top-item">
                            <p>Sản phẩm mới</p>
                        </div>
                        <div class="cartegory-right-top-item">
                            <button><span>Bộ lọc</span><i class="fa-solid fa-caret-down"></i></button>
                        </div>
                        <div class="cartegory-right-top-item">
                            <select name="" id="">
                                <option value="">Sắp xếp</option>
                                <option value="">Giá từ thấp tới cao</option>
                                <option value="">Giá từ cao tới thấp</option>
                            </select>
                        </div>
                        <div class="cartegory-right-content row">
                            <?php 
                                include "./logic/connectDB.php";
                                $sql = 'SELECT * FROM products';
                                if (isset($_POST['id'])) {
                                    $brand = $_POST['id'];
                                    $sql = "SELECT * FROM products WHERE brands_id = '".$brand."'";
                                }
                                $result = $conn->query($sql);
                                $result = mysqli_query($conn, $sql);
                                while ($product = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <form action="products.php" method="post" style="display: inline;">
                                        <input type="hidden" name="id" value="'.$product['id'].'">
                                            <a class="item-container" href="#" onclick="this.parentNode.submit(); return false;">
                                                <div class="cartegory-right-content-item">
                                                    <img src="'.$product['img'].'" alt="">
                                                    <h1>'.$product['name'].'</h1>
                                                    <p>'.$product['price'].'đ</p>
                                                </div>
                                            </a>
                                    </form>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-item">
                            <p>Hiển thị 2 <span>|</span> 4 sản phẩm</p>
                        </div>
                        <div class="cartegory-right-bottom-item">
                            <p><span>1 2 3 4 5</span> <i class="fa-solid fa-angles-right"></i>  Trang cuối</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "footer.php" ?>
    <script src="../assets/Js/user/brands.js"></script>
</body>
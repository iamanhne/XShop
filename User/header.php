<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73a0f52767.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/Css/user/header.css">
    <title>XShop</title>
</head>
<body class="light">
    <header>
        <div class="logo">
            <a href="index.html">
                <img src="../assets/img/img_logo/logo.png" alt="">
            </a>
        </div>
        <div class="menu">
            <li class="menu_item"><a href="index.php" class="active">Home</a></li>
            <li class="menu_item"><a href="about.php">About</a></li>
            <li class="menu_item"><a href="brands.php">Brands</a>
            <li class="menu_item"><a href="news.php">News</a></li>
            <li class="menu_item"><a href="contact.php">Contact</a></li>
        </div>
        <div class="others">
            <li class="other_item">
                <form action="./logic/search.php" method="GET">
                    <input type="search" placeholder="Tìm kiếm sản phẩm" name="query" id="input">
                    <button type="submit" class="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div id="searchResults"></div>
            </li>
            <li class="other_item"><i class="fa-regular fa-bell"></i></li>
            <li class="other_item"><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <?php
                session_start(); // Bắt đầu session
                if(isset($_SESSION['user_id'])) {
                    include "./logic/connectDB.php";
                    // Lấy giá trị 'user_id' từ session
                    $userId = $_SESSION['user_id'];
                    
                    // Sử dụng prepared statement để tránh SQL Injection
                    $sql = "SELECT user_name FROM users WHERE id=$userId";
                    $result = mysqli_query($conn, $sql);
                    while ($user = mysqli_fetch_assoc($result)) {
                        echo '
                            <li class="other_item user-container">
                                <span>'.$user['user_name'].'</span>
                                <ul class="general">
                                    <li><a href="#">Thông tin cá nhân</a></li>
                                    <li><a href="#">Thông tin đơn hàng</a></li>
                                    <li><a href="./logic/logout.php">Sign out</a></li>
                                </ul>
                            </li>';
                    }
                    } else {
                        echo '<li class="other_item"><a href="login.php"><i class="fa-regular fa-user"></i></a></li>';
                    }
            ?>
            <li class="other_item">
                <input type="checkbox" id="toggle" class="toggle-checkbox">
                <label for="toggle" class="toggle-label"></label>
            </li>
        </div>
    </header>
    <script src="../assets/Js/user/header.js"></script>
</body>
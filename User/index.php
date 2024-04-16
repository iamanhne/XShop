<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/Css/user/style.css">
    <title>XShop</title>
</head>
<body>
    <?php
    // Header 
        include "header.php";
    ?>

    <!-- Slider -->
    <section id="slider">
        <div class="slider-container">
            <img src="../assets/img/img_slider/slide1.jpg" alt="">
            <img src="../assets/img/img_slider/slider1.jpeg" alt="">
            <img src="../assets/img/img_slider/slider3.jpeg" alt="">
        </div>
        <div class="dot-container">
            <div class="dot activeDot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>

    <?php
        // Footer
        include "footer.php";
    ?>
    <script src="../assets/Js/user/script.js"></script>
</body>
</html>
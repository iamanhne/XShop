<?php 
    include "connectDB.php";
    if(isset($_GET['query'])) {
        // Lấy từ khóa tìm kiếm và làm sạch
        $query = mysqli_real_escape_string($conn, $_GET['query']);

        // Tạo truy vấn SQL để tìm kiếm sản phẩm
        $sql = "SELECT * FROM products WHERE name LIKE '%$query%'";

        // Thực thi truy vấn
        $result = mysqli_query($conn, $sql);

        // Kiểm tra xem có sản phẩm nào được tìm thấy không
        if(mysqli_num_rows($result) > 0) {
            // Hiển thị kết quả
            while($row = mysqli_fetch_assoc($result)) {
                echo "Product: " . $row['name'] . "<br>";
            }
        } else {
            echo "No products found.";
        }
    }
?>
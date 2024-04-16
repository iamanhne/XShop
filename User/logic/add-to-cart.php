<?php
// Kết nối với cơ sở dữ liệu MySQL
    include "connectDB.php";
// Nhận dữ liệu từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"), true);

// Lấy các trường dữ liệu sản phẩm từ dữ liệu nhận được
$product_id = $data['product_id'];
$product_img = $data['product_img'];
$product_size = $data['product_size'];
$product_allsize = $data['product_allsize'];
$product_price = $data['product_price'];
$product_quantity = $data['product_quantity'];
$product_maxqtt = $data['product_maxqtt'];

// Kiểm tra xem có user_id không (giả sử user_id là biến $user_id)
if(isset($user_id)) {
    // Nếu user_id đã được đăng nhập, thêm user_id vào câu truy vấn
    $sql = "INSERT INTO cart (user_id, product_id, img, size, product_allsize, price, quantity, max_quantity) 
            VALUES ('$user_id', '$product_id', '$product_img', '$product_size', $product_allsize, '$product_price', '$product_quantity','$product_maxqtt')";
} else {
    // Nếu chưa có user_id (khách hàng), để trường user_id là null
    $sql = "INSERT INTO cart (user_id, product_id, img, size,product_allsize, price, quantity, max_quantity) 
            VALUES (NULL, '$product_id', '$product_img', '$product_size',$product_allsize, '$product_price', '$product_quantity','$product_maxqtt')";
}

// Thực thi câu truy vấn
if ($conn->query($sql) === TRUE) {
    echo "Product added to cart successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
<?php
// Kết nối đến cơ sở dữ liệu
include "connectDB.php";

// Kiểm tra xem yêu cầu được gửi bằng phương thức POST và có tồn tại id không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {

    // Lấy id từ yêu cầu POST
    $id = $_POST['id'];

    // Xây dựng câu lệnh SQL để xoá dòng dữ liệu từ bảng cart với id tương ứng
    $sql = "DELETE FROM cart WHERE id = $id";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được xoá thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    // Trả về thông báo lỗi nếu yêu cầu không hợp lệ
    echo "Yêu cầu không hợp lệ!";
}

// Đóng kết nối
$conn->close();
?>

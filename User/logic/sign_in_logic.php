<?php
    include "connectDB.php";
    $email = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE user_name=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Đăng nhập thành công
            session_start();
            $_SESSION['user_id'] = $user['id']; // Lưu user_id vào session
            header("Location: ../index.php");
            exit();
        } else {
            // Sai mật khẩu
            echo "Sai mật khẩu. Vui lòng thử lại.";
        }
    } else {
        // Người dùng không tồn tại
        echo "Người dùng không tồn tại. Vui lòng kiểm tra lại tên đăng nhập.";
    }

    $stmt->close();
    $conn->close();
?>

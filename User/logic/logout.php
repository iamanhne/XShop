<?php
    // Bắt đầu session
    session_start();
    
    // Xóa tất cả các biến session
    $_SESSION = array();
    
    // Hủy session
    session_destroy();
    
    // Chuyển hướng người dùng về trang đăng nhập sau khi đăng xuất
    header("Location: ../index.php");
    exit();
?>
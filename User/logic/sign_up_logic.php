<?php
    include "connectDB.php";
    $user_fullname = $_POST['fullname'];
    $user_username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_address = $_POST['address'];
    $user_password = $_POST['password'];
    // Băm mật khẩu
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO users ( full_name, user_name, email, password, address, phone, role , is_active) VALUES (?,?,?,?,?,?,NULL,NULL)";
    $stmt = mysqli_prepare($conn, $sql);
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssssss',$user_fullname, $user_username, $user_email, $hashed_password, $user_address, $user_phone);
    // Execute the statement
    $result = mysqli_stmt_execute($stmt);
    // Check for success
    if ($result) {
        header("Location: ../index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
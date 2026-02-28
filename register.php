<?php
include "config.php";

$full_name = $_POST["full_name"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

// Mã hóa mật khẩu
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Kiểm tra email hoặc username đã tồn tại chưa
$check = "SELECT * FROM users WHERE email='$email' OR username='$username'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "Email hoặc tên đăng nhập đã tồn tại!";
} else {

    $sql = "INSERT INTO users (full_name, email, username, password)
            VALUES ('$full_name', '$email', '$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3 style='color:green;'>Đăng ký thành công!</h3>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>
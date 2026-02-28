<?php
include "config.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $user = $result->fetch_assoc();

    // So sánh mật khẩu đúng cách
    if (password_verify($password, $user["password"])) {

        echo "<h2 style='color:green;'>Đăng nhập thành công!</h2>";
        echo "Xin chào: " . $user["full_name"];

    } else {

        echo "<h2 style='color:red;'>Sai mật khẩu!</h2>";

    }

} else {

    echo "<h2 style='color:red;'>Không tìm thấy tài khoản!</h2>";

}

$conn->close();
?>
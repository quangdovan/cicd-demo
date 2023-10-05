<?php
// Kết nối đến cơ sở dữ liệu
require "database_help.php";

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối không thành công: " . $mysqli->connect_error);
}

// Lấy dữ liệu từ biểu mẫu và thêm vào cơ sở dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: index.php"); // Chuyển hướng về trang danh sách sau khi thêm thành công
    } else {
        echo "Lỗi: " . $mysqli->error;
    }
}

// Đóng kết nối
$mysqli->close();
?>
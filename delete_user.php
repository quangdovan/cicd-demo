<?php
// Kết nối đến cơ sở dữ liệu
$mysqli = new mysqli("localhost", "quangdv", "Etc@1234", "my_project_db");

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối không thành công: " . $mysqli->connect_error);
}

// Lấy ID của người dùng cần xóa
$id = $_GET["id"];

// Xóa dữ liệu người dùng
$sql = "DELETE FROM users WHERE id=$id";

if ($mysqli->query($sql) === TRUE) {
    header("Location: index.php"); // Chuyển hướng về trang danh sách sau khi xóa thành công
} else {
    echo "Lỗi: " . $mysqli->error;
}

// Đóng kết nối
$mysqli->close();
?>
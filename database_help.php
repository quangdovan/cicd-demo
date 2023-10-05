<?php
//Thiết lập kết nối đến cơ sở dữ liệu
$databaseHost = getenv("DB_HOST");
$databaseUser = getenv("DB_USER");
$databasePassword = getenv("DB_PASSWORD");
$databaseName = getenv("DB_NAME");

$mysqli = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}
?>

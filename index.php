<!DOCTYPE html>
<html>
<head>
    <title>Danh sách người dùng</title>
</head>
<body>
    <h1>Danh sách người dùng</h1>
    <?php
    // Lấy tên máy chủ từ biến $_SERVER
    $serverName = $_SERVER["SERVER_NAME"];
    $hostname = gethostname();
    
    // Hiển thị tên máy chủ và hostname lên màn hình với hai dòng riêng biệt
    echo "Tên máy chủ đang chạy là: " . $serverName . "<br>";
    echo "Hostname của máy chủ đang chạy là: " . $hostname;
    ?>


    <?php
    // Kết nối đến cơ sở dữ liệu
    require "database_help.php";

    // Kiểm tra kết nối
    if ($mysqli->connect_error) {
        die("Kết nối không thành công: " . $mysqli->connect_error);
    }

    // Truy vấn dữ liệu từ cơ sở dữ liệu
    $sql = "SELECT * FROM users";
    $result = $mysqli->query($sql);

    // Hiển thị dữ liệu trong bảng
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Tên người dùng</th><th>Email</th><th>Chỉnh sửa</th><th>Xóa</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td><a href='edit_user.php?id=" . $row["id"] . "'>Chỉnh sửa</a></td>";
            echo "<td><a href='delete_user.php?id=" . $row["id"] . "'>Xóa</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu.";
    }

    // Đóng kết nối
    $mysqli->close();
    ?>

    <a href="add_user.php">Thêm người dùng</a>
</body>
</html>

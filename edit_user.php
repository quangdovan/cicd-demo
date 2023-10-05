<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa người dùng</title>
</head>
<body>
    <h1>Chỉnh sửa người dùng</h1>

    <?php
    // Kết nối đến cơ sở dữ liệu
    $mysqli = new mysqli("localhost", "quangdv", "Etc@1234", "my_project_db");

    // Kiểm tra kết nối
    if ($mysqli->connect_error) {
        die("Kết nối không thành công: " . $mysqli->connect_error);
    }

    // Lấy ID của người dùng cần chỉnh sửa
    $id = $_GET["id"];

    // Truy vấn dữ liệu của người dùng
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy người dùng.";
    }

    // Đóng kết nối
    $mysqli->close();
    ?>

    <form method="post" action="edit_user_process.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="username">Tên người dùng:</label>
        <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" value="<?php echo $row['password']; ?>" required><br>

        <input type="submit" value="Lưu">
    </form>

    <a href="index.php">Quay lại danh sách</a>
</body>
</html>
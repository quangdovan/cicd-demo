<!DOCTYPE html>
<html>
<head>
    <title>Thêm người dùng</title>
</head>
<body>
    <h1>Thêm người dùng</h1>

    <form method="post" action="add_user_process.php">
        <label for="username">Tên người dùng:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Thêm">
    </form>

    <a href="index.php">Quay lại danh sách</a>
</body>
</html>

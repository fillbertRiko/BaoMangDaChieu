<?php
session_start();
include('config/config.php'); // Kết nối với cơ sở dữ liệu

// Khởi tạo biến cho thông báo lỗi
$error = '';

if (isset($_POST['dangnhap'])) {
    $taikhoan = mysqli_real_escape_string($mysqli, $_POST['username']);
    $matkhau = $_POST['password']; // Lấy mật khẩu từ biểu mẫu

    // Truy vấn lấy thông tin người dùng
    $sql = "SELECT * FROM user WHERE username = '$taikhoan' LIMIT 1"; // Sửa tên bảng nếu cần
    $row = mysqli_query($mysqli, $sql);

    if ($row && mysqli_num_rows($row) > 0) {
        $user = mysqli_fetch_assoc($row);
        
        // Kiểm tra mật khẩu (nên sử dụng password_verify nếu mật khẩu đã mã hóa)
        if ($matkhau === $user['password']) { // Nếu mật khẩu không mã hóa
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location: index.php");
            exit();
        } else {
            $error = "Tài khoản hoặc mật khẩu sai, mời nhập lại.";
        }
    } else {
        $error = "Tài khoản không tồn tại.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Quản Trị</title>
    <link rel="stylesheet" href="css/stylesadmincp.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .login-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập Quản Trị</h2>
        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="" autocomplete="off">
            <label for="username">Tên Đăng Nhập:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Mật Khẩu:</label>
            <input type="password" name="password" id="password" required> <!-- Thay đổi type thành password -->

            <input type="submit" name="dangnhap" value="Đăng Nhập">
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>

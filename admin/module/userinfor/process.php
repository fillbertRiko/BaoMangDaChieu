<?php
include('../../config/config.php');

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Kiểm tra nút "Thêm người dùng" và các trường cần thiết đã được gửi
if (isset($_POST['themnguoidung']) && !empty($username) && !empty($email) && !empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu
    $sql_add = "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$hashed_password')";
    
    if (mysqli_query($mysqli, $sql_add)) {
        header('Location: ../../index.php?action=quanlyuserinfor&query=them');
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli); // Thông báo lỗi nếu câu truy vấn thất bại
    }
} elseif (isset($_POST['suanguoidung'])) {
    $user_id = $_POST['user_id']; // Lấy user_id từ form
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu
    // Cập nhật thông tin người dùng, nếu không nhập mật khẩu mới thì giữ nguyên
    $sql_update = "UPDATE users SET username='$username', email='$email', password_hash='$hashed_password' WHERE user_id='$user_id'";
    
    if (mysqli_query($mysqli, $sql_update)) {
        header('Location: ../../index.php?action=quanlyuserinfor&query=them');
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli); // Thông báo lỗi nếu câu truy vấn thất bại
    }
} elseif (isset($_GET['query']) && $_GET['query'] == 'delete') {
    $id = $_GET['userid'];
    $sql_delete = "DELETE FROM users WHERE user_id = '$id'";

    if (mysqli_query($mysqli, $sql_delete)) { // Kiểm tra nếu câu lệnh xóa thành công
        header('Location: ../../index.php?action=quanlyuserinfor&query=them'); // Điều hướng đến trang sau khi xóa
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli); // Thông báo lỗi nếu câu truy vấn thất bại
    }
} else {
    echo "Vui lòng điền đầy đủ thông tin!";
}
?>

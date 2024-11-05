<?php
session_start();
include('../../config/config.php');

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Kiểm tra nút "Thêm người dùng" và các trường cần thiết đã được gửi
if (isset($_POST['themnguoidung']) && !empty($username) && !empty($email) && !empty($password)) {
    $sql_add = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if (mysqli_query($mysqli, $sql_add)) {
        header('Location: ../../index.php?action=quanlyuser&query=them');
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
} elseif (isset($_POST['suanguoidung'])) {
    $user_id = $_POST['user_id']; // Lấy user_id từ form
    // Cập nhật thông tin người dùng
    $sql_update = "UPDATE user SET username='$username', email='$email', password='$password' WHERE user_id='$user_id'";
    
    if (mysqli_query($mysqli, $sql_update)) {
        header('Location: ../../index.php?action=quanlyuser&query=them');
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
} elseif (isset($_GET['query']) && $_GET['query'] == 'delete') {
    $id = $_GET['userid'];
    $sql_delete = "DELETE FROM user WHERE user_id = '$id'";

    if (mysqli_query($mysqli, $sql_delete)) {
        header('Location: ../../index.php?action=quanlyuser&query=them');
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
} else {
    echo "Vui lòng điền đầy đủ thông tin!";
}
?>

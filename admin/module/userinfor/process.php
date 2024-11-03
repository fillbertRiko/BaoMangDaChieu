<?php
	include('../../config/config.php');

	// Kiểm tra kết nối
	if (!$mysqli) die("Kết nối thất bại: " . mysqli_connect_error());

	// Thêm người dùng
	if (isset($_POST['themnguoidung'], $_POST['user'], $_POST['email'], $_POST['password'])) {
	    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	    $stmt = mysqli_prepare($mysqli, "INSERT INTO users(username, email, password_hash) VALUES (?, ?, ?)");
	    if ($stmt) {
	        mysqli_stmt_bind_param($stmt, "sss", $_POST['user'], $_POST['email'], $hashed_password);
	        if (mysqli_stmt_execute($stmt)) {
	            header('Location: ../../index.php?action=quanlyuserinfor');
	            exit();
	        } else {
	            echo "Lỗi khi thêm người dùng: " . mysqli_stmt_error($stmt);
	        }
	        mysqli_stmt_close($stmt);
	    } else {
	        echo "Lỗi chuẩn bị truy vấn thêm: " . mysqli_error($mysqli);
	    }
	}

	// Xóa người dùng
	elseif (isset($_GET['query'], $_GET['user_id']) && $_GET['query'] == 'delete') {
	    $stmt = mysqli_prepare($mysqli, "DELETE FROM users WHERE user_id = ?");
	    if ($stmt) {
	        mysqli_stmt_bind_param($stmt, "i", $_GET['user_id']);
	        if (mysqli_stmt_execute($stmt)) {
	            header('Location: ../../index.php?action=quanlyuserinfor');
	            exit();
	        } else {
	            echo "Lỗi khi xóa người dùng: " . mysqli_stmt_error($stmt);
	        }
	        mysqli_stmt_close($stmt);
	    } else {
	        echo "Lỗi chuẩn bị truy vấn xóa: " . mysqli_error($mysqli);
	    }
	} else {
	    echo "Vui lòng nhập đầy đủ thông tin.";
	}

	// Đóng kết nối
	mysqli_close($mysqli);
?>

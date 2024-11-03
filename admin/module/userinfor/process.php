<?php
	include('../../config/config.php');

	// Nhận dữ liệu từ form
	$user = $_POST['user'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(isset($_POST['themnguoidung']))
	{
		// Mã hóa mật khẩu trước khi lưu
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		// Chuẩn bị câu truy vấn với Prepared Statements
		$sql_them = "INSERT INTO users(username, email, password_hash) VALUES (?, ?, ?)";
		$stmt = mysqli_prepare($mysqli, $sql_them);

		if ($stmt) {
			// Gán tham số và thực thi câu truy vấn
			mysqli_stmt_bind_param($stmt, "sss", $user, $email, $hashed_password);
			mysqli_stmt_execute($stmt);

			// Chuyển hướng sau khi thêm thành công
			header('Location:../../index.php?action=quanlyuserinfor');
			exit(); // Dừng script sau khi chuyển hướng
		} else {
			// Xử lý lỗi nếu không thể chuẩn bị câu truy vấn
			echo "Có lỗi xảy ra: " . mysqli_error($mysqli);
		}

		// Đóng Prepared Statement
		mysqli_stmt_close($stmt);
	}
	// Đóng kết nối
	mysqli_close($mysqli);
?>

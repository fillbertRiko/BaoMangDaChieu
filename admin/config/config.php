<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_mysqli";

// Kích hoạt báo cáo lỗi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Tạo kết nối
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối thất bại: " . $mysqli->connect_error);
}

// Thông báo thành công (có thể bỏ qua nếu không cần thiết)
//echo "Kết nối thành công!";
?>

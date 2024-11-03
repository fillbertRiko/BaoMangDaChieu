<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

// Tạo mảng tiếng Việt cho thứ và tháng
$thu = ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"];
$thang = ["", "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];

// Lấy các phần của ngày và giờ hiện tại
$currentDay = $thu[date("w")];
$currentDate = date("d");
$currentMonth = $thang[date("n")];
$currentYear = date("Y");
$currentTime = date("H:i:s");

// Ghép các phần lại thành chuỗi thời gian hoàn chỉnh
$currentDateTime = "$currentDay, ngày $currentDate $currentMonth $currentYear - $currentTime";
?>

<header class="site-header">
    <div class="region-top-header">
        <div class="region-1"></div>
        <div class="region-2"></div>
    </div>
    <div class="sticky-marquee">
        <p class="news-label">Tin Nhanh:</p>
        <marquee><?php echo $hotNewsString; ?></marquee>
    </div>
    <div class="region-logo">
        <h1>
            <a href="index.php?quanly=trangchu&id=1" class="logo" title="Báo Mạng Đa Chiều">
                <img src="img/logoDaChieu.jpeg" alt="Logo Báo Mạng Đa Chiều">
            </a>
        </h1>
    </div>
    <hr>
    <div class="container">
        <div class="wrap-time">
            <!-- Hiển thị thời gian tự động cập nhật bằng tiếng Việt -->
            <p><?php echo $currentDateTime; ?></p>
        </div>
        <!-- Các nội dung khác -->
    </div>
</header>

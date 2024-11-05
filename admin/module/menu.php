<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Xử lý đăng xuất
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
    unset($_SESSION['dangnhap']);
    header("Location: login.php");
    exit();
}
?>

<ul class="admincp_list">
    <li><a href="index.php?action=quanlyuser&query=them">Quản lý thông tin người dùng</a></li>
    <li class="dropdown">
    <a class="dropbtn-btn" href="index.php?action=quanlyarticles&query=them">Quản lý bài viết nổi bật</a>
    <div class="dropdown-content">
        <ul>
            <li>Tin tức
                <ul class="sub-dropdown">
                    <li><a href="index.php?action=quanlyarticles&query=chinhtri">Chính trị</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=kinhte">Kinh tế</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=xahoi">Xã hội</a></li>
                </ul>
            </li>
            <li>Văn hoá
                <ul class="sub-dropdown">
                    <li><a href="index.php?action=quanlyarticles&query=nghethuat">Nghệ Thuật</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=sach">Sách</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=disan">Di sản</a></li>
                </ul>
            </li>
            <li>Du lịch
                <ul class="sub-dropdown">
                    <li><a href="index.php?action=quanlyarticles&query=diemden">Điểm đến</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=camnang">Cẩm nang</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=amthuc">Ẩm thực</a></li>
                </ul>
            </li>
            <li><a href="index.php?action=quanlyarticles&query=congnghe">Công nghệ</a>
            </li>
            <li>Thời trang
                <ul class="sub-dropdown">
                    <li><a href="index.php?action=quanlyarticles&query=mixandmatch">Mix and Match</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=lamdep">Làm đẹp</a></li>
                </ul>
            </li>
            <li>Âm nhạc
                <ul class="sub-dropdown">
                    <li><a href="index.php?action=quanlyarticles&query=hiendai">Hiện đại</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=duongdai">Đương đại</a></li>
                </ul>
            </li>
            <li>Phim ảnh
                <ul class="sub-dropdown">
                    <li><a href="index.php?action=quanlyarticles&query=dienanh">Điện ảnh</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=truyenhinh">Truyền hình</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=phimtheotheloai">Phim theo thể loại</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=dienvien">Diễn viên</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=hautruong">Hậu trường</a></li>
                    <li><a href="index.php?action=quanlyarticles&query=giaithuong">Giải thưởng</a></li>
                </ul>
            </li>
        </ul>
    </div>
</li>



    <li><a href="index.php?action=quanlyarticlesday&query=them">Quản lý bài viết hàng ngày</a></li>
    <li><a href="index.php?action=quanlyarticlesmost&query=them">Quản lý bài viết đọc nhiều</a></li>
    <li><a href="index.php?action=quanlyarticlesmore&query=them">Quản lý bài viết tin đọc thêm</a></li>
    <li>
        <a href="index.php?action=dangxuat">
            Đăng Xuất
            <br>
            <hr>
            <?php if (isset($_SESSION['dangnhap'])) {
                echo htmlspecialchars($_SESSION['dangnhap']); // Bảo vệ khỏi XSS
            } ?>
        </a>
    </li>
</ul>

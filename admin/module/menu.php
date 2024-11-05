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
    <li><a href="index.php?action=quanlyuserinfor&query=them">Quản lý thông tin người dùng</a></li>
    <li><a href="index.php?action=quanlycontentstorage&query=them">Quản lý lưu trữ bài viết</a></li>
    <li><a href="index.php?action=quanlycontentinfor&query=them">Quản lý loại bài viết</a></li>
    <li><a href="index.php?action=quanlyuserauthor&query=them">Quản lý trang lấy nguồn</a></li>
    <li><a href="index.php?action=quanlytags&query=them">Quản lý lưu trữ thẻ (tags) liên quan đến bài viết</a></li>
    <li><a href="index.php?action=quanlylinklist&query=them">Quản lý liên kết bài viết và thẻ</a></li>
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

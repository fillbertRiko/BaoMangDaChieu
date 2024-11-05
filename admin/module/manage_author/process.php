<?php
include('../../config/config.php');

// Lấy dữ liệu từ POST
$name = trim($_POST['author_name'] ?? '');
$bio = trim($_POST['author_bio'] ?? '');

// Thêm danh mục mới
if (isset($_POST['themtentrangnguon']) && !empty($name)) {
    $stmt = $mysqli->prepare("INSERT INTO authors (name, bio) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $name, $bio);
        $stmt->execute();
        $stmt->close();
    }
}

// Sửa danh mục
if (isset($_POST['suatentrangnguon']) && !empty($name)) {
    $author_id = intval($_POST['author_id']);
    $stmt = $mysqli->prepare("UPDATE authors SET name = ?, bio = ? WHERE author_id = ?");
    if ($stmt) {
        $stmt->bind_param("ssi", $name, $bio, $author_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Xóa danh mục
if (isset($_GET['query']) && $_GET['query'] == 'delete') {
    $author_id = intval($_GET['author_id']);
    $stmt = $mysqli->prepare("DELETE FROM authors WHERE author_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $author_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Điều hướng về trang quản lý danh mục
header('Location: ../../index.php?action=quanlyuserauthor&query=them');
exit();
?>

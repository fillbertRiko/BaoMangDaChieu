<?php
include('../../config/config.php');

// Lấy tên danh mục từ POST
$tag_name = $_POST['tag_name'] ?? '';

// Thêm danh mục mới
if (isset($_POST['themtags']) && !empty($tag_name)) {
    $stmt = $mysqli->prepare("INSERT INTO tags (tag_name) VALUES (?)");
    $stmt->bind_param("s", $tag_name);
    $stmt->execute();
    $stmt->close();
}

// Sửa danh mục
if (isset($_POST['suatags']) && !empty($tag_name)) {
    $tag_id = $_POST['tag_id'];
    $stmt = $mysqli->prepare("UPDATE tags SET tag_name = ? WHERE tag_id = ?");
    $stmt->bind_param("si", $tag_name, $tag_id);
    $stmt->execute();
    $stmt->close();
}

// Xóa danh mục
if (isset($_GET['query']) && $_GET['query'] == 'delete') {
    $tag_id = $_GET['tag_id'];
    $stmt = $mysqli->prepare("DELETE FROM tags WHERE tag_id = ?");
    $stmt->bind_param("i", $tag_id);
    $stmt->execute();
    $stmt->close();
}

// Điều hướng về trang quản lý danh mục
header('Location: ../../index.php?action=quanlytags&query=them');
exit();
?>

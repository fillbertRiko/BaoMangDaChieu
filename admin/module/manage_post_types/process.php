<?php
include('../../config/config.php');

// Lấy tên danh mục từ POST
$category_name = $_POST['category_name'] ?? '';

// Thêm danh mục mới
if (isset($_POST['themdanhmuc']) && !empty($category_name)) {
    $stmt = $mysqli->prepare("INSERT INTO categories (category_name) VALUES (?)");
    $stmt->bind_param("s", $category_name);
    $stmt->execute();
    $stmt->close();
}

// Sửa danh mục
if (isset($_POST['suadanhmuc']) && !empty($category_name)) {
    $category_id = $_POST['category_id'];
    $stmt = $mysqli->prepare("UPDATE categories SET category_name = ? WHERE category_id = ?");
    $stmt->bind_param("si", $category_name, $category_id);
    $stmt->execute();
    $stmt->close();
}

// Xóa danh mục
if (isset($_GET['query']) && $_GET['query'] == 'delete') {
    $category_id = $_GET['category_id'];
    $stmt = $mysqli->prepare("DELETE FROM categories WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $stmt->close();
}

// Điều hướng về trang quản lý danh mục
header('Location: ../../index.php?action=quanlycontentinfor&query=them');
exit();
?>

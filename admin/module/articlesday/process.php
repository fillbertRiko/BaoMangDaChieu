<?php
session_start();
include('../../config/config.php');

$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$summary = $_POST['summary'] ?? '';
$source = $_POST['source'] ?? '';
$category = $_POST['category'] ?? '';
$published_at = $_POST['publication_date'] ?? '';
$image_url = ''; // Khởi tạo biến cho địa chỉ hình ảnh

// Đường dẫn đến thư mục lưu hình ảnh
$target_dir = "../uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true); // Tạo thư mục nếu chưa tồn tại
}

// Chức năng thêm bài viết
if (isset($_POST['thembaiviet']) && !empty($title) && !empty($content) && !empty($summary) && !empty($source) && !empty($published_at) && !empty($category)) {
    
    // Xử lý tải lên hình ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $target_file = $target_dir . basename($image["name"]);

        // Di chuyển tệp hình ảnh vào thư mục lưu trữ
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $image_url = "/uploads/" . basename($image["name"]); // Địa chỉ của hình ảnh
        } else {
            echo "Có lỗi xảy ra khi tải lên hình ảnh.";
            exit();
        }
    }

    // Câu truy vấn thêm bài viết
    $sql_add = "INSERT INTO articlesday (category, title, publication_date, summary, content, source, image_url) 
                VALUES ('$category', '$title', '$published_at', '$summary', '$content', '$source', '$image_url')";

    if (mysqli_query($mysqli, $sql_add)) {
        header('Location: ../../index.php?action=quanlyarticlesday&query=them');
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
} 

// Chức năng sửa bài viết
elseif (isset($_POST['suabaiviet'])) {
    $article_id = $_POST['article_id'] ?? ''; // Lấy ID bài viết từ form

    // Kiểm tra và xử lý hình ảnh (nếu có)
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $target_file = $target_dir . basename($image["name"]);

        // Di chuyển tệp hình ảnh vào thư mục lưu trữ
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $image_url = "/uploads/" . basename($image["name"]); // Địa chỉ của hình ảnh
            $sql_update = "UPDATE articlesday SET category='$category', title='$title', publication_date='$published_at', summary='$summary', content='$content', source='$source', image_url='$image_url' WHERE article_id='$article_id'";
        } else {
            echo "Có lỗi xảy ra khi tải lên hình ảnh.";
            exit();
        }
    } else {
        // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
        $sql_update = "UPDATE articlesday SET category='$category', title='$title', publication_date='$published_at', summary='$summary', content='$content', source='$source' WHERE article_id='$article_id'";
    }

    if (mysqli_query($mysqli, $sql_update)) {
        header('Location: ../../index.php?action=quanlyarticlesday&query=sua');
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
}

// Chức năng xóa bài viết
elseif (isset($_GET['query']) && $_GET['query'] == 'delete') {
    $article_id = intval($_GET['articleid']); // Lấy ID bài viết từ URL

    // Câu truy vấn xóa bài viết
    $sql_delete = "DELETE FROM articlesday WHERE article_id = '$article_id'";

    if (mysqli_query($mysqli, $sql_delete)) {
        header('Location: ../../index.php?action=quanlyarticlesday&query=xoa');
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
} 
else {
    echo "Vui lòng điền đầy đủ thông tin!";
}
?>

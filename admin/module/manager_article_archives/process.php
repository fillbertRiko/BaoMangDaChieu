<?php
include('../../config/config.php');
session_start();

// Thiết lập thư mục lưu trữ ảnh
$upload_dir = __DIR__ . '/upload/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

// Lấy thông tin từ session
$author_id = $_SESSION['author_id'] ?? null; // Thiết lập giá trị mặc định là null
if (empty($author_id)) {
    die("Lỗi: Tác giả không tồn tại trong session.");
}

// Debug kiểm tra giá trị của author_id
var_dump($author_id);

// Dữ liệu từ form
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$summary = $_POST['summary'] ?? '';
$excerpt = $_POST['excerpt'] ?? '';
$category_id = $_POST['category_id'] ?? '';
$published_at = $_POST['published_at'] ?? '';
$status = $_POST['status'] ?? 'draft';
$tags = $_POST['tags'] ?? '';
$view_count = 0;

// Xử lý upload hình ảnh
$image = $_FILES['image']['name'] ?? '';
$featured_image = $_FILES['featured_image']['name'] ?? '';
if ($image) move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image);
if ($featured_image) move_uploaded_file($_FILES['featured_image']['tmp_name'], $upload_dir . $featured_image);

// Kiểm tra author_id tồn tại
$stmt = $mysqli->prepare("SELECT COUNT(*) FROM authors WHERE author_id = ?");
$stmt->bind_param("i", $author_id);
$stmt->execute();
$stmt->bind_result($author_count);
$stmt->fetch();
$stmt->close();

if ($author_count == 0) {
    die("Lỗi: Tác giả với ID $author_id không tồn tại trong cơ sở dữ liệu.");
}

// Thêm bài viết
if (isset($_POST['thembaiviet'])) {
    $stmt = $mysqli->prepare("INSERT INTO articles (title, content, summary, excerpt, author_id, category_id, published_at, image, featured_image, status, view_count, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisssssis", $title, $content, $summary, $excerpt, $author_id, $category_id, $published_at, $image, $featured_image, $status, $view_count, $tags);
    $stmt->execute();
    header('Location: ../../index.php?action=quanlycontentstorage&query=them');
    exit();
}

// Xử lý cập nhật bài viết
if (isset($_POST['suabaiviet'])) {
    $article_id = $_POST['article_id'];
    $query = "UPDATE articles SET title=?, content=?, summary=?, excerpt=?, author_id=?, category_id=?, published_at=?, status=?, updated_at=CURRENT_TIMESTAMP()";
    $params = [$title, $content, $summary, $excerpt, $author_id, $category_id, $published_at, $status];
    if ($image) { $query .= ", image=?"; $params[] = $image; }
    if ($featured_image) { $query .= ", featured_image=?"; $params[] = $featured_image; }
    $query .= " WHERE article_id=?";
    $params[] = $article_id;

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(str_repeat("s", count($params) - 1) . "i", ...$params);
    $stmt->execute();
    header('Location: ../../index.php?action=quanlycontentstorage&query=them');
    exit();
}

// Xử lý xóa bài viết
if (isset($_GET['query']) && $_GET['query'] == 'delete') {
    $article_id = $_GET['articleid'];
    $stmt = $mysqli->prepare("DELETE FROM articles WHERE article_id = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    header('Location: ../../index.php?action=quanlycontentstorage&query=them');
    exit();
}

echo "Vui lòng điền đầy đủ thông tin!";
?>

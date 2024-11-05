<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_id = $_SESSION['user_id'] ?? ''; // Giả sử user_id đã có từ session

// Lấy tên người dùng
$sql_user = "SELECT username FROM users WHERE user_id = ?";
$stmt_user = $mysqli->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user_name = ($result_user && $result_user->num_rows > 0) ? $result_user->fetch_assoc()['user_name'] : 'Người dùng không xác định';
// Giả sử author_id đã có từ session
$author_id = $_SESSION['author_id'] ?? '';

// Lấy tên tác giả từ bảng authors
$sql_author = "SELECT name FROM authors WHERE author_id = ?";
$stmt_author = $mysqli->prepare($sql_author);
$stmt_author->bind_param("i", $author_id);
$stmt_author->execute();
$result_author = $stmt_author->get_result();
$author_name = ($result_author && $result_author->num_rows > 0) ? $result_author->fetch_assoc()['name'] : 'Tác giả không xác định';

?>

<h1 style="text-align:center;">Thêm Bài Viết</h1>
<form method="POST" action="module/manager_article_archives/process.php" enctype="multipart/form-data">
    <table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
        <tr>
            <td>Tiêu Đề Bài Viết</td>
            <td><input type="text" name="title" required></td>
        </tr>
        <tr>
            <td>Tóm Tắt</td>
            <td><textarea name="summary" rows="5" required></textarea></td>
        </tr>
        <tr>
            <td>Trích Đoạn</td>
            <td><textarea name="excerpt" rows="3"></textarea></td>
        </tr>
        <tr>
            <td>Nội Dung Bài Viết</td>
            <td><textarea name="content" required rows="10"></textarea></td>
        </tr>
        <tr>
            <td>Thêm Hình Ảnh</td>
            <td><input type="file" name="image" accept="image/*"></td>
        </tr>
        <tr>
            <td>Hình Ảnh Nổi Bật</td>
            <td><input type="file" name="featured_image" accept="image/*"></td>
        </tr>
        <tr>
            <td>Tác Giả Bài Viết</td>
            <td>
<select name="author_id" required>
    <option value="">-- Chọn trang web lấy tin --</option>
    <?php
    $sql_author = "SELECT author_id, name FROM authors"; // Đổi 'author_name' thành 'name'
    $query_author = mysqli_query($mysqli, $sql_author);
    while ($author = mysqli_fetch_array($query_author)) {
        echo "<option value='{$author['author_id']}'>{$author['name']}</option>"; // Sửa thành {$author['name']}
    }
    ?>
</select>

            </td>
        </tr>
        <tr>
            <td>Loại Bài Viết</td>
            <td>
                <select name="category_id" required>
                    <option value="">-- Chọn loại bài viết --</option>
                    <?php
                    $sql_categories = "SELECT category_id, category_name FROM categories";
                    $query_categories = mysqli_query($mysqli, $sql_categories);
                    while ($category = mysqli_fetch_array($query_categories)) {
                        echo "<option value='{$category['category_id']}'>{$category['category_name']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Ngày Xuất Bản</td>
            <td><input type="datetime-local" name="published_at" required></td>
        </tr>
        <tr>
            <td>Trạng Thái</td>
            <td>
                <select name="status" required>
                    <option value="draft">Nháp</option>
                    <option value="published">Xuất bản</option>
                    <option value="deleted">Đã xóa</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Thẻ</td>
            <td><input type="text" name="tags" placeholder="Nhập các thẻ, cách nhau bằng dấu phẩy"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <input type="submit" name="thembaiviet" value="Thêm Bài Viết">
            </td>
        </tr>
    </table>
</form>

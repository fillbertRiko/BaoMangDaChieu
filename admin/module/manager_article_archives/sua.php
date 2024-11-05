<?php
$article_id = intval($_GET['articleid']);
$sql_sua_content = "SELECT * FROM articles WHERE article_id = ? LIMIT 1";
$stmt_sua_content = $mysqli->prepare($sql_sua_content);
$stmt_sua_content->bind_param("i", $article_id);
$stmt_sua_content->execute();
$result = $stmt_sua_content->get_result();

$sql_categories = "SELECT category_id, category_name FROM categories";
$query_categories = mysqli_query($mysqli, $sql_categories);
?>

<h1 style="text-align: center;">Sửa Bài Viết</h1>
<form method="POST" action="module/manager_article_archives/process.php" enctype="multipart/form-data">
    <table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $content = mysqli_fetch_assoc($result);
        ?>
        <tr>
            <td>Tiêu Đề Bài Viết</td>
            <td><input type="text" name="title" value="<?php echo htmlspecialchars($content['title']); ?>" required></td>
        </tr>
        <tr>
            <td>Tóm Tắt</td>
            <td><textarea name="summary" rows="5" required><?php echo htmlspecialchars($content['summary']); ?></textarea></td>
        </tr>
        <tr>
            <td>Nội Dung</td>
            <td><textarea name="content" rows="10" required><?php echo htmlspecialchars($content['content']); ?></textarea></td>
        </tr>
        <tr>
            <td>Hình Ảnh</td>
            <td>
                <input type="file" name="image" accept="image/*">
                <br>
                <?php if ($content['image']): ?>
                    <img src="upload/<?php echo htmlspecialchars($content['image']); ?>" alt="Hình ảnh bài viết" width="100" height="100">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Người Tạo Bài Viết</td>
            <td><input type="number" name="user_id" value="<?php echo htmlspecialchars($content['user_id']); ?>" readonly></td>
        </tr>
        <tr>
            <td>Loại Bài Viết</td>
            <td>
                <select name="category_id" required>
                    <option value="">-- Chọn loại bài viết --</option>
                    <?php
                    while ($category = mysqli_fetch_assoc($query_categories)) {
                        $selected = ($category['category_id'] == $content['category_id']) ? 'selected' : '';
                        echo "<option value='{$category['category_id']}' $selected>{$category['category_name']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Ngày Xuất Bản</td>
            <td><input type="datetime-local" name="published_at" value="<?php echo date('Y-m-d\TH:i', strtotime($content['published_at'])); ?>" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <input type="hidden" name="article_id" value="<?php echo $content['article_id']; ?>">
                <input type="submit" name="suabaiviet" value="Sửa Bài Viết">
            </td>
        </tr>
        <?php 
        } else {
            echo "<tr><td colspan='2'>Không tìm thấy bài viết.</td></tr>";
        }
        ?>
    </table>
</form>

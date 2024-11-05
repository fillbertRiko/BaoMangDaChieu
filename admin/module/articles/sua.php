<?php
// Lấy ID bài viết từ URL
$article_id = intval($_GET['articleid']);

// Truy vấn để lấy thông tin bài viết
$sql_sua_articles = "SELECT * FROM articles WHERE article_id='$article_id' LIMIT 1";
$query_sua_articles = mysqli_query($mysqli, $sql_sua_articles);
?>

<h1 style="text-align: center;">Sửa Bài Viết</h1>
<form method="POST" action="module/articles/process.php" enctype="multipart/form-data">
    <table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
        <tr>
            <th>Tiêu đề bài viết</th>
            <th>Nội dung bài viết</th>
            <th>Tóm tắt nội dung</th>
            <th>Ngày xuất bản</th>
            <th>Thể loại</th>
            <th>Nguồn bài viết</th>
            <th>Trạng thái</th>
            <th>Tác giả</th>
            <th>Hình ảnh</th>
        </tr>
        <?php
        if ($query_sua_articles && mysqli_num_rows($query_sua_articles) > 0) {
            $article = mysqli_fetch_array($query_sua_articles);
        ?>
        <tr>
            <td>
                <input type="text" name="title" style="width: 96%;" value="<?php echo $article['title']; ?>" required>
            </td>
            <td>
                <textarea name="content" style="width: 96%;" required><?php echo $article['content']; ?></textarea>
            </td>
            <td>
                <textarea name="summary" style="width: 96%;" required><?php echo $article['summary']; ?></textarea>
            </td>
            <td>
                <input type="date" name="publication_date" value="<?php echo $article['publication_date']; ?>" required />
            </td>
            <td>
                <input type="text" name="category" style="width: 96%;" value="<?php echo $article['category']; ?>" required>
            </td>
            <td>
                <input type="text" name="source" style="width: 96%;" value="<?php echo $article['source']; ?>" required>
            </td>
            <td>
                <select name="status" required>
                    <option value="draft" <?php echo ($article['status'] == 'draft') ? 'selected' : ''; ?>>Nháp</option>
                    <option value="published" <?php echo ($article['status'] == 'published') ? 'selected' : ''; ?>>Xuất bản</option>
                </select>
            </td>
            <td>
                <select name="author" required>
                    <option value="draft" <?php echo ($article['author_id'] == 'draft') ? 'selected' : ''; ?>>Nháp</option>
                    <option value="published" <?php echo ($article['status'] == 'published') ? 'selected' : ''; ?>>Xuất bản</option>
                </select>
            </td>
            <td>
                <input type="file" name="image" accept="image/jpeg, image/png">
                <!-- Hiển thị hình ảnh hiện tại nếu có -->
                <?php if (!empty($article['image_url'])): ?>
                    <img src="<?php echo $article['image_url']; ?>" alt="Hình ảnh hiện tại" style="max-width: 100px; max-height: 100px;">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="9" style="text-align: right;">
                <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                <input type="submit" name="suabaiviet" value="Sửa bài viết" style="width: 20%;">
            </td>
        </tr>
        <?php 
        } else {
            echo "<tr><td colspan='9'>Không tìm thấy bài viết.</td></tr>";
        }
        ?>
    </table>
</form>

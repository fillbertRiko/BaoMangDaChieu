<?php
$sql_lietke_content = "
    SELECT articles.*, users.username AS user_name, categories.category_name 
    FROM articles 
    LEFT JOIN users ON articles.user_id = users.user_id 
    LEFT JOIN categories ON articles.category_id = categories.category_id 
    ORDER BY article_id DESC
";
$query_lietke_contentlist = mysqli_query($mysqli, $sql_lietke_content);
?>

<h1 style="text-align: center">Liệt kê danh sách bài viết đã upload vào cơ sở dữ liệu</h1>
<table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
    <tr>
        <th>Tiêu đề bài viết</th>
        <th>Tóm tắt</th>
        <th>Nội dung bài viết</th>
        <th>Hình ảnh bài viết</th>
        <th>Người tạo bài viết</th>
        <th>Loại bài viết</th>
        <th>Ngày xuất bản</th>
        <th>Thao tác</th>
    </tr>
    <?php 
        while ($row = mysqli_fetch_assoc($query_lietke_contentlist)) { 
    ?>
    <tr> 
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['summary']); ?></td>
        <td><?php echo htmlspecialchars($row['content']); ?></td>
        <td>
            <?php if (!empty($row['image'])): ?>
                <img src="upload/<?php echo htmlspecialchars($row['image']); ?>" alt="Hình ảnh bài viết" width="100" height="100">
            <?php else: ?>
                Không có hình
            <?php endif; ?>
        </td>
        <td><?php echo htmlspecialchars($row['user_name']); ?></td> <!-- Hiển thị tên người tạo -->
        <td><?php echo htmlspecialchars($row['category_name']); ?></td> <!-- Hiển thị tên loại bài viết -->
        <td><?php echo htmlspecialchars($row['published_at']); ?></td>
        <td>
            <a href="module/uploads/process.php?articleid=<?php echo $row['article_id']; ?>&query=delete" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">Xoá</a> | 
            <a href="?action=quanlycontentstorage&query=edit&articleid=<?php echo $row['article_id']; ?>">Sửa</a>
        </td>
    </tr>
    <?php } ?>
</table>

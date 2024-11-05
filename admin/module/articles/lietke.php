<?php
$sql_lietke_articles = "SELECT * FROM articles ORDER BY article_id DESC";
$query_lietke_articlelist = mysqli_query($mysqli, $sql_lietke_articles);
?>
<h1 style="text-align: center">Liệt kê danh sách bài viết</h1>
<form method="POST" action="module/articles/process.php">
    <table style="width: 90%; text-align: center; border-collapse: collapse;" border="1">
        <tr>
            <th>Tiêu đề bài viết</th>
            <th>Nội dung tóm tắt</th>
            <th>Nội dung bài viết</th>
            <th>Ngày xuất bản</th>
            <th>Thể loại</th>
            <th>Nguồn bài viết</th>
            <th>Trạng thái</th>
            <th>Lượt xem</th>
            <th>Tác giả</th>
            <th>Ngày cập nhật</th>
            <th>Thao tác</th>
        </tr>
        <?php 
            while ($row = mysqli_fetch_array($query_lietke_articlelist)) { 
        ?>
        <tr> 
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['summary']; ?></td>
            <td><?php echo substr($row['content'], 0, 50) . '...'; ?></td> <!-- Rút ngắn nội dung cho bảng -->
            <td><?php echo $row['publication_date']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['source']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['view_count']; ?></td>
            <td><?php echo $row['author_id']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            <td>
                <a href="module/articles/process.php?articleid=<?php echo $row['article_id']; ?>&query=delete" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">Xoá</a> | 
                <a href="?action=quanlyarticles&query=edit&articleid=<?php echo $row['article_id']; ?>">Sửa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</form>

<?php
$sql_lietke_articles = "SELECT * FROM articlesmore ORDER BY article_id DESC";
$query_lietke_articlelist = mysqli_query($mysqli, $sql_lietke_articles);
?>
<h1 style="text-align: center">Liệt kê danh sách bài viết</h1>
<form method="POST" action="module/articlesmore/process.php">
    <table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
        <tr>
            <th>Tiêu đề bài viết</th>
            <th>Nội dung tóm tắt</th>
            <th>Nội dung bài viết</th>
            <th>Ngày bài viết xuất bản</th>
            <th>Thể loại chính bài viết</th>
            <th>Nguồn bài viết</th>
            <th>Thao tác</th>
        </tr>
        <?php 
            while ($row = mysqli_fetch_array($query_lietke_articlelist)) { 
        ?>
        <tr> 
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['summary']; ?></td> <!-- Sửa lại thành summary -->
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['publication_date']; ?></td> <!-- Sửa lại thành publication_date -->
            <td><?php echo $row['category']; ?></td> <!-- Sửa lại thành category -->
            <td><?php echo $row['source']; ?></td> <!-- Sửa lại thành source -->
            <td>
                <a href="module/articlesmore/process.php?articleid=<?php echo $row['article_id']; ?>&query=delete" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">Xoá</a> | 
                <a href="?action=quanlyarticlesmore&query=edit&articleid=<?php echo $row['article_id']; ?>">Sửa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</form>

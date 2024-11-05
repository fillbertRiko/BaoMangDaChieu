<h1 style="text-align:center;">Thêm Bài Viết</h1>
<form method="POST" action="module/articlesmost/process.php" enctype="multipart/form-data">
    <table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
        <tr>
            <th>Thể loại bài viết</th>
            <td><input type="text" name="category" required></td>
        </tr>
        <tr>
            <th>Tiêu đề bài viết</th>
            <td><input type="text" name="title" required></td>
        </tr>
        <tr>
            <th>Ngày bài viết công bố</th>
            <td>
                <input type="date" name="publication_date" required>
            </td>
        </tr>
        <tr>
            <th>Nội dung tóm tắt bài viết</th>
            <td><textarea rows="10" name="summary" required></textarea></td>
        </tr>
        <tr>
            <th>Nội dung bài viết</th>
            <td><textarea rows="25" name="content" required></textarea></td>
        </tr>
        <tr>
            <th>Nguồn bài viết</th>
            <td><textarea name="source" required></textarea></td>
        </tr>
        <tr>
            <th>Hình ảnh</th>
            <td><input type="file" name="image" accept="image/jpeg, image/png" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <input type="submit" name="thembaiviet" value="Thêm Bài Viết">
            </td>
        </tr>
    </table>
</form>

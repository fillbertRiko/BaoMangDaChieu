<?php
// Truy vấn danh sách danh mục
$sql_lietke_tag = "SELECT * FROM tags ORDER BY tag_id DESC";
$query_lietke_tag = mysqli_query($mysqli, $sql_lietke_tag);
?>

<h1 style="text-align: center">Liệt kê danh sách tag đã thêm vào cơ sở dữ liệu</h1>
<table style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align: center; border: 1px solid #000;" border="1">
    <tr>
        <th>Tên tag</th>
        <th>Thao Tác</th>
    </tr>
    <?php 
    while ($row = mysqli_fetch_array($query_lietke_tag)) { 
    ?>
    <tr> 
        <td><?php echo $row['tag_name']; ?></td>
        <td>
            <a href="module/manage_tags/process.php?tag_id=<?php echo $row['tag_id']; ?>&query=delete" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xoá</a> | 
            <a href="?action=quanlytags&query=edit&tag_id=<?php echo $row['tag_id']; ?>">Sửa</a>
        </td>
    </tr>
    <?php } ?>
</table>

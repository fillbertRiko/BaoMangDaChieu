<?php
// Truy vấn danh sách danh mục
$sql_lietke_posttype = "SELECT * FROM categories ORDER BY category_id DESC";
$query_lietke_posttypelist = mysqli_query($mysqli, $sql_lietke_posttype);
?>

<h1 style="text-align: center">Liệt kê danh sách danh mục đã thêm vào cơ sở dữ liệu</h1>
<table style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align: center; border: 1px solid #000;" border="1">
    <tr>
        <th>Tiêu đề</th>
        <th>Thao Tác</th>
    </tr>
    <?php 
    while ($row = mysqli_fetch_array($query_lietke_posttypelist)) { 
    ?>
    <tr> 
        <td><?php echo $row['category_name']; ?></td>
        <td>
            <a href="module/manage_post_types/process.php?category_id=<?php echo $row['category_id']; ?>&query=delete" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xoá</a> | 
            <a href="?action=quanlycontentinfor&query=edit&category_id=<?php echo $row['category_id']; ?>">Sửa</a>
        </td>
    </tr>
    <?php } ?>
</table>

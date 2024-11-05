<?php
// Kiểm tra kết nối cơ sở dữ liệu
if (!$mysqli) {
    die("Kết nối CSDL không thành công: " . mysqli_connect_error());
}

// Truy vấn danh sách tác giả
$sql_lietke_authorlist = "SELECT * FROM authors ORDER BY author_id DESC";
$query_lietke_authorlist = mysqli_query($mysqli, $sql_lietke_authorlist);

// Kiểm tra kết quả truy vấn
if (!$query_lietke_authorlist) {
    die("Lỗi truy vấn CSDL: " . mysqli_error($mysqli));
}
?>

<h1 style="text-align: center">Danh sách trang lấy nguồn đã thêm vào cơ sở dữ liệu</h1>
<table style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align: center; border: 1px solid #000;" border="1">
    <tr>
        <th>Tên trang</th>
        <th>Địa chỉ trang</th>
        <th>Thao tác</th>
    </tr>
    <?php 
    // Hiển thị dữ liệu nếu có
    if (mysqli_num_rows($query_lietke_authorlist) > 0) {
        while ($row = mysqli_fetch_array($query_lietke_authorlist)) { 
    ?>
    <tr> 
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['bio']); ?></td>
        <td>
            <a href="module/manage_author/process.php?author_id=<?php echo $row['author_id']; ?>&query=delete" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xoá</a> | 
            <a href="?action=quanlyuserauthor&query=edit&author_id=<?php echo $row['author_id']; ?>">Sửa</a>
        </td>
    </tr>
    <?php 
        } 
    } else { ?>
        <tr>
            <td colspan="3">Không có tác giả nào trong cơ sở dữ liệu.</td>
        </tr>
    <?php } ?>
</table>

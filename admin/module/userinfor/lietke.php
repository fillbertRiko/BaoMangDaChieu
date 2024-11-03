<?php
	// Kiểm tra kết nối
	if (!$mysqli) die("Kết nối thất bại: " . mysqli_connect_error());

	// Truy vấn danh sách người dùng
	$sql_lietke_user = "SELECT * FROM users ORDER BY user_id DESC";
	$query_lietke_user = mysqli_query($mysqli, $sql_lietke_user);
?>

<h1 style="text-align: center">Liệt kê danh sách người dùng</h1>
<table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
    <tr>
        <th>Tên Người Tạo Bài Viết</th>
        <th>Email</th>
        <th>Mật Khẩu</th>
        <th>Hành động</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($query_lietke_user)) { ?>
        <tr> 
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['password_hash']); ?></td>
            <td>
                <a href="module/userinfor/process.php?user_id=<?php echo $row['user_id']; ?>&query=delete">Xoá</a> |
                <a href="?action=quanlyuserinfor&query=edit&user_id=<?php echo $row['user_id']; ?>">Sửa</a>
            </td>
        </tr>
    <?php } ?>
</table>

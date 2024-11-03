<?php
$sql_lietke_user = "SELECT * FROM users ORDER BY user_id DESC";
$query_lietke_userlist = mysqli_query($mysqli, $sql_lietke_user);
?>
<h1 style="text-align: center">Liệt kê danh sách người dùng</h1>
<form method="POST" action="module/userinfor/process.php">
    <table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
        <tr>
            <th>Tên Người Tạo Bài Viết</th>
            <th>Email</th>
            <th>Mật Khẩu</th>
            <th>Hành Động</th>
        </tr>
        <?php 
            $i=0;
            while ($row = mysqli_fetch_array($query_lietke_userlist)) { 
                $i++;
        ?>
        <tr> 
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password_hash']; ?></td>
            <td>
                <a href="module/userinfor/process.php?userid=<?php echo $row['user_id']; ?>&query=delete" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">Xoá</a> | 
                <a href="?action=quanlyuserinfor&query=edit&userid=<?php echo $row['user_id']; ?>">Sửa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</form>
<?php
include('config/config.php'); // Kết nối với cơ sở dữ liệu

// Lấy ID người dùng từ URL
$user_id = intval($_GET['userid']);

// Truy vấn để lấy thông tin người dùng
$sql_sua_user = "SELECT * FROM user WHERE user_id='$user_id' LIMIT 1";
$query_sua_user = mysqli_query($mysqli, $sql_sua_user);
?>

<h1 style="text-align: center;">Sửa Người Dùng</h1>
<form method="POST" action="module/userinfor/process.php">
    <table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
        <tr>
            <th>Thông tin</th>
            <th>Tên Người Dùng</th>
            <th>Email</th>
            <th>Mật Khẩu</th>
        </tr>
        <?php
        if ($query_sua_user && mysqli_num_rows($query_sua_user) > 0) {
            $user = mysqli_fetch_array($query_sua_user);
        ?>
        <tr>
            <td>Nhập tên người dùng</td>
            <td>
                <input type="text" name="username" style="width: 96%;" value="<?php echo $user['username']; ?>" required>
            </td>
            <td>
                <input type="email" name="email" style="width: 96%;" value="<?php echo $user['email']; ?>" required>
            </td>
            <td>
                <input type="text" name="password" style="width: 96%;" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right;">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="submit" name="suanguoidung" value="Sửa người dùng" style="width: 20%;">
            </td>
        </tr>
        <?php 
        } else {
            echo "<tr><td colspan='4'>Không tìm thấy người dùng.</td></tr>";
        }
        ?>
    </table>
</form>

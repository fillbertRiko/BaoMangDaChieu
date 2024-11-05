<h1 style="text-align:center;">Thêm Người Dùng</h1>
<form method="POST" action="module/userinfor/process.php">
    <table style="width: 80%; text-align: center; border-collapse: collapse;" border="1">
        <tr>
            <th>Tên Người Dùng</th>
            <th>Email</th>
            <th>Mật Khẩu</th>
        </tr>
        <tr>
            <td><input type="text" name="username" required></td>
            <td><input type="email" name="email" required></td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: right;">
                <input type="submit" name="themnguoidung" value="Thêm người dùng">
            </td>
        </tr>
    </table>
</form>

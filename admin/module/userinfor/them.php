<h1>Thêm Người Dùng</h1>
<form method="POST" action="module/userinfor/process.php">
    <table style="width: 80%; text-align: center; align-items: center; border-collapse: collapse;" border="1">
        <tr>
            <th>Nhập thông tin</th>
            <th>Tên Người Tạo Bài Viết</th>
            <th>Email</th>
            <th>Mật Khẩu</th>
        </tr>
        <tr>
            <td>Nhập tên người dùng</td>
            <td>
                <input type="text" name="user" style="width: 96%;" required>
            </td>
            <td>
                <input type="email" name="email" style="width: 96%;" required>
            </td>
            <td>
                <input type="password" name="password" style="width: 96%;" required>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: right;">
                <input type="submit" name="themnguoidung" value="Thêm người tạo bài viết" style="width: 20%;">
            </td>
        </tr>
    </table>
</form>

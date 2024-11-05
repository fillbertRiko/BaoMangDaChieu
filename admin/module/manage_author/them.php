<?php
// Kết nối đến cơ sở dữ liệu
if ($mysqli->connect_error) {
    die("Kết nối CSDL không thành công: " . $mysqli->connect_error);
}
?>

<h1 style="text-align:center; margin-bottom: 20px;">Thêm trang lấy nguồn</h1>
<form method="POST" action="module/manage_author/process.php">
    <table style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align: center; border: 1px solid #000;">
        <tr>
            <td class="header-title" style="padding: 15px; font-weight: bold;">Tên trang</td>
            <td class="input-type" style="padding: 15px;">
                <input type="text" name="author_name" style="width: 96%; height: 50px; text-align: center;" required>
            </td>
        </tr>
        <tr>
            <td class="header-title" style="padding: 15px; font-weight: bold;">Địa chỉ trang</td>
            <td class="input-type" style="padding: 15px;">
                <input type="text" name="author_bio" style="width: 96%; height: 50px; text-align: center;" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding: 15px;">
                <input type="submit" name="themtentrangnguon" value="Thêm tên trang nguồn" style="width: 20%; height: 40px;">
            </td>
        </tr>
    </table>
</form>

<?php
// Lấy ID danh mục từ URL
$category_id = intval($_GET['category_id']);

// Truy vấn để lấy thông tin danh mục
$sql_sua_danhmuc = "SELECT * FROM categories WHERE category_id = $category_id LIMIT 1";
$query_sua_danhmuc = mysqli_query($mysqli, $sql_sua_danhmuc);
?>

<h1 style="text-align: center;">Sửa Danh Mục</h1>
<form method="POST" action="module/manage_post_types/process.php">
    <table style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align: center; border: 1px solid #000;">
        <?php
        if ($query_sua_danhmuc && mysqli_num_rows($query_sua_danhmuc) > 0) {
            $content = mysqli_fetch_assoc($query_sua_danhmuc);
        ?>
        <tr>
            <td>Tên Danh Mục</td>
            <td>
                <input type="text" name="category_name" style="width: 96%; height: 50px;" value="<?php echo $content['category_name']; ?>" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <input type="hidden" name="category_id" value="<?php echo $content['category_id']; ?>">
                <input type="submit" name="suadanhmuc" value="Sửa Danh Mục" style="width: 20%;">
            </td>
        </tr>
        <?php 
        } else {
            echo "<tr><td colspan='2'>Không tìm thấy danh mục.</td></tr>";
        }
        ?>
    </table>
</form>

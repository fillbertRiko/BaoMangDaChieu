<?php
// Lấy ID danh mục từ URL
$tag_id = intval($_GET['tag_id']);

// Truy vấn để lấy thông tin danh mục
$sql_sua_tag = "SELECT * FROM tags WHERE tag_id = $tag_id LIMIT 1";
$query_sua_tag = mysqli_query($mysqli, $sql_sua_tag);
?>

<h1 style="text-align: center;">Sửa Tag</h1>
<form method="POST" action="module/manage_tags/process.php">
    <table style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align: center; border: 1px solid #000;">
        <?php
        if ($query_sua_tag && mysqli_num_rows($query_sua_tag) > 0) {
            $content = mysqli_fetch_assoc($query_sua_tag);
        ?>
        <tr>
            <td>Tên Tag</td>
            <td>
                <input type="text" name="tag_name" style="width: 96%; height: 50px;" value="<?php echo $content['tag_name']; ?>" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <input type="hidden" name="tag_id" value="<?php echo $content['tag_id']; ?>">
                <input type="submit" name="suatags" value="Sửa Tag" style="width: 20%;">
            </td>
        </tr>
        <?php 
        } else {
            echo "<tr><td colspan='2'>Không tìm thấy danh mục.</td></tr>";
        }
        ?>
    </table>
</form>

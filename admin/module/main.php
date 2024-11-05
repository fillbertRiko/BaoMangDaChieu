<div class="clear"></div>
<div class="main">
    <?php
    // Kiểm tra biến action và query từ URL
    if (isset($_GET['action']) && isset($_GET['query'])) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }

    // Điều hướng theo giá trị của tam và query
    if ($tam == 'quanlyuserinfor' && $query == 'them') {
        include("userinfor/them.php");
        include("userinfor/lietke.php");
    } elseif ($tam == 'quanlyuserinfor' && $query == 'edit') {
        include("userinfor/sua.php");
    } elseif ($tam == 'quanlycontentstorage' && $query == 'them') {
        include("manager_article_archives/them.php");
        include("manager_article_archives/lietke.php");
    } elseif ($tam == 'quanlycontentstorage' && $query == 'edit') {  // Sửa '=' thành '=='
        include("manager_article_archives/sua.php");
    } elseif ($tam == 'quanlycontentinfor' && $query == 'them') {
        include("manage_post_types/them.php");
        include("manage_post_types/lietke.php");
    } elseif ($tam == 'quanlycontentinfor' && $query == 'edit') {  // Sửa '=' thành '=='
        include("manage_post_types/sua.php");  // Đảm bảo rằng đường dẫn này đúng
    } elseif ($tam == 'quanlytags' && $query == 'them') {
        include("manage_tags/them.php");
        include("manage_tags/lietke.php");
    } elseif ($tam == 'quanlytags' && $query == 'edit') {  // Sửa '=' thành '=='
        include("manage_tags/sua.php");  // Đảm bảo rằng đường dẫn này đúng
    } elseif ($tam == 'quanlyuserauthor' && $query == 'them') {
        include("manage_author/them.php");
        include("manage_author/lietke.php");
    } elseif ($tam == 'quanlyuserauthor' && $query == 'edit') {  // Sửa '=' thành '=='
        include("manage_author/sua.php");  // Đảm bảo rằng đường dẫn này đúng
    } else {
        include("dashboard.php");
    }
    ?>
</div>

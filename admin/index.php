<?php
    session_start();
    if(!isset($_SESSION['dangnhap']))
    {
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
    <title>Admincp</title>
</head>
<body>
    <h1 class="title-admin">Chào mừng đến với trang quản lý bài viết</h1>

    <div class="wrapper">    
        <?php
        include ("config/config.php");
        include ("module/header.php");
        include ("module/menu.php");
        include ("module/main.php");
        include ("module/footer.php");
        ?>
    </div>
</body>
</html>
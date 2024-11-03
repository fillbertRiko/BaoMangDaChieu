<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : "Magazine Plus"; ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/javaScript.js" defer></script>
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;600&family=Merriweather:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper section-homepage">
        <?php 
        $pageTitle = "Magazine Plus - Trang chủ";
        $hotNews = [
            "Mở ra không gian phát triển mới cho quan hệ giữa Việt Nam với ba nước Trung Đông",
            "Tổng Bí thư Tô Lâm tiếp Chủ tịch Quốc hội Cuba Esteban Lazo Hernandez"
        ];

        // Kết hợp các tin tức thành một chuỗi
        $hotNewsString = implode(" |-----| ", $hotNews);
        include 'pages/header.php'; 
        include 'pages/menu.php'; 
        ?>


        <?php include 'pages/main.php' ?>

        <?php include 'pages/footer.php'; ?>
    </div>
</body>
</html>

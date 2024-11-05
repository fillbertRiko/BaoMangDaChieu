<div class="clear"></div>
<div class="main">
    <?php
    // Kiểm tra biến action và query từ URL
    $tam = $_GET['action'] ?? ''; // Sử dụng toán tử null coalescing
    $query = $_GET['query'] ?? '';

    // Mảng điều hướng để ánh xạ các action và query đến file cần include
    $navigation = [
        'quanlyuser' => [
            'them' => ['userinfor/them.php', 'userinfor/lietke.php'],
            'edit' => ['userinfor/sua.php'],
        ],
        'quanlyarticles' => [
            'them' => ['articles/them.php', 'articles/lietke.php'],
            'edit' => ['articles/sua.php'],
        ],
        'quanlyarticlesday' => [
            'them' => ['articlesday/them.php', 'articlesday/lietke.php'],
            'edit' => ['articlesday/sua.php'],
        ],
        'quanlyarticlesmost' => [
            'them' => ['articlesmost/them.php', 'articlesmost/lietke.php'],
            'edit' => ['articlesmost/sua.php'],
        ],
        'quanlyarticlesmore' => [
            'them' => ['articlesmore/them.php', 'articlesmore/lietke.php'],
            'edit' => ['articlesmore/sua.php'],
        ],
    ];

    // Kiểm tra nếu action và query tồn tại trong mảng điều hướng
    if (isset($navigation[$tam][$query])) {
        foreach ($navigation[$tam][$query] as $file) {
            include($file);
        }
    } else {
        include("dashboard.php");
    }
    ?>
</div>

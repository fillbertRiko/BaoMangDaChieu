<main>
    <?php
    if(isset($_GET['quanly']))
    {
        $tam = $_GET['quanly'];
    }else{
        $tam = '';
    }
    if ($tam=='vanhoa') {
        include("main/vanhoa.php");
    }elseif($tam=='amnhac'){
        include("main/amnhac.php");
    }elseif($tam=='congnghe'){
        include("main/congnghe.php");
    }elseif($tam=='dulich'){
        include("main/dulich.php");
    }elseif($tam=='phimanh'){
        include("main/phimanh.php");
    }elseif($tam=='thoitrang'){
        include("main/thoitrang.php");
    }elseif($tam=='tintuc'){
        include("main/tintuc.php");
    }else{
        include("main/index.php");
    }
    ?>
</main>

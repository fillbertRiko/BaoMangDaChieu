<div class="clear"></div>
<div class="main">
	<?php
    if(isset($_GET['action']) && $_GET['query'])
    {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    }else{
        $tam = '';
        $query = '';
    }
    if ($tam=='quanlyuserinfor' && $query=='them') {
        include("userinfor/them.php");
        include("userinfor/lietke.php");
    }elseif($tam=='quanlyuserinfor' && $query=='edit'){
        include("userinfor/sua.php");
    }
    else{
        include("dashboard.php");
    }
    ?>
</div>
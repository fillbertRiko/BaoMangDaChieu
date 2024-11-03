<div class="clear"></div>
<div class="main">
	<?php
    if(isset($_GET['action']))
    {
        $tam = $_GET['action'];
    }else{
        $tam = '';
    }
    if ($tam=='quanlyuserinfor') {
        include("userinfor/them.php");
        include("userinfor/lietke.php");
    }else{
        include("dashboard.php");
    }
    ?>
</div>
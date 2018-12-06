<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 31/05/2018
 * Time: 11:41
 */
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="template/img/icon.png" />
    <link rel="stylesheet" type="text/css" href="template/semantic-ui/semantic.min.css">
    <script type="text/javascript" src="template/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="template/semantic-ui/semantic.min.js"></script>
    <title>Kuliah web dosen Pizaini, ST, M.Kom</title>
</head>
<body>
<div class="ui olive inverted top huge menu">
    <div class="header item">
        Apps
    </div>
    <a class="item" href="index.php?module=default" title="List kuliah web">Kuliah web</a>
</div>
<div class="ui container">
    <?php
    if(file_exists($incude)){
        include $incude;
    }else{
        echo 'Maaf halaman yang anda request tidak tersedia';
    }
    ?>
</div>
</body>
</html>
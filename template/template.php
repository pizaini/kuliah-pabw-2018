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
    <title>This is title</title>
</head>
<body>
<p>Menu:</p>
<ul>
    <li><a href="index.php?module=default">Employe</a> </li>
    <li><a href="index.php?module=mahasiswa">Mahasiswa</a> </li>
</ul>
<?php
if(file_exists($incude)){
    include $incude;
}else{
    echo 'Maaf halaman yang anda request tidak tersedia';
}
?>
</body>
</html>
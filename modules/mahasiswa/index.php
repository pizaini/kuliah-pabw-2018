<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 07/06/2018
 * Time: 11:14
 */
?>
    <h1>Data Mahasiswa</h1>
<a href="index.php?module=mahasiswa&page=insert">Tambah data</a>
<?php
$statement = $connection->prepare('select * from MAHASISWA');
$result = null;
try{
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
}catch (Exception $exc){
    die($exc->getMessage());
}
?>
<?php foreach ($result as $item):?>
    <p>
        <?=$item->NIM?>
        <?=$item->NAMA?>
        <?=$item->TANGGAL_LAHIR?>
    </p>
<?php endforeach;?>
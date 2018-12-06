<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 31/05/2018
 * Time: 11:50
 */
?>
<h2 class="ui header">
    <i class="globe green icon"></i>
    <div class="content">
        Kuliah web
    </div>
</h2>
<?php
$statement = $connection->prepare('select distinct (tahun) from kelas');
$resultTahun = null;
try{
    $statement->execute();
    $resultTahun = $statement->fetchAll(PDO::FETCH_OBJ);
}catch (Exception $exc){
    die($exc->getMessage());
}
?>

<div class="ui fluid menu">
<?php foreach ($resultTahun as $item):?>
    <a class="item" href="index.php?module=default&tahun=<?=$item->tahun?>" title="Tahun kuliah"><?=$item->tahun?></a>
<?php endforeach;?>
</div>

<?php
$tahun = intval($_GET['tahun'] ?? date('Y'));
?>
<h3 class="ui dividing header">
    Kelas web tahun <?=$tahun?>
</h3>
<?php
$statement = $connection->prepare('select
 kelas.tahun as tahun, 
 kelas.kelas as nama_kelas,
 kelas.kode as kode_kelas,
 mata_kuliah.kode as kode_mata_kuliah,
 mata_kuliah.mata_kuliah as nama_mata_kuliah
 from kelas left join mata_kuliah on kelas.kode_mata_kuliah = mata_kuliah.kode  where tahun = :tahun');
$resultSelectedKelas = null;
try{
    $statement->execute([
        ':tahun' => $tahun
    ]);
    $resultSelectedKelas = $statement->fetchAll(PDO::FETCH_OBJ);
}catch (Exception $exc){
    die($exc->getMessage());
}
?>

<?php if(empty($resultSelectedKelas)):?>
    <p>Tidak ada data</p>
<?php else:?>
<div class="ui internally celled grid">
<?php foreach ($resultSelectedKelas as $item): ?>
    <div class="row">
        <div class="six wide center aligned  column">
            <i class="users massive circular olive icon"></i>
        </div>
        <div class="ten wide column">
            <div class="content">
                <a class="header" href="index.php?module=default&page=list&kode=<?=$item->kode_kelas?>"><?=$item->nama_mata_kuliah?></a>
                <div class="description"><?=$item->tahun?> / <?=$item->nama_kelas?></div>
            </div>
        </div>
    </div>
<?php endForeach?>
</div>
<?php endif?>
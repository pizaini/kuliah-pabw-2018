<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 07/11/2018
 * Time: 7:05
 */
$kodeKelas = strval($_GET['kode'] ?? 'n/a');
?>
<h1>List mahasiswa</h1>
<?php
$statement = $connection->prepare('select  
kelas.tahun as tahun, 
 kelas.kelas as nama_kelas,
 kelas.kode as kode_kelas,
 mata_kuliah.kode as kode_mata_kuliah,
 mata_kuliah.mata_kuliah as nama_mata_kuliah
 from kelas left join mata_kuliah on kelas.kode_mata_kuliah = mata_kuliah.kode  where kelas.kode = :kode_kelas');
$resultSelectedKelas = null;
try{
    $statement->execute([
        ':kode_kelas' => $kodeKelas
    ]);
    $resultSelectedKelas = $statement->fetch(PDO::FETCH_OBJ);
}catch (Exception $exc){
    die($exc->getMessage());
}
?>

<?php if(empty($resultSelectedKelas)):?>
    <p>Tidak ada data</p>
<?php else:?>
    <?php
    $statement = $connection->prepare('select * from kuliah left  join mahasiswa on kuliah.nim = mahasiswa.nim where kode_kelas = :kode_kelas');
    $resultMahasiswaKelas = null;
    try{
        $statement->execute([
            ':kode_kelas' => $kodeKelas
        ]);
        $resultMahasiswaKelas = $statement->fetchAll(PDO::FETCH_OBJ);
    }catch (Exception $exc){
        die($exc->getMessage());
    }
    ?>
    <p>Mata kuliah: <?=$resultSelectedKelas->nama_mata_kuliah?></p>
    <p>Tahun: <?=$resultSelectedKelas->tahun?></p>
    <p>Kelas: <?=$resultSelectedKelas->nama_kelas?></p>
    <table class="ui table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Website</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($resultMahasiswaKelas)):?>
            <?php foreach ($resultMahasiswaKelas as $index => $item): ?>
                <tr>
                    <td><?=++$index?></td>
                    <td><?=$item->nim?></td>
                    <td><?=$item->nama?></td>
                    <td><a href="index.php?module=default&page=update&kode=<?=$item->kode?>" title="Edit website">...</a> <a href="http://<?=$item->website?>"target="_blank"><?=$item->website?></a> </td>
                </tr>
            <?php endForeach?>
        <?php else:?>
            <tr>
                <td colspan="4">Tidak ada list mahasiswa di kelas ini</td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
<?php endif?>
<script type="text/javascript" src="template/js/jquery.tablesort.min.js"></script>
<script type="text/javascript">
    //$('table').tablesort();
</script>
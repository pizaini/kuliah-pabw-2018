<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 02/06/2018
 * Time: 15:55
 */
?>
    <h1>Update website mahasiswa</h1>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $kodeKuliahPost = $_POST['kode_kuliah'] ?? 'n/a';
    $websitePost = $_POST['website'] ?? 'www.example.com';
    $statement = $connection->prepare('update kuliah set website = :website where kode = :kode');
    $resultUpdate = null;
    try{
        $resultUpdate = $statement->execute([
            ':website' => $websitePost,
            ':kode' => $kodeKuliahPost
        ]);
    }catch (Exception $exc){
        die($exc->getMessage());
    }
    if($resultUpdate){
        echo 'Sudah diupdate';
    }else{
        echo 'Gagal diupdate';
    }
}

$kodeKuliah = $_GET['kode'] ?? 'n/a';
$statement = $connection->prepare('select  * from kuliah left join mahasiswa on kuliah.nim = mahasiswa.nim where kode = :kode');
$resultKuliah = null;
try{
    $statement->execute([
        ':kode' => $kodeKuliah
    ]);
    $resultKuliah = $statement->fetch(PDO::FETCH_OBJ);
}catch (Exception $exc){
    die($exc->getMessage());
}
?>
<?php
if(empty($resultKuliah)):?>
    <p>Tidak ada data</p>
<?php else:?>
    <form class="ui form" method="post" action="index.php?module=default&page=update&kode=<?=$kodeKuliah?>">
        <input type="hidden" name="kode_kuliah" value="<?=$kodeKuliah?>">
        <table>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><textarea name="nama" id="nama" readonly><?=$resultKuliah->nama?></textarea></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td><input type="text" name="nim" id="nim" readonly value="<?=$resultKuliah->nim?>"></td>
            </tr>
            <tr>
                <td><label for="website">Website (tanpa http/s)</label></td>
                <td><input type="text" name="website" id="website" value="<?=$resultKuliah->website?>" class="field"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button type="submit" class="ui button positive">Simpan</button> </td>
            </tr>
        </table>
    </form>
<?php endif?>
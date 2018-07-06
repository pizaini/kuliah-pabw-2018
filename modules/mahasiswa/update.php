<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 28/06/2018
 * Time: 9:25
 */

if(!empty($_POST)){
    //menangkap data POST
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $tglLahir = $_POST['tgl_lahir'];
    //lakukan query
    $statement = $connection->prepare('UPDATE MAHASISWA SET TANGGAL_LAHIR = TO_DATE(:tanggalLahir, \'yyyy-mm-dd\'), NAMA = :nama WHERE NIM = :nim');
    try{
        //Binding parameters
        $statement->execute([
            ':nim' => $nim,
            ':tanggalLahir' => $tglLahir,
            ':nama' => $nama
        ]);
        //redirect
        header('location: index.php?module=mahasiswa');
    }catch (Exception $exc){
        die($exc->getMessage());
    }
}
//JIKA REQUEST adalah GET
//query data berdasarkan NIM, jika NIM tidak tersedia, default 0
$nim = $_GET['nim'] ?? 0;
$selectedMahasiswa = null;
try{
    $statement = $connection->prepare('select NIM, NAMA, TO_CHAR(TANGGAL_LAHIR, \'YYYY-MM-DD\') as TANGGAL_LAHIR from MAHASISWA where NIM = :nim');
    $statement->execute([
        ':nim' => $nim
    ]);
    //ambil satu ROW
    $selectedMahasiswa = $statement->fetch(PDO::FETCH_OBJ);
}catch (Exception $exception){
    die($exception->getMessage());
}
?>
<h1>Ubah data mahasiswa</h1>
<form method="post" action="index.php?module=mahasiswa&page=update">
    <?php if($selectedMahasiswa !== false):?>
    <input type="hidden" name="nim" value="<?=$selectedMahasiswa->NIM?>">
    <p>NIM: <?=$nim?></p>
    <p>
        <label>Nama</label>
        <input type="text" name="nama" value="<?=$selectedMahasiswa->NAMA?>">
    </p>
    <p>
        <label>Tgl lahir</label>
        <input type="date" name="tgl_lahir" value="<?=$selectedMahasiswa->TANGGAL_LAHIR?>">
    </p>
    <p>
        <button type="submit">Simpan</button>
    </p>
    <?php else:?>
    <p>Maaf, NIM "<?=$nim?>" tidak tersedia</p>
    <?php endif;?>
</form>
<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 28/06/2018
 * Time: 9:25
 */
?>
<h1>Tambah data mahasiswa</h1>
<form method="post" action="index.php?module=mahasiswa&page=insert">
    <p>
        <label>NIM</label>
        <input type="text" name="nim">
    </p>
    <p>
        <label>Nama</label>
        <input type="text" name="nama">
    </p>
    <p>
        <label>Tgl lahir</label>
        <input type="date" name="tgl_lahir">
    </p>
    <p>
        <button type="submit">Simpan</button>
    </p>
</form>

<?php
if(!empty($_POST)){
    //menangkap data POST
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $tglLahir = $_POST['tgl_lahir'];
    //lakukan query
    $statement = $connection->prepare('INSERT INTO MAHASISWA (NIM, TANGGAL_LAHIR, NAMA) VALUES (:nim, TO_DATE(:tglLahir, \'yyyy-mm-dd\'), :nama)');
    try{
        //Binding parameters
        $statement->execute([
            ':nim' => $nim,
            ':tglLahir' => $tglLahir,
            ':nama' => $nama
        ]);
        //redirect
        header('location: index.php?module=mahasiswa');
    }catch (Exception $exc){
        die($exc->getMessage());
    }
}
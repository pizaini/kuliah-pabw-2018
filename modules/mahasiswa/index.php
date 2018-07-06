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
    <table>
        <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tanggal lahir</th>
            <th>Edit/delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $item):?>
        <tr>
            <td><?=$item->NIM?></td>
            <td><?=$item->NAMA?></td>
            <td><?=$item->TANGGAL_LAHIR?></td>
            <td>
                <a href="index.php?module=mahasiswa&page=update&nim=<?=$item->NIM?>"> Edit </a> |
                <a href="index.php?module=mahasiswa&page=delete&nim=<?=$item->NIM?>"> Hapus </a>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>

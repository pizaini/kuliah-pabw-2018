<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 31/05/2018
 * Time: 11:50
 */
?>
<h1>Data Employe sample</h1>
<?php
$statement = $connection->prepare('select * from EMP');
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
        <?=$item->ENAME?>
        <?=$item->HIREDATE?>
    </p>
<?php endforeach;?>
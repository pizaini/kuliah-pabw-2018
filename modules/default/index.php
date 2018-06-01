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
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result): ?>
    <p><?= $result->EMPNO ?> <?= $result->ENAME ?> <?= $result->JOB ?></p>
<?php endforeach; ?>
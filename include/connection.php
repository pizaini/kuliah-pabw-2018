<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 31/05/2018
 * Time: 12:06
 */
$connection = null;
try {
    $username = 'PABW';
    $password = 'xxxxxx';
    $database = 'oci:dbname=//localhost:1521/xe';
    $connection = new PDO($database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
    die();
}

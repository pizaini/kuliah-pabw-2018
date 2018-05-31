<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 31/05/2018
 * Time: 11:41
 */
$modules = $_GET['module'] ?? 'default';
$page = $_GET['page'] ?? 'index';


$incude = 'modules/'.$modules.'/'.$page.'.php';

include 'template/template.php';
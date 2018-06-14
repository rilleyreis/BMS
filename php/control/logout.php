<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 06:31
 */

session_start();

if(file_exists('../util/config.php')){
    require '../util/config.php';
    require '../php/model/Log.php';
}else{
    require '../../util/config.php';
    require '../../php/model/Log.php';
}

$log = new Log();
$log->criarLOG($pdo,"REALIZOU LOGIN NO SISTEMA");

session_destroy();

header("Location:/bms");
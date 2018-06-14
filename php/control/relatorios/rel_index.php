<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 03:35
 */

if(isset($_POST['mov'])){
    $tipo = $_POST['tipo'];
    $time = $_POST['time'];
    header("Location: ".$tipo.".php?t=".$time);
}

if(isset($_POST['os'])){
    $tipo = $_POST['tipo'];
    $time = $_POST['time'];
    header("Location: ".$tipo.".php?t=".$time);
}

if(isset($_POST['venda'])){
    $tipo = $_POST['tipo'];
    $time = $_POST['time'];
    header("Location: ".$tipo.".php?t=".$time);
}

if(isset($_POST['prod'])){
    $tipo = $_POST['tipo'];
    $time = $_POST['time'];
    header("Location: ".$tipo.".php?t=".$time);
}
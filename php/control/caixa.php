<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/03/2018
 * Time: 22:12
 */

require 'util/config.php';
require 'php/model/Caixa.php';

$user = $_SESSION['id_user'];
$nuser = $_SESSION['nome'];
$panelUser = $_SESSION['panel'];
$data = date("Y-m-d");
$hora = date("H:m");
$troco = "";

if(isset($_POST['abrir'])){
    $caixa = new Caixa();
    $caixa->setDataCAIXA($_POST['data']);
    $caixa->setHoraCAIXA($_POST['hora']);
    $troco = str_replace("R$ ", "", $_POST['troco']);
    $troco = str_replace(",", ".", $troco);
    $caixa->setTrocoCAIXA($troco);
    $caixa->setidUSER($user);
    $caixa->realizarAbertura($pdo);
    header("Location: pag/".$panelUser.".php");
}
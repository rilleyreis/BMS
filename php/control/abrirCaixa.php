<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 04/04/2018
 * Time: 20:31
 */

session_start();

include "util/config.php";
require "php/model/Caixa.php";
require "php/model/Log.php";

$nome = $_SESSION['nomeUser'];
$nome .= " ".$_SESSION['snomeUser'];
$erro = "display: none;";
$msg = "";
$color = "";
$colorText = "";


if(isset($_POST['abrir'])){
    sleep(5);
    $troco = trim(strip_tags($_POST['troco']));
    $data = trim(strip_tags($_POST['data']));
    $hora = trim(strip_tags($_POST['hora']));
    $idUser = $_SESSION['idUser'];

    $troco = str_replace("R$ ", "", $troco);
    $troco = str_replace(",", ".", $troco);

    $caixa= new Caixa();
    $caixa->setUser($idUser);
    $caixa->setTroco($troco);
    $caixa->setData($data);
    $caixa->setHora($hora);

    $log = new Log();
    $log->criarLOG($pdo,"REALIZAOU A ABERTURA DO CAIXA");

    if($caixa->abrirCaixa($pdo)){
        header("Location: pag/admin");
    }else{
        echo "NÃO FOI";
    }
}
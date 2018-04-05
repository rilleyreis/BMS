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

$nome = $_SESSION['fnomeUser'];
$nome .= " ".$_SESSION['lnomeUser'];
$erro = "display: none;";
$msg = "";
$color = "";
$colorText = "";


if(isset($_POST['abrir'])){
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

    if($caixa->abrirCaixa($pdo)){
        $erro = "display:block";
        $msg = "Caixa Aberto. Redirecionando";
        $color = "w3-pale-blue";
        $colorText = "w3-text-blue";
        header("Refresh:3; url=pag/admin");
    }else{
        echo "NÃO FOI";
    }
}
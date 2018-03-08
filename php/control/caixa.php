<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/03/2018
 * Time: 22:12
 */

require 'util/config.php';
require 'php/model/Caixa.php';
require 'php/model/Session.php';

$session = new Session();
$session->buscaDados($pdo);
$user = $session->getId();
$nome_user = $session->getPnome()." ".$session->getLnome();
$panelUser = $session->getPanel();
$data = date("Y-m-d");
$hora = date("H:i:s");
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
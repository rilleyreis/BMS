<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 08:03
 */

require "../../php/model/Empresa.php";
require "../../php/model/Caixa.php";
require "../../php/model/Usuario.php";
require '../../php/model/Movimentacao.php';

$empresa = new Empresa();
$dadosEmp = $empresa->buscaDados($pdo);


$horaA = "";
$userA = "";
$troco = "";
$emcaixa = "";
if(isset($_POST['fechar'])){
    $caixa = new Caixa();
    $caixa->setId($_POST['idcaixa']);
    $caixa->setDataF(date('Y-m-d'));
    $caixa->setHoraF($_POST['horaF']);
    $caixa->setDinheiro($_POST['dinheiro']);
    $caixa->setCartao($_POST['cartao']);
    $caixa->setRetirada($_POST['retirada']);
    $emcaixa = str_replace("R$ ", "", $_POST['emcaixa']);
    $emcaixa = str_replace(",", ".", $emcaixa);
    $caixa->setEmcaixa($emcaixa);
    $caixa->setUserF($_POST['userF']);
    $caixa->fecharCaixa($pdo);
}

$caixa = new Caixa();
$caixa->setData(date('Y-m-d'));
$dadosCaixa = $caixa->dadosCaixa($pdo);
foreach ($dadosCaixa as $dado) {
    $troco = str_replace(".", ",", $dado['trocoCAIXA']);
    $userA = $dado['USERS_idUSER'];
    $horaA = $dado['horaCAIXA'];
    $cx = $dado['idCAIXA'];
}

$users = new Usuario();
$users->setId($userA);
$dadosUsr = $users->buscaDados($pdo);
foreach ($dadosUsr as $item) {
    $userA = $item['nomeFull'];
}

$userF = $_SESSION['nomeUser']." ".$_SESSION['snomeUser'];
$horaF = date('H:i:s');

$mov = new Movimentacao();
$mov->setCaixa($cx);
$valorRetirada = $mov->valorDiario($pdo, "AND `tipoMOVIMENTACAO` > 2");
foreach ($valorRetirada as $item) {
    $valorRetirada = $item['valor'] != "" ? $item['valor'] : 00.00;
}
$mov->setFrmpag("DINHEIRO");
$dinheiro = $mov->valorForma($pdo);
foreach ($dinheiro as $item) {
    $dinheiro =  $item['valor'] != "" ? $item['valor'] : 00.00;
}
$mov->setFrmpag("CRÉDITO");
$valorCC = $mov->valorForma($pdo);
foreach ($valorCC as $item) {
    $valorCC =  $item['valor'] != "" ? $item['valor'] : 00.00;
}
$mov->setFrmpag("DÉBITO");
$valorCD = $mov->valorForma($pdo);
foreach ($valorCD as $item) {
    $valorCD = $item['valor'] != "" ? $item['valor'] : 00.00;
}
$cartao = $valorCC + $valorCD;


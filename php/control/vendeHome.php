<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 12:31
 */

require '../php/model/Caixa.php';
require '../php/model/Movimentacao.php';
require '../php/model/OS.php';
require '../php/model/Log.php';

$cx = new Caixa();
$mov = new Movimentacao();
$cx->setData(date('Y-m-d'));
$dadosCx = $cx->dadosCaixa($pdo);
foreach ($dadosCx as $dado) {
    $troco = str_replace(".", ",", $dado['trocoCAIXA']);
    $cx = $dado['idCAIXA'];
}

if (isset($_POST['sel'])){
    $id = base64_encode($_POST['sel']);
    header('Location:'.$nivel.'dados.php?edt='.$id);
}

if(isset($_POST['retirar'])){
    $valor = str_replace("R$ ", "", $_POST['valor']);
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", ".", $valor);
    $tipo = $_POST['tipo'];
    $descricao = strip_tags(trim($_POST['descricao']));
    $user = $_SESSION['idUser'];
    $mov->setCaixa($cx);
    $mov->setDescricao($descricao);
    $mov->setTipo($tipo);
    $mov->setUser($user);
    $mov->setValor($valor);
    $mov->movimentar($pdo);
    $tipo = $tipo == 3 ? "SANGRIA" : "DESPESA";
    $log = new Log();
    $log->criarLOG($pdo,"REALIZOU UMA RETIRADA PARA $tipo");
}

if(isset($_POST['cancel'])){
    $id = $_POST['cancel'];
    $ordemS->setId($id);
    $ordemS->setStatus(7);
    $ordemS->trocarStatus($pdo);
    $log = new Log();
    $log->criarLOG($pdo,"CANCELOU UMA OS");
}



$mov->setCaixa($cx);
$valorDia = $mov->valorDiario($pdo, "AND `tipoMOVIMENTACAO` < 3");
foreach ($valorDia as $item) {
    $valorDia = $item['valor'] != "" ? $item['valor'] : 00.00;
}
$valorRetirada = $mov->valorDiario($pdo, "AND `tipoMOVIMENTACAO` > 2");
foreach ($valorRetirada as $item) {
    $valorRetirada = $item['valor'] != "" ? $item['valor'] : 00.00;
}
$mov->setFrmpag("DINHEIRO");
$valorDin = $mov->valorForma($pdo);
foreach ($valorDin as $item) {
    $valorDin =  $item['valor'] != "" ? $item['valor'] : 00.00;
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

$msg = "";
$ordemS = new OS();
$tecnico = "WHERE `statusORDEMSERVICO` = 3 OR `statusORDEMSERVICO` = 5 ";
$num_os = $ordemS->buscaQtd($tecnico,$pdo);

if ($num_os == 0){
    $msg = "Nenhum registro encontrado";
}else {
    $qtd_pags = 5;
    $total_pags = ceil($num_os / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $tecnico = "WHERE `status` = 3 OR `status` = 5 ";
    $os_exibir = $ordemS->buscaLtda($pdo, $inicio, $qtd_pags, $tecnico);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
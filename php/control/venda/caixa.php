<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 11/06/2018
 * Time: 19:28
 */

require '../../php/model/Caixa.php';
require '../../php/model/Movimentacao.php';
require '../../php/model/Log.php';

$cx = new Caixa();
$mov = new Movimentacao();
$cx->setData(date('Y-m-d'));
$dadosCx = $cx->dadosCaixa($pdo);
foreach ($dadosCx as $dado) {
    $troco = str_replace(".", ",", $dado['trocoCAIXA']);
    $cx = $dado['idCAIXA'];
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

$mov = new Movimentacao();
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

$num_mov = $mov->buscaQtd($pdo);


if ($num_mov == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_mov / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $limit = " LIMIT $inicio, $qtd_pags";
    $mov_exibir = $mov->buscaLtda($pdo, $limit);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
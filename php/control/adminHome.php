<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 04/04/2018
 * Time: 21:45
 */

require "../php/model/Caixa.php";
require "../php/model/Movimentacao.php";
require "../php/model/OS.php";
require "../php/model/Pessoa.php";
date_default_timezone_set("America/Sao_Paulo");

$caixa = new Caixa();
$caixa->setData(date("Y-m-d"));
$dadosCaixa = $caixa->dadosCaixa($pdo);
$troco = "";
$idCx = "";
foreach ($dadosCaixa as $item) {
    $troco = str_replace(".", ",", $item['trocoCAIXA']);
    $idCx = $item['idCAIXA'];
}
$mov = new Movimentacao();
$mov->setCaixa($idCx);
$valorDia = $mov->valorDiario($pdo);
foreach ($valorDia as $item) {
    $valorDia = $item['valor'] != "" ? $item['valor'] : 00.00;
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

$ordem = new OS();
$aberta = "";
$orcada = "";
$aprovada = "";
$concluida = "";
$final = "";
$cancela = "";
$total = 0;
$perFim = "";
$perCan = "";
$perAnd = "";
for ($i = 2; $i <= 7; $i++){
    $ordem->setStatus($i);
    $qtd = $ordem->buscaQtdStatus($pdo);
    foreach ($qtd as $item) {
        $qtd = $item['qtd'] != "" ? $item['qtd'] : 0;
    }
    switch ($i){
        case 2 : $aberta = $qtd; break;
        case 3 : $orcada = $qtd; break;
        case 4 : $aprovada = $qtd; break;
        case 5 : $concluida = $qtd; break;
        case 6 : $final = $qtd; break;
        case 7 : $cancela = $qtd; break;
    }
}

$dtIni = date('Y-m-d', strtotime('-30 days'));
$dtFim = date('Y-m-d');
$filtro = "";
$total = $ordem->buscaSttDt($pdo, $dtIni, $dtFim, $filtro);
foreach ($total as $item) {
    $total = $item['qtd'] != "" ? $item['qtd'] : 0;
}
$filtro = "`statusORDEMSERVICO` < 6 AND";
$perAnd = $ordem->buscaSttDt($pdo, $dtIni, $dtFim, $filtro);
foreach ($perAnd as $item) {
    $perAnd = $item['qtd'] != "" ? $item['qtd'] : 0;
}
$filtro = "`statusORDEMSERVICO` = 6 AND";
$perFim = $ordem->buscaSttDt($pdo, $dtIni, $dtFim, $filtro);
foreach ($perFim as $item) {
    $perFim = $item['qtd'] != "" ? $item['qtd'] : 0;
}
$filtro = "`statusORDEMSERVICO` = 7 AND";
$perCan = $ordem->buscaSttDt($pdo, $dtIni, $dtFim, $filtro);
foreach ($perCan as $item) {
    $perCan = $item['qtd'] != "" ? $item['qtd'] : 0;
}
if($total > 0) {
    $perAnd = round(($perAnd * 100) / $total, 2);
    $perFim = round(($perFim * 100) / $total, 2);
    $perCan = round(($perCan * 100) / $total, 2);
}else{
    $perAnd = 0;
    $perFim = 0;
    $perCan = 0;
}

$dtIni = date('d/m/Y', strtotime($dtIni));
$dtFim = date('d/m/Y', strtotime($dtFim));

$pessoa = new Pessoa();
$numCli = $pessoa->buscaQtd($pdo, 'C');
$numUser = $pessoa->buscaQtd($pdo, 'U');
$numForne = $pessoa->buscaQtd($pdo, 'F');

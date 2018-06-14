<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 05:11
 */

require "../../php/model/OS.php";
require "../../php/model/Empresa.php";

$empresa = new Empresa();
$dadosEmp = $empresa->buscaDados($pdo);

$ordem = new OS();

$periodo = $_GET['t'];

$dtIni = "";
$dtFim = date('Y-m-d');
switch ($periodo){
    case 1 : $dtIni = date('Y-m-d', strtotime('-7 days')); break;
    case 2 : $dtIni = date('Y-m-d', strtotime('-15 days')); break;
    case 3 : $dtIni = date('Y-m-d', strtotime('-30 days')); break;
    case 4 : $dtIni = date('Y-m-d', strtotime('-180 days')); break;
    case 5 : $dtIni = date('Y-m-d', strtotime('-365 days')); break;
}

$aberta = "";
$orcada = "";
$aprovada = "";
$concluida = "";
$final = "";
$cancela = "";
$total = 0;
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
    $total += $qtd;
}
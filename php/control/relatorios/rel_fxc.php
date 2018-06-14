<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 04:59
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

$filtro = "";
$total = $ordem->buscaSttDt($pdo, $dtIni, $dtFim, $filtro);
foreach ($total as $item) {
    $total = $item['qtd'] != "" ? $item['qtd'] : 0;
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
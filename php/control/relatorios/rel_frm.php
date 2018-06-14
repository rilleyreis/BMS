<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 03:25
 */

require "../../php/model/Empresa.php";
require "../../php/model/Relatorios.php";

$empresa = new Empresa();
$dadosEmp = $empresa->buscaDados($pdo);

$periodo = $_GET['t'];

$relatorio = new Relatorios();
$dtIni = "";
$dtFim = date('Y-m-d');
switch ($periodo){
    case 1 : $dtIni = date('Y-m-d', strtotime('-7 days')); break;
    case 2 : $dtIni = date('Y-m-d', strtotime('-15 days')); break;
    case 3 : $dtIni = date('Y-m-d', strtotime('-30 days')); break;
    case 4 : $dtIni = date('Y-m-d', strtotime('-180 days')); break;
    case 5 : $dtIni = date('Y-m-d', strtotime('-365 days')); break;
}
$periodo = "AND `data` BETWEEN '".$dtIni."' AND '".$dtFim."'";
$dadosRel = $relatorio->forma($pdo, $periodo);



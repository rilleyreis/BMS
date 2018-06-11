<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 11/06/2018
 * Time: 16:45
 */

require '../../php/model/Log.php';
require "../../php/model/Empresa.php";

$empresa = new Empresa();
$dadosEmp = $empresa->buscaDados($pdo);

$log = new Log();
$filtro = "";
$dtIni = date('Y-m-d');
$dtFim = date('Y-m-d');
$filtragem = "";
$disabled = "disabled";

if(isset($_POST['filtrar'])){
    $dtIni = $_POST['dtIni'];
    $dtFim = $_POST['dtFim'];
    $filtro = "WHERE `data` BETWEEN '".$dtIni."' AND '".$dtFim."' ";
    $filtragem = "Filtrado por Data";
    $disabled = "";
}


$num_logs = $log->buscaQtd($pdo, $filtro);


if ($num_logs == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_logs / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $limit = " LIMIT $inicio, $qtd_pags";
    $log_exibir = $log->buscaLtda($pdo, $limit, $filtro);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
    $log_print = $log->buscaLtda($pdo, "", $filtro);
}
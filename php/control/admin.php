<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 06/01/2018
 * Time: 23:45
 */

require '../php/model/Produtos.php';

$msgTable = "";
$produto = new PRODUTO();
$qtdPRODUTO = $produto->buscaQtd($pdo);
$filtro = "az";
$filter = "nomePRODUTO ASC";

if(isset($_POST['filter'])){
    $filtro = $_POST['filter'];
    if($filtro == "az"){
        $filter = "nomePRODUTO ASC";
    }elseif($filtro == "za"){
        $filter = "nomePRODUTO DESC";
    }elseif($filtro == "mne"){
        $filter = "estkPRODUTO ASC";
    }elseif ($filtro == "mae"){
        $filter = "estkPRODUTO DESC";
    }elseif ($filtro == "mnv"){
        $filter = "vendaPRODUTO ASC";
    }elseif ($filtro == "mav"){
        $filter = "vendaPRODUTO DESC";
    }
}elseif (isset($_GET['flt'])){
    $filtro = $_GET['flt'];
    if($filtro == "az"){
        $filter = "nomePRODUTO ASC";
    }elseif($filtro == "za"){
        $filter = "nomePRODUTO DESC";
    }elseif($filtro == "mne"){
        $filter = "estkPRODUTO ASC";
    }elseif ($filtro == "mae"){
        $filter = "estkPRODUTO DESC";
    }elseif ($filtro == "mnv"){
        $filter = "vendaPRODUTO ASC";
    }elseif ($filtro == "mav"){
        $filter = "vendaPRODUTO DESC";
    }
}

if ($qtdPRODUTO == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 3;
    $total_pags = ceil($qtdPRODUTO / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $prod_exibir = $produto->buscaLtda($pdo, $inicio, $qtd_pags, $filter);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}

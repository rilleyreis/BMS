<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 06/01/2018
 * Time: 23:45
 */

require '../database/config.php';
require '../_class/Produtos.php';

$msgTable = "";
$produto = new Produtos();
$qtd_prod = $produto->buscaQtd($pdo);
$filtro = "az";
$filter = "nome_prod ASC";

if(isset($_POST['filter'])){
    $filtro = $_POST['filter'];
    if($filtro == "az"){
        $filter = "nome_prod ASC";
    }elseif($filtro == "za"){
        $filter = "nome_prod DESC";
    }elseif($filtro == "mne"){
        $filter = "qtd_prod ASC";
    }elseif ($filtro == "mae"){
        $filter = "qtd_prod DESC";
    }elseif ($filtro == "mnv"){
        $filter = "venda_prod ASC";
    }elseif ($filtro == "mav"){
        $filter = "venda_prod DESC";
    }
}elseif (isset($_GET['flt'])){
    $filtro = $_GET['flt'];
    if($filtro == "az"){
        $filter = "nome_prod ASC";
    }elseif($filtro == "za"){
        $filter = "nome_prod DESC";
    }elseif($filtro == "mne"){
        $filter = "qtd_prod ASC";
    }elseif ($filtro == "mae"){
        $filter = "qtd_prod DESC";
    }elseif ($filtro == "mnv"){
        $filter = "venda_prod ASC";
    }elseif ($filtro == "mav"){
        $filter = "venda_prod DESC";
    }
}

if ($qtd_prod == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 3;
    $total_pags = ceil($qtd_prod / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $prod_exibir = $produto->buscaLtda($pdo, $inicio, $qtd_pags, $filter);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}

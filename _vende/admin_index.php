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

if ($qtd_prod == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 3;
    $total_pags = ceil($qtd_prod / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $prod_exibir = $produto->buscaLtda($pdo, $inicio, $qtd_pags);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}

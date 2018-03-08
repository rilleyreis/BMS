<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 03/01/2018
 * Time: 02:01
 */

require '../../php/model/Produtos.php';

$msgTable = "";
$produto = new PRODUTO();

if(isset($_POST['sel'])){
    $id = base64_encode($_POST['sel']);
    header('Location:dados.php?edt='.$id);
}
if(isset($_POST['prodAdd'])){
    $produto->setId($_POST['prodAdd']);
    $produto->setEstoque($_POST['qtdAdd']);
    $produto->addEstoque($pdo);
}
else if(isset($_POST['prodExcl'])){
    $produto->setId($_POST['prodExcl']);
    $produto->excluir($pdo);
}

$qtd_prod = $produto->buscaQtd($pdo);
if ($qtd_prod == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($qtd_prod / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $prod_exibir = $produto->buscaLtda($pdo, $inicio, $qtd_pags, "nomePRODUTO ASC");
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
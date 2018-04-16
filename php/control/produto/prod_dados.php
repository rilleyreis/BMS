<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/04/2018
 * Time: 02:36
 */

$nome = "";
$descricao = "";
$fornecedor = "";
$compra = "";
$venda = "";
$estoque = "";
$minimo = "";

function pegaDados(){
    global $nome, $descricao, $fornecedor, $compra, $venda, $estoque, $minimo;
    $nome = trim(strip_tags($_POST['nome']));
    $descricao = trim(strip_tags($_POST['descricao']));
    $fornecedor = explode("|", $_POST['fornecedor']);
    $fornecedor = $fornecedor[0];
    $compra = str_replace("R$ ", "", $_POST['compra']);
    $compra = str_replace(",", ".", $compra);
    $venda = str_replace("R$ ", "", $_POST['venda']);
    $venda = str_replace(",", ".", $venda);
    $estoque = $_POST['estoque'];
    $minimo = $_POST['minimo'];
}

require '../../php/model/Produto.php';
require '../../php/model/Fornecedor.php';
$produto = new Produto();
$id = "";
$edt = "style='display:none'";
$add = "";

if(isset($_POST['adicionar'])){
    pegaDados();
    $produto->setNome($nome);
    $produto->setDescricao($descricao);
    $produto->setFornecedor($fornecedor);
    $produto->setCompra($compra);
    $produto->setVenda($venda);
    $produto->setEstoque($estoque);
    $produto->setMinimo($minimo);
    $produto->salvar($pdo);
}
if(isset($_POST['editar'])){
    pegaDados();
    $produto->setId($_POST['id']);
    $produto->setNome($nome);
    $produto->setDescricao($descricao);
    $produto->setFornecedor($fornecedor);
    $produto->setCompra($compra);
    $produto->setVenda($venda);
    $produto->setEstoque($estoque);
    $produto->setMinimo($minimo);
    $produto->editar($pdo);
}
if(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $produto->setId($id);
    $dados = $produto->buscarDados($pdo);
    foreach ($dados as $dado) {
        $nome = $dado['nomePRODUTO'];
        $descricao = $dado['descricaoPRODUTO'];
        $fornecedor = $dado['FORNECEDOR_idFORNECEDOR'];
        $compra = $dado['compraPRODUTO'];
        $venda = $dado['vendaPRODUTO'];
        $estoque = $dado['estoquePRODUTO'];
        $minimo = $dado['minimoPRODUTO'];
    }
    if($fornecedor != "") {
        $fornece = new Fornecedor();
        $fornece->setId($fornecedor);
        $dados = $fornece->buscarDados($pdo);
        foreach ($dados as $dado) {
            $fornecedor = $dado['id'] . "|";
            $fornecedor .= $dado['cnpj'] . "|";
            $fornecedor .= $dado['nomefant'];
        }
    }
    $edt = "";
    $add = "style='display:none'";
}
<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 03/01/2018
 * Time: 02:01
 */

require '../../util/config.php';
require '../../php/model/Produtos.php';
require '../../php/model/Empresa.php';

$produto = new Produtos();

$id = "";
$nome = "";
$desc = "";
$compra = "";
$venda = "";
$estoque = "";
$minimo = "";
$forn = "";
$edt = "style='display:none'";
$add = "";

if (isset($_POST['adicionar'])){
    $produto->setNome($_POST['nome_prod']);
    $produto->setDescricao($_POST['desc_prod']);
    $forne = explode("|", $_POST['forn_prod']);
    $produto->setFornece($forne[0]);
    $aux = str_replace("R$ ", "", $_POST['compra_prod']);
    $aux = str_replace(",", ".", $aux);
    $produto->setCompra($aux);
    $aux = str_replace("R$ ", "", $_POST['venda_prod']);
    $aux = str_replace(",", ".", $aux);
    $produto->setVenda($aux);
    $produto->setEstoque($_POST['qtd_prod']);
    $produto->setMinimo($_POST['min_prod']);

    $produto->salvar($pdo);
}
elseif(isset($_POST['salvar'])){
    $produto->setId($_POST['id_prod']);
    $produto->setNome($_POST['nome_prod']);
    $produto->setDescricao($_POST['desc_prod']);
    $forne = explode("|", $_POST['forn_prod']);
    $produto->setFornece($forne[0]);
    $aux = str_replace("R$ ", "", $_POST['compra_prod']);
    $aux = str_replace(",", ".", $aux);
    $produto->setCompra($aux);
    $aux = str_replace("R$ ", "", $_POST['venda_prod']);
    $aux = str_replace(",", ".", $aux);
    $produto->setVenda($aux);
    $produto->setEstoque($_POST['qtd_prod']);
    $produto->setMinimo($_POST['min_prod']);
    $produto->editar($pdo);
}
elseif(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $edt = "";
    $add = "style='display:none'";
    $produto->setId($id);
    $dados = $produto->buscaUnit($pdo);
    foreach ($dados as $dado) {
        $nome = $dado['nome_prod'];
        $desc = $dado['desc_prod'];
        $forne = new Empresa();
        $forne->setCnpjEmp($dado['forn_prod']);
        $forne = $forne->buscaDadosUnit($pdo);
        foreach ($forne as $item) {
            $forn = $item['cnpj_forn']."|".$item['fant_forn'];
        }
        $compra = $dado['compra_prod'];
        $venda = $dado['venda_prod'];
        $estoque = $dado['qtd_prod'];
        $minimo = $dado['min_prod'];
    }
}
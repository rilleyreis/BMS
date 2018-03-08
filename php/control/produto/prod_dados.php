<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 03/01/2018
 * Time: 02:01
 */

require '../../php/model/Produtos.php';
require '../../php/model/Empresa.php';

$empresa = new Empresa();
$produto = new PRODUTO();

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
    $empresa->setCnpjEmp($forne[0]);
    $dados = $empresa->buscaDadosUnit($pdo);
    $idForn = "";
    foreach ($dados as $dado) {
        $idForn = $dado['idEMPRESA'];
    }
    $produto->setFornece($idForn);
    $aux = str_replace("R$ ", "", $_POST['compra_prod']);
    $aux = str_replace(",", ".", $aux);
    echo $aux;
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
    $empresa->setCnpjEmp($forne[0]);
    $dados = $empresa->buscaDadosUnit($pdo);
    $idForn = "";
    foreach ($dados as $dado) {
        $idForn = $dado['idEMPRESA'];
    }
    $produto->setFornece($idForn);
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
        $nome = $dado['nomePRODUTO'];
        $desc = $dado['descPRODUTO'];
        $forne = new Empresa();
        echo $dado['EMPRESA_idEMPRESA'];
        $forne->setIdEMPRESA($dado['EMPRESA_idEMPRESA']);
        $forne = $forne->buscaDadosALL2($pdo);
        foreach ($forne as $item) {
            $forn = $item['cnpjEMPRESA']."|".$item['nomfantEMPRESA'];
        }
        $compra = $dado['custoPRODUTO'];
        $venda = $dado['vendaPRODUTO'];
        $estoque = $dado['estkPRODUTO'];
        $minimo = $dado['estkminPRODUTO'];
    }
}
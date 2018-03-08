<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/01/2018
 * Time: 23:48
 */

require '../../database/config.php';
require '../../_class/Servicos.php';

$servico = new Servicos();

$id = "";
$nome = "";
$desc = "";
$preco = "";
$edt = "style='display:none'";
$add = "";

if (isset($_POST['adicionar'])){
    $servico->setNome($_POST['nome_serv']);
    $servico->setDescricao($_POST['desc_serv']);
    $valor = str_replace("R$ ", "",$_POST['preco_serv']);
    $valor = str_replace(",", ".",$valor);
    $servico->setValor($valor);
    $servico->salvar($pdo);
    header("Location:../service");
}
elseif(isset($_POST['salvar'])){
    $servico->setId($_POST['id_serv']);
    $servico->setNome($_POST['nome_serv']);
    $servico->setDescricao($_POST['desc_serv']);
    $valor = str_replace("R$ ", "",$_POST['preco_serv']);
    $valor = str_replace(",", ".",$valor);
    $servico->setValor($valor);
    $servico->editar($pdo);
    header("Location:../service");
}
elseif(isset($_GET['edt'])){
$id = base64_decode($_GET['edt']);
$edt = "";
$add = "style='display:none'";
$servico->setId($id);
$dados = $servico->buscaUnit($pdo);
foreach ($dados as $dado) {
    $nome = $dado['nome_serv'];
    $desc = $dado['desc_serv'];
    $preco = $dado['preco_serv'];
}
}
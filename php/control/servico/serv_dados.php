<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/01/2018
 * Time: 23:48
 */

$nome = "";
$descricao = "";
$valor = "";

function pegaDados(){
    global $nome, $descricao, $valor, $user;
    $nome = trim(strip_tags($_POST['nome']));
    $descricao = trim(strip_tags($_POST['descricao']));
    $valor = str_replace("R$ ", "",$_POST['valor']);
    $valor = str_replace(",", ".",$valor);
}


require '../../php/model/Servicos.php';
require '../../php/model/Log.php';
$servico = new Servicos();
$id = "";
$edt = "style='display:none'";
$add = "";

if (isset($_POST['adicionar'])){
    pegaDados();
    $servico->setNome($nome);
    $servico->setDescricao($descricao);
    $servico->setValor($valor);

    $servico->salvar($pdo);
    $log = new Log();
    $log->criarLOG($pdo,"ADICIONOU UM SERVIÇO AO SISTEMA");
    header("Location:../service");
}
elseif(isset($_POST['salvar'])){
    pegaDados();
    $servico->setId($_POST['id']);
    $servico->setNome($nome);
    $servico->setDescricao($descricao);
    $servico->setValor($valor);
    $servico->editar($pdo);
    header("Location:../service");
    $log = new Log();
    $log->criarLOG($pdo,"EDITOU UM PRODUTO DO SISTEMA");
}
elseif(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $edt = "";
    $add = "style='display:none'";
    $servico->setId($id);
    $dados = $servico->buscaUnit($pdo);
    foreach ($dados as $dado) {
        $nome = $dado['nomeSERVICO'];
        $descricao = $dado['descricaoSERVICO'];
        $valor = $dado['valorSERVICO'];
    }
}
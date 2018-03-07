<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:12
 */

require '../../util/config.php';
require '../../php/model/Cliente.php';

$cliente = new Cliente();
$nome = "";
$snome = "";
$cpf = "";
$tel = "";
$cel = "";
$email = "";
$rua = "";
$num = "";
$bairro = "";
$edt = "style='display:none'";
$add = "";

if (isset($_POST['adicionar'])){
    $cliente->setNome($_POST['nomeCliente']);
    $cliente->setSnome($_POST['snomeCliente']);
    $cliente->setCpf($_POST['cpfCliente']);
    $cliente->setCel($_POST['celularCliente']);
    $cliente->setTel($_POST['telefoneCliente']);
    $cliente->setEmail($_POST['emailCliente']);
    $cliente->setRua($_POST['ruaCliente']);
    $cliente->setNum($_POST['numeroCliente']);
    $cliente->setBairro($_POST['bairroCliente']);

    $cliente->salvar($pdo);
}
elseif (isset($_POST['salvar'])){
    $cliente->setNome($_POST['nomeCliente']);
    $cliente->setSnome($_POST['snomeCliente']);
    $cliente->setCpf($_POST['cpfCliente']);
    $cliente->setCel($_POST['celularCliente']);
    $cliente->setTel($_POST['telefoneCliente']);
    $cliente->setEmail($_POST['emailCliente']);
    $cliente->setRua($_POST['ruaCliente']);
    $cliente->setNum($_POST['numeroCliente']);
    $cliente->setBairro($_POST['bairroCliente']);

    $cliente->editar($pdo);
}
elseif(isset($_GET['edt'])){
    $cpf = base64_decode($_GET['edt']);
    $edt = "";
    $add = "style='display:none'";
    $cliente->setCpf($cpf);
    $dados = $cliente->buscaDados($pdo);
    foreach ($dados as $row){
        $nome = utf8_encode($row['nome_cli']);
        $snome = utf8_encode($row['snome_cli']);
        $cpf = $row['cpf_cli'];
        $tel = $row['tel_cli'];
        $cel = $row['cel_cli'];
        $email = $row['email_cli'];
        $rua = $row['rua_cli'];
        $num = $row['num_cli'];
        $bairro = $row['bairro_cli'];
    }
}
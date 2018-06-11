<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:12
 */

$id = "";
$nome = "";
$snome = "";
$cpfcnpj = "";
$tel = "";
$rgie = "";
$email = "";
$rua = "";
$num = "";
$bairro = "";
$cidade = "";
$uf = "";
$cep = "";

function pegaDados(){
    global $cpfcnpj, $rgie, $nome, $snome, $rgie, $tel, $email, $rua, $num, $bairro, $cidade, $uf, $cep;
    $nome = $_POST['nome'];
    $snome = $_POST['snome'];
    $cpfcnpj = $_POST['cpfcnpj'];
    $rgie = $_POST['rgie'];
    $tel = $_POST['telefone'];
    $email = $_POST['email'];
    $rua = $_POST['ruaCliente'];
    $num = $_POST['numeroCliente'];
    $bairro = $_POST['bairroCliente'];
    $cidade  = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];
}

require '../../php/model/Pessoa.php';
require '../../php/model/Endereco.php';
require '../../php/model/Log.php';

$cliente = new Pessoa();
$endereco = new Endereco();
$edt = "style='display:none'";
$add = "";
$tipo = "";
$idEnd = "";
$id = "";

if (isset($_POST['adicionar'])){
    pegaDados();
    $endereco = new Endereco();
    $endereco->setId($idEnd);
    $endereco->setRua($rua);
    $endereco->setNum($num);
    $endereco->setBairro($bairro);
    $endereco->setCidade($cidade);
    $endereco->setUf($uf);
    $endereco->setCep($cep);
    $idEnd = $endereco->salvar($pdo);

    $cliente->setFnome($nome);
    $cliente->setLnome($snome);
    $cliente->setCpfCnpj($cpfcnpj);
    $cliente->setIe($rgie);
    $cliente->setTelefone($tel);
    $cliente->setEmail($email);
    $cliente->setTipo("C");
    $cliente->setIdEnd($idEnd[0]);
    $idPF = $cliente->salvar($pdo);

    $log = new Log();
    $log->criarLOG($pdo,"CADASTROU UM CLIENTE NO SISTEMA");

    header("Location:../cliente");
}
elseif (isset($_POST['editar'])){
    pegaDados();
    $cliente->setId($_POST['id']);
    $cliente->setFnome($nome);
    $cliente->setLnome($snome);
    $cliente->setCpfCnpj($cpfcnpj);
    $cliente->setIe($rgie);
    $cliente->setTelefone($tel);
    $cliente->setEmail($email);
    $cliente->editar($pdo);
    $endereco->setId($_POST['idEnd']);
    $endereco->setRua($rua);
    $endereco->setNum($num);
    $endereco->setBairro($bairro);
    $endereco->setCidade($cidade);
    $endereco->setUf($uf);
    $endereco->setCep($cep);
    $endereco->editar($pdo);

    $log = new Log();
    $log->criarLOG($pdo,"EDITOU O CADASTRO DE UM CLIENT DO SISTEMA");

    header('Location:../cliente');
}
elseif(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $edt = "";
    $add = "style='display:none'";
    $cliente->setId($id);
    $dados = $cliente->buscaDados($pdo);
    foreach ($dados as $dado) {
        $cpfcnpj = $dado['cpf_cnpj'];
        $nome = $dado['nome'];
        $snome = $dado['snome'];
        $rgie = $dado['rgie'];
        $tel = $dado['tel'];
        $email = $dado['email'];
        $rua = $dado['rua'];
        $num = $dado['num'];
        $bairro = $dado['bairro'];
        $cidade = $dado['cidade'];
        $uf = $dado['uf'];
        $cep = $dado['cep'];
        $idEnd = $dado['idEnd'];
    }
}
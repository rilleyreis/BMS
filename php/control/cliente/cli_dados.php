<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:12
 */

$cnpj = "";
$razsoc = "";
$fant = "";
$ie = "";
$nome = "";
$snome = "";
$cpf = "";
$tel = "";
$cel = "";
$email = "";
$rua = "";
$num = "";
$bairro = "";
$cidade = "";
$uf = "";
$cep = "";

function pegaDados(){
    global $cnpj, $razsoc, $fant, $ie, $nome, $snome, $cpf, $cel, $tel, $email, $rua, $num, $bairro, $cidade, $uf, $cep;
    $cnpj = $_POST['cnpj'];
    $razsoc = $_POST['razsoc'];
    $fant = $_POST['fant'];
    $ie = $_POST['ie'];
    $nome = $_POST['nomeCliente'];
    $snome = $_POST['snomeCliente'];
    $cpf = $_POST['cpfCliente'];
    $cel = $_POST['celularCliente'];
    $tel = $_POST['telefoneCliente'];
    $email = $_POST['emailCliente'];
    $rua = $_POST['ruaCliente'];
    $num = $_POST['numeroCliente'];
    $bairro = $_POST['bairroCliente'];
    $cidade  = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];
}

require '../../php/model/Cliente.php';
require '../../php/model/PJuridica.php';
require '../../php/model/PFisica.php';
require '../../php/model/Endereco.php';

$cliente = new Cliente();
$pjuridica = new PJuridica();
$pfisica = new PFisica();
$endereco = new Endereco();
$edt = "style='display:none'";
$add = "";
$pf = "";
$pj = "style='display:none'";
$tipo = "";
$idPJ = "";
$idPF = "";
$idEnd = "";
$pfreq = "required";
$pjreq = "";
$id = "";

if (isset($_POST['adicionar'])){
    pegaDados();
    if ($cpf == ""){
        $pjuridica->setCnpj($cnpj);
        $pjuridica->setRsocial($razsoc);
        $pjuridica->setFant($fant);
        $pjuridica->setIe($ie);
        $pjuridica->setTel($tel);
        $pjuridica->setEmail($email);
        $idPJ = $pjuridica->salvar($pdo);
        $cliente->setIdPJ($idPJ[0]);
    }else{
        $pfisica->setFnome($nome);
        $pfisica->setLnome($snome);
        $pfisica->setCpf($cpf);
        $pfisica->setCelular($cel);
        $pfisica->setTelefone($tel);
        $pfisica->setEmail($email);
        $idPF = $pfisica->salvar($pdo);
        $cliente->setIdPF($idPF[0]);
    }
    $endereco->setRua($rua);
    $endereco->setNum($num);
    $endereco->setBairro($bairro);
    $endereco->setCidade($cidade);
    $endereco->setUf($uf);
    $endereco->setCep($cep);
    $idEnd = $endereco->salvar($pdo);

    $cliente->setIdEnd($idEnd[0]);
    $cliente->salvar($pdo);
}
elseif (isset($_POST['editar'])){
    pegaDados();
    $id = $_POST['id'];
    $cliente->setId($id);
    $dados = $cliente->buscaDado($pdo);
    foreach ($dados as $dado) {
        $idPF = $dado['PFISICA_idPFISICA'];
        $idPJ = $dado['PJURIDICA_idPJURIDICA'];
        $idEnd = $dado['ENDERECO_idENDERECO'];
    }
    if ($cpf == ""){
        $pjuridica->setId($idPJ);
        $pjuridica->setCnpj($cnpj);
        $pjuridica->setRsocial($razsoc);
        $pjuridica->setFant($fant);
        $pjuridica->setIe($ie);
        $pjuridica->setTel($tel);
        $pjuridica->setEmail($email);
        $pjuridica->editar($pdo);
    }else{
        $pfisica->setId($idPF);
        $pfisica->setFnome($nome);
        $pfisica->setLnome($snome);
        $pfisica->setCpf($cpf);
        $pfisica->setCelular($cel);
        $pfisica->setTelefone($tel);
        $pfisica->setEmail($email);
        $pfisica->editar($pdo);
    }
    $endereco->setId($idEnd);
    $endereco->setRua($rua);
    $endereco->setNum($num);
    $endereco->setBairro($bairro);
    $endereco->setCidade($cidade);
    $endereco->setUf($uf);
    $endereco->setCep($cep);
    $endereco->editar($pdo);
    header('Location:../cliente');
}
elseif(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $tipo = $_GET['tp'];
    $edt = "";
    $add = "style='display:none'";
    $cliente->setId($id);
    if($tipo == "pf") {
        $dados = $cliente->buscaDadoPF($pdo);
        $pf = "";
        $pj = "style='display:none'";
        $pfreq = "required";
        $pjreq = "";
    }else {
        $dados = $cliente->buscaDadoPJ($pdo);
        $pf = "style='display:none'";
        $pj = "";
        $pfreq = "";
        $pjreq = "required";
    }
    foreach ($dados as $row){
        if($tipo == "pf"){
            $nome = $row['fnome'];
            $snome = $row['lnome'];
            $cpf = $row['cpf'];
            $cel = $row['cel'];
        }else{
            $razsoc = $row['razsoc'];
            $fant = $row['nomefant'];
            $cnpj = $row['cnpj'];
            $ie = $row['ie'];
        }
        $tel = $row['tel'];
        $email = $row['email'];
        $rua = $row['rua'];
        $num = $row['num'];
        $bairro = $row['bairro'];
        $cidade = $row['cidade'];
        $uf = $row['uf'];
        $cep = $row['cep'];
    }
}
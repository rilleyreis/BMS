<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 18/04/2018
 * Time: 01:17
 */

date_default_timezone_set("America/Sao_Paulo");

$cnpj = "";
$rsocial = "";
$fant = "";
$ie = "";
$rua = "";
$num = "";
$bairro = "";
$cidade = "";
$uf = "";
$cep = "";
$tel = "";
$email = "";

function pegaDados(){
    global $cnpj, $rsocial, $fant, $ie, $rua, $num, $bairro, $cidade, $uf, $cep, $tel, $email;
    $cnpj = $_POST['cnpj_emp'];
    $rsocial = $_POST['raz_emp'];
    $fant = $_POST['fant_emp'];
    $ie = $_POST['ie_emp'];
    $rua = $_POST['rua_emp'];
    $num = $_POST['num_emp'];
    $bairro = $_POST['bairro_emp'];
    $cidade = $_POST['cid_emp'];
    $uf = $_POST['uf_emp'];
    $cep = $_POST['cep_emp'];
    $tel = $_POST['tel_emp'];
    $email = $_POST['email_emp'];
}

require 'util/config.php';
require 'php/model/Endereco.php';
require 'php/model/Pessoa.php';
require 'php/model/Empresa.php';
require 'php/model/Caixa.php';

$endereco = new Endereco();
$pjuridica = new Pessoa();
$empresa = new Empresa();
$logo = "pag/empresa/img/";
$idEnd = "";
$idPE = "";
$id = "";

if(isset($_POST['adicionar'])){
    pegaDados();
    $extensão = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novoNome = "logo".$extensão;
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $logo.$novoNome);
    $endereco->setRua($rua);
    $endereco->setNum($num);
    $endereco->setBairro($bairro);
    $endereco->setCidade($cidade);
    $endereco->setUf($uf);
    $endereco->setCep($cep);
    $idEnd = $endereco->salvar($pdo);
    $pjuridica->setCpfCnpj($cnpj);
    $pjuridica->setLnome($rsocial);
    $pjuridica->setFnome($fant);
    $pjuridica->setIe($ie);
    $pjuridica->setTelefone($tel);
    $pjuridica->setEmail($email);
    $pjuridica->setTipo("E");
    $pjuridica->setIdEnd($idEnd[0]);
    $idPE = $pjuridica->salvar($pdo);
    $empresa->setLogo($novoNome);
    $empresa->setIdPE($idPE[0]);
    $empresa->salvar($pdo);

    header("Refresh:2; url=/bms");
}

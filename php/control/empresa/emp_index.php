<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/04/2018
 * Time: 20:17
 */


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

require '../../php/model/Empresa.php';
require '../../php/model/Endereco.php';
require '../../php/model/PJuridica.php';

$endereco = new Endereco();
$pjuridica = new PJuridica();
$empresa = new Empresa();
$logo = "/img";

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
    $pjuridica->setCnpj($cnpj);
    $pjuridica->setRsocial($rsocial);
    $pjuridica->setFant($fant);
    $pjuridica->setIe($ie);
    $pjuridica->setTel($tel);
    $pjuridica->setEmail($email);
    $idPJ = $pjuridica->salvar($pdo);
    $empresa->setLogo($novoNome);
    $empresa->setIdPJ($idPJ);
    $empresa->setIdEnd($idEnd);
    $empresa->salvar($pdo);
}

$qtd_emp = $empresa->buscaQtd($pdo);

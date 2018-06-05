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
require '../../php/model/Pessoa.php';

$endereco = new Endereco();
$pjuridica = new Pessoa();
$empresa = new Empresa();
$logo = "img/";
$idEnd = "";
$idPE = "";
$id = "";


if(isset($_POST['editar'])){
    pegaDados();
    $endereco->setId($_POST['idEnd']);
    $endereco->setRua($rua);
    $endereco->setNum($num);
    $endereco->setBairro($bairro);
    $endereco->setCidade($cidade);
    $endereco->setUf($uf);
    $endereco->setCep($cep);
    $endereco->editar($pdo);
    $pjuridica->setId($_POST['idPE']);
    $pjuridica->setCpfCnpj($cnpj);
    $pjuridica->setLnome($rsocial);
    $pjuridica->setFnome($fant);
    $pjuridica->setIe($ie);
    $pjuridica->setTelefone($tel);
    $pjuridica->setEmail($email);
    $pjuridica->editar($pdo);
}
if(isset($_POST['editarLogo'])){
    $id = $_POST['id'];
    $dados = $empresa->buscaDados($pdo);
    foreach ($dados as $dado) {
        $logo .= $dado['logoEMPRESA'];
    }
    if(file_exists($logo))
        unlink($logo);
    $logo = "img/";
    $extensão = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novoNome = "logo".$extensão;
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $logo.$novoNome);
    $empresa->setId($id);
    $empresa->setLogo($novoNome);
    $empresa->editarLogo($pdo);
}

$qtd_emp = $empresa->buscaQtd($pdo);
if($qtd_emp > 0){
    $dados = $empresa->buscaDados($pdo);
    foreach ($dados as $dado) {
        $id = $dado['id'];
        $logo .= $dado['logo'];
        $cnpj = $dado['cpf_cnpj'];
        $rsocial = $dado['snome'];
        $fant = $dado['nome'];
        $ie = $dado['rgie'];
        $tel = $dado['tel'];
        $email = $dado['email'];
        $rua = $dado['rua'];
        $num = $dado['num'];
        $bairro = $dado['bairro'];
        $cidade = $dado['cidade'];
        $uf = $dado['uf'];
        $cep = $dado['cep'];
    }
}

unset($_POST, $_FILES);

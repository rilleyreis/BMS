<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 22/01/2018
 * Time: 15:32
 */

$cnpj_forn = "";
$raz_forn = "";
$fant_forn = "";
$ie_forn = "";
$rua_forn = "";
$num_forn = "";
$bairro_forn = "";
$cid_forn = "";
$est_forn = "";
$cep_forn = "";
$tel_forn = "";
$email_forn = "";

function pegaDados(){
    global $cnpj_forn, $raz_forn, $fant_forn, $ie_forn, $rua_forn, $num_forn, $bairro_forn, $cid_forn, $est_forn, $cep_forn, $tel_forn, $email_forn;
    $cnpj_forn = $_POST['cnpj_forn'];
    $raz_forn = $_POST['raz_forn'];
    $fant_forn = $_POST['fant_forn'];
    $ie_forn = $_POST['ie_forn'];
    $rua_forn = $_POST['rua_forn'];
    $num_forn = $_POST['num_forn'];
    $bairro_forn = $_POST['bairro_forn'];
    $cid_forn = $_POST['cid_forn'];
    $est_forn = $_POST['est_forn'];
    $cep_forn = $_POST['cep_forn'];
    $tel_forn = $_POST['tel_forn'];
    $email_forn = $_POST['email_forn'];
}


require '../../php/model/Fornecedor.php';
require '../../php/model/Endereco.php';
require '../../php/model/PJuridica.php';

$fornece = new Fornecedor();
$endereco = new Endereco();
$pjuridica = new PJuridica();
$id = "";
$idEnd = "";
$idPJ = "";
$edt = "style='display:none'";
$add = "";
$rdo = "";

if(isset($_POST['adicionar'])){
    pegaDados();
    $endereco->setRua($rua_forn);
    $endereco->setNum($num_forn);
    $endereco->setBairro($bairro_forn);
    $endereco->setCidade($cid_forn);
    $endereco->setUf($est_forn);
    $endereco->setCep($cep_forn);
    $idEnd = $endereco->salvar($pdo);
    $pjuridica->setCnpj($cnpj_forn);
    $pjuridica->setRsocial($raz_forn);
    $pjuridica->setFant($fant_forn);
    $pjuridica->setIe($ie_forn);
    $pjuridica->setTel($tel_forn);
    $pjuridica->setEmail($email_forn);
    $idPJ = $pjuridica->salvar($pdo);
    $fornece->setIdEnd($idEnd[0]);
    $fornece->setIdPJ($idPJ[0]);
    $fornece->setAtivo(1);
    $fornece->salvar($pdo);

}elseif (isset($_POST['editar'])){
    pegaDados();
    $endereco->setId($_POST['idEnd']);
    $endereco->setRua($rua_forn);
    $endereco->setNum($num_forn);
    $endereco->setBairro($bairro_forn);
    $endereco->setCidade($cid_forn);
    $endereco->setUf($est_forn);
    $endereco->setCep($cep_forn);
    $endereco->editar($pdo);
    $pjuridica->setId($_POST['idPJ']);
    $pjuridica->setCnpj($cnpj_forn);
    $pjuridica->setRsocial($raz_forn);
    $pjuridica->setFant($fant_forn);
    $pjuridica->setIe($ie_forn);
    $pjuridica->setTel($tel_forn);
    $pjuridica->setEmail($email_forn);
    $pjuridica->editar($pdo);
    echo "<script>alert('Fornecedor editado com sucesso');</script>";
    header("Location:../fornecedor");
}

if(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $fornece->setId($id);
    $dados = $fornece->buscaDados($pdo);
    foreach ($dados as $dado) {
        $id = $dado['idFORNECEDOR'];
        $idPJ = $dado['PJURIDICA_idPJURIDICA'];
        $idEnd = $dado['ENDERECO_idENDERECO'];
    }
    $endereco->setId($idEnd[0]);
    $dados = $endereco->buscar($pdo);
    foreach ($dados as $dado) {
        $rua_forn = $dado['ruaENDERECO'];
        $num_forn = $dado['numENDERECO'];
        $bairro_forn = $dado['bairroENDERECO'];
        $cid_forn = $dado['cidadeENDERECO'];
        $est_forn = $dado['ufENDERECO'];
        $cep_forn = $dado['cepENDERECO'];
    }
    $pjuridica->setId($idPJ[0]);
    $dados = $pjuridica->buscar($pdo);
    foreach ($dados as $dado) {
        $cnpj_forn = $dado['cnpjPJURIDICA'];
        $raz_forn = $dado['razsocPJURIDICA'];
        $fant_forn = $dado['nomefantPJURIDICA'];
        $ie_forn = $dado['iePJURIDICA'];
        $tel_forn = $dado['telPJURIDICA'];
        $email_forn = $dado['emailPJURIDICA'];
    }
    $add = "style='display:none'";
    $edt = "";
    $rdo = "readonly='readonly'";
}
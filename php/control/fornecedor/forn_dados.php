<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 22/01/2018
 * Time: 15:32
 */

require '../../php/model/Empresa.php';
require '../../php/model/Endereco.php';

$fornece = new Empresa();
$endereco = new Endereco();
$idEndereco = "";

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
$edt = "style='display:none'";
$add = "";
$rdo = "";

if(isset($_POST['adicionar'])){
    $endereco->setRua($_POST['rua_forn']);
    $endereco->setNumero($_POST['num_forn']);
    $endereco->setBairro($_POST['bairro_forn']);
    $endereco->setCidade($_POST['cid_forn']);
    $endereco->setEstado($_POST['est_forn']);
    $endereco->setCep($_POST['cep_forn']);
    $enderecoId = $endereco->salvar($pdo);

    $fornece->setCnpjEmp($_POST['cnpj_forn']);
    $fornece->setrazsocEmp($_POST['raz_forn']);
    $fornece->setFantEmp($_POST['fant_forn']);
    $fornece->setIeEmp($_POST['ie_forn']);
    $fornece->setTelEmp($_POST['tel_forn']);
    $fornece->setEmailEmp($_POST['email_forn']);
    $fornece->setTipoEMPRESA(2);
    $fornece->setAtivoEMPRESA(1);
    $fornece->setIdENDERECO($enderecoId[0]);
    $fornece->salvar($pdo);
    header("Location:../fornecedor");

}elseif (isset($_POST['salvar'])){
    $endereco->setId($_POST['endereco']);
    $endereco->setRua($_POST['rua_forn']);
    $endereco->setNumero($_POST['num_forn']);
    $endereco->setBairro($_POST['bairro_forn']);
    $endereco->setCidade($_POST['cid_forn']);
    $endereco->setEstado($_POST['est_forn']);
    $endereco->setCep($_POST['cep_forn']);
    $endereco->update($pdo);

    $fornece->setCnpjEmp($_POST['cnpj_forn']);
    $fornece->setrazsocEmp($_POST['raz_forn']);
    $fornece->setFantEmp($_POST['fant_forn']);
    $fornece->setIeEmp($_POST['ie_forn']);
    $fornece->setTelEmp($_POST['tel_forn']);
    $fornece->setEmailEmp($_POST['email_forn']);
    $fornece->editar($pdo);
    header("Location:../fornecedor");
}

if(isset($_GET['edt'])){
    $cnpj = base64_decode($_GET['edt']);
    $fornece->setCnpjEmp($cnpj);
    $dados = $fornece->buscaDadosUnit($pdo);
    foreach ($dados as $item) {
        $cnpj_forn = $item['cnpjEMPRESA'];
        $raz_forn = $item['razsocEMPRESA'];
        $fant_forn = $item['nomfantEMPRESA'];
        $ie_forn = $item['ieEMPRESA'];
        $tel_forn = $item['telEMPRESA'];
        $email_forn = $item['emailEMPRESA'];
        $idEnd = $item['ENDERECO_idENDERECO'];
        $endereco->setId($idEnd);
        $end = $endereco->buscaDados($pdo);
        foreach ($end as $item2) {
            $idEndereco = $item2['idENDERECO'];
            $rua_forn = $item2['ruaENDERECO'];
            $num_forn = $item2['numENDERECO'];
            $bairro_forn = $item2['bairroENDERECO'];
            $cid_forn = $item2['cityENDERECO'];
            $est_forn = $item2['ufENDERECO'];
            $cep_forn = $item2['cepENDERECO'];
        }
    }
    $add = "style='display:none'";
    $edt = "";
    $rdo = "readonly='readonly'";
}
<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 22/01/2018
 * Time: 15:32
 */

require '../../database/config.php';
require '../../_class/Empresa.php';

$fornece = new Empresa();

$cnpj_forn = "";
$raz_forn = "";
$fant_forn = "";
$ie_forn = "";
$rua_forn = "";
$num_forn = "";
$bairro_forn = "";
$cid_forn = "";
$est_forn = "";
$tel_forn = "";
$email_forn = "";
$edt = "style='display:none'";
$add = "";
$rdo = "";

if(isset($_POST['adicionar'])){
    $fornece->setCnpjEmp($_POST['cnpj_forn']);
    $fornece->setRazEmp($_POST['raz_forn']);
    $fornece->setFantEmp($_POST['fant_forn']);
    $fornece->setIeEmp($_POST['ie_forn']);
    $fornece->setRuaEmp($_POST['rua_forn']);
    $fornece->setNumEmp($_POST['num_forn']);
    $fornece->setBairroEmp($_POST['bairro_forn']);
    $fornece->setCidEmp($_POST['cid_forn']);
    $fornece->setEstEmp($_POST['est_forn']);
    $fornece->setTelEmp($_POST['tel_forn']);
    $fornece->setEmailEmp($_POST['email_forn']);
    $fornece->setStatus(1);
    $fornece->salvar($pdo);
    header("Location:../fornecedor");

}elseif (isset($_POST['salvar'])){
    $fornece->setCnpjEmp($_POST['cnpj_forn']);
    $fornece->setRazEmp($_POST['raz_forn']);
    $fornece->setFantEmp($_POST['fant_forn']);
    $fornece->setIeEmp($_POST['ie_forn']);
    $fornece->setRuaEmp($_POST['rua_forn']);
    $fornece->setNumEmp($_POST['num_forn']);
    $fornece->setBairroEmp($_POST['bairro_forn']);
    $fornece->setCidEmp($_POST['cid_forn']);
    $fornece->setEstEmp($_POST['est_forn']);
    $fornece->setTelEmp($_POST['tel_forn']);
    $fornece->setEmailEmp($_POST['email_forn']);
    $fornece->editar($pdo);
}

if(isset($_GET['edt'])){
    $cnpj = base64_decode($_GET['edt']);
    $fornece->setCnpjEmp($cnpj);
    $dados = $fornece->buscaDadosUnit($pdo);
    foreach ($dados as $item) {
        $cnpj_forn = $item['cnpj_emp'];
        $raz_forn = $item['raz_emp'];
        $fant_forn = $item['fant_emp'];
        $ie_forn = $item['ie_emp'];
        $rua_forn = $item['rua_emp'];
        $num_forn = str_pad($item['num_emp'], 4, "0", STR_PAD_LEFT);
        $bairro_forn = $item['bairro_emp'];
        $cid_forn = $item['cid_emp'];
        $est_forn = $item['est_emp'];
        $tel_forn = $item['tel_emp'];
        $email_forn = $item['email_emp'];
    }
    $add = "style='display:none'";
    $edt = "";
    $rdo = "readonly='readonly'";
}
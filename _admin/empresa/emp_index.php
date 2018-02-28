<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 21/01/2018
 * Time: 14:18
 */

require '../../database/config.php';
require '../../_class/Empresa.php';

$empresa = new Empresa();
$cnpj_emp = "";
$raz_emp = "";
$fant_emp = "";
$ie_emp = "";
$rua_emp = "";
$num_emp = "";
$bairro_emp = "";
$cid_emp = "";
$est_emp = "";
$tel_emp = "";
$email_emp = "";
$logo_emp = "img/";

if(isset($_POST['adicionar'])){
    $empresa->setCnpjEmp($_POST['cnpj_emp']);
    $empresa->setRazEmp($_POST['raz_emp']);
    $empresa->setFantEmp($_POST['fant_emp']);
    $empresa->setIeEmp($_POST['ie_emp']);
    $empresa->setRuaEmp($_POST['rua_emp']);
    $empresa->setNumEmp($_POST['num_emp']);
    $empresa->setBairroEmp($_POST['bairro_emp']);
    $empresa->setCidEmp($_POST['cid_emp']);
    $empresa->setEstEmp($_POST['est_emp']);
    $empresa->setTelEmp($_POST['tel_emp']);
    $empresa->setEmailEmp($_POST['email_emp']);
    $empresa->setStatus(2);

    $extensão = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novoNome = "logo".$extensão;
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $logo_emp.$novoNome);
    $empresa->setLogoEmp($novoNome);
    $empresa->salvar($pdo);
}elseif (isset($_POST['salvarDados'])){
    $empresa->setCnpjEmp($_POST['cnpj_emp']);
    $empresa->setRazEmp($_POST['raz_emp']);
    $empresa->setFantEmp($_POST['fant_emp']);
    $empresa->setIeEmp($_POST['ie_emp']);
    $empresa->setRuaEmp($_POST['rua_emp']);
    $empresa->setNumEmp($_POST['num_emp']);
    $empresa->setBairroEmp($_POST['bairro_emp']);
    $empresa->setCidEmp($_POST['cid_emp']);
    $empresa->setEstEmp($_POST['est_emp']);
    $empresa->setTelEmp($_POST['tel_emp']);
    $empresa->setEmailEmp($_POST['email_emp']);
    $empresa->editar($pdo);
}elseif (isset($_POST['salvarLogo'])){
    $extensão = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novoNome = "logo".$extensão;
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $logo_emp.$novoNome);
    $empresa->setCnpjEmp($_POST['cnpj_emp']);
    $empresa->setLogoEmp($novoNome);
}

$qtd_emp = $empresa->buscaQtd($pdo);

if($qtd_emp > 0){
    $dados = $empresa->buscaDados($pdo);
    foreach ($dados as $item) {

        $cnpj_emp = $item['cnpj_emp'];
        $raz_emp = $item['raz_emp'];
        $fant_emp = $item['fant_emp'];
        $ie_emp = $item['ie_emp'];
        $rua_emp = $item['rua_emp'];
        $num_emp = $item['num_emp'];
        $bairro_emp = $item['bairro_emp'];
        $cid_emp = $item['cid_emp'];
        $est_emp = $item['est_emp'];
        $tel_emp = $item['tel_emp'];
        $email_emp = $item['email_emp'];
        $logo_emp .= $item['logo_emp'];
    }
}

unset($_POST, $_FILES);
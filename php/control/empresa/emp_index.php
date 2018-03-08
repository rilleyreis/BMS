<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 21/01/2018
 * Time: 14:18
 */

require '../../php/model/Empresa.php';
require '../../php/model/Endereco.php';

$endereco = new Endereco();
$idEndereco = "";

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
$cep_emp = "";
$tel_emp = "";
$email_emp = "";
$logo_emp = "img/";

if(isset($_POST['adicionar'])){
    $endereco->setRua($_POST['rua_emp']);
    $endereco->setNumero($_POST['num_emp']);
    $endereco->setBairro($_POST['bairro_emp']);
    $endereco->setCidade($_POST['cid_emp']);
    $endereco->setEstado($_POST['est_emp']);
    $endereco->setCep($_POST['cep_emp']);
    $enderecoId = $endereco->salvar($pdo);

    $empresa->setCnpjEmp($_POST['cnpj_emp']);
    $empresa->setrazsocEmp($_POST['raz_emp']);
    $empresa->setFantEmp($_POST['fant_emp']);
    $empresa->setIeEmp($_POST['ie_emp']);
    $empresa->setTelEmp($_POST['tel_emp']);
    $empresa->setEmailEmp($_POST['email_emp']);
    $empresa->setTipoEMPRESA(1);
    $empresa->setAtivoEMPRESA(1);
    $empresa->setIdENDERECO($enderecoId[0]);

    $extensão = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novoNome = "logo".$extensão;
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $logo_emp.$novoNome);
    $empresa->setLogoEmp($novoNome);
    $empresa->salvar($pdo);
}elseif (isset($_POST['salvarDados'])){
    $endereco->setId($_POST['endereco']);
    $endereco->setRua($_POST['rua_emp']);
    $endereco->setNumero($_POST['num_emp']);
    $endereco->setBairro($_POST['bairro_emp']);
    $endereco->setCidade($_POST['cid_emp']);
    $endereco->setEstado($_POST['est_emp']);
    $endereco->setCep($_POST['cep_emp']);
    $endereco->update($pdo);

    $empresa->setCnpjEmp($_POST['cnpj_emp']);
    $empresa->setrazsocEmp($_POST['raz_emp']);
    $empresa->setFantEmp($_POST['fant_emp']);
    $empresa->setIeEmp($_POST['ie_emp']);
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

$qtd_emp = $empresa->buscaQtd($pdo, 1);

if($qtd_emp > 0){
    $dados = $empresa->buscaDados($pdo);
    foreach ($dados as $item) {
        $cnpj_emp = $item['cnpjEMPRESA'];
        $raz_emp = $item['razsocEMPRESA'];
        $fant_emp = $item['nomfantEMPRESA'];
        $ie_emp = $item['ieEMPRESA'];
        $tel_emp = $item['telEMPRESA'];
        $email_emp = $item['emailEMPRESA'];
        $logo_emp .= $item['logoEMPRESA'];
        $idEnd = $item['ENDERECO_idENDERECO'];
        $endereco->setId($idEnd);
        $end = $endereco->buscaDados($pdo);
        foreach ($end as $item2) {
            $idEndereco = $item2['idENDERECO'];
            $rua_emp = $item2['ruaENDERECO'];
            $num_emp = $item2['numENDERECO'];
            $bairro_emp = $item2['bairroENDERECO'];
            $cid_emp = $item2['cityENDERECO'];
            $est_emp = $item2['ufENDERECO'];
            $cep_emp = $item2['cepENDERECO'];
        }
    }
}

unset($_POST, $_FILES);
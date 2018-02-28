<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 21/01/2018
 * Time: 23:42
 */

require '../../database/config.php';
require '../../_class/Empresa.php';
require '../../_class/OrdemServico.php';
require '../../_class/Cliente.php';
require '../../_class/Usuario.php';
require '../../_class/Prod_Os.php';
require '../../_class/Serv_Os.php';

$empresa = new Empresa();
$newOS = new OrdemServico();

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
$logo_emp = "";

if(isset($_POST['editar'])){
    $id = base64_encode($_POST['editar']);
    header("Location:dados.php?edt=".$id);
}

$temEmp = $empresa->buscaQtd($pdo);
if($temEmp == 1) {
    $dadosEmp = $empresa->buscaDados($pdo);
    foreach ($dadosEmp as $item) {
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
        $logo_emp = "../empresa/img/" . $item['logo_emp'];
    }
}
$id_os = base64_decode($_GET['view']);
$newOS->setId($id_os);

$dadosOS = $newOS->buscarDados($pdo);
foreach ($dadosOS as $dado) {
    $cliente = explode("|",$dado['cliente']);
    $tecnico = explode("|",$dado['tecnico']);
    $cli_os = $cliente[0];
    $tec_os = $tecnico[0];
    $status_os = $dado['status_os'];
    $dtIni_os = $dado['dtIni_os'];
    $dtFim_os = $dado['dtFim_os'];
    $gar_os = $dado['garant_os'];
    $desc_os = $dado['desc_os'];
    $def_os = $dado['deft_os'];
    $obs_os = $dado['obs_os'];
    $protocolo = $dado['prot_os'];
    $data_os = date("d/m/Y", strtotime($dado['data_os']));
}
$cliente = new Cliente();
$cliente->setCpf($cli_os);
$dadosCli = $cliente->buscaDados($pdo);
$nomeCli = "";
$contatoCli= "";
$emailCli = "";
$tecnico = new Usuario();
$tecnico->setId($tec_os);
$dadosTec = $tecnico->buscaDados($pdo);
$nomeTec = "";
$contatoTec = "";
$emailTec = "";
foreach ($dadosCli as $dado){
    $nomeCli = $dado['nome_cli'];
    $contatoCli = $dado['cel_cli'];
    $contatoCli .= $dado['tel_cli'] != "" ? " &mdash; ".$dado['tel_cli'] : "";
    $emailCli = $dado['email_cli'];
}
foreach ($dadosTec as $dado){
    $nomeTec = $dado['nome_user'];
    $contatoTec = $dado['cel_user'];
    $contatoTec .= $dado['tel_user'] != "" ? " &mdash; ".$dado['tel_user'] : "";
    $emailTec = $dado['email_user'];
}

$prodOs = new Prod_Os();
$prodOs->setOsOsp($id_os);
$qtdProd = $prodOs->buscaQTD($pdo);
$prods_exibir = "";
if($qtdProd > 0){
    $prods_exibir = $prodOs->buscarProds($pdo);
}
$servOs = new Serv_Os();
$servOs->setOsOss($id_os);
$qtdServ = $servOs->buscaQTD($pdo);
$servs_exibir = "";
if($qtdServ > 0){
    $servs_exibir = $servOs->buscarServs($pdo);
}

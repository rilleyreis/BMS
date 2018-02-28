<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 11/01/2018
 * Time: 20:33
 */


require '../../database/config.php';
require '../../_class/OrdemServico.php';
require '../../_class/Prod_Os.php';
require '../../_class/Serv_Os.php';

$newOS = new OrdemServico();
$prodOS = new Prod_Os();
$servOS = new Serv_Os();
$edt = "style='display:none;'";
$cad = "style='display:none;'";
$prot = "style='display:none;'";
$add = "";

$id_os = "";
$cpf_cli = "";
$id_user = "";
$status_os = "";
$dtIni_os = "";
$dtFim_os = "";
$gar_os = "";
$desc_os = "";
$def_os = "";
$obs_os = "";
$protocolo = "";

if(isset($_POST['continuar'])){
    $cpf_cli = explode("|",$_POST['cli_os']);
    $id_user = explode("|",$_POST['tec_os']);

    $newOS->setCliOs($cpf_cli[0]);
    $newOS->setTecOs($id_user[0]);
    $newOS->setStatusOs($_POST['status_os']);
    $newOS->setDtIniOs($_POST['dtIni_os']);
    $newOS->setDtFimOs($_POST['dtFim_os']);
    $newOS->setGarantOs($_POST['gar_os']);
    $newOS->setDescOs($_POST['desc_os']);
    $newOS->setDeftOs($_POST['def_os']);
    $newOS->setObsOs($_POST['obs_os']);
    $id_os = $newOS->salvar($pdo);
    $edt = "";
    $cad = "";
    $prot = "";
    $add = "style='display:none;'";
    $newOS = new OrdemServico();
    $newOS->setId($id_os);
    $dados = $newOS->buscarDados($pdo);
    foreach ($dados as $dado) {
        $cpf_cli = $dado['cliente'];
        $id_user = $dado['tecnico'];
        $status_os = $dado['status_os'];
        $dtIni_os = $dado['dtIni_os'];
        $dtFim_os = $dado['dtFim_os'];
        $gar_os = $dado['garant_os'];
        $desc_os = $dado['desc_os'];
        $def_os = $dado['deft_os'];
        $obs_os = $dado['obs_os'];
        $protocolo = $dado['prot_os'];
    }
    $num_prodOS = 0;
    $num_servOS = 0;
}elseif (isset($_POST['addProd'])){
    $prodOS->setOsOsp($_POST['id_os']);
    $produto = explode('|', $_POST['prod_os']);
    $prodOS->setProdOsp($produto[0]);
    $prodOS->setQtdOsp($_POST['qtd_os']);
    $prodOS->adicionarProduto($pdo);
    $newOS->setId($_POST['id_os']);
    $dados = $newOS->buscarDados($pdo);
    foreach ($dados as $dado) {
        $id_os = $dado['id_os'];
        $cpf_cli = $dado['cliente'];
        $id_user = $dado['tecnico'];
        $status_os = $dado['status_os'];
        $dtIni_os = $dado['dtIni_os'];
        $dtFim_os = $dado['dtFim_os'];
        $gar_os = $dado['garant_os'];
        $desc_os = $dado['desc_os'];
        $def_os = $dado['deft_os'];
        $obs_os = $dado['obs_os'];
        $protocolo = $dado['prot_os'];
    }
    $edt = "";
    $add = "style='display:none;'";
    $prot = "";
    $prodOS->setOsOsp($id_os);
    $servOS->setOsOss($id_os);
    $num_prodOS = $prodOS->buscaQTD($pdo);
    $prods_exibir = $prodOS->buscarProds($pdo);
    $num_servOS = $servOS->buscaQTD($pdo);
    $servs_exibir = $servOS->buscarServs($pdo);
}elseif (isset($_POST['excl'])){
    $values = explode("|", $_POST['excl']);
    $prodOS->setIdOsp($values[0]);
    $prodOS->setQtdOsp($values[1]);
    $prodOS->setProdOsp($values[2]);
    $prodOS->removerProduto($pdo);
    $newOS->setId($_POST['id_os']);
    $dados = $newOS->buscarDados($pdo);
    foreach ($dados as $dado) {
        $id_os = $dado['id_os'];
        $cpf_cli = $dado['cliente'];
        $id_user = $dado['tecnico'];
        $status_os = $dado['status_os'];
        $dtIni_os = $dado['dtIni_os'];
        $dtFim_os = $dado['dtFim_os'];
        $gar_os = $dado['garant_os'];
        $desc_os = $dado['desc_os'];
        $def_os = $dado['deft_os'];
        $obs_os = $dado['obs_os'];
        $protocolo = $dado['prot_os'];
    }
    $edt = "";
    $add = "style='display:none;'";
    $prot = "";
    $prodOS->setOsOsp($id_os);
    $servOS->setOsOss($id_os);
    $num_prodOS = $prodOS->buscaQTD($pdo);
    $prods_exibir = $prodOS->buscarProds($pdo);
    $num_servOS = $servOS->buscaQTD($pdo);
    $servs_exibir = $servOS->buscarServs($pdo);
}elseif (isset($_POST['addServ'])){
    $servOS->setOsOss($_POST['id_os']);
    $servicos = explode('|', $_POST['serv_os']);
    $servOS->setServOss($servicos[0]);
    $servOS->adicionarServico($pdo);
    $newOS->setId($_POST['id_os']);
    $dados = $newOS->buscarDados($pdo);
    foreach ($dados as $dado) {
        $id_os = $dado['id_os'];
        $cpf_cli = $dado['cliente'];
        $id_user = $dado['tecnico'];
        $status_os = $dado['status_os'];
        $dtIni_os = $dado['dtIni_os'];
        $dtFim_os = $dado['dtFim_os'];
        $gar_os = $dado['garant_os'];
        $desc_os = $dado['desc_os'];
        $def_os = $dado['deft_os'];
        $obs_os = $dado['obs_os'];
        $protocolo = $dado['prot_os'];
    }
    $edt = "";
    $add = "style='display:none;'";
    $prot = "";
    $prodOS->setOsOsp($id_os);
    $servOS->setOsOss($id_os);
    $num_servOS = $servOS->buscaQTD($pdo);
    $servs_exibir = $servOS->buscarServs($pdo);
    $num_prodOS = $prodOS->buscaQTD($pdo);
    $prods_exibir = $prodOS->buscarProds($pdo);
}elseif (isset($_POST['exclServ'])){
    $servOS->setIdOss($_POST['exclServ']);
    $servOS->removerServico($pdo);
    $newOS->setId($_POST['id_os']);
    $dados = $newOS->buscarDados($pdo);
    foreach ($dados as $dado) {
        $id_os = $dado['id_os'];
        $cpf_cli = $dado['cliente'];
        $id_user = $dado['tecnico'];
        $status_os = $dado['status_os'];
        $dtIni_os = $dado['dtIni_os'];
        $dtFim_os = $dado['dtFim_os'];
        $gar_os = $dado['garant_os'];
        $desc_os = $dado['desc_os'];
        $def_os = $dado['deft_os'];
        $obs_os = $dado['obs_os'];
        $protocolo = $dado['prot_os'];
    }
    $edt = "";
    $add = "style='display:none;'";
    $prot = "";
    $prodOS->setOsOsp($id_os);
    $servOS->setOsOss($id_os);
    $num_prodOS = $prodOS->buscaQTD($pdo);
    $prods_exibir = $prodOS->buscarProds($pdo);
    $num_servOS = $servOS->buscaQTD($pdo);
    $servs_exibir = $servOS->buscarServs($pdo);
}elseif (isset($_POST['salvar'])){
    $cpf_cli = explode("|",$_POST['cli_os']);
    $id_user = explode("|",$_POST['tec_os']);

    $newOS->setCliOs($cpf_cli[0]);
    $newOS->setTecOs($id_user[0]);
    $newOS->setStatusOs($_POST['status_os']);
    $newOS->setDtIniOs($_POST['dtIni_os']);
    $newOS->setDtFimOs($_POST['dtFim_os']);
    $newOS->setGarantOs($_POST['gar_os']);
    $newOS->setDescOs($_POST['desc_os']);
    $newOS->setDeftOs($_POST['def_os']);
    $newOS->setObsOs($_POST['obs_os']);
    $newOS->setId($_POST['id_os']);
    $newOS->editar($pdo);
    $newOS =  new OrdemServico();
    $newOS->setId($_POST['id_os']);
    $dados = $newOS->buscarDados($pdo);
    foreach ($dados as $dado) {
        $id_os = $dado['id_os'];
        $cpf_cli = $dado['cliente'];
        $id_user = $dado['tecnico'];
        $status_os = $dado['status_os'];
        $dtIni_os = $dado['dtIni_os'];
        $dtFim_os = $dado['dtFim_os'];
        $gar_os = $dado['garant_os'];
        $desc_os = $dado['desc_os'];
        $def_os = $dado['deft_os'];
        $obs_os = $dado['obs_os'];
        $protocolo = $dado['prot_os'];
    }
    $edt = "";
    $add = "style='display:none;'";
    $prot = "";
    $prodOS->setOsOsp($id_os);
    $servOS->setOsOss($id_os);
    $num_prodOS = $prodOS->buscaQTD($pdo);
    $prods_exibir = $prodOS->buscarProds($pdo);
    $num_servOS = $servOS->buscaQTD($pdo);
    $servs_exibir = $servOS->buscarServs($pdo);
}
//elseif (isset($_POST['print'])){
//    $id = base64_encode($_POST['print']);
//    echo "<script>window.open('gerarPDF.php?print=$id');</script>";
//}

elseif (isset($_GET['edt'])){
    $id_os = base64_decode($_GET['edt']);
    $newOS->setId($id_os);
    $dados = $newOS->buscarDados($pdo);
    foreach ($dados as $dado) {
        $cpf_cli = $dado['cliente'];
        $id_user = $dado['tecnico'];
        $status_os = $dado['status_os'];
        $dtIni_os = $dado['dtIni_os'];
        $dtFim_os = $dado['dtFim_os'];
        $gar_os = $dado['garant_os'];
        $desc_os = $dado['desc_os'];
        $def_os = $dado['deft_os'];
        $obs_os = $dado['obs_os'];
        $protocolo = $dado['prot_os'];
    }
    $edt = "";
    $add = "style='display:none;'";
    $prot = "";
    $prodOS->setOsOsp($id_os);
    $servOS->setOsOss($id_os);
    $num_prodOS = $prodOS->buscaQTD($pdo);
    $prods_exibir = $prodOS->buscarProds($pdo);
    $num_servOS = $servOS->buscaQTD($pdo);
    $servs_exibir = $servOS->buscarServs($pdo);
}




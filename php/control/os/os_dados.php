<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 27/04/2018
 * Time: 04:44
 */

$protocolo = "";
$vendedor = "";
$cliente = "";
$telefone = "";
$tecnico = "";
$responsavel = "";
$objrecebido = "";
$itemdeixado = "";
$defeitos = "";
$status = "";

function pegaDados(){
    global $protocolo, $vendedor, $cliente, $telefone, $tecnico, $responsavel, $objrecebido, $itemdeixado, $defeitos, $status;
    $protocolo = $_POST['protocolo'];
    $vendedor = $_POST['vendedor'];
    $cliente = explode("|", $_POST['cliente']);
    $cliente = $cliente[0];
    $telefone = trim(strip_tags($_POST['telCliente']));
    $tecnico = explode("|", $_POST['tecnico']);
    $tecnico = $tecnico[0];
    $responsavel = trim(strip_tags($_POST['responsavel']));
    $objrecebido = trim(strip_tags($_POST['objeto']));
    $itemdeixado = trim(strip_tags($_POST['itens']));
    $defeitos = trim(strip_tags($_POST['defeitos']));
    $status = $_POST['status'];
}

require '../../php/model/OS.php';
require '../../php/model/DSO.php';
require '../../php/model/Serv_OS.php';
require '../../php/model/Prod_OS.php';

$os = new OS();
$num = $os->buscaQtd($pdo);
$id = "";
$num = substr(str_shuffle($num), 0, 3);
$protocolo = date("Y").date("His").str_pad($num, 3, "0", STR_PAD_LEFT);
$vendedor = $_SESSION['nomeUser']." ".$_SESSION['snomeUser'];
$add = "";
$edt = "style='display:none'";
$rdo = "";
$laudo = "";
$solucao = "";

if (isset($_POST['adicionar'])){
    pegaDados();
    $os->setProtocolo($protocolo);
    $os->setVendedor($vendedor);
    $os->setCliente($cliente);
    $os->setTelefone($telefone);
    $os->setTecnico($tecnico);
    $os->setResponsavel($responsavel);
    $os->setObjeto($objrecebido);
    $os->setItens($itemdeixado);
    $os->setDefeitos($defeitos);
    $os->setStatus($status);
    $idOS = $os->salvar($pdo);
    $dso = new DSO();
    $dso->setData(date('Y-m-d'));
    $dso->setHora(date("H:i:s"));
    $dso->setStatus($status);
    $dso->setIdOs($idOS[0]);
    $dso->salvar($pdo);
    header("Location:../os");
}

$serv = new Serv_OS();
$prod = new Prod_OS();

if(isset($_POST['adicionarS'])) {
    $serv->setIdOS($_POST['idOs']);
    $idServ = explode("|", $_POST['servicoOS']);
    $serv->setIdServ($idServ[0]);
    $serv->salvar($pdo);
}

if (isset($_POST['adicionarP'])){
    $prod->setIdOS($_POST['idOs']);
    $idProd = explode("|", $_POST['produtoOS']);
    $prod->setIdProd($idProd[0]);
    $prod->setQtd($_POST['qtdProd']);
    $prod->salvar($pdo);
}

if(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $edt = "";
    $add = "style='display:none'";
    $rdo = "readonly='readonly'";
    $os->setId($id);
    $dados = $os->buscaDados($pdo);
    foreach ($dados as $dado) {
        $id = $dado['id'];
        $protocolo = $dado['protocolo'];
        $vendedor = $dado['vendedor'];
        $cliente = $dado['cliente'];
        $telefone = $dado['telefone'];
        $tecnico = $dado['tecnico'];
        $responsavel = $dado['responsavel'];
        $objrecebido = $dado['objeto'];
        $itemdeixado = $dado['itens'];
        $defeitos = $dado['defeitos'];
        $status = $dado['status'];
    }
    $dso = new DSO();
    $dso->setIdOs($id);
    $dsoExibir = $dso->buscaDados($pdo);
}

if(isset($_POST['exclS'])){
    $serv->setId($_POST['exclS']);
    $serv->excluir($pdo);
}

$serv->setIdOS($id);
$num_serv = $serv->buscaQtd($pdo);
if($num_serv > 0){
    $servs_exibir = $serv->buscaServs($pdo);
}

$prod->setIdOS($id);
$num_prod = $prod->buscaQtd($pdo);
if ($num_prod > 0){
    $prods_exibir = $prod->buscaProds($pdo);
}
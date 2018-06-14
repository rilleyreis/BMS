<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/06/2018
 * Time: 01:45
 */


require "../../php/model/Empresa.php";
require "../../php/model/Pessoa.php";
require "../../php/model/OS.php";
require "../../php/model/Usuario.php";
require "../../php/model/Serv_OS.php";
require "../../php/model/Prod_OS.php";
require "../../php/model/Movimentacao.php";
require "../../php/model/Caixa.php";
require "../../php/model/Log.php";

$empresa = new Empresa();
$ordem = new OS();
$pessoa = new Pessoa();
$usuario = new Usuario();
$servicos = new Serv_OS();
$produtos = new Prod_OS();
$mov = new Movimentacao();
$dadosEmp = $empresa->buscaDados($pdo);

$idOS = base64_decode($_GET['id']);
$ordem->setId($idOS);
$protocolo = "";
$cliente = "";
$tecnico = "";
$equipamento = "";
$defeito = "";
$laudo = "";
$solucao = "";
$status = "";
$nomeCli = "";
$nomeEmp = "";
$cpfCnpjCli = "";
$telCli = "";
$emailCli = "";
$subProd = 0;
$subServ = 0;
$cidade = "";
$nomeTec = "";
$telTec = "";
$emailTec = "";

if(isset($_POST['fim'])){
    $ordem->setId($idOS);
    $dadosOS = $ordem->buscaDados($pdo);
    $cliente = "";
    $valor = "";
    foreach ($dadosOS as $dado) {
        $cliente = explode("|", $dado['cliente']);
        $cliente = $cliente[0];
        $valor = $dado['valor'];
    }
    $forma = $_POST['frmpag'];
    $parc = 1;
    if($_POST['parc'] != "")
        $parc = $_POST['parc'];
    $tipo = 1;
    $user = $_SESSION['idUser'];
    $cx = new Caixa();
    $cx->setData(date('Y-m-d'));
    $dadosCx = $cx->dadosCaixa($pdo);
    foreach ($dadosCx as $dado) {
        $cx = $dado['idCAIXA'];
    }
    $mov = new Movimentacao();
    $mov->setValor($valor);
    $mov->setFrmpag($forma);
    $mov->setParcela($parc);
    $mov->setTipo($tipo);
    $mov->setCliente($cliente);
    $mov->setUser($user);
    $mov->setOs($_POST['idOS']);
    $mov->setCaixa($cx);
//    var_dump($mov);
    $mov->movimentar($pdo);
    $ordem->setId($idOS);
    $ordem->setStatus(6);
    $ordem->trocarStatus($pdo);
    $id = base64_encode($idOS);
    $log = new Log();
    $log->criarLOG($pdo,"FINALIZOU UMA OS");
    //header("Location:view.php?id=".$id."&print");
}

$dadosOS = $ordem->buscaDados($pdo);
foreach ($dadosOS as $dado) {
    $protocolo = $dado['protocolo'];
    $cliente = explode("|", $dado['cliente']);
    $cliente = $cliente[0];
    $tecnico = explode("|",$dado['tecnico']);
    $tecnico = $tecnico[0];
    $equipamento = $dado['objeto'];
    $defeito = $dado['defeitos'];
    $laudo = $dado['laudo'];
    $solucao = $dado['solucao'];
    $status = $dado['status'];
}

$pessoa->setId($cliente);
$dadosCli = $pessoa->buscaDados($pdo);

foreach ($dadosCli as $dado) {
    $cpfCnpjCli = $dado['cpf_cnpj'];
    $nomeCli = strlen($cpfCnpjCli) == 14 ? $dado['nome']." ".$dado['snome'] : $dado['nome'];
    $telCli = $dado['tel'];
    $emailCli = $dado['email'];
}

$usuario->setId($tecnico);
$dadosTec = $usuario->buscaDados($pdo);

foreach ($dadosTec as $dado) {
    $nomeTec = $dado['nomeFull'];
    $telTec = $dado['tel'];
    $emailTec = $dado['email'];
}
$servicos->setIdOS($idOS);
$serv_num = $servicos->buscaQtd($pdo);
if ($serv_num > 0)
    $servs = $servicos->buscaServs($pdo);
$produtos->setIdOS($idOS);
$prod_num = $produtos->buscaQtd($pdo);
if ($prod_num > 0)
    $prods = $produtos->buscaProds($pdo);

$dia = date('d');
$mes = date('m');
$ano = date('Y');

switch ($mes){
    case 1 : $mes = "JANEIRO";break;
    case 2 : $mes = "FEVEREIRO";break;
    case 3 : $mes = "MARÇO";break;
    case 4 : $mes = "ABRIL";break;
    case 5 : $mes = "MAIO";break;
    case 6 : $mes = "JUNHO";break;
    case 7 : $mes = "JULHO";break;
    case 8 : $mes = "AGOSTO";break;
    case 9 : $mes = "SETEMBRO";break;
    case 10 : $mes = "OUTUBRO";break;
    case 11 : $mes = "NOVEMBRO";break;
    case 12 : $mes = "DEZEMBRO";break;
}

$dataHj = $dia." DE ".$mes." DE ".$ano;
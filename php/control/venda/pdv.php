<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/06/2018
 * Time: 14:49
 */

require '../../php/model/Movimentacao.php';
require '../../php/model/Comanda.php';
require '../../php/model/Produto.php';
require '../../php/model/Venda.php';
require '../../php/model/Caixa.php';
require '../../php/model/Log.php';

$comanda = new Comanda();
$first = true;
$livre = "return false";
$vendedor = $_SESSION['idUser']."|".$_SESSION['nomeUser']." ".$_SESSION['snomeUser'];
$totalVenda = 0;
$cliente = "";
$cliente = "";
$totalItemVenda = 0;
if(isset($_POST['adicionar'])){
    $livre = "document.getElementById('modal').style.display='block'";
    $cliente = $_POST['cliente'];
    $first = false;
    $produto = new Produto();
    $idP = explode("|",$_POST['produto']);
    $idP = $idP[0];
    $produto->setId($idP);
    $dadosP = $produto->buscarDados($pdo);
    $qtd = $_POST['qtd'];
    $valor = 0;
    foreach ($dadosP as $item) {
        $valor = $item['vendaPRODUTO'] * $qtd;
    }
    $comanda->setValor($valor);
    $comanda->setQtd($qtd);
    $comanda->setProd($idP);
    $comanda->addFake($pdo);
    $prods = $comanda->carregaCarrinho($pdo);
    $totalVenda = $comanda->somaTotal($pdo, 'total');
    foreach ($totalVenda as $item) {
        $totalVenda = $item['total'];
    }
    $totalItemVenda = $comanda->somaTotal($pdo, 'qtd');
    foreach ($totalItemVenda as $item) {
        $totalItemVenda = $item['total'];
    }
}

if(isset($_POST['fim'])){
    $valor = str_replace("R$ ", "", $_POST['total']);
    $valor = str_replace(",", ".", $valor);
    $qtd = $comanda->somaTotal($pdo, 'qtd');
    foreach ($qtd as $item) {
        $qtd = $item['total'];
    }
    $data = date('Y-m-d');
    $venda = new Venda();
    $venda->setValor($valor);
    $venda->setQtd($qtd);
    $venda->setData($data);
    $idV = $venda->vender($pdo);
    $idV = $idV[0];
    $prods = $comanda->buscaFake($pdo);
    foreach ($prods as $prod) {
        $comanda = new Comanda();
        $comanda->setQtd($prod['qtditemCOMANDA']);
        $comanda->setValor($prod['valorCOMANDA']);
        $comanda->setProd($prod['PRODUTO_idPRODUTO']);
        $comanda->setVenda($idV);
        $comanda->addComanda($pdo);
        $produto = new Produto();
        $produto->setId($prod['PRODUTO_idPRODUTO']);
        $produto->setEstoque($prod['qtditemCOMANDA']);
        $produto->removeEstoque($pdo);
    }
    $forma = $_POST['frmpag'];
    $parc = 1;
    if($_POST['parc'] != "")
        $parc = $_POST['parc'];
    $tipo = "VD";
    if($_POST['cliente'] != "") {
        $cliente = explode("|", $_POST['cliente']);
        $cliente = $cliente[0];
    }else{
        $cliente = null;
    }
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
    $mov->setVenda($idV);
    $mov->setCaixa($cx);
    $mov->movimentar($pdo);
    $idV = base64_encode($idV);

    $log = new Log();
    $log->criarLOG($pdo,"REALIZOU UMA VENDA");
    header("Location:view.php?id=".$idV);
}

if ($first){
    $comanda->deleteFake($pdo);
    $comanda->createFake($pdo);
}
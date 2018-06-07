<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/06/2018
 * Time: 20:10
 */

require "../../php/model/Empresa.php";
require "../../php/model/Pessoa.php";
require "../../php/model/Venda.php";
require "../../php/model/Comanda.php";
require "../../php/model/Movimentacao.php";

$empresa = new Empresa();
$pessoa = new Pessoa();
$venda = new Venda();
$comanda = new Comanda();
$mov = new Movimentacao();

$cpfCnpjCli = "";
$nomeCli = "";
$telCli = "";
$emailCli = "";
$endereco = "";
$cidade = "";
$uf = "";
$cep = "";

$dadosEmp = $empresa->buscaDados($pdo);

$idVenda = base64_decode($_GET['id']);

$mov->setVenda($idVenda);
$dadosMov =  $mov->buscaVenda($pdo);
$idCliente = "";
foreach ($dadosMov as $item) {
    $idCliente = $item['idCLIENTE'];
}
if($idCliente != "") {
    $pessoa->setId($idCliente);
    $dadosCli = $pessoa->buscaDados($pdo);

    foreach ($dadosCli as $dado) {
        $cpfCnpjCli = $dado['cpf_cnpj'];
        $nomeCli = strlen($cpfCnpjCli) == 14 ? $dado['nome'] . " " . $dado['snome'] : $dado['nome'];
        $telCli = $dado['tel'];
        $emailCli = $dado['email'];
        $endereco = $dado['rua'] . ", " . $dado['num'] . " - " . $dado['bairro'];
        $cidade = $dado['cidade'];
        $uf = $dado['uf'];
        $cep = $dado['cep'];
    }
}

$comanda->setVenda($idVenda);
$itensVendidos = $comanda->buscaVenda($pdo);

$vendaTotal = 0;




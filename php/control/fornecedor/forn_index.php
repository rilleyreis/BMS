<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 22/01/2018
 * Time: 15:30
 */

require '../../php/model/Empresa.php';
require '../../php/model/Endereco.php';

$fornece = new Empresa();
$endereco = new Endereco();

$msgTable = "";

if(isset($_POST['sel'])){
    $cnpj = base64_encode($_POST['sel']);
    header('Location:dados.php?edt='.$cnpj);
}
if(isset($_POST['cnpjExcl'])){
    $fornece->setCnpjEmp($_POST['cnpjExcl']);
    $fornece->excluir($pdo);
}
$num_forn = $fornece->buscaQtd($pdo, 2);
if ($num_forn == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_forn / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $forn_exibir = $fornece->buscaLtda($pdo, $inicio, $qtd_pags, "", 2);;
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:12
 */

require '../../php/model/Pessoa.php';

$msgTable = "";
$cliente = new Pessoa();
$num_cliente = $cliente->buscaQtd($pdo, "C");

if(isset($_POST['sel'])){
    $id = base64_encode($_POST['sel']);
    header('Location:dados.php?edt='.$id);
}
if(isset($_POST['cpfExcl'])){
    $cliente->setId($_POST['cpfExcl']);
    $cliente->ativar_desativar($pdo, 0);
}
if(isset($_POST['ative'])){
    $cliente->setId($_POST['ative']);
    $cliente->ativar_desativar($pdo, 1);
}
if ($num_cliente == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_cliente / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $cli_exibir = $cliente->buscaLtda($pdo, $inicio, $qtd_pags, "C");
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}

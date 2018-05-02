<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 22/01/2018
 * Time: 15:30
 */

require '../../php/model/Endereco.php';
require '../../php/model/Pessoa.php';

$fornece = new Pessoa();
$endereco = new Endereco();

$msgTable = "";

if(isset($_POST['sel'])){
    $cnpj = base64_encode($_POST['sel']);
    header('Location:dados.php?edt='.$cnpj);
}
if(isset($_POST['cnpjExcl'])){
    $fornece->setId($_POST['cnpjExcl']);
    $fornece->ativar_desativar($pdo, 0);
}
if(isset($_POST['ative'])){
    $fornece->setId($_POST['ative']);
    $fornece->ativar_desativar($pdo, 1);
}
$num_forn = $fornece->buscaQtd($pdo, 'F');
if ($num_forn == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_forn / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $forn_exibir = $fornece->buscaLtda($pdo, $inicio, $qtd_pags, "F");
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
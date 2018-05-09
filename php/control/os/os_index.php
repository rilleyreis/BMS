<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 27/04/2018
 * Time: 04:44
 */

require '../../php/model/OS.php';

$msg = "";
$ordemS = new OS();
$num_os = $ordemS->buscaQtd($pdo);

if (isset($_POST['sel'])){
    $id = base64_encode($_POST['sel']);
    header('Location:dados.php?edt='.$id);
}

if ($num_os == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_os / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $os_exibir = $ordemS->buscaLtda($pdo, $inicio, $qtd_pags);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
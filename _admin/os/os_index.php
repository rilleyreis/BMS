<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 11/01/2018
 * Time: 20:28
 */

require '../../database/config.php';
require '../../_class/OrdemServico.php';

$newOS = new OrdemServico();
$msgTable = "";

if(isset($_POST['sel'])){
    $id = base64_encode($_POST['sel']);
    header("Location:dados.php?edt=".$id);
}elseif(isset($_POST['view'])){
    $id = base64_encode($_POST['view']);
    header("Location:view.php?view=".$id);
}


$num_os = $newOS->buscaQtd($pdo);
if ($num_os == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_os / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $os_exibir = $newOS->buscaLtda($pdo, $inicio, $qtd_pags);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
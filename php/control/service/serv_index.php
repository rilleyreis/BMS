<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/01/2018
 * Time: 23:19
 */

require '../../util/config.php';
require '../../php/model/Servicos.php';

$msgTable = "";
$servico = new Servicos();

if(isset($_POST['sel'])){
    $id = base64_encode($_POST['sel']);
    header('Location:dados.php?edt='.$id);
}
else if(isset($_POST['servExcl'])){
    $servico->setId($_POST['servExcl']);
    $servico->excluir($pdo);
}
$num_servs = $servico->buscaQtd($pdo);
if ($num_servs == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_servs / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $serv_exibir = $servico->buscaLtda($pdo, $inicio, $qtd_pags);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
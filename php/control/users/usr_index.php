<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:12
 */

require '../../php/model/Usuario.php';
require '../../php/model/Log.php';

$msgTable = "";
$usuario = new Usuario();

if(isset($_POST['sel'])){
    $id = base64_encode($_POST['sel']);
    header('Location:dados.php?edt='.$id);
}
if(isset($_POST['usrExcl'])){
    $usuario->setId($_POST['usrExcl']);
    $usuario->excluir($pdo);
    $log = new Log();
    $log->criarLOG($pdo,"EXCLUIU UM USUÁRIO DO SISTEMA");
}
$num_usuario = $usuario->buscaQtd($pdo, "");
if ($num_usuario == 0){
    $msgTable = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_usuario / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $usr_exibir = $usuario->buscaLtda($pdo, $inicio, $qtd_pags, "");
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}

if(isset($_POST['buscar']) || isset($_POST['buscarDado'])) {
    $nomeBusca = trim(strip_tags($_POST['buscarDado']));
    $num_usuario = $usuario->buscaQtd($pdo, $nomeBusca);
    if ($num_usuario == 0) {
        $msgTable = "Nenhum registro encontrado";
    } else {
        $qtd_pags = 10;
        $total_pags = ceil($num_usuario / $qtd_pags);
        $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
        $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
        $usr_exibir = $usuario->buscaLtda($pdo, $inicio, $qtd_pags, $nomeBusca);
        $pag_prox = $pag_atual + 1;
        $pag_ant = $pag_atual - 2;
    }
}
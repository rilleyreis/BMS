<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 27/04/2018
 * Time: 04:44
 */

$nivel = "";

if(file_exists('../../php/model/OS.php')) {
    require '../../php/model/OS.php';
    require '../../php/model/Log.php';
}else {
    require '../php/model/OS.php';
    require '../php/model/Log.php';
    $nivel = "os/";
}

$msg = "";
$ordemS = new OS();
$tecnico = $_SESSION['panelUser'] == 'tecno' ? "WHERE `USERS_idUSER` = '".$_SESSION['idUser']."'" : "";
$num_os = $ordemS->buscaQtd($tecnico,$pdo);

if (isset($_POST['sel'])){
    $id = base64_encode($_POST['sel']);
    header('Location:'.$nivel.'dados.php?edt='.$id);
}

if(isset($_POST['cancel'])){
    $id = $_POST['cancel'];
    $ordemS->setId($id);
    $ordemS->setStatus(7);
    $ordemS->trocarStatus($pdo);
    $log = new Log();
    $log->criarLOG($pdo,"CANCELOU UMA OS");
}

if ($num_os == 0){
    $msg = "Nenhum registro encontrado";
}else {
    $qtd_pags = 10;
    $total_pags = ceil($num_os / $qtd_pags);
    $pag_atual = (isset($_GET['pag']) ? (int)$_GET['pag'] : 1);
    $inicio = ($qtd_pags * $pag_atual) - $qtd_pags;
    $tecnico = $_SESSION['panelUser'] == 'tecno' ? "WHERE `tecnico` = '".$_SESSION['idUser']."|".$_SESSION['nomeUser']." ".$_SESSION['snomeUser']."'" : "";
    $os_exibir = $ordemS->buscaLtda($pdo, $inicio, $qtd_pags, $tecnico);
    $pag_prox = $pag_atual + 1;
    $pag_ant = $pag_atual - 2;
}
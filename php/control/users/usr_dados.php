<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:12
 */

require '../../util/config.php';
require '../../php/model/Usuario.php';

$usuario = new Usuario();
$id = "";
$nome = "";
$snome = "";
$cpf = "";
$tel = "";
$cel = "";
$email = "";
$user = "";
$panel = "";
$status = 2;
$edt = "style='display:none'";
$add = "";

if (isset($_POST['adicionar'])){
    $usuario->setNome($_POST['nomeUsuario']);
    $usuario->setSnome($_POST['snomeUsuario']);
    $usuario->setCpf($_POST['cpfUsuario']);
    $usuario->setCel($_POST['celularUsuario']);
    $usuario->setTel($_POST['telefoneUsuario']);
    $usuario->setEmail($_POST['emailUsuario']);
    $usuario->setPanel($_POST['funcUsuario']);
    switch ($_POST['funcUsuario']){
        case "admin" : $usuario->setFuncao("Administrador"); break;
        case "vende" : $usuario->setFuncao("Vendedor"); break;
        case "tecno" : $usuario->setFuncao("Tecnico"); break;
    }
    $usuario->setUsuario($_POST['userUsuario']);
    $usuario->setStatus($_POST['status']);
    $senha = base64_encode($_POST['senhaUsuario']);
    $usuario->setSenha($senha);

    $usuario->salvar($pdo);
}
elseif (isset($_POST['salvar'])){
    $usuario->setId($_POST['idUsuario']);
    $usuario->setNome($_POST['nomeUsuario']);
    $usuario->setSnome($_POST['snomeUsuario']);
    $usuario->setCpf($_POST['cpfUsuario']);
    $usuario->setCel($_POST['celularUsuario']);
    $usuario->setTel($_POST['telefoneUsuario']);
    $usuario->setEmail($_POST['emailUsuario']);
    $usuario->setPanel($_POST['funcUsuario']);
    switch ($_POST['funcUsuario']){
        case "admin" : $usuario->setFuncao("Administrador"); break;
        case "vende" : $usuario->setFuncao("Vendedor"); break;
        case "tecno" : $usuario->setFuncao("Tecnico"); break;
    }
    $usuario->setUsuario($_POST['userUsuario']);
    $usuario->setStatus($_POST['status']);

    $usuario->editar($pdo);
}
elseif(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $edt = "";
    $add = "style='display:none'";
    $usuario->setId($id);
    $dados = $usuario->buscaDados($pdo);
    foreach ($dados as $row){
        $nome = utf8_encode($row['nome_user']);
        $snome = utf8_encode($row['snome_user']);
        $cpf = $row['cpf_user'];
        $tel = $row['tel_user'];
        $cel = $row['cel_user'];
        $email = $row['email_user'];
        $user = $row['usuario_user'];
        $panel = $row['panel_user'];
        $status = $row['status_user'];
    }
}
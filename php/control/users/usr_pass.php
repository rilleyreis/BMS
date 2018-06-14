<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 02:11
 */

require '../../php/model/Usuario.php';
require '../../php/model/Log.php';

$senha = "";
$dis = "display:none;";

$idUser = $_SESSION['idUser'];
$usuario = new Usuario();


if(isset($_POST['save'])){

    $usuario->setId($idUser);
    $dados = $usuario->buscaDados($pdo);
    foreach ($dados as $dado) {
        $senha = $dado['senha'];
    }
    $oldSenha = md5($_POST['oldSenha']);
    if ($senha != $oldSenha){
        $dis = "display:block;";
    }
}



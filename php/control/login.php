<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 02/04/2018
 * Time: 19:41
 */

session_start();
date_default_timezone_set("America/Sao_Paulo");

include "util/config.php";
require "php/model/Usuario.php";
require "php/model/Pessoa.php";
require "php/model/Caixa.php";
require "php/model/Empresa.php";
require "php/model/Log.php";

$erro = "display: none;";
$msg = "";
$color = "";
$colorText = "";
$usuario = new Usuario();

$qtdUser = $usuario->buscaQtd($pdo, "");

if(isset($_POST['logar']) AND $qtdUser > 0){
    $user = trim(strip_tags($_POST['usuario']));
    $pass = md5(trim(strip_tags($_POST['senha'])));
    sleep(3);
    if($user == "" || $pass == ""){
        $erro = "display: block;";
        $msg = "Os campos Usuário/Senha devem ser preenchidos";
        $color = "w3-pale-red";
        $colorText = "w3-text-red";
    }else{
        $usuario->setUsuario($user);
        $usuario->setSenha($pass);
        $dadosUser = $usuario->buscaUser($pdo);
        if($dadosUser == false){
            $erro = "display:block";
            $msg = "Usuário/Senha incorretos";
            $color = "w3-pale-red";
            $colorText = "w3-text-red";
        }
        else{
            foreach ($dadosUser as $item) {
                $idUser = $item['idUSER'];
                $idPE = $item['PESSOA_idPESSOA'];
                $panel = $item['panelUSER'];
                $funcao = $item['funcaoUSER'];
            }
            $pessoa = new Pessoa();
            $pessoa->setId($idPE);
            $dadosPE = $pessoa->buscaDados($pdo);
            foreach ($dadosPE as $item) {
                $fnome = $item['nome'];
                $lnome = $item['snome'];
            }
            $_SESSION['idUser'] = $idUser;
            $_SESSION['nomeUser'] = $fnome;
            $_SESSION['snomeUser'] = $lnome;
            $_SESSION['panelUser'] = $panel;
            $_SESSION['funcaoUser'] = $funcao;

            $log = new Log();
            $log->criarLOG($pdo,"REALIZAOU LOGIN NO SISTEMA");

            $caixa = new Caixa();
            $caixa->setData(date("Y-m-d"));
            if ($caixa->caixaAberto($pdo)) {
                header("Location:pag/$panel");
            } else {
                header("Location:aberturaCaixa");
            }
        }
    }
}elseif ($qtdUser == 0){
    $erro = "display:block";
    $msg = "Você deve acessar o menu Primeiro Acesso";
    $color = "w3-pale-red";
    $colorText = "w3-text-red";
}

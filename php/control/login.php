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

$erro = "display: none;";
$msg = "";
$color = "";
$colorText = "";

if(isset($_POST['logar'])){
    $user = trim(strip_tags($_POST['usuario']));
    $pass = md5(trim(strip_tags($_POST['senha'])));
    if($user == "" || $pass == ""){
        $erro = "display: block;";
        $msg = "Os campos Usuário/Senha devem ser preenchidos";
        $color = "w3-pale-red";
        $colorText = "w3-text-red";
    }else{
        $usuario = new Usuario();
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
                $fnome = $item['nomePESSOA'];
                $lnome = $item['snomePESSOA'];
            }
            $_SESSION['idUser'] = $idUser;
            $_SESSION['nomeUser'] = $fnome;
            $_SESSION['snomeUser'] = $lnome;
            $_SESSION['panelUser'] = $panel;
            $_SESSION['funcaoUser'] = $funcao;

            $erro = "display:block";
            $msg = "Redirecionando";
            $color = "w3-pale-blue";
            $colorText = "w3-text-blue";

            $empresa = new Empresa();
            if($empresa->buscaQtd($pdo) == 0){
                header("Refresh:2; url=emitente");
            }else {
                $caixa = new Caixa();
                $caixa->setData(date("Y-m-d"));
                if ($caixa->caixaAberto($pdo)) {
                    header("Refresh:2; url=pag/admin");
                } else {
                    header("Refresh:2; url=aberturaCaixa");
                }
            }
        }
    }
}

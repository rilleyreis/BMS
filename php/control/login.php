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
require "php/model/PFisica.php";
require "php/model/Caixa.php";

$erro = "display: none;";
$msg = "";
$color = "";
$colorText = "";

if(isset($_POST['logar'])){
    $user = trim(strip_tags($_POST['usuario']));
    $pass = base64_encode(trim(strip_tags($_POST['senha'])));
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
                $idPF = $item['PFISICA_idPFISICA'];
                $panel = $item['panelUSER'];
                $funcao = $item['funcaoUSER'];
            }
            $pfisica = new PFisica();
            $pfisica->setId($idPF);
            $dadosPF = $pfisica->buscaDados($pdo);
            foreach ($dadosPF as $item) {
                $fnome = $item['fnomePFISICA'];
                $lnome = $item['lnomePFISICA'];
            }
            $_SESSION['idUser'] = $idUser;
            $_SESSION['fnomeUser'] = $fnome;
            $_SESSION['lnomeUser'] = $lnome;
            $_SESSION['panelUser'] = $panel;
            $_SESSION['funcaoUser'] = $funcao;
            $caixa = new Caixa();
            $caixa->setData(date("Y-m-d"));
            if($caixa->caixaAberto($pdo)){
                $erro = "display:block";
                $msg = "Redirecionando";
                $color = "w3-pale-blue";
                $colorText = "w3-text-blue";
                header("Refresh:3; url=pag/admin");
            }else{
                $erro = "display:block";
                $msg = "Redirecionando";
                $color = "w3-pale-blue";
                $colorText = "w3-text-blue";
                header("Refresh:3; url=aberturaCaixa.php");
            }
        }
    }
}

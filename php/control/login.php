<?php
    date_default_timezone_set("America/Sao_Paulo");
    require 'util/config.php';
    require 'php/model/Usuario.php';
    require 'php/model/Caixa.php';
    require 'php/model/Session.php';
    $msgErro = "";
    session_start();
    if(isset($_POST['entrar'])){
        $user = $_POST['usuario'];
        $pass = base64_encode($_POST['senha']);
        if ($user == "" or $pass == ""){
            $msgErro = "Usuário e/ou Senha não preenchidos";
        }else{
            $usuario = new Usuario();
            $usuario->setUsuario($user);
            $usuario->setSenha($pass);
            $usuarios = $usuario->logar($pdo);
            if($usuarios->rowCount() == 0){
                $msgErro = "Usuário e/ou Senha inválido. Verifique e tente novamente";
            }else{
                foreach ($usuarios as $row){
                    $usuario->setId($row['idUSER']);
                }
                $session = new Session();
                $session->setId($usuario->getId());
                $session->iniciarSession($pdo);
                $caixa = new Caixa();
                $data = date("Y-m-d");
                $abrir = $caixa->abrirCaixa($pdo, $data);
                if($abrir)
                    header("Location: aberturaCaixa.php");
                else
                    header("Location: pag/".$usuario->getPanel().".php");
            }
        }
    }
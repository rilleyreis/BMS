<?php
    date_default_timezone_set("America/Sao_Paulo");
    require 'database/config.php';
    require '_class/Usuario.php';
    require '_class/Caixa.php';
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
                    $usuario->setId($row['id_user']);
                    $usuario->setFuncao($row['funcao_user']);
                    $usuario->setPanel($row['panel_user']);
                    $usuario->setNome($row['nome_user']);
                }
                $_SESSION['nome'] = $usuario->getNome();
                $_SESSION['funcao'] = $usuario->getFuncao();
                $_SESSION['id_user'] = $usuario->getId();
                $_SESSION['panel'] = $usuario->getPanel();
                $caixa = new Caixa();
                $data = date("Y-m-d");
                $abrir = $caixa->abrirCaixa($pdo, $data);
                if($abrir)
                    header("Location: aberturaCaixa.php");
                else
                    header("Location: _".$usuario->getPanel());
            }
        }
    }
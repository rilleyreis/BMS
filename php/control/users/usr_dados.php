<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:12
 */
require '../../php/model/Usuario.php';
require '../../php/model/PFisica.php';

$usuario = new Usuario();
$id = "";
$nome = "";
$snome = "";
$cpf = "";
$tel = "";
$cel = "";
$email = "";
$user = "";
$senha = "";
$panel = "";
$funcao = "";
$ativo = 0;
$idPF = "";
$edt = "style='display:none'";
$add = "";

function pegaDados(){
    global $nome, $snome, $cpf, $cel, $tel, $email, $panel, $funcao, $user, $ativo, $senha;
    $nome = trim(strip_tags($_POST['nomeUsuario']));
    $snome = trim(strip_tags($_POST['snomeUsuario']));
    $cpf = trim(strip_tags($_POST['cpfUsuario']));
    $cel = trim(strip_tags($_POST['celularUsuario']));
    $tel = trim(strip_tags($_POST['telefoneUsuario']));
    $email = trim(strip_tags($_POST['emailUsuario']));
    $panel = trim(strip_tags($_POST['funcUsuario']));
    switch ($_POST['funcUsuario']){
        case "admin" : $funcao = "ADMINISTRADOR"; break;
        case "vende" : $funcao = "VENDEDOR"; break;
        case "tecno" : $funcao = "TÉCNICO"; break;
    }
    $user = trim(strip_tags($_POST['userUsuario']));
    $ativo = $_POST['status'];
    $senha = base64_encode(trim(strip_tags($_POST['senhaUsuario'])));
}

if (isset($_POST['adicionar'])){
    pegaDados();
    $pfisica = new PFisica();

    $pfisica->setFnome($nome);
    $pfisica->setLnome($snome);
    $pfisica->setCpf($cpf);
    $pfisica->setCelular($cel);
    $pfisica->setTelefone($tel);
    $pfisica->setEmail($email);

    $idPF = $pfisica->salvar($pdo);

    $usuario->setFuncao($funcao);
    $usuario->setPanel($panel);
    $usuario->setUsuario($user);
    $usuario->setSenha($senha);
    $usuario->setAtivo($ativo);
    $usuario->setIdPF($idPF[0]);

    $usuario->salvar($pdo);
}
elseif (isset($_POST['salvar'])){
    pegaDados();
    $idPF = $_POST['idPF'];
    $id = $_POST['id'];
    $pfisica = new PFisica();

    $pfisica->setId($idPF);
    $pfisica->setFnome($nome);
    $pfisica->setLnome($snome);
    $pfisica->setCpf($cpf);
    $pfisica->setCelular($cel);
    $pfisica->setTelefone($tel);
    $pfisica->setEmail($email);

    $idPF = $pfisica->editar($pdo);

    $usuario->setId($id);
    $usuario->setFuncao($funcao);
    $usuario->setPanel($panel);
    $usuario->setUsuario($user);
    $usuario->setSenha($senha);
    $usuario->setAtivo($ativo);
    $usuario->setIdPF($idPF[0]);

    $usuario->editar($pdo);
}
elseif(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $edt = "";
    $add = "style='display:none'";
    $usuario->setId($id);
    $dados = $usuario->buscaDados($pdo);
    foreach ($dados as $row){
        $user = $row['usuarioUSER'];
        $funcao = $row['funcaoUSER'];
        $panel = $row['panelUSER'];
        $ativo = $row['ativoUSER'];
        $idPF = $row['PFISICA_idPFISICA'];
    }
    $pfisica = new PFisica();
    $pfisica->setId($idPF);
    $dadosPF = $pfisica->buscaDados($pdo);
    foreach ($dadosPF as $item) {
        $nome = $item['fnomePFISICA'];
        $snome = $item['lnomePFISICA'];
        $cpf = $item['cpfPFISICA'];
        $cel = $item['celPFISICA'];
        $tel = $item['telPFISICA'];
        $email = $item['emailPFISICA'];
    }

}
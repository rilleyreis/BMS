<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 04/06/2018
 * Time: 20:25
 */

require 'util/config.php';
require 'php/model/Usuario.php';
require 'php/model/Pessoa.php';
require 'php/model/Endereco.php';

$usuario = new Usuario();
$id = "";
$nome = "";
$snome = "";
$cpf = "";
$tel = "";
$rg = "";
$email = "";
$user = "";
$senha = "";
$panel = "";
$funcao = "";
$ativo = 0;
$rua = "";
$num = "";
$bairro = "";
$cidade = "";
$uf = "";
$cep = "";
$idPF = "";
$idEnd = "";
$edt = "style='display:none'";
$add = "";

function pegaDados(){
    global $nome, $snome, $cpf, $rg, $tel, $email, $panel, $funcao, $user, $ativo, $senha, $rua, $num, $bairro, $cidade, $uf, $cep;
    $nome = trim(strip_tags($_POST['nomeUsuario']));
    $snome = trim(strip_tags($_POST['snomeUsuario']));
    $cpf = trim(strip_tags($_POST['cpfUsuario']));
    $rg = trim(strip_tags($_POST['rgUsuario']));
    $tel = trim(strip_tags($_POST['telefoneUsuario']));
    $email = trim(strip_tags($_POST['emailUsuario']));
    $panel = trim(strip_tags($_POST['funcUsuario']));
    switch ($_POST['funcUsuario']){
        case "admin" : $funcao = "ADMINISTRADOR"; break;
        case "vende" : $funcao = "VENDEDOR"; break;
        case "tecno" : $funcao = "TÉCNICO"; break;
    }
    $user = trim(strip_tags($_POST['userUsuario']));
    $senha = md5(trim(strip_tags($_POST['senhaUsuario'])));
    $rua = $_POST['ruaCliente'];
    $num = $_POST['numeroCliente'];
    $bairro = $_POST['bairroCliente'];
    $cidade  = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];
}

if (isset($_POST['adicionar'])){
    pegaDados();
    $endereco = new Endereco();
    $endereco->setId($idEnd);
    $endereco->setRua($rua);
    $endereco->setNum($num);
    $endereco->setBairro($bairro);
    $endereco->setCidade($cidade);
    $endereco->setUf($uf);
    $endereco->setCep($cep);
    $idEnd = $endereco->salvar($pdo);

    $pfisica = new Pessoa();
    $pfisica->setFnome($nome);
    $pfisica->setLnome($snome);
    $pfisica->setCpfCnpj($cpf);
    $pfisica->setIe($rg);
    $pfisica->setTelefone($tel);
    $pfisica->setEmail($email);
    $pfisica->setTipo("U");
    $pfisica->setIdEnd($idEnd[0]);
    $idPF = $pfisica->salvar($pdo);

    $usuario->setFuncao($funcao);
    $usuario->setPanel($panel);
    $usuario->setUsuario($user);
    $usuario->setSenha($senha);
    $usuario->setIdPF($idPF[0]);
    $usuario->salvar($pdo);
    header("Location:emitente");
}
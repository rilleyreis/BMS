<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:12
 */
require '../../php/model/Usuario.php';
require '../../php/model/Pessoa.php';
require '../../php/model/Endereco.php';

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
}
elseif (isset($_POST['editar'])){
    echo "<script>alert('OI');</script>";
    pegaDados();
    $idPF = $_POST['idPF'];
    $id = $_POST['idUser'];
    $idEnd = $_POST['idEnd'];

    $endereco = new Endereco();
    $endereco->setId($idEnd);
    $endereco->setRua($rua);
    $endereco->setNum($num);
    $endereco->setBairro($bairro);
    $endereco->setCidade($cidade);
    $endereco->setUf($uf);
    $endereco->setCep($cep);
    $endereco->editar($pdo);

    $pfisica = new Pessoa();
    $pfisica->setId($idPF);
    $pfisica->setFnome($nome);
    $pfisica->setLnome($snome);
    $pfisica->setCpfCnpj($cpf);
    $pfisica->setIe($rg);
    $pfisica->setTelefone($tel);
    $pfisica->setEmail($email);
    $pfisica->editar($pdo);

    $usuario->setId($id);
    $usuario->setFuncao($funcao);
    $usuario->setPanel($panel);
    $usuario->setUsuario($user);
    $usuario->setSenha($senha);
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
        $idPF = $row['PESSOA_idPESSOA'];
    }
    $pfisica = new Pessoa();
    $pfisica->setId($idPF);
    $dadosPF = $pfisica->buscaDados($pdo);
    foreach ($dadosPF as $item) {
        $nome = $item['nomePESSOA'];
        $snome = $item['snomePESSOA'];
        $cpf = $item['cpfcnpjPESSOA'];
        $rg = $item['rgiePESSOA'];
        $tel = $item['telPESSOA'];
        $email = $item['emailPESSOA'];
        $ativo = $item['ativoPESSOA'];
        $idEnd = $item['ENDERECO_idENDERECO'];
    }
    $endereco = new Endereco();
    $endereco->setId($idEnd);
    $dadosEnd = $endereco->buscar($pdo);
    foreach ($dadosEnd as $item) {
        $cep = $item['cepENDERECO'];
        $rua = $item['ruaENDERECO'];
        $bairro = $item['bairroENDERECO'];
        $num = $item['numENDERECO'];
        $cidade = $item['cidadeENDERECO'];
        $uf = $item['ufENDERECO'];
    }
}
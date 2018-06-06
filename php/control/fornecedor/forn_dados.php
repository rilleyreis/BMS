<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 22/01/2018
 * Time: 15:32
 */

$cnpj_forn = "";
$raz_forn = "";
$fant_forn = "";
$ie_forn = "";
$rua_forn = "";
$num_forn = "";
$bairro_forn = "";
$cid_forn = "";
$est_forn = "";
$cep_forn = "";
$tel_forn = "";
$email_forn = "";

function pegaDados(){
    global $cnpj_forn, $raz_forn, $fant_forn, $ie_forn, $rua_forn, $num_forn, $bairro_forn, $cid_forn, $est_forn, $cep_forn, $tel_forn, $email_forn;
    $cnpj_forn = $_POST['cnpj_forn'];
    $raz_forn = $_POST['raz_forn'];
    $fant_forn = $_POST['fant_forn'];
    $ie_forn = $_POST['ie_forn'];
    $rua_forn = $_POST['rua_forn'];
    $num_forn = $_POST['num_forn'];
    $bairro_forn = $_POST['bairro_forn'];
    $cid_forn = $_POST['cid_forn'];
    $est_forn = $_POST['est_forn'];
    $cep_forn = $_POST['cep_forn'];
    $tel_forn = $_POST['tel_forn'];
    $email_forn = $_POST['email_forn'];
}


require '../../php/model/Pessoa.php';
require '../../php/model/Endereco.php';

$fornece = new Pessoa();
$endereco = new Endereco();
$id = "";
$idEnd = "";
$edt = "style='display:none'";
$add = "";
$rdo = "";

if(isset($_POST['adicionar'])){
    pegaDados();
    $endereco->setRua($rua_forn);
    $endereco->setNum($num_forn);
    $endereco->setBairro($bairro_forn);
    $endereco->setCidade($cid_forn);
    $endereco->setUf($est_forn);
    $endereco->setCep($cep_forn);
    $idEnd = $endereco->salvar($pdo);
    $fornece->setCpfCnpj($cnpj_forn);
    $fornece->setLnome($raz_forn);
    $fornece->setFnome($fant_forn);
    $fornece->setIe($ie_forn);
    $fornece->setTelefone($tel_forn);
    $fornece->setEmail($email_forn);
    $fornece->setIdEnd($idEnd[0]);
    $fornece->setTipo("F");
    $idPJ = $fornece->salvar($pdo);
    header("Location:../fornecedor");

}elseif (isset($_POST['editar'])){
    pegaDados();
    $endereco->setId($_POST['idEnd']);
    $endereco->setRua($rua_forn);
    $endereco->setNum($num_forn);
    $endereco->setBairro($bairro_forn);
    $endereco->setCidade($cid_forn);
    $endereco->setUf($est_forn);
    $endereco->setCep($cep_forn);
    $endereco->editar($pdo);
    $fornece->setId($_POST['id']);
    $fornece->setCpfCnpj($cnpj_forn);
    $fornece->setLnome($raz_forn);
    $fornece->setFnome($fant_forn);
    $fornece->setIe($ie_forn);
    $fornece->setTelefone($tel_forn);
    $fornece->setEmail($email_forn);
    $fornece->editar($pdo);
    echo "<script>alert('Fornecedor editado com sucesso');</script>";
    header("Location:../fornecedor");
}

if(isset($_GET['edt'])){
    $id = base64_decode($_GET['edt']);
    $fornece->setId($id);
    $dados = $fornece->buscaDados($pdo);
    foreach ($dados as $dado) {
        $id = $dado['id'];
        $cnpj_forn = $dado['cpf_cnpj'];
        $raz_forn = $dado['snome'];
        $fant_forn = $dado['nome'];
        $ie_forn = $dado['rgie'];
        $tel_forn = $dado['tel'];
        $email_forn = $dado['email'];
        $idEnd = $dado['idEnd'];
        $rua_forn = $dado['rua'];
        $num_forn = $dado['num'];
        $bairro_forn = $dado['bairro'];
        $cid_forn = $dado['cidade'];
        $est_forn = $dado['uf'];
        $cep_forn = $dado['cep'];

    }
    $add = "style='display:none'";
    $edt = "";
    $rdo = "readonly='readonly'";
}
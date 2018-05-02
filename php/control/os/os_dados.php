<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 27/04/2018
 * Time: 04:44
 */

$protocolo = "";
$vendedor = "";
$cliente = "";
$telefone = "";
$tecnico = "";
$responsavel = "";
$objrecebido = "";
$itemdeixado = "";
$defeitos = "";
$status = "";

function pegaDados(){
    global $protocolo, $vendedor, $cliente, $telefone, $tecnico, $responsavel, $objrecebido, $itemdeixado, $defeitos, $status;
    $protocolo = $_POST['protocolo'];
    $vendedor = $_POST['vendedor'];
    $cliente = explode("|", $_POST['cliente']);
    $cliente = $cliente[0];
    $telefone = trim(strip_tags($_POST['telCliente']));
    $tecnico = explode("|", $_POST['tecnico']);
    $tecnico = $tecnico[0];
    $responsavel = trim(strip_tags($_POST['responsavel']));
    $objrecebido = trim(strip_tags($_POST['objeto']));
    $itemdeixado = trim(strip_tags($_POST['itens']));
    $defeitos = trim(strip_tags($_POST['defeitos']));
    $status = $_POST['status'];
}

require '../../php/model/OS.php';
require '../../php/model/DSO.php';

$os = new OS();
$num = "1234567890";
$num = substr(str_shuffle($num), 0, 3);
$protocolo = date("Y").date("His").str_pad($num, 3, "0", STR_PAD_RIGHT);
$vendedor = $_SESSION['nomeUser']." ".$_SESSION['snomeUser'];
$add = "";
$edt = "style='display:none'";

if (isset($_POST['adicionar'])){

}
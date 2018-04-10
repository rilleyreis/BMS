<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 04/04/2018
 * Time: 21:45
 */

require "../php/model/Caixa.php";
date_default_timezone_set("America/Sao_Paulo");

$caixa = new Caixa();
$caixa->setData(date("Y-m-d"));
$dadosCaixa = $caixa->dadosCaixa($pdo);
$troco = "";
foreach ($dadosCaixa as $item) {
    $troco = str_replace(".", ",", $item['trocoCAIXA']);
}
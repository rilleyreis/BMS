<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 27/04/2018
 * Time: 17:25
 */

require '../../../util/config.php';
require '../../../php/model/Pessoa.php';

$cliente = new Pessoa();

$dados = $cliente->buscaAll($pdo, "C");
echo json_encode($dados);
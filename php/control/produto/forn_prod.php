<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/04/2018
 * Time: 02:42
 */

require '../../../util/config.php';
require '../../../php/model/Pessoa.php';

$fornece = new Pessoa();

$dados = $fornece->buscaAll($pdo, "F");

echo json_encode($dados);
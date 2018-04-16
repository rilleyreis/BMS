<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/04/2018
 * Time: 02:42
 */

require '../../../util/config.php';
require '../../../php/model/Fornecedor.php';

$fornece = new Fornecedor();

$dados = $fornece->buscaAll($pdo);
echo json_encode($dados);
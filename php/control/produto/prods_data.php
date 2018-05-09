<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/04/2018
 * Time: 02:42
 */

require '../../../util/config.php';
require '../../../php/model/Produto.php';

$produto = new Produto();

$dados = $produto->buscaAll($pdo);

echo json_encode($dados);
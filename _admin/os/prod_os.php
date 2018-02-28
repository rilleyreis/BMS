<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 15/01/2018
 * Time: 16:26
 */

require '../../database/config.php';
require '../../_class/Produtos.php';

$produto = new Produtos();

$dados = $produto->buscaDadosALL($pdo);
echo json_encode($dados);
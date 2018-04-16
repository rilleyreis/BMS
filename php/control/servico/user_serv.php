<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 16/04/2018
 * Time: 14:21
 */

require '../../../util/config.php';
require '../../../php/model/Usuario.php';

$usuario = new Usuario();

$dados = $usuario->buscaAll($pdo);
echo json_encode($dados);
<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/01/2018
 * Time: 21:19
 */

require '../../database/config.php';
require '../../_class/Usuario.php';

$usuario = new Usuario();

$dados = $usuario->buscaDadosALL($pdo);
echo json_encode($dados);
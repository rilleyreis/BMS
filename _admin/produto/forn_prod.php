<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 23/01/2018
 * Time: 18:00
 */

require '../../database/config.php';
require '../../_class/Empresa.php';

$fornece = new Empresa();


$dados = $fornece->buscaDadosALL($pdo);
echo json_encode($dados);
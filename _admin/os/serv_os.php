<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 19/01/2018
 * Time: 19:54
 */

require '../../database/config.php';
require '../../_class/Servicos.php';

$servicos = new Servicos();

$dados = $servicos->buscaDadosALL($pdo);
echo json_encode($dados);
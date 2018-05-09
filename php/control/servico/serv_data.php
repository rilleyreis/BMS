<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 07/05/2018
 * Time: 21:03
 */

require '../../../util/config.php';
require '../../../php/model/Servicos.php';

$servico = new Servicos();

$dados = $servico->buscaAll($pdo);

echo json_encode($dados);
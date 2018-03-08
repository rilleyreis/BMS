<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 26/01/2018
 * Time: 02:36
 */

$session = new Session();

if(!$session->verificaTable($pdo)){
    header('Location: /bms');
}else{
    $session->buscaDados($pdo);
    if($session->getPanel() != "admin"){

        header('Location: /bms');
    }
}
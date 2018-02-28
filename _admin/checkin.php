<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 26/01/2018
 * Time: 02:36
 */
ob_start();
session_start();

if(!isset($_SESSION['id_user'])){
    header('Location: /bms');
}else{
    if($_SESSION['panel'] != "admin"){
        session_destroy();
        header('Location: /bms');
    }
}
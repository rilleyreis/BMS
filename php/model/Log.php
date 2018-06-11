<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 11/06/2018
 * Time: 12:26
 */

class Log{

    public function criarLOG($pdo, $msg){
        $data = date('Y-m-d');
        $hora = date('H:i:s');
        $user = $_SESSION['idUser'];
        $sql = "INSERT INTO `LOG` (`acaoLOG`, `dataLOG`, `horaLOG`, `USERS_idUSER`) VALUES (:acao, :dat, :hora, :use)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":acao"=>$msg, ":dat"=>$data, ":hora"=>$hora, ":use"=>$user));
    }

    public function buscaQtd($pdo, $filtro){
        $sql = "SELECT * FROM `LOG_DATA` $filtro";
        $query = $pdo->query($sql);
        return $query->rowCount();
    }

    public function buscaLtda($pdo, $limit, $filtro){
        $sql = "SELECT * FROM `LOG_DATA` $filtro ORDER BY `data`, `hora` ASC $limit";
        $query = $pdo->query($sql);
        if($query->rowCount() > 0)
            return $query;
        else
            return 0;
    }
}
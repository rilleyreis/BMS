<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 07/05/2018
 * Time: 21:14
 */

class Serv_OS{
    private $id;
    private $idOS;
    private $idServ;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdOS(){
        return $this->idOS;
    }

    public function setIdOS($idOS){
        $this->idOS = $idOS;
    }

    public function getIdServ(){
        return $this->idServ;
    }

    public function setIdServ($idServ){
        $this->idServ = $idServ;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT * FROM `OS_SERV_DATA` WHERE `idOS` = $this->idOS";
        $query = $pdo->query($sql);
        return $query->rowCount();
    }

    public function buscaServs($pdo){
        $sql = "SELECT * FROM `OS_SERV_DATA` WHERE `idOS` = $this->idOS";
        $query = $pdo->query($sql);
        return $query;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `OS_SERV` (`SERVICO_idSERVICO`, `ORDEMSERVICO_idORDEMSERVICO`) VALUES (:serv, :os)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":serv"=>$this->idServ, ":os"=>$this->idOS));
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function excluir($pdo){
        $sql = "DELETE FROM `OS_SERV` WHERE `idOS_SERV` = $this->id";
        $pdo->query($sql);
    }
}
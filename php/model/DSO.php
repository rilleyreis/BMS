<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 02/05/2018
 * Time: 10:38
 */

class DSO{
    private $id;
    private $data;
    private $hora;
    private $status;
    private $idOs;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getIdOs(){
        return $this->idOs;
    }

    public function setIdOs($idOs){
        $this->idOs = $idOs;
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM `DATA_STATUS_OS` WHERE `ORDEMSERVICO_idORDEMSERVICO` = $this->idOs";
        $query = $pdo->query($sql);
        return $query;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `DATA_STATUS_OS` (`dataDSO`, `horaDSO`, `statusDSO`, `ORDEMSERVICO_idORDEMSERVICO`) VALUES (:dat, :hora, :status, :os)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":dat"=>$this->data, ":hora"=>$this->hora, ":status"=>$this->status, ":os"=>$this->idOs));
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
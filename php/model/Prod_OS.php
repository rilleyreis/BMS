<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 07/05/2018
 * Time: 20:15
 */

class Prod_OS{
    private $id;
    private $qtd;
    private $idOS;
    private $idProd;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getQtd(){
        return $this->qtd;
    }

    public function setQtd($qtd){
        $this->qtd = $qtd;
    }

    public function getIdOS(){
        return $this->idOS;
    }

    public function setIdOS($idOS){
        $this->idOS = $idOS;
    }

    public function getIdProd(){
        return $this->idProd;
    }

    public function setIdProd($idProd){
        $this->idProd = $idProd;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT * FROM `OS_PROD_DATA` WHERE `idOS` = $this->idOS";
        $query = $pdo->query($sql);
        return $query->rowCount();
    }

    public function buscaProds($pdo){
        $sql = "SELECT * FROM `OS_PROD_DATA` WHERE `idOS` = $this->idOS";
        $query = $pdo->query($sql);
        return $query;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `OS_PROD` (`qtdOS_PROD`, `ORDEMSERVICO_idORDEMSERVICO`, `PRODUTO_idPRODUTO`) VALUES (:qtd, :os, :prod)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":qtd"=>$this->qtd, ":os"=>$this->idOS, ":prod"=>$this->idProd));
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function excluir($pdo){
        $sql = "DELETE FROM `OS_PROD` WHERE `idOS_PROD` = $this->id";
        $pdo->query($sql);
    }

    public function cancelar($pdo){
        $sql = "DELETE FROM `OS_PROD` WHERE `ORDEMSERVICO_idORDEMSERVICO` = $this->idOS";
        $pdo->query($sql);
    }
}
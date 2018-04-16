<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 10/04/2018
 * Time: 02:07
 */

class Fornecedor{
    private $id;
    private $ativo;
    private $idEnd;
    private $idPJ;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    public function getIdEnd(){
        return $this->idEnd;
    }

    public function setIdEnd($idEnd){
        $this->idEnd = $idEnd;
    }

    public function getIdPJ(){
        return $this->idPJ;
    }

    public function setIdPJ($idPJ){
        $this->idPJ = $idPJ;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM `FORNECEDOR`";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim){
        $sql = "SELECT * FROM `FORN_DATA` ORDER BY nomefant ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        if($query->rowCount() > 0)
            return $query;
        else
            return 0;
    }

    public function buscaAll($pdo){
        $sql = "SELECT * FROM `FORN_DATA` WHERE `ativo` = 1";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function buscarDados($pdo){
        $sql = "SELECT * FROM `FORN_DATA` WHERE `id` = '$this->id'";
        $query = $pdo->query($sql);
        if($query->rowCount() > 0)
            return $query;
        else
            return false;
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM `FORNECEDOR` WHERE `idFORNECEDOR` = '$this->id'";
        $query = $pdo->query($sql);
        if($query->rowCount() > 0)
            return $query;
        else
            return false;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `FORNECEDOR` (`ENDERECO_idENDERECO`, `PJURIDICA_idPJURIDICA`, `ativoFORNECEDOR`) VALUES (:idEnd, :idPJ, 1);";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":idEnd"=>$this->idEnd, ":idPJ"=>$this->idPJ));
            echo "<script>alert('Fornecedor cadastrado com sucesso');</script>";
            header("Location:../fornecedor");
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editar($pdo){
        $sql = "UPDATE `FORNECEDOR` SET ``";
    }

    public function ativar_desativar($pdo, $ativo){
        $sql = "UPDATE `FORNECEDOR` SET `ativoFORNECEDOR` = $ativo WHERE `idFORNECEDOR` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':id'=>$this->id));
        header("Location:../fornecedor");
    }
}
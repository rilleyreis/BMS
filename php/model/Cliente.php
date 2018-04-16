<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 11/04/2018
 * Time: 10:06
 */

class Cliente{
    private $id;
    private $ativo;
    private $idEnd;
    private $idPF;
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

    public function getIdPF(){
        return $this->idPF;
    }

    public function setIdPF($idPF){
        $this->idPF = $idPF;
    }

    public function getIdPJ(){
        return $this->idPJ;
    }

    public function setIdPJ($idPJ){
        $this->idPJ = $idPJ;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM `CLIENTE`";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaDado($pdo){
        $sql = "SELECT * FROM `CLIENTE` WHERE `idCLIENTE` = $this->id";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadoPF($pdo){
        $sql = "SELECT * FROM `CLI_PF_DATA` WHERE `id` = $this->id";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadoPJ($pdo){
        $sql = "SELECT * FROM `CLI_PJ_DATA` WHERE `id` = $this->id";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaLtda($pdo, $inicio, $fim){
        $sql = "SELECT * FROM `CLI_UNION_DATA` LIMIT $inicio, $fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `CLIENTE` (`ativoCLIENTE`, `ENDERECO_idENDERECO`, `PFISICA_idPFISICA`, `PJURIDICA_idPJURIDICA`)";
        $sql .= "VALUES (1, :end, :pf, :pj)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":end"=>$this->idEnd, ":pf"=>$this->idPF, ":pj"=>$this->idPJ));
            echo "<script>alert('Cliente cadastrado com sucesso.');</script>";
            header('Location:../cliente');
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
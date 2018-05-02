<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 18/04/2018
 * Time: 01:53
 */

class Pessoa{
    private $id;
    private $cpf_cnpj;
    private $fnome;
    private $lnome;
    private $ie;
    private $telefone;
    private $email;
    private $tipo;
    private $ativo;
    private $idEnd;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCpfCnpj(){
        return $this->cpf_cnpj;
    }

    public function setCpfCnpj($cpf_cnpj){
        $this->cpf_cnpj = $cpf_cnpj;
    }

    public function getFnome(){
        return $this->fnome;
    }

    public function setFnome($fnome){
        $this->fnome = $fnome;
    }

    public function getLnome(){
        return $this->lnome;
    }

    public function setLnome($lnome){
        $this->lnome = $lnome;
    }

    public function getIe(){
        return $this->ie;
    }

    public function setIe($ie){
        $this->ie = $ie;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
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

    public function buscaDados($pdo){
        $sql = "SELECT * FROM `PESSOA` WHERE `idPESSOA` = '$this->id'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaQtd($pdo, $tipo){
        $sql = "SELECT * FROM `PESSOA` WHERE `tipoPESSOA` = '$tipo'";
        $query = $pdo->query($sql);
        return $query->rowCount();
    }

    public function buscaLtda($pdo, $inicio, $fim, $tipo){
        $sql = "SELECT * FROM `PESSOA_DATA` WHERE `tipo` = '$tipo' ORDER BY `nome` ASC LIMIT $inicio, $fim";
        $query = $pdo->query($sql);
        if($query->rowCount() > 0)
            return $query;
        else
            return 0;
    }

    public function buscaAll($pdo, $tipo){
        $sql = "SELECT * FROM `PESSOA` WHERE `ativoPESSOA` =  1 AND `tipoPESSOA` = '$tipo'";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `PESSOA` (`cpfcnpjPESSOA`, `nomePESSOA`, `snomePESSOA`, `rgiePESSOA`, `telPESSOA`, `emailPESSOA`, `tipoPESSOA`, `ativoPESSOA`, `ENDERECO_idENDERECO`)";
        $sql .= "VALUES (:cpf_cnpj, :nome, :snome, :rgie, :tel, :email, :tipo, 1, :idEnd)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":cpf_cnpj"=>$this->cpf_cnpj, ":nome"=>$this->fnome, ":snome"=>$this->lnome, ":rgie"=>$this->ie, ":tel"=>$this->telefone, ":email"=>$this->email, ":tipo"=>$this->tipo, ":idEnd"=>$this->idEnd));
            $sql = "SELECT LAST_INSERT_ID()";
            $query = $pdo->query($sql);
            return $query->fetch();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editar($pdo){
        $sql = "UPDATE `PESSOA` SET `cpfcnpjPESSOA` = :cpf_cnpj, `nomePESSOA` = :fnome, `snomePESSOA` = :lnome, `rgiePESSOA` = :rgie, `telPESSOA` = :tel, `emailPESSOA` = :email WHERE `idPESSOA` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(":cpf_cnpj"=>$this->cpf_cnpj, ":fnome"=>$this->fnome, ":lnome"=>$this->lnome, ":rgie"=>$this->ie, ":tel"=>$this->telefone, ":email"=>$this->email, ":id"=>$this->id));
    }

    public function ativar_desativar($pdo, $ativo){
        $sql = "UPDATE `PESSOA` SET `ativoPESSOA` = $ativo WHERE `idPESSOA` = $this->id";
        $update = $pdo->prepare($sql);
        $update->execute();
    }
}
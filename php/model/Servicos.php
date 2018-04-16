<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 16/04/2018
 * Time: 13:39
 */

class Servicos{
    private $id;
    private $nome;
    private $descricao;
    private $valor;
    private $ativo;
    private $user;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM `SERVICO`";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim){
        $sql = "SELECT * FROM `SERV_DATA` ORDER BY nomeSERVICO ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaUnit($pdo){
        $sql = "SELECT * FROM `SERV_DATA` WHERE `idSERVICO` = $this->id";
        $query = $pdo->query($sql);
        return $query;
    }

    public function ativar_desativar($pdo, $ativo){
        $sql = "UPDATE `SERVICO` SET `ativoSERVICO` = $ativo WHERE `idSERVICO` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':id'=>$this->id));
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `SERVICO` (`nomeSERVICO`, `descricaoSERVICO`, `valorSERVICO`, `ativoSERVICO`, `USERS_idUSER`)";
        $sql .= "VALUES (:nome, :descricao, :valor, 1, :user)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":nome"=>$this->nome, ":descricao"=>$this->descricao, ":valor"=>$this->valor, ":user"=>$this->user));
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editar($pdo){
        $sql = "UPDATE `SERVICO` SET `nomeSERVICO` = :nome, `descricaoSERVICO` = :descricao, `valorSERVICO` = :valor, `USERS_idUSER` = :users WHERE `idSERVICO` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(":nome"=>$this->nome, ":descricao"=>$this->descricao, ":valor"=>$this->valor, ":users"=>$this->user,':id'=>$this->id));
    }
}
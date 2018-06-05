<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/06/2018
 * Time: 08:06
 */

class Movimentacao{
    private $id;
    private $valor;
    private $frmpag;
    private $parcela;
    private $tipo;
    private $descricao;
    private $cliente = null;
    private $user;
    private $caixa;
    private $os = null;
    private $venda = null;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getFrmpag(){
        return $this->frmpag;
    }

    public function setFrmpag($frmpag)
    {
        $this->frmpag = $frmpag;
    }

    public function getParcela(){
        return $this->parcela;
    }

    public function setParcela($parcela){
        $this->parcela = $parcela;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public function getCaixa(){
        return $this->caixa;
    }

    public function setCaixa($caixa){
        $this->caixa = $caixa;
    }

    public function getOs(){
        return $this->os;
    }

    public function setOs($os){
        $this->os = $os;
    }

    public function getVenda(){
        return $this->venda;
    }

    public function setVenda($venda){
        $this->venda = $venda;
    }

    public function movimentar($pdo){
        $sql = "INSERT INTO `MOVIMENTACAO`(`valorMOVIMENTACAO`, `frmpagMOVIMENTACAO`, `parcelasMOVIMENTACAO`, `tipoMOVIMENTACAO`, `descricaoMOVIMENTACAO`, `idCLIENTE`, `USERS_idUSER`, `CAIXA_idCAIXA`, `ORDEMSERVICO_idORDEMSERVICO`, `VENDA_idVENDA`)";
        $sql .= "VALUES (:valor, :frmpag, :parcelas, :tipo, :desc, :cli, :user, :caixa, :os, :venda)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":valor"=>$this->valor, ":frmpag"=>$this->frmpag, ":parcelas"=>$this->parcela, ":tipo"=>$this->tipo, ":desc"=>$this->descricao, ":cli"=>$this->cliente, ":user"=>$this->user, ":caixa"=>$this->caixa, ":os"=>$this->os, ":venda"=>$this->venda));
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
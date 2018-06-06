<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/06/2018
 * Time: 20:01
 */

class Venda{
    private $id;
    private $qtd;
    private $valor;
    private $data;

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

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function vender($pdo){
        $sql = "INSERT INTO `VENDA` (`valorVENDA`, `qtdproVenda`, `dataVenda`) VALUES (:valor, :qtd, :dat)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":valor"=>$this->valor, ":qtd"=>$this->qtd, ":dat"=>$this->data));
        $sql = "SELECT LAST_INSERT_ID()";
        $query = $pdo->query($sql);
        return $query->fetch();
    }
}
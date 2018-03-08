<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 08/03/2018
 * Time: 11:26
 */

class Endereco{
    private $id;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getRua(){
        return $this->rua;
    }

    public function setRua($rua){
        $this->rua = $rua;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getCep(){
        return $this->cep;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO ENDERECO (ruaENDERECO, numENDERECO, bairroENDERECO, cityENDERECO, ufENDERECO, cepENDERECO) VALUES (:rua, :num, :bairro, :city, :uf, :cep)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":rua"=>$this->rua, ":num"=>$this->numero, ":bairro"=>$this->bairro, "city"=>$this->cidade, ":uf"=>$this->estado, ":cep"=>$this->cep));
        $sql = "SELECT LAST_INSERT_ID()";
        $query = $pdo->query($sql);
        return $query->fetch();
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM ENDERECO WHERE idENDERECO = '$this->id'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function update($pdo){
        $sql = "UPDATE ENDERECO SET ruaENDERECO = :rua, numENDERECO = :num, bairroENDERECO = :bairro, cityENDERECO = :city, ufENDERECO = :uf, cepENDERECO = :cep WHERE idENDERECO = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(":rua"=>$this->rua, ":num"=>$this->numero, ":bairro"=>$this->bairro, "city"=>$this->cidade, ":uf"=>$this->estado, ":cep"=>$this->cep, ":id"=>$this->id));
    }
}
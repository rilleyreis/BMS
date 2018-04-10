<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/04/2018
 * Time: 20:32
 */

class Endereco{
    private $id;
    private $rua;
    private $num;
    private $bairro;
    private $cidade;
    private $uf;
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

    public function getNum(){
        return $this->num;
    }

    public function setNum($num){
        $this->num = $num;
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

    public function getUf(){
        return $this->uf;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function getCep(){
        return $this->cep;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function buscar($pdo){
        $sql = "SELECT * FROM `ENDERECO` WHERE `idENERECO` = $this->id";
        $query = $pdo->query($sql);
        return($query);
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `ENDERECO` (`ruaENDERECO`, `numENDERECO`, `bairroENDERECO`, `cidadeENDERECO`, `ufENDERECO`, `cepENDERECO`)";
        $sql .= "VALUES (:rua, :num, :bairro, :cid, :uf, :cep)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":rua"=>$this->rua, ":num"=>$this->num, ":bairro"=>$this->bairro, ":cid"=>$this->cidade, ":uf"=>$this->uf, ":cep"=>$this->cep));
            $sql = "SELECT LAST_INSERT_ID()";
            $query = $pdo->query($sql);
            return $query->fetch();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
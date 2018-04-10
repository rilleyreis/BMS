<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/04/2018
 * Time: 20:32
 */

class PJuridica{
    private $id;
    private $cnpj;
    private $rsocial;
    private $fant;
    private $ie;
    private $tel;
    private $email;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    public function getRsocial(){
        return $this->rsocial;
    }

    public function setRsocial($rsocial)
    {
        $this->rsocial = $rsocial;
    }

    public function getFant(){
        return $this->fant;
    }

    public function setFant($fant){
        $this->fant = $fant;
    }

    public function getIe(){
        return $this->ie;
    }

    public function setIe($ie){
        $this->ie = $ie;
    }

    public function getTel(){
        return $this->tel;
    }

    public function setTel($tel){
        $this->tel = $tel;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function buscar($pdo){
        $sql = "SELECT * FROM `PJURIDICA` WHERE `idPJURIDICA` = $this->id";
        $query = $pdo->query($sql);
        return($query);
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `PJURIDICA` (`cnpjPJURIDICA`, `razsocPJURIDICA`, `nomefantPJURIDICA`, `iePJURIDICA`, `telPJURIDICA`, `emailPJURIDICA`)";
        $sql .= "VALUES (:cnpj, :rsocial, :fant, :ie, :tel, :email)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":cnpj"=>$this->cnpj, ":rsocial"=>$this->rsocial, ":fant"=>$this->fant, ":ie"=>$this->ie, ":tel"=>$this->tel, ":email"=>$this->email));
            $sql = "SELECT LAST_INSERT_ID()";
            $query = $pdo->query($sql);
            return $query->fetch();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
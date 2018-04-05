<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 03/04/2018
 * Time: 18:33
 */

class PFisica{
    private $id;
    private $fnome;
    private $lnome;
    private $cpf;
    private $telefone;
    private $celular;
    private $email;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
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

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM `PFISICA` WHERE `idPFISICA` = '$this->id'";
        $query = $pdo->query($sql);
        return $query;
    }
}
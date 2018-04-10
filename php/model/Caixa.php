<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 04/04/2018
 * Time: 20:00
 */

class Caixa{
    private $data;
    private $hora;
    private $troco;
    private $vlrFinal;
    private $user;

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getTroco(){
        return $this->troco;
    }

    public function setTroco($troco){
        $this->troco = $troco;
    }

    public function getVlrFinal(){
        return $this->vlrFinal;
    }

    public function setVlrFinal($vlrFinal){
        $this->vlrFinal = $vlrFinal;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public function caixaAberto($pdo){
        $sql = "SELECT * FROM `CAIXA` WHERE `dataCAIXA` LIKE '$this->data'";
        $query = $pdo->query($sql);
        return $query->rowCount() > 0 ? true : false;
    }

    public function abrirCaixa($pdo){
        $sql = "INSERT INTO `CAIXA`(`dataCAIXA`, `horaCAIXA`, `trocoCAIXA`, `USERS_idUSER`) VALUES (:dataC, :horaC, :trocoC, :userC)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":dataC"=>$this->data, ":horaC"=>$this->hora, ":trocoC"=>$this->troco, ":userC"=>$this->user));
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function dadosCaixa($pdo){
        $sql = "SELECT * FROM `CAIXA` WHERE `dataCAIXA` LIKE '$this->data'";
        $query = $pdo->query($sql);
        return $query;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/03/2018
 * Time: 21:19
 */

class Caixa{
    private $idCAIXA;
    private $dataCAIXA;
    private $horaCAIXA;
    private $trocoCAIXA;
    private $vlrfinalCAIXA;
    private $idUSER;

    public function getIdCAIXA(){
        return $this->idCAIXA;
    }

    public function setIdCAIXA($idCAIXA){
        $this->idCAIXA = $idCAIXA;
    }

    public function getDataCAIXA(){
        return $this->dataCAIXA;
    }

    public function setDataCAIXA($dataCAIXA){
        $this->dataCAIXA = $dataCAIXA;
    }

    public function getHoraCAIXA(){
        return $this->horaCAIXA;
    }

    public function setHoraCAIXA($horaCAIXA){
        $this->horaCAIXA = $horaCAIXA;
    }

    public function getTrocoCAIXA(){
        return $this->trocoCAIXA;
    }

    public function setTrocoCAIXA($trocoCAIXA){
        $this->trocoCAIXA = $trocoCAIXA;
    }

    public function getVlrfinalCAIXA(){
        return $this->vlrfinalCAIXA;
    }

    public function setVlrfinalCAIXA($vlrfinalCAIXA){
        $this->vlrfinalCAIXA = $vlrfinalCAIXA;
    }

    public function getIdUSER(){
        return $this->idUSER;
    }

    public function setIdUSER($idUSER){
        $this->idUSER = $idUSER;
    }

    public function abrirCaixa($pdo, $data){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM caixa WHERE dataCAIXA = '".$data."'";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        if($queryFet['QTD'] == 0)
            return true;
        else
            return false;
    }

    public function realizarAbertura($pdo){
        $sql = "INSERT INTO caixa(dataCAIXA, horaCAIXA, trocoCAIXA, idUSERS) VALUES (:dataC, :hora, :troco, :iduser)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":dataC"=>$this->dataCAIXA, ":hora"=>$this->horaCAIXA, ":troco"=>$this->trocoCAIXA, ":iduser"=>$this->idUSER));
    }
}
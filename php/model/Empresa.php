<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/04/2018
 * Time: 20:31
 */

class Empresa{
    private $id;
    private $idPJ;
    private $idEnd;
    private $logo;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdPJ(){
        return $this->idPJ;
    }

    public function setIdPJ($idPJ){
        $this->idPJ = $idPJ;
    }

    public function getIdEnd(){
        return $this->idEnd;
    }

    public function setIdEnd($idEnd){
        $this->idEnd = $idEnd;
    }

    public function getLogo(){
        return $this->logo;
    }

    public function setLogo($logo){
        $this->logo = $logo;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM `EMPRESA` WHERE ativoEMPRESA = 1";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `EMPRESA`(`logoEMPRESA`, `ativoEMPRESA`, `PJURIDICA_idPJURIDICA`, `ENDERECO_idENDERECO`)";
        $sql .= "VALUES (:logo, 1, :pj, :end)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":logo"=>$this->logo, ":pj"=>$this->idPJ, ":end"=>$this->idEnd));
            echo "<script>alert('Empresa cadastrado com sucesso');</script>";
        }catch (PDOException $e){
            echo $e;
        }
    }
}
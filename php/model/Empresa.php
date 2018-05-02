<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/04/2018
 * Time: 20:31
 */

class Empresa{
    private $id;
    private $idPE;
    private $logo;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdPE(){
        return $this->idPE;
    }

    public function setIdPE($idPE){
        $this->idPE = $idPE;
    }

    public function getLogo(){
        return $this->logo;
    }

    public function setLogo($logo){
        $this->logo = $logo;
    }


    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM `EMPRESA`";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM `EMPRESA`";
        $query = $pdo->query($sql);
        return $query;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `EMPRESA`(`logoEMPRESA`, `PESSOA_idPESSOA`)";
        $sql .= "VALUES (:logo, :pe)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":logo"=>$this->logo, ":pe"=>$this->idPE));
            echo "<script>alert('Empresa cadastrado com sucesso');</script>";
        }catch (PDOException $e){
            echo $e;
        }
    }

    public function editarLogo($pdo){
        $sql = "UPDATE `EMPRESA` SET `logoEMPRESA` = :logo WHERE `idEMPRESA` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(":logo"=>$this->logo, ":id"=>$this->id));
    }
}
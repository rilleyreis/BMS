<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 21/01/2018
 * Time: 14:29
 */

class Empresa{
    private $idEMPRESA;
    private $cnpjEMPRESA;
    private $razsocEMPRESA;
    private $fantEMPRESA;
    private $ieEMPRESA;
    private $telEMPRESA;
    private $emailEMPRESA;
    private $logoEMPRESA;
    private $idENDERECO;
    private $tipoEMPRESA;
    private $ativoEMPRESA;

    public function getIdEMPRESA(){
        return $this->idEMPRESA;
    }

    public function setIdEMPRESA($idEMPRESA){
        $this->idEMPRESA = $idEMPRESA;
    }

    public function getCnpjEmp(){
        return $this->cnpjEMPRESA;
    }

    public function setCnpjEmp($cnpjEMPRESA){
        $this->cnpjEMPRESA = $cnpjEMPRESA;
    }

    public function getrazsocEmp(){
        return $this->razsocEMPRESA;
    }

    public function setrazsocEmp($razsocEMPRESA){
        $this->razsocEMPRESA = $razsocEMPRESA;
    }

    public function getFantEmp(){
        return $this->fantEMPRESA;
    }

    public function setFantEmp($fantEMPRESA){
        $this->fantEMPRESA = $fantEMPRESA;
    }

    public function getIeEmp(){
        return $this->ieEMPRESA;
    }

    public function setIeEmp($ieEMPRESA){
        $this->ieEMPRESA = $ieEMPRESA;
    }

    public function getTelEmp(){
        return $this->telEMPRESA;
    }

    public function setTelEmp($telEMPRESA){
        $this->telEMPRESA = $telEMPRESA;
    }

    public function getEmailEmp(){
        return $this->emailEMPRESA;
    }

    public function setEmailEmp($emailEMPRESA){
        $this->emailEMPRESA = $emailEMPRESA;
    }

    public function getLogoEmp(){
        return $this->logoEMPRESA;
    }

    public function setLogoEmp($logoEMPRESA){
        $this->logoEMPRESA = $logoEMPRESA;
    }

    public function getIdENDERECO(){
        return $this->idENDERECO;
    }

    public function setIdENDERECO($idENDERECO){
        $this->idENDERECO = $idENDERECO;
    }

    public function getTipoEMPRESA(){
        return $this->tipoEMPRESA;
    }

    public function setTipoEMPRESA($tipoEMPRESA){
        $this->tipoEMPRESA = $tipoEMPRESA;
    }

    public function getAtivoEMPRESA(){
        return $this->ativoEMPRESA;
    }

    public function setAtivoEMPRESA($ativoEMPRESA){
        $this->ativoEMPRESA = $ativoEMPRESA;
    }


    public function buscaQtd($pdo, $tipo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM empresa WHERE ativoEMPRESA = 1 AND tipoEMPRESA = $tipo";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim, $nome, $tipo){
        $sql = "SELECT * FROM empresa WHERE ativoEMPRESA = 1 AND nomfantEMPRESA LIKE '%$nome%' AND tipoEMPRESA = '$tipo' ORDER BY nomfantEMPRESA ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM empresa WHERE ativoEMPRESA = 1 AND tipoEMPRESA = 1";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosUnit($pdo){
        $sql = "SELECT * FROM empresa WHERE cnpjEMPRESA LIKE '$this->cnpjEMPRESA'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosALL($pdo){
        $sql = "SELECT cnpjEMPRESA, fantEMPRESA FROM empresa WHERE ativoEMPRESA = 1";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function buscaDadosALL2($pdo){
        $sql = "SELECT cnpjEMPRESA, nomfantEMPRESA FROM empresa WHERE idEMPRESA = '$this->idEMPRESA'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `empresa` (cnpjEMPRESA, razsocEMPRESA, nomfantEMPRESA, ieEMPRESA, telEMPRESA, emailEMPRESA, logoEMPRESA, ativoEMPRESA, tipoEMPRESA, ENDERECO_idENDERECO) VALUES (:cnpjEMPRESA, :razsocEMPRESA, :fantEMPRESA, :ieEMPRESA, :telEMPRESA, :emailEMPRESA, :logoEMPRESA, :ativo, :tipo, :endereco)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":cnpjEMPRESA"=>$this->cnpjEMPRESA, ":razsocEMPRESA"=>$this->razsocEMPRESA, ":fantEMPRESA"=>$this->fantEMPRESA, ":ieEMPRESA"=>$this->ieEMPRESA, ":telEMPRESA"=>$this->telEMPRESA, ":emailEMPRESA"=>$this->emailEMPRESA, ":logoEMPRESA"=>$this->logoEMPRESA, ':ativo'=>$this->ativoEMPRESA, ':tipo'=>$this->tipoEMPRESA, ':endereco'=>$this->idENDERECO));
        echo "<script>alert('Cadastro realizado com sucesso');</script>";
    }

    public function editar($pdo){
        $sql = "UPDATE empresa SET razsocEMPRESA = :razsocEMPRESA, nomfantEMPRESA = :fantEMPRESA, ieEMPRESA = :ieEMPRESA, telEMPRESA = :telEMPRESA, emailEMPRESA = :emailEMPRESA WHERE cnpjEMPRESA = :cnpjEMPRESA";
        $update = $pdo->prepare($sql);
        $update->execute(array(":cnpjEMPRESA"=>$this->cnpjEMPRESA, ":razsocEMPRESA"=>$this->razsocEMPRESA, ":fantEMPRESA"=>$this->fantEMPRESA, ":ieEMPRESA"=>$this->ieEMPRESA, ":telEMPRESA"=>$this->telEMPRESA, ":emailEMPRESA"=>$this->emailEMPRESA));
    }

    public function excluir($pdo){
        $sql = "UPDATE empresa SET ativoEMPRESA = 0 WHERE cnpjEMPRESA = :cnpjEMPRESA";
        $delete = $pdo->prepare($sql);
        $delete->execute(array(":cnpjEMPRESA"=>$this->cnpjEMPRESA));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 21/01/2018
 * Time: 14:29
 */

class Empresa{
    private $cnpj_emp;
    private $raz_emp;
    private $fant_emp;
    private $ie_emp;
    private $rua_emp;
    private $num_emp;
    private $bairro_emp;
    private $cid_emp;
    private $est_emp;
    private $tel_emp;
    private $email_emp;
    private $logo_emp;
    private $status;

    public function getCnpjEmp(){
        return $this->cnpj_emp;
    }

    public function setCnpjEmp($cnpj_emp){
        $this->cnpj_emp = $cnpj_emp;
    }

    public function getRazEmp(){
        return $this->raz_emp;
    }

    public function setRazEmp($raz_emp){
        $this->raz_emp = $raz_emp;
    }

    public function getFantEmp(){
        return $this->fant_emp;
    }

    public function setFantEmp($fant_emp){
        $this->fant_emp = $fant_emp;
    }

    public function getIeEmp(){
        return $this->ie_emp;
    }

    public function setIeEmp($ie_emp){
        $this->ie_emp = $ie_emp;
    }

    public function getRuaEmp(){
        return $this->rua_emp;
    }

    public function setRuaEmp($rua_emp){
        $this->rua_emp = $rua_emp;
    }

    public function getNumEmp(){
        return $this->num_emp;
    }

    public function setNumEmp($num_emp){
        $this->num_emp = $num_emp;
    }

    public function getBairroEmp(){
        return $this->bairro_emp;
    }

    public function setBairroEmp($bairro_emp){
        $this->bairro_emp = $bairro_emp;
    }

    public function getCidEmp(){
        return $this->cid_emp;
    }

    public function setCidEmp($cid_emp){
        $this->cid_emp = $cid_emp;
    }

    public function getEstEmp(){
        return $this->est_emp;
    }

    public function setEstEmp($est_emp){
        $this->est_emp = $est_emp;
    }

    public function getTelEmp(){
        return $this->tel_emp;
    }

    public function setTelEmp($tel_emp){
        $this->tel_emp = $tel_emp;
    }

    public function getEmailEmp(){
        return $this->email_emp;
    }

    public function setEmailEmp($email_emp){
        $this->email_emp = $email_emp;
    }

    public function getLogoEmp(){
        return $this->logo_emp;
    }

    public function setLogoEmp($logo_emp){
        $this->logo_emp = $logo_emp;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }


    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM empresa WHERE status_emp = 2";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaQtdF($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM empresa WHERE status_emp = 1";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim, $nome){
        $sql = "SELECT * FROM empresa WHERE status_emp = 1 AND fant_emp LIKE '%$nome%' ORDER BY fant_emp ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM empresa WHERE status_emp = 2";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosUnit($pdo){
        $sql = "SELECT * FROM empresa WHERE cnpj_emp LIKE '$this->cnpj_emp'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosALL($pdo){
        $sql = "SELECT cnppj_emp, fant_emp FROM empresa WHERE status_emp = 1";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `empresa` (cnpj_emp, raz_emp, fant_emp, ie_emp, rua_emp, num_emp, bairro_emp, cid_emp, est_emp, tel_emp, email_emp, logo_emp, status_emp) VALUES (:cnpj_emp, :raz_emp, :fant_emp, :ie_emp, :rua_emp, :num_emp, :bairro_emp, :cid_emp, :est_emp, :tel_emp, :email_emp, :logo_emp, :status)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":cnpj_emp"=>$this->cnpj_emp, ":raz_emp"=>$this->raz_emp, ":fant_emp"=>$this->fant_emp, ":ie_emp"=>$this->ie_emp, ":rua_emp"=>$this->rua_emp, ":num_emp"=>$this->num_emp, ":bairro_emp"=>$this->bairro_emp, ":cid_emp"=>$this->cid_emp, ":est_emp"=>$this->est_emp, ":tel_emp"=>$this->tel_emp, ":email_emp"=>$this->email_emp, ":logo_emp"=>$this->logo_emp, ':status'=>$this->status));
        echo "<script>alert('Cadastro realizado com sucesso');</script>";
    }

    public function editar($pdo){
        $sql = "UPDATE empresa SET raz_emp = :raz_emp, fant_emp = :fant_emp, ie_emp = :ie_emp, rua_emp = :rua_emp, num_emp = :num_emp, bairro_emp = :bairro_emp, cid_emp = :cid_emp, est_emp = :est_emp, tel_emp = :tel_emp, email_emp = :email_emp WHERE cnpj_emp = :cnpj_emp";
        $update = $pdo->prepare($sql);
        $update->execute(array(":cnpj_emp"=>$this->cnpj_emp, ":raz_emp"=>$this->raz_emp, ":fant_emp"=>$this->fant_emp, ":ie_emp"=>$this->ie_emp, ":rua_emp"=>$this->rua_emp, ":num_emp"=>$this->num_emp, ":bairro_emp"=>$this->bairro_emp, ":cid_emp"=>$this->cid_emp, ":est_emp"=>$this->est_emp, ":tel_emp"=>$this->tel_emp, ":email_emp"=>$this->email_emp));
    }

    public function excluir($pdo){
        $sql = "UPDATE empresa SET status_emp = 0 WHERE cnpj_emp = :cnpj_emp";
        $delete = $pdo->prepare($sql);
        $delete->execute(array(":cnpj_emp"=>$this->cnpj_emp));
    }
}
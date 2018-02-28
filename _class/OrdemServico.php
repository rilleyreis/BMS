<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/01/2018
 * Time: 23:58
 */

class OrdemServico{
    private $id;
    private $cli_os;
    private $tec_os;
    private $status_os;
    private $dtIni_os;
    private $dtFim_os;
    private $garant_os;
    private $desc_os;
    private $deft_os;
    private $obs_os;
    private $prot_os;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCliOs(){
        return $this->cli_os;
    }

    public function setCliOs($cli_os){
        $this->cli_os = $cli_os;
    }

    public function getTecOs(){
        return $this->tec_os;
    }

    public function setTecOs($tec_os){
        $this->tec_os = $tec_os;
    }

    public function getStatusOs(){
        return $this->status_os;
    }

    public function setStatusOs($status_os){
        $this->status_os = $status_os;
    }

    public function getDtIniOs(){
        return $this->dtIni_os;
    }

    public function setDtIniOs($dtIni_os){
        $this->dtIni_os = $dtIni_os;
    }

    public function getDtFimOs(){
        return $this->dtFim_os;
    }

    public function setDtFimOs($dtFim_os){
        $this->dtFim_os = $dtFim_os;
    }

    public function getGarantOs(){
        return $this->garant_os;
    }

    public function setGarantOs($garant_os){
        $this->garant_os = $garant_os;
    }

    public function getDescOs(){
        return $this->desc_os;
    }

    public function setDescOs($desc_os){
        $this->desc_os = $desc_os;
    }

    public function getDeftOs(){
        return $this->deft_os;
    }

    public function setDeftOs($deft_os){
        $this->deft_os = $deft_os;
    }

    public function getObsOs(){
        return $this->obs_os;
    }

    public function setObsOs($obs_os){
        $this->obs_os = $obs_os;
    }

    public function getProtOs(){
        return $this->prot_os;
    }

    public function setProtOs($prot_os){
        $this->prot_os = $prot_os;
    }

    public function salvar($pdo){
        date_default_timezone_set("America/Sao_Paulo");
        $sql = "INSERT INTO ordem_servico (cli_os, tec_os, status_os, dtIni_os, dtFim_os, garant_os, desc_os, deft_os, obs_os, prot_os, data_os)";
        $sql .= "VALUES (:cli_os, :tec_os, :status_os, :dtIni_os, :dtFim_os, :garant_os, :desc_os, :deft_os, :obs_os, :prot_os, :data_os)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":cli_os"=>$this->cli_os, ":tec_os"=>$this->tec_os, ":status_os"=>$this->status_os, ":dtIni_os"=>$this->dtIni_os, ":dtFim_os"=>$this->dtFim_os, ":garant_os"=>$this->garant_os, ":desc_os"=>$this->desc_os, ":deft_os"=>$this->deft_os, ":obs_os"=>$this->obs_os, ":prot_os"=>0, ":data_os"=>date("Y-m-d")));
        $sql = "SELECT LAST_INSERT_ID() as 'ID'";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        $protocolo = date("YHms");
        $protocolo .= str_pad($queryFet['ID'], 4, "0", STR_PAD_LEFT);
        $sql = "UPDATE ordem_servico SET prot_os = :prot WHERE id_os = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(":prot" => $protocolo, ":id" => $queryFet['ID']));
        return $queryFet['ID'];
    }

    public function editar($pdo){
        $sql = "UPDATE ordem_servico SET cli_os=:cli_os, tec_os=:tec_os, status_os=:status_os, dtIni_os=:dtIni_os, dtFim_os=:dtFim_os, garant_os=:garant_os, desc_os=:desc_os, deft_os=:deft_os, obs_os=:obs_os WHERE id_os = :id_os";
        $update = $pdo->prepare($sql);
        $update->execute(array(":cli_os"=>$this->cli_os, ":tec_os"=>$this->tec_os, ":status_os"=>$this->status_os, ":dtIni_os"=>$this->dtIni_os, ":dtFim_os"=>$this->dtFim_os, ":garant_os"=>$this->garant_os, ":desc_os"=>$this->desc_os, ":deft_os"=>$this->deft_os, ":obs_os"=>$this->obs_os, ":id_os"=>$this->id));
    }

    public function buscarDados($pdo){
        $sql = "SELECT * FROM view_os WHERE id_os = $this->id";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM view_os";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim){
        $sql = "SELECT * FROM view_os ORDER BY id_os ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }
}
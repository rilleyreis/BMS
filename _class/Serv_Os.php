<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 20/01/2018
 * Time: 15:31
 */

class Serv_Os{
    private $id_oss;
    private $os_oss;
    private $serv_oss;

    public function getIdOss(){
        return $this->id_oss;
    }

    public function setIdOss($id_oss){
        $this->id_oss = $id_oss;
    }

    public function getOsOss(){
        return $this->os_oss;
    }

    public function setOsOss($os_oss){
        $this->os_oss = $os_oss;
    }

    public function getServOss(){
        return $this->serv_oss;
    }

    public function setServOss($serv_oss){
        $this->serv_oss = $serv_oss;
    }

    public function adicionarServico($pdo){
        $sql = "INSERT INTO os_servico(os_oss, serv_oss) VALUES(:os, :serv)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":os" => $this->os_oss, ":serv" => $this->serv_oss));
    }

    public function buscaQTD($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM view_serv_os WHERE id_os = $this->os_oss";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscarServs($pdo){
        $sql = "SELECT * FROM view_serv_os  WHERE id_os = $this->os_oss";
        $query = $pdo->query($sql);
        return $query;
    }

    public function removerServico($pdo)
    {
        $sql = "DELETE FROM os_servico WHERE id_oss = :id";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":id"=>$this->id_oss));
    }
}
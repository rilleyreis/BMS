<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 19/01/2018
 * Time: 11:43
 */

class Prod_Os
{
    private $id_osp;
    private $os_osp;
    private $prod_osp;
    private $qtd_osp;

    public function getIdOsp(){
        return $this->id_osp;
    }

    public function setIdOsp($id_osp){
        $this->id_osp = $id_osp;
    }

    public function getOsOsp()
    {
        return $this->os_osp;
    }

    public function setOsOsp($os_osp)
    {
        $this->os_osp = $os_osp;
    }

    public function getProdOsp()
    {
        return $this->prod_osp;
    }

    public function setProdOsp($prod_osp)
    {
        $this->prod_osp = $prod_osp;
    }

    public function getQtdOsp()
    {
        return $this->qtd_osp;
    }

    public function setQtdOsp($qtd_osp)
    {
        $this->qtd_osp = $qtd_osp;
    }

    public function adicionarProduto($pdo)
    {
        $sql = "INSERT INTO os_produto(os_osp, prod_osp, qtd_osp) VALUES(:os, :prod, :qtd)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":os" => $this->os_osp, ":prod" => $this->prod_osp, ":qtd" => $this->qtd_osp));
        $sql = "UPDATE produtos SET qtd_prod = qtd_prod - :qtd WHERE id_prod = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(":qtd" => $this->qtd_osp, ":id" => $this->prod_osp));
    }

    public function buscaQTD($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM view_prod_os WHERE id_os = $this->os_osp";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscarProds($pdo){
        $sql = "SELECT * FROM view_prod_os WHERE id_os = $this->os_osp";
        $query = $pdo->query($sql);
        return $query;
    }

    public function removerProduto($pdo)
    {
        $sql = "UPDATE produtos SET qtd_prod = qtd_prod + :qtd WHERE id_prod = :id_prod";
        $update = $pdo->prepare($sql);
        $update->execute(array(":qtd" => $this->qtd_osp, ":id_prod" => $this->prod_osp));
        $sql = "DELETE FROM os_produto WHERE id_osp = :id";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":id"=>$this->id_osp));
    }
}
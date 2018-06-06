<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 05/06/2018
 * Time: 15:09
 */

class Comanda{
    private $id;
    private $qtd;
    private $valor;
    private $prod;
    private $venda;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getQtd(){
        return $this->qtd;
    }

    public function setQtd($qtd){
        $this->qtd = $qtd;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getProd(){
        return $this->prod;
    }

    public function setProd($prod){
        $this->prod = $prod;
    }

    public function getVenda(){
        return $this->venda;
    }

    public function setVenda($venda){
        $this->venda = $venda;
    }

    public function deleteFake($pdo){
        $sql = "DROP TABLE IF EXISTS `fakeCOMANDA`";
        $drop = $pdo->prepare($sql);
        $drop->execute();
        $sql = "DROP VIEW IF EXISTS `fakeCOMANDA_VIEW`";
        $drop = $pdo->prepare($sql);
        $drop->execute();
    }

    public function createFake($pdo){
        $sql = "CREATE TABLE `fakeCOMANDA` LIKE `COMANDA`";
        $create = $pdo->prepare($sql);
        $create->execute();
        $sql = "CREATE VIEW `fakeCOMANDA_VIEW` AS
                    SELECT FC.`qtditemCOMANDA` AS 'qtd', P.`nomePRODUTO` AS 'produto', P.`vendaPRODUTO` AS 'unit', FC.`valorCOMANDA` AS 'total'
                    FROM `fakeCOMANDA` FC INNER JOIN `PRODUTO` P ON FC.`PRODUTO_idPRODUTO` = P.`idPRODUTO`";
        $create = $pdo->prepare($sql);
        $create->execute();
    }

    public function addFake($pdo){
        $sql = "INSERT INTO `fakeCOMANDA` (`qtditemCOMANDA`, `valorCOMANDA`, `PRODUTO_idPRODUTO`, `VENDA_idVENDA`)";
        $sql .= "VALUES (:qtd, :valor, :prod, 1)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":qtd"=>$this->qtd, ":valor"=>$this->valor, ":prod"=>$this->prod));
    }

    public function addComanda($pdo){
        $sql = "INSERT INTO `COMANDA` (`qtditemCOMANDA`, `valorCOMANDA`, `PRODUTO_idPRODUTO`, `VENDA_idVENDA`)";
        $sql .= "VALUES (:qtd, :valor, :prod, :venda)";
        $insert = $pdo->prepare($sql);
        $insert->execute(array(":qtd"=>$this->qtd, ":valor"=>$this->valor, ":prod"=>$this->prod, ":venda"=>$this->venda));
    }

    public function carregaCarrinho($pdo){
        $sql = "SELECT * FROM `fakeCOMANDA_VIEW`";
        return $pdo->query($sql);
    }

    public function buscaFake($pdo){
        $sql = "SELECT * FROM `fakeCOMANDA`";
        return $pdo->query($sql);
    }

    public function somaTotal($pdo, $col){
        $sql = "SELECT SUM($col) AS 'total' FROM `fakeCOMANDA_VIEW`";
        return $pdo->query($sql);
    }

    public function buscaVenda($pdo){
        $sql = "SELECT * FROM `COMANDA_DATA` WHERE `idVENDA` = $this->venda";
        return $pdo->query($sql);
    }
}
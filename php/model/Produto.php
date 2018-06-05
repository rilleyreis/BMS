<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/04/2018
 * Time: 03:05
 */

class Produto{
    private $id;
    private $nome;
    private $descricao;
    private $fornecedor;
    private $compra;
    private $venda;
    private $estoque;
    private $minimo;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getFornecedor(){
        return $this->fornecedor;
    }

    public function setFornecedor($fornecedor){
        $this->fornecedor = $fornecedor;
    }

    public function getCompra(){
        return $this->compra;
    }

    public function setCompra($compra){
        $this->compra = $compra;
    }

    public function getVenda(){
        return $this->venda;
    }

    public function setVenda($venda){
        $this->venda = $venda;
    }

    public function getEstoque(){
        return $this->estoque;
    }

    public function setEstoque($estoque){
        $this->estoque = $estoque;
    }

    public function getMinimo(){
        return $this->minimo;
    }

    public function setMinimo($minimo){
        $this->minimo = $minimo;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM `PRODUTO`";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim, $filtro){
        $sql = "SELECT * FROM PRODUTO ORDER BY $filtro, nomePRODUTO ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscarDados($pdo){
        $sql = "SELECT * FROM `PRODUTO` WHERE `idPRODUTO` = $this->id";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaAll($pdo){
        $sql = "SELECT * FROM `PRODUTO` WHERE `ativoPRODUTO` =  1";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `PRODUTO` (`nomePRODUTO`, `descricaoPRODUTO`, `compraPRODUTO`, `vendaPRODUTO`, `estoquePRODUTO`, `minimoPRODUTO`, `ativoPRODUTO`, `idFORNECEDOR`)";
        $sql .= " VALUES (:nome, :descricao, :compra, :venda, :estoque, :minimo, 1, :fornecedor)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":nome"=>$this->nome,":descricao"=>$this->descricao,":compra"=>$this->compra,":venda"=>$this->venda,":estoque"=>$this->estoque,":minimo"=>$this->minimo, ":fornecedor"=>$this->fornecedor));
            echo "<script>alert('Produto cadastrado com sucesso!')</script>";
            header("Location:../produto");
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editar($pdo){
        $sql = "UPDATE `PRODUTO` SET `nomePRODUTO` = :nome, `descricaoPRODUTO` = :descricao, `compraPRODUTO` = :compra, `vendaPRODUTO` = :venda, `estoquePRODUTO` = :estoque, `minimoPRODUTO` = :minimo, `FORNECEDOR_idFORNECEDOR` = :fornecedor WHERE `idPRODUTO` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(":nome"=>$this->nome, ":descricao"=>$this->descricao, ":compra"=>$this->compra, ":venda"=>$this->venda, ":estoque"=>$this->estoque, ":minimo"=>$this->minimo, ":fornecedor"=>$this->fornecedor, ":id"=>$this->id));
        echo "<script>alert('Produto editado com sucesso')</script>";
        header("Location:../produto");
    }

    public function addEstoque($pdo){
        $sql = "UPDATE `PRODUTO` SET `estoquePRODUTO` = `estoquePRODUTO` + :qtd WHERE `idPRODUTO` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':qtd'=>$this->estoque,':id'=>$this->id));
    }

    public function removeEstoque($pdo){
        $sql = "UPDATE `PRODUTO` SET `estoquePRODUTO` = `estoquePRODUTO` - :qtd WHERE `idPRODUTO` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':qtd'=>$this->estoque,':id'=>$this->id));
    }

    public function ativar_desativar($pdo, $ativo){
        $sql = "UPDATE `PRODUTO` SET `ativoPRODUTO` = $ativo WHERE `idPRODUTO` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':id'=>$this->id));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 03/01/2018
 * Time: 02:08
 */

class PRODUTO{
    private $id;
    private $nome;
    private $descricao;
    private $fornece;
    private $compra;
    private $venda;
    private $estoque;
    private $minimo;
    private $status;

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

    public function getFornece(){
        return $this->fornece;
    }

    public function setFornece($fornece){
        $this->fornece = $fornece;
    }


    public function setDescricao($descricao){
        $this->descricao = $descricao;
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

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }


    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM PRODUTO WHERE ativoPRODUTO = 1";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim, $filtro){
        $sql = "SELECT * FROM PRODUTO WHERE ativoPRODUTO = 1 ORDER BY $filtro, nomePRODUTO ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosALL($pdo){
        $sql = "SELECT * FROM PRODUTO WHERE ativoPRODUTO = 1";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function addEstoque($pdo){
         $sql = "UPDATE PRODUTO SET estkPRODUTO = estkPRODUTO + :qtd WHERE idPRODUTO = :id";
         $update = $pdo->prepare($sql);
         $update->execute(array(':qtd'=>$this->estoque, ':id'=>$this->id));
    }

    public function excluir($pdo){
        $sql = "UPDATE PRODUTO SET ativoPRODUTO = 0 WHERE idPRODUTO = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':id'=>$this->id));
    }

    public function buscaUnit($pdo){
        $sql = "SELECT * FROM PRODUTO WHERE idPRODUTO = '$this->id'";
        $query = $pdo->query($sql);
        return $query;
    }
    public function salvar($pdo){
        $sql = "INSERT INTO PRODUTO(nomePRODUTO, descPRODUTO, EMPRESA_idEMPRESA, custoPRODUTO, vendaPRODUTO, estkPRODUTO, estkminPRODUTO, ativoPRODUTO) VALUES(:nome, :descricao, :fornece, :compra, :venda, :qtd, :minimo, 1)";
        $insert = $pdo->prepare($sql);
        try{
            $insert->execute(array(':nome'=>$this->nome,':descricao'=>$this->descricao, ':fornece'=>$this->fornece, ':compra'=>$this->compra, ':venda'=>$this->venda, ':qtd'=>$this->estoque, ':minimo'=>$this->minimo));
            echo "<script>alert('Produto cadastrado com sucesso');</script>";
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editar($pdo){
        $sql = "UPDATE PRODUTO SET nomePRODUTO = :nome, descPRODUTO = :descricao, EMPRESA_idEMPRESA = :fornece, custoPRODUTO = :compra, vendaPRODUTO = :venda, estkPRODUTO = :qtd, estkminPRODUTO = :minimo WHERE idPRODUTO = '$this->id'";
        $update = $pdo->prepare($sql);
        $update->execute(array(":nome"=>$this->nome, ":descricao"=>$this->descricao, ":fornece"=>$this->fornece, ":compra"=>$this->compra, ":venda"=>$this->venda, ":qtd"=>$this->estoque, ":minimo"=>$this->minimo));

        echo "<script>alert('Cadastro editado com sucesso');</script>";
        header("Location:../produto");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 09/01/2018
 * Time: 23:06
 */

class Servicos{
    private $id;
    private $nome;
    private $descricao;
    private $valor;

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

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM servicos WHERE status_serv = 1";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim){
        $sql = "SELECT * FROM servicos WHERE status_serv = 1 ORDER BY nome_serv ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosALL($pdo){
        $sql = "SELECT * FROM servicos WHERE status_serv = 1";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function excluir($pdo){
        $sql = "UPDATE servicos SET status_serv = 0 WHERE id_serv = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':id'=>$this->id));
    }

    public function buscaUnit($pdo){
        $sql = "SELECT * FROM servicos WHERE id_serv = '$this->id'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO servicos(nome_serv, desc_serv, preco_serv, status_serv) VALUES(:nome, :descricao, :preco, 1)";
        $insert = $pdo->prepare($sql);
        try{
            $insert->execute(array(':nome'=>$this->nome,':descricao'=>$this->descricao, ':preco'=>$this->valor));
            echo "<script>alert('Serviço cadastrado com sucesso');</script>";
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editar($pdo){
        $sql = "UPDATE servicos SET nome_serv = :nome, desc_serv = :descricao, preco_serv = :preco WHERE id_serv = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':nome'=>$this->nome,':descricao'=>$this->descricao, ':preco'=>$this->valor, ':id'=>$this->id));

        echo "<script>alert('Cadastro editado com sucesso');</script>";
        header("Location:../service");
    }
}
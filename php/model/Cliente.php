<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 28/12/2017
 * Time: 00:23
 */

class Cliente{
    private $id;
    private $nome;
    private $snome;
    private $cpf;
    private $tel;
    private $cel;
    private $email;
    private $rua;
    private $num;
    private $bairro;

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

    public function getSnome(){
        return $this->snome;
    }

    public function setSnome($snome){
        $this->snome = $snome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getTel(){
        return $this->tel;
    }

    public function setTel($tel){
        $this->tel = $tel;
    }

    public function getCel(){
        return $this->cel;
    }

    public function setCel($cel){
        $this->cel = $cel;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getRua(){
        return $this->rua;
    }

    public function setRua($rua){
        $this->rua = $rua;
    }

    public function getNum(){
        return $this->num;
    }

    public function setNum($num){
        $this->num = $num;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM clients WHERE status_cli = 1";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaLtda($pdo, $inicio, $fim, $nome){
        $sql = "SELECT * FROM clients WHERE status_cli = 1 AND nome_cli LIKE '%$nome%' ORDER BY nome_cli ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM clients WHERE cpf_cli = '$this->cpf'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosALL($pdo){
        $sql = "SELECT * FROM clients WHERE status_cli = 1";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function excluir($pdo){
        $sql = "UPDATE clients SET status_cli=0 WHERE cpf_cli = :cpf";
        $update = $pdo->prepare($sql);
        $update->execute(array(':cpf'=>$this->cpf));
    }

    public function salvar($pdo){
        $sql = "INSERT INTO clients(nome_cli, snome_cli, cpf_cli, tel_cli, cel_cli, email_cli, rua_cli, num_cli, bairro_cli, status_cli) VALUES(:nome, :snome, :cpf, :tel, :cel, :email, :rua, :num, :bairro, 1)";
        $insert = $pdo->prepare($sql);
        try{
            $insert->execute(array(':nome'=>$this->nome, ':snome'=>$this->snome,':cpf'=>$this->cpf, ':tel'=>$this->tel, ':cel'=>$this->cel, ':email'=>$this->email, ':rua'=>$this->rua, ':num'=>$this->num, ':bairro'=>$this->bairro));
            echo "<script>alert('Cliente cadastrado com sucesso');</script>";
            header("Location:../cliente");
        }catch (PDOException $e){
            if($e->getCode() == 23000){
                echo "<script>alert('Já existe um cadastro com este CPF');</script>";
            }
        }
    }

    public function editar($pdo){
        $sql = "UPDATE clients SET nome_cli = :nome, snome_cli = :snome, tel_cli = :tel, cel_cli= :cel, email_cli = :email, rua_cli = :rua, num_cli = :num, bairro_cli = :bairro WHERE cpf_cli = :cpf";
        $update = $pdo->prepare($sql);
        $update->execute(array(':cpf'=>$this->cpf, ':nome'=>$this->nome, ':snome'=>$this->snome, ':tel'=>$this->tel, ':cel'=>$this->cel, ':email'=>$this->email, ':rua'=>$this->rua, ':num'=>$this->num, ':bairro'=>$this->bairro));

        echo "<script>alert('Cadastro editado com sucesso');</script>";
        header("Location:../cliente");
    }
}
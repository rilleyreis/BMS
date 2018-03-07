<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 27/12/2017
 * Time: 19:38
 */

class Usuario{
    private $id;
    private $usuario;
    private $nome;
    private $snome;
    private $senha;
    private $panel;
    private $funcao;
    private $tel;
    private $cel;
    private $cpf;
    private $email;
    private $status;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
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

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getPanel(){
        return $this->panel;
    }

    public function setPanel($panel){
        $this->panel = $panel;
    }

    public function getFuncao(){
        return $this->funcao;
    }

    public function setFuncao($funcao){
        $this->funcao = $funcao;
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

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }


    public function logar($pdo){
        $sql = "SELECT * FROM users WHERE usuario_user = '$this->usuario' AND senha_user = '$this->senha'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM users WHERE status_user = 1";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM users WHERE id_user = '$this->id'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosALL($pdo){
        $sql = "SELECT * FROM users WHERE status_user = 1 AND panel_user = 'tecno' ";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function buscaLtda($pdo, $inicio, $fim, $nome){
        $sql = "SELECT * FROM users WHERE status_user = 1 AND nome_user LIKE '%$nome%' ORDER BY nome_user ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function excluir($pdo){
        $sql = "UPDATE users SET status_user=0 WHERE id_user = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':id'=>$this->id));
    }

    public function editar($pdo){
        $sql = "UPDATE users SET nome_user = :nome, snome_user = :snome, cpf_user = :cpf, tel_user = :tel, cel_user= :cel, email_user = :email, panel_user = :panel, funcao_user = :func, status_user = :status, usuario_user = :usuario WHERE id_user = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':nome'=>$this->nome, ':snome'=>$this->snome, ':cpf'=>$this->cpf, ':tel'=>$this->tel, ':cel'=>$this->cel, ':email'=>$this->email, ':panel'=>$this->panel, ':func'=>$this->funcao, ':status'=>$this->status, ':usuario'=>$this->usuario, ':id'=>$this->id));

        echo "<script>alert('Cadastro editado com sucesso');</script>";
        header("Location:../users");
    }

    public function salvar($pdo){
        $sql = "INSERT INTO users(nome_user, snome_user, cpf_user, tel_user, cel_user, email_user, usuario_user, senha_user, panel_user, funcao_user, status_user) VALUES(:nome, :snome, :cpf, :tel, :cel, :email, :usuario, :senha, :panel, :func, :status)";
        $insert = $pdo->prepare($sql);
        try{
            $insert->execute(array(':nome'=>$this->nome, ':snome'=>$this->snome, ':cpf'=>$this->cpf, ':tel'=>$this->tel, ':cel'=>$this->cel, ':email'=>$this->email, ':panel'=>$this->panel, ':func'=>$this->funcao, ':status'=>$this->status, ':usuario'=>$this->usuario, ':senha'=>$this->senha));
            echo "<script>alert('Usuário cadastrado com sucesso');</script>";
            header("Location:../users");
        }catch (PDOException $e){
            if($e->getCode() == 23000){
                echo "<script>alert('Já existe um cadastro com este CPF');</script>";
            }
        }
    }
}
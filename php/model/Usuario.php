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
        $sql = "SELECT * FROM users WHERE usuarioUSER = '$this->usuario' AND senhaUSER = '$this->senha'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT COUNT(*) AS 'QTD' FROM users WHERE ativoUSER = 1";
        $query = $pdo->query($sql);
        $queryFet = $query->fetch();
        return $queryFet['QTD'];
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM users WHERE idUSER = '$this->id'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaDadosALL($pdo){
        $sql = "SELECT * FROM users WHERE ativoUSER = 1 AND panelUSER = 'tecno' ";
        $query = $pdo->query($sql);
        return $query->fetchAll();
    }

    public function buscaLtda($pdo, $inicio, $fim, $nome){
        $sql = "SELECT * FROM users WHERE ativoUSER = 1 AND pnomeUSER LIKE '%$nome%' ORDER BY pnomeUSER ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        return $query;
    }

    public function excluir($pdo){
        $sql = "UPDATE users SET ativoUSER = 0 WHERE idUSER = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':id'=>$this->id));
    }

    public function editar($pdo){
        $sql = "UPDATE users SET pnomeUSER = :nome, lnomeUSER = :snome, cpfUSER = :cpf, telUSER = :tel, celUSER= :cel, emailUSER = :email, panelUSER = :panel, funcaoUSER = :func, ativoUSER = :status, usuarioUSER = :usuario WHERE idUSER = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':nome'=>$this->nome, ':snome'=>$this->snome, ':cpf'=>$this->cpf, ':tel'=>$this->tel, ':cel'=>$this->cel, ':email'=>$this->email, ':panel'=>$this->panel, ':func'=>$this->funcao, ':status'=>$this->status, ':usuario'=>$this->usuario, ':id'=>$this->id));

        echo "<script>alert('Cadastro editado com sucesso');</script>";
        header("Location:../users");
    }

    public function salvar($pdo){
        $sql = "SELECT * FROM users WHERE cpfUSER = '$this->cpf' LIMIT 0,1";
        $query = $pdo->query($sql);
        $queryF = $query->rowCount();
        if($queryF > 0 ){
            echo "<script>alert('Já existe um cadastro com este CPF');</script>";
        }else {
            $sql = "INSERT INTO users(pnomeUSER, lnomeUSER, cpfUSER, telUSER, celUSER, emailUSER, usuarioUSER, senhaUSER, panelUSER, funcaoUSER, ativoUSER) VALUES(:nome, :snome, :cpf, :tel, :cel, :email, :usuario, :senha, :panel, :func, :status)";
            $insert = $pdo->prepare($sql);
            try {
                $insert->execute(array(':nome' => $this->nome, ':snome' => $this->snome, ':cpf' => $this->cpf, ':tel' => $this->tel, ':cel' => $this->cel, ':email' => $this->email, ':panel' => $this->panel, ':func' => $this->funcao, ':status' => $this->status, ':usuario' => $this->usuario, ':senha' => $this->senha));
                echo "<script>alert('Usuário cadastrado com sucesso');</script>";
                header("Location:../users");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
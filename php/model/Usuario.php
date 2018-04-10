<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 02/04/2018
 * Time: 20:24
 */

class Usuario{
    private $id;
    private $usuario;
    private $senha;
    private $panel;
    private $funcao;
    private $ativo;
    private $idPF;

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

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    public function getIdPF(){
        return $this->idPF;
    }

    public function setIdPF($idPF){
        $this->idPF = $idPF;
    }

    public function buscaUser($pdo){
        $sql = "SELECT * FROM `USERS` WHERE `usuarioUSER` LIKE '$this->usuario' AND `senhaUSER` LIKE '$this->senha'";
        $query = $pdo->query($sql);
        if($query->rowCount() > 0)
            return $query;
        else
            return false;
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM `USERS` WHERE `idUSER` = '$this->id'";
        $query = $pdo->query($sql);
        if($query->rowCount() > 0)
            return $query;
        else
            return false;
    }

    public function buscaQtd($pdo){
        $sql = "SELECT * FROM `USERS_DATA` WHERE ativo = 1";
        $query = $pdo->query($sql);
        return $query->rowCount();
    }

    public function buscaLtda($pdo, $inicio, $fim){
        $sql = "SELECT * FROM `USERS_DATA` WHERE ativo = 1 ORDER BY fnome ASC LIMIT $inicio,$fim";
        $query = $pdo->query($sql);
        if($query->rowCount() > 0)
            return $query;
        else
            return 0;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `USERS`(`funcaoUSER`, `panelUSER`, `usuarioUSER`, `senhaUSER`, `ativoUSER`, `PFISICA_idPFISICA`)";
        $sql .= "VALUES (:funcao, :panel, :user, :senha, :ativo, :idpf)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":funcao"=>$this->funcao, ":panel"=>$this->panel, ":user"=>$this->usuario, ":senha"=>$this->senha, ":ativo"=>$this->ativo, ":idpf"=>$this->idPF));
            echo "<script>alert('Usuário cadastrado com sucesso');</script>";
            header("Location:../users");
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editar($pdo){
        $sql = "UPDATE users SET `panelUSER` = :panel, `funcaoUSER` = :func, `ativoUSER` = :ativo, `usuarioUSER` = :usuario WHERE `idUSER` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':panel'=>$this->panel, ':func'=>$this->funcao, ':status'=>$this->status, ':usuario'=>$this->usuario, ':id'=>$this->id));

        echo "<script>alert('Cadastro editado com sucesso');</script>";
        header("Location:../users");
    }
    public function excluir($pdo){
        $sql = "UPDATE users SET `ativoUSER` = 0 WHERE `idUSER` = :id";
        $update = $pdo->prepare($sql);
        $update->execute(array(':id'=>$this->id));
        header("Location:../users");
    }
}
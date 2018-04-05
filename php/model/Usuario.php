<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 02/04/2018
 * Time: 20:24
 */

class Usuario{
    private $usuario;
    private $senha;
    private $panel;
    private $funcao;
    private $idPF;

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
}
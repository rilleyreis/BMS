<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 08/03/2018
 * Time: 03:32
 */

class Session{
    private $id;
    private $pnome;
    private $lnome;
    private $panel;
    private $funcao;
    private $usuario;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPnome(){
        return $this->pnome;
    }

    public function setPnome($pnome){
        $this->pnome = $pnome;
    }

    public function getLnome(){
        return $this->lnome;
    }

    public function setLnome($lnome){
        $this->lnome = $lnome;
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

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function iniciarSession($pdo){
        //Linha para usar durante desenvolvimento
        $sql = "DROP TABLE IF EXISTS TBL_SESSION;";
        $sql .= "CREATE TABLE TBL_SESSION LIKE USERS;
                INSERT INTO TBL_SESSION SELECT * FROM USERS WHERE idUSER = :id";
        $create = $pdo->prepare($sql);
        $create->execute(array(":id"=>$this->id));
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM TBL_SESSION";
        $query = $pdo->query($sql);
        foreach ($query as $item) {
            $this->id = $item['idUSER'];
            $this->pnome = $item['pnomeUSER'];
            $this->lnome = $item['lnomeUSER'];
            $this->panel = $item['panelUSER'];
            $this->funcao = $item['funcaoUSER'];
            $this->usuario = $item['usuarioUSER'];
        }
    }

    public function verificaTable($pdo){
        $sql = "SHOW TABLES LIKE 'TBL_SESSION'";
        $query = $pdo->query($sql);
        return $query->rowCount() > 0 ? true : false;
    }
}
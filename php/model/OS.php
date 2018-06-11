<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 01/05/2018
 * Time: 10:47
 */

class OS{
    private $id;
    private $protocolo;
    private $vendedor;
    private $telefone;
    private $responsavel;
    private $objeto;
    private $itens;
    private $defeitos;
    private $status;
    private $valor;
    private $laudo;
    private $solucao;
    private $tecnico;
    private $cliente;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getProtocolo(){
        return $this->protocolo;
    }

    public function setProtocolo($protocolo){
        $this->protocolo = $protocolo;
    }

    public function getVendedor(){
        return $this->vendedor;
    }

    public function setVendedor($vendedor){
        $this->vendedor = $vendedor;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getResponsavel(){
        return $this->responsavel;
    }

    public function setResponsavel($responsavel){
        $this->responsavel = $responsavel;
    }

    public function getObjeto(){
        return $this->objeto;
    }

    public function setObjeto($objeto){
        $this->objeto = $objeto;
    }

    public function getItens(){
        return $this->itens;
    }

    public function setItens($itens){
        $this->itens = $itens;
    }

    public function getDefeitos(){
        return $this->defeitos;
    }

    public function setDefeitos($defeitos){
        $this->defeitos = $defeitos;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getLaudo(){
        return $this->laudo;
    }

    public function setLaudo($laudo){
        $this->laudo = $laudo;
    }

    public function getSolucao(){
        return $this->solucao;
    }

    public function setSolucao($solucao){
        $this->solucao = $solucao;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getTecnico(){
        return $this->tecnico;
    }

    public function setTecnico($tecnico){
        $this->tecnico = $tecnico;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function buscaQtd($tecnico, $pdo){
        $sql = "SELECT * FROM `ORDEMSERVICO` $tecnico";
        $query = $pdo->query($sql);
        return $query->rowCount();
    }

    public function buscaLtda($pdo, $inicio, $fim, $tecnico){
        $sql = "SELECT * FROM `OS_DATA` $tecnico ORDER BY `id` ASC LIMIT $inicio, $fim";
        $query = $pdo->query($sql);
        echo $sql;
        if($query->rowCount() > 0)
            return $query;
        else
            return 0;
    }

    public function buscaDados($pdo){
        $sql = "SELECT * FROM `OS_DATA` WHERE `id` = $this->id";
        $query = $pdo->query($sql);
        return $query;
    }

    public function buscaQtdStatus($pdo){
        $sql = "SELECT COUNT(*) AS 'qtd' FROM `ORDEMSERVICO` WHERE `statusORDEMSERVICO` = $this->status";
        return $pdo->query($sql);
    }

    public function buscaSttDt($pdo, $dtIni, $dtFim, $filtro){
        $sql = "SELECT COUNT(*) AS 'qtd' FROM `ORDEMSERVICO` WHERE $filtro `dataORDEMSERVICO` BETWEEN '$dtIni' AND '$dtFim'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function salvar($pdo){
        $sql = "INSERT INTO `ORDEMSERVICO` (`protocoloORDEMSERVICO`, `vendedorORDEMSERVICO`, `telefoneORDEMSERVICO`, `responsavelORDEMSERVICO`, `objrecebidoORDEMSERVICO`, `itemdeixadoORDEMSERVICO`, `defeitosORDEMSERVICO`, `statusORDEMSERVICO`, `valorORDEMSERVICO`, `dataORDEMSERVICO`, `USERS_idUSER`, `idCLIENTE`)";
        $sql .= " VALUES (:prot, :vend, :tel, :resp, :obj, :item, :def, :status, :valor, :data, :tecnico, :cli)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":prot"=>$this->protocolo, ":vend"=>$this->vendedor, ":tel"=>$this->telefone, ":resp"=>$this->responsavel, ":obj"=>$this->objeto, ":item"=>$this->itens, ":def"=>$this->defeitos, ":status"=>$this->status, ":valor"=>$this->valor, ":data"=>date('Y-m-d'), ":tecnico"=>$this->tecnico, ":cli"=>$this->cliente));
            $sql = "SELECT LAST_INSERT_ID()";
            $query = $pdo->query($sql);
            return $query->fetch();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editar($pdo){
        $sql = "UPDATE `ORDEMSERVICO` SET `protocoloORDEMSERVICO` = :prot, `vendedorORDEMSERVICO` = :vend, `telefoneORDEMSERVICO` = :tel, `responsavelORDEMSERVICO` = :resp, `objrecebidoORDEMSERVICO` = :obj, `itemdeixadoORDEMSERVICO` = :item, `defeitosORDEMSERVICO` = :def, `statusORDEMSERVICO` = :status, `valorORDEMSERVICO` = :valor, `laudoORDEMSERVICO` = :laudo, `solucaoORDEMSERVICO` = :solucao, `USERS_idUSER` = :tecnico, `idCLIENTE` = :cli WHERE `idORDEMSERVICO` = :id";
        try{
            $update = $pdo->prepare($sql);
            $update->execute(array(":prot"=>$this->protocolo, ":vend"=>$this->vendedor, ":tel"=>$this->telefone, ":resp"=>$this->responsavel, ":obj"=>$this->objeto, ":item"=>$this->itens, ":def"=>$this->defeitos, ":status"=>$this->status, ":valor"=>$this->valor, ":laudo"=>$this->laudo, ":solucao"=>$this->solucao, ":tecnico"=>$this->tecnico, ":cli"=>$this->cliente, ":id"=>$this->id));
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function trocarStatus($pdo){
        $sql = "UPDATE `ORDEMSERVICO` SET `statusORDEMSERVICO`=$this->status WHERE `idORDEMSERVICO` = $this->id";
        try{
            $update = $pdo->prepare($sql);
            $update->execute();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
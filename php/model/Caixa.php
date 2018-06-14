<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 04/04/2018
 * Time: 20:00
 */

class Caixa{
    private $id;
    private $data;
    private $hora;
    private $dataF;
    private $horaF;
    private $troco;
    private $dinheiro;
    private $cartao;
    private $retirada;
    private $emcaixa;
    private $user;
    private $userF;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getDataF()
    {
        return $this->dataF;
    }

    /**
     * @param mixed $dataF
     */
    public function setDataF($dataF)
    {
        $this->dataF = $dataF;
    }

    /**
     * @return mixed
     */
    public function getHoraF()
    {
        return $this->horaF;
    }

    /**
     * @param mixed $horaF
     */
    public function setHoraF($horaF)
    {
        $this->horaF = $horaF;
    }

    /**
     * @return mixed
     */
    public function getTroco()
    {
        return $this->troco;
    }

    /**
     * @param mixed $troco
     */
    public function setTroco($troco)
    {
        $this->troco = $troco;
    }

    /**
     * @return mixed
     */
    public function getDinheiro()
    {
        return $this->dinheiro;
    }

    /**
     * @param mixed $dinheiro
     */
    public function setDinheiro($dinheiro)
    {
        $this->dinheiro = $dinheiro;
    }

    /**
     * @return mixed
     */
    public function getCartao()
    {
        return $this->cartao;
    }

    /**
     * @param mixed $cartao
     */
    public function setCartao($cartao)
    {
        $this->cartao = $cartao;
    }

    /**
     * @return mixed
     */
    public function getRetirada()
    {
        return $this->retirada;
    }

    /**
     * @param mixed $retirada
     */
    public function setRetirada($retirada)
    {
        $this->retirada = $retirada;
    }

    /**
     * @return mixed
     */
    public function getEmcaixa()
    {
        return $this->emcaixa;
    }

    /**
     * @param mixed $emcaixa
     */
    public function setEmcaixa($emcaixa)
    {
        $this->emcaixa = $emcaixa;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUserF()
    {
        return $this->userF;
    }

    /**
     * @param mixed $userF
     */
    public function setUserF($userF)
    {
        $this->userF = $userF;
    }

    public function caixaAberto($pdo){
        $sql = "SELECT * FROM `CAIXA` WHERE `ativoCAIXA` = 1";
        $query = $pdo->query($sql);
        return $query->rowCount() > 0 ? true : false;
    }

    public function abrirCaixa($pdo){
        $sql = "INSERT INTO `CAIXA`(`dataCAIXA`, `horaCAIXA`, `trocoCAIXA`, `USERS_idUSER`, `ativoCAIXA`) VALUES (:dataC, :horaC, :trocoC, :userC, 1)";
        try{
            $insert = $pdo->prepare($sql);
            $insert->execute(array(":dataC"=>$this->data, ":horaC"=>$this->hora, ":trocoC"=>$this->troco, ":userC"=>$this->user));
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function dadosCaixa($pdo){
        $sql = "SELECT * FROM `CAIXA` WHERE `dataCAIXA` LIKE '$this->data'";
        $query = $pdo->query($sql);
        return $query;
    }

    public function fecharCaixa($pdo){
        $sql = "UPDATE `CAIXA` SET `datafchCAIXA` = '$this->dataF', `horafchCAIXA` = '$this->horaF', `dinheiroCAIXA` = '$this->dinheiro', `cartaoCAIXA` = '$this->cartao', `retiradaCAIXA` = '$this->retirada', `emcaixaCAIXA` = '$this->emcaixa', `FECHA_idUSER`='$this->userF', `ativoCAIXA` = 0 WHERE `idCAIXA` = $this->id";
        $update = $pdo->prepare($sql);
        $update->execute();
    }
}
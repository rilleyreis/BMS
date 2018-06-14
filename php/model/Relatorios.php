<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 13/06/2018
 * Time: 03:27
 */

class Relatorios{
    public function vxo($pdo, $periodo){
        $sql = "SELECT (CASE WHEN `tipo` = 1 THEN 'OS' ELSE 'VENDA' END) AS 'tipo', COUNT(`tipo`) AS 'qtd', SUM(`valor`) AS 'valor' FROM `MOVIMENTACAO_DATA` WHERE `tipo` < 3 $periodo GROUP BY `tipo`";
        $query = $pdo->query($sql);
        return $query;
    }

    public function exs($pdo, $periodo){
        $sql = "SELECT (CASE WHEN `tipo` < 3 THEN 'ENTRADA' ELSE 'SAíDA' END) AS 'tipo', COUNT(`tipo`) AS 'qtd', SUM(`valor`) AS 'valor' FROM `MOVIMENTACAO_DATA` WHERE $periodo GROUP BY `tipo`";
        $query = $pdo->query($sql);
        return $query;
    }

    public function mov($pdo, $periodo){
        $sql = "SELECT (CASE WHEN `tipo` = 1 THEN 'OS' WHEN `tipo` = 2 THEN 'VENDA' WHEN `tipo` = 3 THEN 'SANGRIA' ELSE 'RETIRADA' END) AS 'tipo', COUNT(`tipo`) AS 'qtd', SUM(`valor`) AS 'valor' FROM `MOVIMENTACAO_DATA` WHERE $periodo GROUP BY `tipo`";
        $query = $pdo->query($sql);
        return $query;
    }

    public function clientes($pdo, $periodo){
        $sql = "SELECT `cliente`, `data`, `valor` FROM `MOVIMENTACAO_DATA` WHERE `tipo` = 2 $periodo ORDER BY `cliente` DESC, `data` ASC";
        $query = $pdo->query($sql);
        return $query;
    }

    public function forma($pdo, $periodo){
        $sql = "SELECT `forma`, COUNT(`forma`) AS 'qtd', SUM(`valor`) AS 'valor' FROM `MOVIMENTACAO_DATA` WHERE `tipo` = 2 $periodo GROUP BY `forma`";
        $query = $pdo->query($sql);
        return $query;
    }

    public function prod($pdo, $periodo){
        $sql = "SELECT P.`nomePRODUTO` AS 'produto', SUM(C.`qtditemCOMANDA`) AS 'qtd' FROM `PRODUTO` P INNER JOIN `COMANDA` C ON P.`idPRODUTO` = C.`PRODUTO_idPRODUTO` GROUP BY C.`PRODUTO_idPRODUTO` ORDER BY 'qtd' DESC LIMIT 0,5";
        $query = $pdo->query($sql);
        return $query;
    }
}
-- -----------------------------------------------------
-- View `USERS_DATA`
-- -----------------------------------------------------
CREATE VIEW `USERS_DATA` AS
    SELECT  U.`idUSER` AS 'id', PE.`nomePESSOA` AS 'fnome', PE.`snomePESSOA` AS 'lnome', CONCAT(PE.`nomePESSOA`, ' ', PE.`snomePESSOA`) AS 'nomeFull', PE.`cpfcnpjPESSOA` AS 'cpf', PE.`rgiePESSOA` AS 'rg', PE.`telPESSOA` AS 'tel', PE.`emailPESSOA` AS 'email',
            U.`funcaoUSER` AS 'funcao', U.`panelUSER` AS 'panel', U.`usuarioUSER` AS 'usuario', U.`senhaUSER` AS 'senha', PE.`ativoPESSOA` AS 'ativo'
    FROM `USERS` U INNER JOIN `PESSOA` PE ON U.`PESSOA_idPESSOA` = PE.`idPESSOA`;


-- -----------------------------------------------------
-- View `PESSOA_DATA`
-- -----------------------------------------------------
CREATE VIEW `PESSOA_DATA` AS
    SELECT  PE.`idPESSOA` AS 'id', PE.`cpfcnpjPESSOA` AS 'cpf_cnpj', PE.`nomePESSOA` AS 'nome', PE.`snomePESSOA` AS 'snome', PE.`rgiePESSOA` AS 'rgie', PE.`telPESSOA` AS 'tel', PE.`emailPESSOA` AS 'email', PE.`ativoPESSOA` AS 'ativo', PE.`tipoPESSOA` AS 'tipo',
            E.`ruaENDERECO` AS 'rua', E.`numENDERECO` AS 'num', E.`bairroENDERECO` AS 'bairro', E.`cidadeENDERECO` AS 'cidade', E.`ufENDERECO` AS 'uf', E.`cepENDERECO` AS 'cep'
    FROM `PESSOA` PE INNER JOIN `ENDERECO` E ON PE.`ENDERECO_idENDERECO` = E.`idENDERECO`;

-- ----------------------------------------------------
-- View `SERV_DATA`
-- ----------------------------------------------------
CREATE VIEW `SERV_DATA` AS
    SELECT S.`idSERVICO`, S.`nomeSERVICO`, S.`descricaoSERVICO`, S.`valorSERVICO`, S.`ativoSERVICO`
    FROM `SERVICO` S;

-- ----------------------------------------------------
-- View `OS_DATA`
-- ----------------------------------------------------
CREATE VIEW `OS_DATA` AS
    SELECT  OS.`idORDEMSERVICO` AS 'id', OS.`protocoloORDEMSERVICO` AS 'protocolo', OS.`vendedorORDEMSERVICO` AS 'vendedor', OS.`telefoneORDEMSERVICO` AS 'telefone', OS.`responsavelORDEMSERVICO` AS 'responsavel', OS.`objrecebidoORDEMSERVICO` AS 'objeto', OS.`itemdeixadoORDEMSERVICO` AS 'itens', OS.`defeitosORDEMSERVICO` AS 'defeitos', OS.`statusORDEMSERVICO` AS 'status', OS.`valorORDEMSERVICO` AS 'valor',
            PE.`nome` AS 'cliente', U.`nomeFull` AS 'tecnico'
    FROM `ORDEMSERVICO` OS  INNER JOIN `USERS_DATA` U ON OS.`USERS_idUSER` = U.`id`
                            INNER JOIN `PESSOA_DATA` PE ON OS.`idCLIENTE` = PE.`id`;

-- ----------------------------------------------------
-- View `OS_SERV_DATA`
-- ----------------------------------------------------
CREATE VIEW `OS_SERV_DATA` AS
    SELECT OSS.`idOS_SERV` AS 'id', S.`nomeSERVICO` AS 'nome', S.`valorSERVICO` AS 'valor', OSS.`ORDEMSERVICO_idORDEMSERVICO` AS 'idOS'
    FROM `OS_SERV` OSS INNER JOIN `SERVICO` S ON OSS.`SERVICO_idSERVICO` = S.`idSERVICO`;


-- ----------------------------------------------------
-- View `OS_SERV_DATA`
-- ----------------------------------------------------
CREATE VIEW `OS_PROD_DATA` AS
    SELECT OSP.`idOS_PROD` AS 'id', P.`nomePRODUTO` AS 'nome', P.`vendaPRODUTO` AS 'valorunit', OSP.`qtdOS_PROD` AS 'qtd', (P.`vendaPRODUTO` * OSP.`qtdOS_PROD`) AS 'valortot', OSP.`ORDEMSERVICO_idORDEMSERVICO` AS 'idOS'
    FROM `OS_PROD` OSP INNER JOIN `PRODUTO` P ON OSP.`PRODUTO_idPRODUTO` = P.`idPRODUTO`
    ORDER BY OSP.`idOS_PROD`;



-- TESTE DE STATUS
--SELECT `statusORDEMSERVICO`, COUNT(`statusORDEMSERVICO`) AS 'QTD' FROM `ORDEMSERVICO`
--GROUP BY `statusORDEMSERVICO`

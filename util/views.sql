-- -----------------------------------------------------
-- View `USERS_DATA`
-- -----------------------------------------------------
CREATE VIEW `USERS_DATA` AS
    SELECT  U.`idUSER` AS 'id', PE.`nomePESSOA` AS 'fnome', PE.`snomePESSOA` AS 'lnome', CONCAT(PE.`nomePESSOA`, ' ', PE.`snomePESSOA`) AS 'nomeFull', PE.`cpfcnpjPESSOA` AS 'cpf', PE.`rgiePESSOA` AS 'rg', PE.`telPESSOA` AS 'tel', PE.`emailPESSOA` AS 'email',
            U.`funcaoUSER` AS 'funcao', U.`panelUSER` AS 'panel', U.`usuarioUSER` AS 'usuario', U.`senhaUSER` AS 'senha', PE.`ativoPESSOA` AS 'ativo', PE.`idPESSOA` AS 'idP',
            E.`idENDERECO` AS 'idEnd', E.`ruaENDERECO` AS 'rua', E.`numENDERECO` AS 'num', E.`bairroENDERECO` AS 'bairro', E.`cidadeENDERECO` AS 'cidade', E.`ufENDERECO` AS 'uf', E.`cepENDERECO` AS 'cep'
    FROM `USERS` U  INNER JOIN `PESSOA` PE ON U.`PESSOA_idPESSOA` = PE.`idPESSOA`
                    INNER JOIN `ENDERECO` E ON PE.`ENDERECO_idENDERECO` = E.`idENDERECO`;


-- -----------------------------------------------------
-- View `PESSOA_DATA`
-- -----------------------------------------------------
CREATE VIEW `PESSOA_DATA` AS
    SELECT  PE.`idPESSOA` AS 'id', PE.`cpfcnpjPESSOA` AS 'cpf_cnpj', PE.`nomePESSOA` AS 'nome', PE.`snomePESSOA` AS 'snome', PE.`rgiePESSOA` AS 'rgie', PE.`telPESSOA` AS 'tel', PE.`emailPESSOA` AS 'email', PE.`ativoPESSOA` AS 'ativo', PE.`tipoPESSOA` AS 'tipo',
            E.`idENDERECO` AS 'idEnd', E.`ruaENDERECO` AS 'rua', E.`numENDERECO` AS 'num', E.`bairroENDERECO` AS 'bairro', E.`cidadeENDERECO` AS 'cidade', E.`ufENDERECO` AS 'uf', E.`cepENDERECO` AS 'cep'
    FROM `PESSOA` PE INNER JOIN `ENDERECO` E ON PE.`ENDERECO_idENDERECO` = E.`idENDERECO`;

-- -----------------------------------------------------
-- View `EMPRESA_DATA`
-- -----------------------------------------------------
CREATE VIEW `EMPRESA_DATA` AS
    SELECT  EM.`idEMPRESA` AS 'id', PE.`cpfcnpjPESSOA` AS 'cpf_cnpj', PE.`nomePESSOA` AS 'nome', PE.`snomePESSOA` AS 'snome', PE.`rgiePESSOA` AS 'rgie', PE.`telPESSOA` AS 'tel', PE.`emailPESSOA` AS 'email', PE.`ativoPESSOA` AS 'ativo', PE.`tipoPESSOA` AS 'tipo',
            E.`ruaENDERECO` AS 'rua', E.`numENDERECO` AS 'num', E.`bairroENDERECO` AS 'bairro', E.`cidadeENDERECO` AS 'cidade', E.`ufENDERECO` AS 'uf', E.`cepENDERECO` AS 'cep',
            EM.`logoEMPRESA` AS 'logo'
    FROM `PESSOA` PE INNER JOIN `ENDERECO` E ON PE.`ENDERECO_idENDERECO` = E.`idENDERECO`
          INNER JOIN EMPRESA EM ON EM.`PESSOA_idPESSOA` = PE.`idPESSOA`;

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
            CONCAT(PE.`id`,"|",PE.`nome`) AS 'cliente', CONCAT(U.`id`,"|",U.`nomeFull`) AS 'tecnico', OS.`laudoORDEMSERVICO` AS 'laudo', OS.`solucaoORDEMSERVICO` AS 'solucao'
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
    SELECT OSP.`idOS_PROD` AS 'id', OSP.`PRODUTO_idPRODUTO` AS 'idP',P.`nomePRODUTO` AS 'nome', P.`vendaPRODUTO` AS 'valorunit', OSP.`qtdOS_PROD` AS 'qtd', (P.`vendaPRODUTO` * OSP.`qtdOS_PROD`) AS 'valortot', OSP.`ORDEMSERVICO_idORDEMSERVICO` AS 'idOS'
    FROM `OS_PROD` OSP INNER JOIN `PRODUTO` P ON OSP.`PRODUTO_idPRODUTO` = P.`idPRODUTO`
    ORDER BY OSP.`idOS_PROD`;


-- ----------------------------------------------------
-- View `LOG_DATA`
-- ----------------------------------------------------
CREATE VIEW `LOG_DATA` AS
    SELECT L.`idLOG` AS 'id', U.`nomeFull` AS 'usuario', L.`acaoLOG` AS 'acao', L.`dataLOG` AS 'data', L.`horaLOG` AS 'hora'
    FROM `LOG` L  INNER JOIN `USERS_DATA` U ON L.`USERS_idUSER` = U.`id`;


-- ----------------------------------------------------
-- View `COMANADA_DATA`
-- ----------------------------------------------------
CREATE VIEW `COMANDA_DATA` AS
    SELECT P.`nomePRODUTO` AS 'produto', P.`vendaPRODUTO` AS 'unit', C.`qtditemCOMANDA` AS 'qtd', C.`valorCOMANDA` AS 'total', V.`idVENDA`
    FROM `VENDA` V  INNER JOIN `COMANDA` C ON V.`idVENDA` = C.`VENDA_idVENDA`
                    INNER JOIN `PRODUTO` P ON P.`idPRODUTO` = C.`PRODUTO_idPRODUTO`;


-- ----------------------------------------------------
-- View `MOVIMENTACAO_DATA`
-- ----------------------------------------------------
CREATE VIEW `MOVIMENTACAO_DATA` AS
		SELECT M.`idMOVIMENTACAO` AS 'id', M.`tipoMOVIMENTACAO` AS 'tipo',  M.`valorMOVIMENTACAO` AS 'valor', M.`frmpagMOVIMENTACAO` AS 'forma', M.`parcelasMOVIMENTACAO` AS 'parcela', M.`descricaoMOVIMENTACAO` AS 'descricao', CX.`dataCAIXA` AS 'data', CX.`idCAIXA`, U.`nomeFull` AS 'user', CONCAT(C.`nome`," ", C.`snome`) AS 'cliente'
    FROM `CAIXA` CX INNER JOIN `MOVIMENTACAO` M ON CX.`idCAIXA` = M.`CAIXA_idCAIXA`
                    INNER JOIN `USERS_DATA` U on U.`id` = M.`USERS_idUSER`
                    LEFT JOIN `PESSOA_DATA` C ON C.`id` = M.`idCLIENTE`;


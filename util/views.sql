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
    SELECT S.`idSERVICO`, S.`nomeSERVICO`, S.`descricaoSERVICO`, S.`valorSERVICO`, S.`ativoSERVICO`, S.`USERS_idUSER`, CONCAT(U.`fnome`, ' ', U.`lnome`) AS 'userSERVICO'
    FROM `SERVICO` S INNER JOIN `USERS_DATA` U ON S.`USERS_idUSER` = U.`id`
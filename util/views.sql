-- -----------------------------------------------------
-- View `USERS_DATA`
-- -----------------------------------------------------
CREATE VIEW `USERS_DATA` AS
    SELECT  U.`idUSER` AS 'id', PF.`fnomePFISICA` AS 'fnome', PF.`lnomePFISICA` AS 'lnome', PF.`cpfPFISICA` AS 'cpf', PF.`celPFISICA` AS 'cel', PF.`telPFISICA` AS 'tel', PF.`emailPFISICA` AS 'email',
            U.`funcaoUSER` AS 'funcao', U.`panelUSER` AS 'panel', U.`usuarioUSER` AS 'usuario', U.`senhaUSER` AS 'senha', U.`ativoUSER` AS 'ativo'
    FROM `USERS` U INNER JOIN `PFISICA` PF ON U.`PFISICA_idPFISICA` = PF.`idPFISICA`;


-- -----------------------------------------------------
-- View `FORN_DATA`
-- -----------------------------------------------------
CREATE VIEW `FORN_DATA` AS
    SELECT  F.`idFORNECEDOR` AS 'id', PJ.`cnpjPJURIDICA` AS 'cnpj', PJ.`razsocPJURIDICA` AS 'razsoc', PJ.`nomefantPJURIDICA` AS 'nomefant', PJ.`iePJURIDICA` AS 'ie', PJ.`telPJURIDICA` AS 'tel', PJ.`emailPJURIDICA` AS 'email',
            E.`ruaENDERECO` AS 'rua', E.`numENDERECO` AS 'num', E.`bairroENDERECO` AS 'bairro', E.`cidadeENDERECO` AS 'city', E.`ufENDERECO` AS 'uf', E.`cepENDERECO` AS 'cep', F.`ativoFORNECEDOR` AS 'ativo'
    FROM `PJURIDICA` PJ INNER JOIN `FORNECEDOR` F ON PJ.`idPJURIDICA` = F.`PJURIDICA_idPJURIDICA`
                        INNER JOIN `ENDERECO` E ON F.`ENDERECO_idENDERECO` = E.`idENDERECO`;

-- ----------------------------------------------------
-- View `CLI_PF_DATA`
-- ----------------------------------------------------
CREATE VIEW CLI_PF_DATA AS
    SELECT  C.`idCLIENTE` AS 'id', P.`fnomePFISICA` AS 'fnome', P.`lnomePFISICA` AS 'lnome', P.`cpfPFISICA` AS 'cpf', P.`telPFISICA` AS 'tel',
            P.`celPFISICA` AS 'cel', P.`emailPFISICA` AS 'email', E.`ruaENDERECO` AS 'rua', E.`numENDERECO` AS 'num', E.`bairroENDERECO` AS 'bairro',
            E.`cidadeENDERECO` AS 'cidade', E.`ufENDERECO` AS 'uf', E.`cepENDERECO` AS 'cep', C.`ativoCLIENTE` AS `ativo`
    FROM `PFISICA` P  INNER JOIN `CLIENTE` C ON C.`PFISICA_idPFISICA` = P.`idPFISICA`
                      INNER JOIN `ENDERECO` E ON C.`ENDERECO_idENDERECO` = E.`idENDERECO`
    WHERE C.`PFISICA_idPFISICA` IS NOT NULL;

-- ----------------------------------------------------
-- View `CLI_PJ_DATA`
-- ----------------------------------------------------
CREATE VIEW CLI_PJ_DATA AS
    SELECT  C.`idCLIENTE` AS 'id', P.`nomefantPJURIDICA` AS 'nomefant', P.`razsocPJURIDICA` AS 'razsoc', P.`cnpjPJURIDICA` AS 'cnpj', P.`telPJURIDICA` AS 'tel',
            P.`iePJURIDICA` AS 'ie', P.`emailPJURIDICA` AS 'email', E.`ruaENDERECO` AS 'rua', E.`numENDERECO` AS 'num', E.`bairroENDERECO` AS 'bairro',
            E.`cidadeENDERECO` AS 'cidade', E.`ufENDERECO` AS 'uf', E.`cepENDERECO` AS 'cep', C.`ativoCLIENTE` AS 'ativo'
    FROM `PJURIDICA` P  INNER JOIN `CLIENTE` C ON C.`PJURIDICA_idPJURIDICA` = P.`idPJURIDICA`
                      INNER JOIN `ENDERECO` E ON C.`ENDERECO_idENDERECO` = E.`idENDERECO`
    WHERE C.`PJURIDICA_idPJURIDICA` IS NOT NULL;

-- ----------------------------------------------------
-- View `CLI_UNION_DATA`
-- ----------------------------------------------------
CREATE VIEW `CLI_UNION_DATA` AS
    SELECT CPF.`id` AS 'id', CPF.`fnome` AS 'nome/fantasia', CPF.`lnome` AS 'snome/razao', CPF.`cpf` AS 'cpf/cnpj', CPF.`cel` AS 'tel', CPF.`email`, CPF.`ativo`
    FROM `CLI_PF_DATA` CPF UNION
    SELECT CPJ.`id`, CPJ.`nomefant`, CPJ.`razsoc`, CPJ.`cnpj`, CPJ.`tel`, CPJ.`email`, CPJ.`ativo` FROM `CLI_PJ_DATA` CPJ
    WHERE `ativo` = 1
    ORDER BY `id`;

-- ----------------------------------------------------
-- View `SERV_DATA`
-- ----------------------------------------------------
CREATE VIEW `SERV_DATA` AS
    SELECT S.`idSERVICO`, S.`nomeSERVICO`, S.`descricaoSERVICO`, S.`valorSERVICO`, S.`ativoSERVICO`, S.`USERS_idUSER`, CONCAT(U.`fnome`, ' ', U.`lnome`) AS 'userSERVICO'
    FROM `SERVICO` S INNER JOIN `USERS_DATA` U ON S.`USERS_idUSER` = U.`id`
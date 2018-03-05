DROP DATABASE IF EXISTS project;

CREATE DATABASE project DEFAULT CHARACTER SET = utf8 ;

USE project;


CREATE TABLE USERS(
    idUSERS       INT NOT NULL AUTO_INCREMENT,
    pnomeUSERS     VARCHAR(11) NOT NULL,
    lnomeUSERS     VARCHAR(50) NOT NULL,
    cpfUSERS      VARCHAR(15) NOT NULL,
    celUSERS      VARCHAR(15),
    telUSERS      VARCHAR(15),
    emailUSERS    VARCHAR(50) NOT NULL,
    usuarioUSERS  VARCHAR(10) NOT NULL,
    senhaUSERS    VARCHAR(16) NOT NULL,
    funcaoUSERS   VARCHAR(15) NOT NULL,
    panelUSERS    VARCHAR(10) NOT NULL,
    ativoUSERS   INT NOT NULL,
    PRIMARY KEY (idUSERS)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;

INSERT INTO users(pnomeUSERS, lnomeUSERS, cpfUSERS, celUSERS, emailUSERS, usuarioUSERS, senhaUSERS, panelUSERS, funcaoUSERS, ativoUSERS) VALUES ('João', 'Rodrigues da Costa', '412.053.418-97', '(12)98765-4321', 'admin@email.com', 'admin', 'MTIzNDU2', 'admin', 'Administrador', 1);

CREATE TABLE logs(
    id_log      INT NOT NULL AUTO_INCREMENT,
    user_log    INT NOT NULL,
    acao_log    VARCHAR(30),
    data_log    DATE,
    PRIMARY KEY (id_log)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;
ALTER TABLE logs ADD CONSTRAINT fkUSERS1 FOREIGN KEY (user_log) REFERENCES users (idUSERS);

CREATE TABLE clients(
    nome_cli    VARCHAR(11) NOT NULL,
    snome_cli    VARCHAR(50) NOT NULL,
    cpf_cli     VARCHAR(15) NOT NULL,
    cel_cli     VARCHAR(15),
    tel_cli     VARCHAR(15),
    email_cli   VARCHAR(50) NOT NULL,
    rua_cli     VARCHAR(50) NOT NULL,
    num_cli     INT NOT NULL,
    bairro_cli  VARCHAR(50) NOT NULL,
    status_cli  INT NOT NULL,
    PRIMARY KEY (cpf_cli)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;

CREATE TABLE empresa(
    cnpj_emp    VARCHAR(20),
    raz_emp     VARCHAR(100),
    fant_emp    VARCHAR(100),
    ie_emp      VARCHAR(15),
    rua_emp     VARCHAR(100),
    num_emp     INT,
    bairro_emp  VARCHAR(100),
    cid_emp     VARCHAR(50),
    est_emp     VARCHAR(30),
    tel_emp     VARCHAR(15),
    email_emp   VARCHAR(60),
    logo_emp    VARCHAR(100),
    status_emp  INT,
    PRIMARY KEY (cnpj_emp)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;

CREATE TABLE produtos(
    id_prod     INT NOT NULL AUTO_INCREMENT,
    nome_prod   VARCHAR(50) NOT NULL,
    desc_prod   VARCHAR(300) NOT NULL,
    forn_prod   VARCHAR(20),
    compra_prod DECIMAL(10,2) NOT NULL,
    venda_prod  DECIMAL(10,2) NOT NULL,
    qtd_prod    INT NOT NULL,
    min_prod    INT NOT NULL,
    status_prod INT NOT NULL,
    PRIMARY KEY (id_prod)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;
ALTER TABLE produtos ADD CONSTRAINT fk_emp1 FOREIGN KEY (forn_prod) REFERENCES empresa (cnpj_emp);

CREATE TABLE servicos(
    id_serv     INT NOT NULL AUTO_INCREMENT,
    nome_serv   VARCHAR(100) NOT NULL,
    desc_serv   VARCHAR(300) NOT NULL,
    preco_serv  DECIMAL(10,2) NOT NULL,
    status_serv INT NOT NULL,
    PRIMARY KEY (id_serv)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;

CREATE TABLE ordem_servico(
    id_os       INT NOT NULL AUTO_INCREMENT,
    cli_os      VARCHAR(15) NOT NULL,
    tec_os      INT NOT NULL,
    status_os   VARCHAR(12) NOT NULL,
    dtIni_os    DATE NOT NULL,
    dtFim_os    DATE NOT NULL,
    garant_os   VARCHAR(15) NOT NULL,
    desc_os     VARCHAR(300) NOT NULL,
    deft_os     VARCHAR(300) NOT NULL,
    obs_os      VARCHAR(300) NOT NULL,
    prot_os     VARCHAR(15) NOT NULL,
    data_os     DATE NOT NULL,
    PRIMARY KEY (id_os)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;

ALTER TABLE ordem_servico ADD CONSTRAINT fk_cliente FOREIGN KEY (cli_os) REFERENCES clients (cpf_cli);
ALTER TABLE ordem_servico ADD CONSTRAINT fkUSERS FOREIGN KEY (tec_os) REFERENCES users (idUSERS);

CREATE TABLE os_servico(
    id_oss      INT NOT NULL AUTO_INCREMENT,
    os_oss      INT NOT NULL,
    serv_oss    INT NOT NULL,
    PRIMARY KEY(id_oss)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;

ALTER TABLE os_servico ADD CONSTRAINT fk_os FOREIGN KEY (os_oss) REFERENCES ordem_servico (id_os);
ALTER TABLE os_servico ADD CONSTRAINT fk_serv FOREIGN KEY (serv_oss) REFERENCES servicos (id_serv);

CREATE TABLE os_produto(
    id_osp      INT NOT NULL AUTO_INCREMENT,
    os_osp      INT NOT NULL,
    prod_osp    INT NOT NULL,
    qtd_osp     INT NOT NULL,
    PRIMARY KEY(id_osp)
)
ENGINE = innodb,
DEFAULT CHARACTER SET = utf8;

ALTER TABLE os_produto ADD CONSTRAINT fk_os1 FOREIGN KEY (os_osp) REFERENCES ordem_servico (id_os);
ALTER TABLE os_produto ADD CONSTRAINT fk_prod FOREIGN KEY (prod_osp) REFERENCES produtos (id_prod);


/* VIEWS */
CREATE VIEW view_os AS
    SELECT concat( C.cpf_cli, "|", C.nome_cli) AS "cliente", C.nome_cli AS "nome_cli", concat(U.idUSERS, "|", U.nomeUSERS) AS "tecnico", U.nomeUSERS AS "nomeUSERS", OS.id_os AS 'id_os', OS.dtIni_os AS 'dtIni_os', OS.dtFim_os AS 'dtFim_os', OS.status_os AS 'status_os', OS.desc_os AS "desc_os", OS.deft_os AS "deft_os", OS.obs_os AS "obs_os", OS.garant_os AS "garant_os", OS.prot_os AS 'prot_os', OS.data_os AS 'data_os'
    FROM clients C 	INNER JOIN ordem_servico OS ON c.cpf_cli = OS.cli_os
        INNER JOIN users U ON OS.tec_os = U.idUSERS;


CREATE VIEW view_prod_os AS
    SELECT OP.os_osp AS 'id_os', P.id_prod AS 'id_prod', P.nome_prod AS 'prod_os', OP.qtd_osp AS 'qtd_os', P.venda_prod * OP.qtd_osp AS 'subvalor_os'
    FROM produtos P INNER JOIN os_produto OP ON P.id_prod = OP.prod_osp
    ORDER BY OP.id_osp;

CREATE VIEW view_serv_os AS
    SELECT OS.os_oss AS 'id_os', S.nome_serv AS 'serv_os', S.preco_serv AS 'preco_os'
    FROM os_servico OS INNER JOIN servicos S ON OS.serv_oss = S.id_serv
    ORDER BY OS.id_oss;
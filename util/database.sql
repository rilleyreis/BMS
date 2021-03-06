-- MySQL Script generated by MySQL Workbench
-- Wed Jun 13 15:06:51 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `project` ;

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8 ;
USE `project` ;

-- -----------------------------------------------------
-- Table `endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `endereco` (
  `idENDERECO` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ruaENDERECO` VARCHAR(255) NOT NULL,
  `numENDERECO` INT(11) NOT NULL,
  `bairroENDERECO` VARCHAR(255) NOT NULL,
  `cepENDERECO` VARCHAR(255) NULL DEFAULT NULL,
  `cidadeENDERECO` VARCHAR(255) NULL DEFAULT NULL,
  `ufENDERECO` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`idENDERECO`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pessoa` (
  `idPESSOA` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cpfcnpjPESSOA` VARCHAR(255) NOT NULL,
  `nomePESSOA` VARCHAR(255) NOT NULL,
  `snomePESSOA` VARCHAR(255) NOT NULL,
  `rgiePESSOA` VARCHAR(255) NULL DEFAULT NULL,
  `telPESSOA` VARCHAR(255) NOT NULL,
  `emailPESSOA` VARCHAR(255) NOT NULL,
  `tipoPESSOA` VARCHAR(2) NOT NULL,
  `ativoPESSOA` INT(11) NOT NULL,
  `ENDERECO_idENDERECO` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idPESSOA`),
  UNIQUE INDEX `idPESSOA_UNIQUE` (`idPESSOA` ASC),
  CONSTRAINT `fk_PESSOA_ENDERECO1`
    FOREIGN KEY (`ENDERECO_idENDERECO`)
    REFERENCES `endereco` (`idENDERECO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `idUSER` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `funcaoUSER` VARCHAR(255) NOT NULL,
  `panelUSER` VARCHAR(255) NOT NULL,
  `usuarioUSER` VARCHAR(255) NOT NULL,
  `senhaUSER` VARCHAR(255) NOT NULL,
  `PESSOA_idPESSOA` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idUSER`),
  CONSTRAINT `fk_USERS_PESSOA1`
    FOREIGN KEY (`PESSOA_idPESSOA`)
    REFERENCES `pessoa` (`idPESSOA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `caixa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caixa` (
  `idCAIXA` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dataCAIXA` DATE NOT NULL,
  `horaCAIXA` VARCHAR(255) NOT NULL,
  `datafchCAIXA` DATE NULL,
  `horafchCAIXA` VARCHAR(255) NULL,
  `trocoCAIXA` DECIMAL(10,2) NOT NULL,
  `dinheiroCAIXA` DECIMAL(10,2) NULL DEFAULT NULL,
  `cartaoCAIXA` DECIMAL(10,2) NULL DEFAULT NULL,
  `retiradaCaixa` DECIMAL(10,2) NULL,
  `emcaixaCAIXA` DECIMAL(10,2) NULL,
  `USERS_idUSER` INT(10) UNSIGNED NOT NULL,
  `FECHA_idUSER` INT(10) UNSIGNED NULL,
  `ativoCAIXA` INT NOT NULL,
  PRIMARY KEY (`idCAIXA`),
  UNIQUE INDEX `idCAIXA_UNIQUE` (`idCAIXA` ASC),
  CONSTRAINT `fk_CAIXA_USERS1`
    FOREIGN KEY (`USERS_idUSER`)
    REFERENCES `users` (`idUSER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_caixa_users2`
    FOREIGN KEY (`FECHA_idUSER`)
    REFERENCES `users` (`idUSER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produto` (
  `idPRODUTO` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomePRODUTO` VARCHAR(255) NOT NULL,
  `descricaoPRODUTO` VARCHAR(255) NOT NULL,
  `compraPRODUTO` DECIMAL(10,2) NOT NULL,
  `vendaPRODUTO` DECIMAL(10,2) NOT NULL,
  `estoquePRODUTO` INT(11) NOT NULL,
  `minimoPRODUTO` INT(11) NOT NULL,
  `ativoPRODUTO` INT(11) NOT NULL,
  `idFORNECEDOR` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idPRODUTO`),
  UNIQUE INDEX `idPRODUTO_UNIQUE` (`idPRODUTO` ASC),
  CONSTRAINT `fk_PRODUTO_PESSOA1`
    FOREIGN KEY (`idFORNECEDOR`)
    REFERENCES `pessoa` (`idPESSOA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `venda` (
  `idVENDA` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `valorVENDA` DECIMAL(10,2) NOT NULL,
  `qtdproVENDA` INT(11) NOT NULL,
  PRIMARY KEY (`idVENDA`),
  UNIQUE INDEX `idVENDA_UNIQUE` (`idVENDA` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `comanda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `comanda` (
  `idCOMANDA` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `qtditemCOMANDA` INT(11) NOT NULL,
  `valorCOMANDA` DECIMAL(10,2) NOT NULL,
  `PRODUTO_idPRODUTO` INT(10) UNSIGNED NOT NULL,
  `VENDA_idVENDA` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idCOMANDA`),
  UNIQUE INDEX `idCOMANDA_UNIQUE` (`idCOMANDA` ASC),
  CONSTRAINT `fk_COMANDA_PRODUTO1`
    FOREIGN KEY (`PRODUTO_idPRODUTO`)
    REFERENCES `produto` (`idPRODUTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMANDA_VENDA1`
    FOREIGN KEY (`VENDA_idVENDA`)
    REFERENCES `venda` (`idVENDA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ordemservico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ordemservico` (
  `idORDEMSERVICO` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `protocoloORDEMSERVICO` VARCHAR(255) NOT NULL,
  `vendedorORDEMSERVICO` VARCHAR(255) NOT NULL,
  `telefoneORDEMSERVICO` VARCHAR(255) NOT NULL,
  `responsavelORDEMSERVICO` VARCHAR(255) NOT NULL,
  `objrecebidoORDEMSERVICO` VARCHAR(255) NOT NULL,
  `itemdeixadoORDEMSERVICO` VARCHAR(255) NOT NULL,
  `defeitosORDEMSERVICO` VARCHAR(255) NOT NULL,
  `statusORDEMSERVICO` INT(11) NOT NULL,
  `laudoORDEMSERVICO` VARCHAR(255) NULL DEFAULT NULL,
  `solucaoORDEMSERVICO` VARCHAR(255) NULL DEFAULT NULL,
  `valorORDEMSERVICO` DECIMAL(10,2) NULL DEFAULT NULL,
  `dataORDEMSERVICO` DATE NOT NULL,
  `USERS_idUSER` INT(10) UNSIGNED NOT NULL,
  `idCLIENTE` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idORDEMSERVICO`),
  UNIQUE INDEX `idORDEMSERVICO_UNIQUE` (`idORDEMSERVICO` ASC),
  CONSTRAINT `fk_ORDEMSERVICO_PESSOA1`
    FOREIGN KEY (`idCLIENTE`)
    REFERENCES `pessoa` (`idPESSOA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ORDEMSERVICO_USERS1`
    FOREIGN KEY (`USERS_idUSER`)
    REFERENCES `users` (`idUSER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `data_status_os`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `data_status_os` (
  `idDATA_STATUS_OS` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dataDSO` DATE NOT NULL,
  `horaDSO` VARCHAR(10) NOT NULL,
  `statusDSO` INT(11) NOT NULL,
  `ORDEMSERVICO_idORDEMSERVICO` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idDATA_STATUS_OS`),
  UNIQUE INDEX `idDATA_STATUS_OS_UNIQUE` (`idDATA_STATUS_OS` ASC),
  CONSTRAINT `fk_DATA_STATUS_OS_ORDEMSERVICO1`
    FOREIGN KEY (`ORDEMSERVICO_idORDEMSERVICO`)
    REFERENCES `ordemservico` (`idORDEMSERVICO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresa` (
  `idEMPRESA` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logoEMPRESA` VARCHAR(255) NOT NULL,
  `PESSOA_idPESSOA` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idEMPRESA`),
  CONSTRAINT `fk_EMPRESA_PESSOA1`
    FOREIGN KEY (`PESSOA_idPESSOA`)
    REFERENCES `pessoa` (`idPESSOA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `log` (
  `idLOG` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `acaoLOG` VARCHAR(255) NOT NULL,
  `dataLOG` DATE NOT NULL,
  `horaLOG` VARCHAR(255) NOT NULL,
  `USERS_idUSER` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idLOG`, `USERS_idUSER`),
  CONSTRAINT `fk_LOG_USERS2`
    FOREIGN KEY (`USERS_idUSER`)
    REFERENCES `users` (`idUSER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `movimentacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `idMOVIMENTACAO` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `valorMOVIMENTACAO` DECIMAL(10,2) NOT NULL,
  `frmpagMOVIMENTACAO` VARCHAR(255) NOT NULL,
  `parcelasMOVIMENTACAO` INT(11) NOT NULL,
  `tipoMOVIMENTACAO` VARCHAR(255) NULL,
  `descricaoMOVIMENTACAO` VARCHAR(255) NULL,
  `idCLIENTE` INT(10) UNSIGNED NULL,
  `USERS_idUSER` INT(10) UNSIGNED NOT NULL,
  `CAIXA_idCAIXA` INT(10) UNSIGNED NOT NULL,
  `ORDEMSERVICO_idORDEMSERVICO` INT(10) UNSIGNED NULL,
  `VENDA_idVENDA` INT(10) UNSIGNED NULL,
  PRIMARY KEY (`idMOVIMENTACAO`),
  UNIQUE INDEX `idMOVIMENTACAO_UNIQUE` (`idMOVIMENTACAO` ASC),
  CONSTRAINT `fk_MOVIMENTACAO_CAIXA1`
    FOREIGN KEY (`CAIXA_idCAIXA`)
    REFERENCES `caixa` (`idCAIXA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMENTACAO_ORDEMSERVICO1`
    FOREIGN KEY (`ORDEMSERVICO_idORDEMSERVICO`)
    REFERENCES `ordemservico` (`idORDEMSERVICO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMENTACAO_PESSOA1`
    FOREIGN KEY (`idCLIENTE`)
    REFERENCES `pessoa` (`idPESSOA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMENTACAO_USERS1`
    FOREIGN KEY (`USERS_idUSER`)
    REFERENCES `users` (`idUSER`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMENTACAO_VENDA1`
    FOREIGN KEY (`VENDA_idVENDA`)
    REFERENCES `venda` (`idVENDA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `os_prod`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `os_prod` (
  `idOS_PROD` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `qtdOS_PROD` INT(11) NOT NULL,
  `ORDEMSERVICO_idORDEMSERVICO` INT(10) UNSIGNED NOT NULL,
  `PRODUTO_idPRODUTO` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idOS_PROD`),
  UNIQUE INDEX `idOS_PROD_UNIQUE` (`idOS_PROD` ASC),
  CONSTRAINT `fk_OS_PROD_ORDEMSERVICO1`
    FOREIGN KEY (`ORDEMSERVICO_idORDEMSERVICO`)
    REFERENCES `ordemservico` (`idORDEMSERVICO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OS_PROD_PRODUTO1`
    FOREIGN KEY (`PRODUTO_idPRODUTO`)
    REFERENCES `produto` (`idPRODUTO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servico` (
  `idSERVICO` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomeSERVICO` VARCHAR(255) NOT NULL,
  `descricaoSERVICO` VARCHAR(255) NOT NULL,
  `valorSERVICO` DECIMAL(10,2) NOT NULL,
  `ativoSERVICO` INT(11) NOT NULL,
  PRIMARY KEY (`idSERVICO`),
  UNIQUE INDEX `idSERVICO_UNIQUE` (`idSERVICO` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `os_serv`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `os_serv` (
  `idOS_SERV` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `SERVICO_idSERVICO` INT(10) UNSIGNED NOT NULL,
  `ORDEMSERVICO_idORDEMSERVICO` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idOS_SERV`),
  UNIQUE INDEX `idOS_SERV_UNIQUE` (`idOS_SERV` ASC),
  CONSTRAINT `fk_OS_SERV_ORDEMSERVICO1`
    FOREIGN KEY (`ORDEMSERVICO_idORDEMSERVICO`)
    REFERENCES `ordemservico` (`idORDEMSERVICO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OS_SERV_SERVICO1`
    FOREIGN KEY (`SERVICO_idSERVICO`)
    REFERENCES `servico` (`idSERVICO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `db_estacionamento` ;
CREATE SCHEMA IF NOT EXISTS `db_estacionamento` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `db_estacionamento` ;

-- -----------------------------------------------------
-- Table `db_estacionamento`.`tb_convenio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_estacionamento`.`tb_convenio` ;

CREATE TABLE IF NOT EXISTS `db_estacionamento`.`tb_convenio` (
  `id_convenio` INT NOT NULL AUTO_INCREMENT,
  `companhia` VARCHAR(45) NULL,
  `cnpj` CHAR(14) NULL,
  `percentual_desconto` INT NULL,
  `data_registro` DATETIME NULL,
  `ativo` TINYINT(1) NULL,
  PRIMARY KEY (`id_convenio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_estacionamento`.`tb_mensalista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_estacionamento`.`tb_mensalista` ;

CREATE TABLE IF NOT EXISTS `db_estacionamento`.`tb_mensalista` (
  `id_mensalista` INT NOT NULL AUTO_INCREMENT,
  `id_convenio` INT NOT NULL,
  `nome` VARCHAR(90) NULL,
  `cpf` VARCHAR(12) NULL,
  `placa_veiculo` CHAR(7) NULL,
  `num_credencial` BIGINT NULL,
  `ativo` TINYINT(1) NULL,
  `data_registro` DATETIME NULL,
  PRIMARY KEY (`id_mensalista`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  INDEX `fk_tb_mensalista_tb_convenio1_idx` (`id_convenio` ASC),
  CONSTRAINT `fk_tb_mensalista_tb_convenio1`
    FOREIGN KEY (`id_convenio`)
    REFERENCES `db_estacionamento`.`tb_convenio` (`id_convenio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_estacionamento`.`tb_estacionamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_estacionamento`.`tb_estacionamento` ;

CREATE TABLE IF NOT EXISTS `db_estacionamento`.`tb_estacionamento` (
  `id_estacionamento` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `descricao` VARCHAR(200) NULL,
  `ativo` TINYINT(1) NULL,
  `valor_primeira_hora` DECIMAL(8,2) NULL,
  `valor_hora` DECIMAL(8,2) NULL,
  `valor_mensal` DECIMAL(8,2) NULL,
  `data_registro` DATETIME NULL,
  PRIMARY KEY (`id_estacionamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_estacionamento`.`tb_ticket`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_estacionamento`.`tb_ticket` ;

CREATE TABLE IF NOT EXISTS `db_estacionamento`.`tb_ticket` (
  `no_ticket` INT NOT NULL AUTO_INCREMENT,
  `id_mensalista` INT NULL,
  `id_estacionamento` INT NOT NULL,
  `placa_veiculo` BIGINT NULL,
  `horaEntrada` DATETIME NULL,
  `horaSaida` DATETIME NULL,
  `data_registro` DATETIME NULL,
  PRIMARY KEY (`no_ticket`),
  UNIQUE INDEX `no_ticket_UNIQUE` (`no_ticket` ASC),
  INDEX `fk_tb_ticket_tb_mensalista1_idx` (`id_mensalista` ASC),
  INDEX `fk_tb_ticket_tb_estacionamento1_idx` (`id_estacionamento` ASC),
  CONSTRAINT `fk_tb_ticket_tb_mensalista1`
    FOREIGN KEY (`id_mensalista`)
    REFERENCES `db_estacionamento`.`tb_mensalista` (`id_mensalista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_ticket_tb_estacionamento1`
    FOREIGN KEY (`id_estacionamento`)
    REFERENCES `db_estacionamento`.`tb_estacionamento` (`id_estacionamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema yii2advanced
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema yii2advanced
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `yii2advanced` DEFAULT CHARACTER SET utf8 ;
USE `yii2advanced` ;

-- -----------------------------------------------------
-- Table `yii2advanced`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`autor` (
  `autor_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `nacionalidad` VARCHAR(45) NULL DEFAULT NULL,
  `nacimiento` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`autor_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`clase_documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`clase_documento` (
  `clase_documento_id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion_documento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`clase_documento_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`clase_lector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`clase_lector` (
  `clase_lector_id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `dias_prestamo` INT(11) NOT NULL DEFAULT '30',
  PRIMARY KEY (`clase_lector_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`estado` (
  `estado_id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`estado_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`tipo_libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`tipo_libro` (
  `tipo_libro_id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`tipo_libro_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`libros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`libros` (
  `libros_id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `editorial` VARCHAR(45) NULL DEFAULT NULL,
  `ano` INT(11) NULL DEFAULT NULL,
  `tipo_libro_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`libros_id`),
  INDEX `fk_libros_tipo_libro` (`tipo_libro_id` ASC),
  CONSTRAINT `fk_libros_tipo_libro`
    FOREIGN KEY (`tipo_libro_id`)
    REFERENCES `yii2advanced`.`tipo_libro` (`tipo_libro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`copias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`copias` (
  `copias_id` INT(11) NOT NULL AUTO_INCREMENT,
  `estado_id` INT(11) NOT NULL,
  `libros_id` INT(11) NOT NULL,
  PRIMARY KEY (`copias_id`),
  INDEX `fk_copias_estado1` (`estado_id` ASC),
  INDEX `fk_copias_libros1` (`libros_id` ASC),
  CONSTRAINT `fk_copias_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `yii2advanced`.`estado` (`estado_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_copias_libros1`
    FOREIGN KEY (`libros_id`)
    REFERENCES `yii2advanced`.`libros` (`libros_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`lectores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`lectores` (
  `usuario_crea_mod` VARCHAR(255) NULL DEFAULT NULL,
  `create_time` DATETIME NULL DEFAULT NULL,
  `update_time` DATETIME NULL DEFAULT NULL,
  `lectores_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `documento` VARCHAR(45) NOT NULL,
  `clase_lector_id` INT(11) NOT NULL,
  `clase_documento_id` INT(11) NOT NULL,
  `direccion` VARCHAR(70) NOT NULL,
  `telefono` VARCHAR(15) NOT NULL,
  `mail` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`lectores_id`),
  INDEX `fk_lectores_clase_lector1_idx` (`clase_lector_id` ASC),
  INDEX `fk_lectores_clase_documento1_idx` (`clase_documento_id` ASC),
  CONSTRAINT `fk_lectores_clase_documento1`
    FOREIGN KEY (`clase_documento_id`)
    REFERENCES `yii2advanced`.`clase_documento` (`clase_documento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lectores_clase_lector1`
    FOREIGN KEY (`clase_lector_id`)
    REFERENCES `yii2advanced`.`clase_lector` (`clase_lector_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`multas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`multas` (
  `multas_id` INT(11) NOT NULL AUTO_INCREMENT,
  `fin_multa` DATE NOT NULL,
  `activa` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`multas_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`lectores_has_multas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`lectores_has_multas` (
  `lectores_lectores_id` INT(11) NOT NULL,
  `lectores_multas_id` INT(11) NOT NULL,
  PRIMARY KEY (`lectores_lectores_id`, `lectores_multas_id`),
  INDEX `fk_lectores_has_multas_multas1` (`lectores_multas_id` ASC),
  INDEX `fk_lectores_has_multas_lectores1` (`lectores_lectores_id` ASC),
  CONSTRAINT `fk_lectores_has_multas_lectores1`
    FOREIGN KEY (`lectores_lectores_id`)
    REFERENCES `yii2advanced`.`lectores` (`lectores_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lectores_has_multas_multas1`
    FOREIGN KEY (`lectores_multas_id`)
    REFERENCES `yii2advanced`.`multas` (`multas_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`libros_has_autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`libros_has_autor` (
  `libros_libros_id` INT(11) NOT NULL,
  `libros_autor_id` INT(11) NOT NULL,
  PRIMARY KEY (`libros_libros_id`, `libros_autor_id`),
  INDEX `fk_libros_has_autor_autor1_idx` (`libros_autor_id` ASC),
  INDEX `fk_libros_has_autor_libros1_idx` (`libros_libros_id` ASC),
  CONSTRAINT `fk_libros_has_autor_autor1`
    FOREIGN KEY (`libros_autor_id`)
    REFERENCES `yii2advanced`.`autor` (`autor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libros_has_autor_libros1`
    FOREIGN KEY (`libros_libros_id`)
    REFERENCES `yii2advanced`.`libros` (`libros_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`migration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`migration` (
  `version` VARCHAR(180) NOT NULL,
  `apply_time` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`prestamos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`prestamos` (
  `prestamos_id` INT(11) NOT NULL AUTO_INCREMENT,
  `extension` TINYINT(1) NOT NULL DEFAULT '0',
  `fecha_devolucion` DATE NOT NULL,
  `lectores_idl` INT(11) NOT NULL,
  `copias_id` INT(11) NOT NULL,
  PRIMARY KEY (`prestamos_id`),
  INDEX `fk_prestamos_lectores1` (`lectores_idl` ASC),
  INDEX `fk_prestamos_copias1` (`copias_id` ASC),
  CONSTRAINT `fk_prestamos_copias1`
    FOREIGN KEY (`copias_id`)
    REFERENCES `yii2advanced`.`copias` (`copias_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamos_lectores1`
    FOREIGN KEY (`lectores_idl`)
    REFERENCES `yii2advanced`.`lectores` (`lectores_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`prestamos_has_multas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`prestamos_has_multas` (
  `prestamos_prestamos_id` INT(11) NOT NULL,
  `prestamos_multas_id` INT(11) NOT NULL,
  PRIMARY KEY (`prestamos_prestamos_id`, `prestamos_multas_id`),
  INDEX `fk_prestamos_has_multas_multas1` (`prestamos_multas_id` ASC),
  INDEX `fk_prestamos_has_multas_prestamos1` (`prestamos_prestamos_id` ASC),
  CONSTRAINT `fk_prestamos_has_multas_multas1`
    FOREIGN KEY (`prestamos_multas_id`)
    REFERENCES `yii2advanced`.`multas` (`multas_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamos_has_multas_prestamos1`
    FOREIGN KEY (`prestamos_prestamos_id`)
    REFERENCES `yii2advanced`.`prestamos` (`prestamos_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yii2advanced`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2advanced`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `auth_key` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_hash` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_reset_token` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `status` SMALLINT(6) NOT NULL DEFAULT '10',
  `created_at` INT(11) NOT NULL,
  `updated_at` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`username` ASC),
  UNIQUE INDEX `email` (`email` ASC),
  UNIQUE INDEX `password_reset_token` (`password_reset_token` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

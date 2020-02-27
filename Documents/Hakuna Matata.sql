-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema hakuna_matata
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hakuna_matata
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hakuna_matata` DEFAULT CHARACTER SET latin1 ;
USE `hakuna_matata` ;

-- -----------------------------------------------------
-- Table `hakuna_matata`.`guest`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hakuna_matata`.`guest` ;

CREATE TABLE IF NOT EXISTS `hakuna_matata`.`guest` (
  `guest_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `email_address` VARCHAR(45) NULL DEFAULT NULL,
  `phone_number` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`guest_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `hakuna_matata`.`rooms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hakuna_matata`.`rooms` ;

CREATE TABLE IF NOT EXISTS `hakuna_matata`.`rooms` (
  `room_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_num` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`room_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `hakuna_matata`.`reservation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hakuna_matata`.`reservation` ;

CREATE TABLE IF NOT EXISTS `hakuna_matata`.`reservation` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `check_in_date` DATE NOT NULL,
  `check_out_date` DATE NOT NULL,
  `guest_id` INT(11) UNSIGNED NOT NULL,
  `room_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_guest_id`
    FOREIGN KEY (`guest_id`)
    REFERENCES `hakuna_matata`.`guest` (`guest_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_room_id`
    FOREIGN KEY (`room_id`)
    REFERENCES `hakuna_matata`.`rooms` (`room_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- -----------------------------------------------------
-- Mock data
-- -----------------------------------------------------

INSERT INTO `hakuna_matata`.`guest`
	(`guest_id`,
    `name`,
	`surname`,
	`email_address`,
	`phone_number`)
VALUES
	(1,
    "Bob",
	"Bobson",
	"Bob@gmail.com",
	"1234567890"),
    (2,
    "Fred",
    "Fredson",
    "Fred@gmail.com",
    "3216549870"),
    (3,
    "Bobette",
    "Bobetteson",
    "Bobette@bmail.com",
    "9876543210");
    
INSERT INTO `hakuna_matata`.`rooms`
	(`room_id`,
    `room_num`,
	`description`)
VALUES
	(1,
    "1A",
	"Block 1 Room A"),
	(2,
    "1B",
	"Block 1 Room B"),
	(3,
    "2A",
	"Block 2 Room A"),
	(4,
    "2B",
	"Block 2 Room B");

INSERT INTO `hakuna_matata`.`reservation`
	(`check_in_date`,
	`check_out_date`,
	`guest_id`,
	`room_id`)
VALUES
	(DATE('2020-02-29'),
	DATE('2020-03-05'),
	2,
	2),
    (DATE('2020-02-29'),
	DATE('2020-03-06'),
	3,
	1),
    (DATE('2020-03-06'),
	DATE('2020-03-10'),
	1,
	2);




-- MySQL Script generated by MySQL Workbench
-- Tue Feb  4 17:43:24 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema delectable
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema delectable
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `delectable` DEFAULT CHARACTER SET utf8 ;
USE `delectable` ;

-- -----------------------------------------------------
-- Table `delectable`.`administrator`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`administrator` ;

CREATE TABLE IF NOT EXISTS `delectable`.`administrator` (
  `admin_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_first_name` VARCHAR(64) NOT NULL,
  `admin_last_name` VARCHAR(64) NOT NULL,
  `admin_username` VARCHAR(64) NOT NULL,
  `admin_password` VARCHAR(255) NOT NULL,
  `admin_email` VARCHAR(255) NOT NULL,
  `admin_access` INT UNSIGNED NOT NULL,
  `admin_status` INT UNSIGNED NOT NULL,
  `admin_last_login` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_gender` VARCHAR(32) NOT NULL,
  `admin_birth_date` DATE NOT NULL,
  `admin_address_1` VARCHAR(64) NOT NULL,
  `admin_address_2` VARCHAR(64) NULL,
  `admin_city` VARCHAR(64) NOT NULL,
  `admin_state` VARCHAR(64) NOT NULL,
  `admin_postal_code` VARCHAR(64) NOT NULL,
  `admin_phone` VARCHAR(64) NOT NULL,
  `admin_hire_date` DATE NOT NULL,
  `admin_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `admin_username_UNIQUE` ON `delectable`.`administrator` (`admin_username` ASC) VISIBLE;

CREATE UNIQUE INDEX `admin_email_UNIQUE` ON `delectable`.`administrator` (`admin_email` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`restaurant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`restaurant` ;

CREATE TABLE IF NOT EXISTS `delectable`.`restaurant` (
  `res_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `res_name` VARCHAR(128) NOT NULL,
  `res_slogan` VARCHAR(128) NULL,
  `res_description` TEXT NULL,
  `res_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `res_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`res_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `delectable`.`location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`location` ;

CREATE TABLE IF NOT EXISTS `delectable`.`location` (
  `loc_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `loc_address_1` VARCHAR(64) NOT NULL,
  `loc_address_2` VARCHAR(64) NULL,
  `loc_city` VARCHAR(64) NOT NULL,
  `loc_state` VARCHAR(64) NOT NULL,
  `loc_postal_code` VARCHAR(64) NOT NULL,
  `loc_phone` VARCHAR(64) NOT NULL,
  `loc_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loc_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `loc_timeslot` INT UNSIGNED NOT NULL DEFAULT 60,
  `loc_reservation_fee` DECIMAL(4,2) UNSIGNED NULL,
  `loc_overtime` INT UNSIGNED NOT NULL DEFAULT 30,
  `loc_overtime_fee` DECIMAL(4,2) UNSIGNED NULL,
  `fk_res_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`loc_id`),
  CONSTRAINT `fk_location_res_id`
    FOREIGN KEY (`fk_res_id`)
    REFERENCES `delectable`.`restaurant` (`res_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_res_id_idx` ON `delectable`.`location` (`fk_res_id` ASC) VISIBLE;

-- -----------------------------------------------------
-- Table `delectable`.`location_hours`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`location_hours` ;

CREATE TABLE IF NOT EXISTS `delectable`.`location_hours` (
  `hours_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `hours_day` INT UNSIGNED NOT NULL,
  `hours_open` TIME NOT NULL,
  `hours_close` TIME NOT NULL,
  `hours_valid_from` DATE DEFAULT NULL,
  `hours_valid_thru` DATE DEFAULT NULL,
  `fk_loc_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`hours_id`),
  CONSTRAINT `fk_location_hours_loc_id`
    FOREIGN KEY (`fk_loc_id`)
    REFERENCES `delectable`.`location` (`loc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_loc_id_idx` ON `delectable`.`location_hours` (`fk_loc_id` ASC) VISIBLE;

-- -----------------------------------------------------
-- Table `delectable`.`employee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`employee` ;

CREATE TABLE IF NOT EXISTS `delectable`.`employee` (
  `emp_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `emp_first_name` VARCHAR(64) NOT NULL,
  `emp_last_name` VARCHAR(64) NOT NULL,
  `emp_username` VARCHAR(64) NOT NULL,
  `emp_password` VARCHAR(255) NOT NULL,
  `emp_email` VARCHAR(255) NOT NULL,
  `emp_status` INT UNSIGNED NOT NULL DEFAULT 1,
  `emp_last_login` TIMESTAMP NULL DEFAULT NULL,
  `emp_gender` VARCHAR(32) NULL,
  `emp_birth_date` DATE NULL,
  `emp_address_1` VARCHAR(64) NULL,
  `emp_address_2` VARCHAR(64) NULL,
  `emp_city` VARCHAR(64) NULL,
  `emp_state` VARCHAR(64) NULL,
  `emp_postal_code` VARCHAR(64) NULL,
  `emp_phone` VARCHAR(64) NULL,
  `emp_pay_type` BIT(1) NULL,
  `emp_pay_rate` DECIMAL(15,2) NULL,
  `emp_job` VARCHAR(64) NULL,
  `emp_manager` BIT(1) NOT NULL DEFAULT 0,
  `emp_hire_date` DATE NULL,
  `emp_dismissed` TIMESTAMP NULL,
  `emp_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emp_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_loc_id` INT UNSIGNED NULL,
  PRIMARY KEY (`emp_id`),
  CONSTRAINT `fk_employee_loc_id`
    FOREIGN KEY (`fk_loc_id`)
    REFERENCES `delectable`.`location` (`loc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `emp_email_UNIQUE` ON `delectable`.`employee` (`emp_email` ASC) VISIBLE;

CREATE INDEX `fk_loc_id_idx` ON `delectable`.`employee` (`fk_loc_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`salary`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`salary` ;

CREATE TABLE IF NOT EXISTS `delectable`.`salary` (
  `salary_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `salary_start_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `salary_end_date` TIMESTAMP NULL,
  `salary_pay_rate` DECIMAL(10,2) UNSIGNED NULL,
  `fk_emp_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`salary_id`),
  CONSTRAINT `fk_salary_emp_id`
    FOREIGN KEY (`fk_emp_id`)
    REFERENCES `delectable`.`employee` (`emp_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_emp_id_idx` ON `delectable`.`salary` (`fk_emp_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`category` ;

CREATE TABLE IF NOT EXISTS `delectable`.`category` (
  `cat_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` VARCHAR(64) NOT NULL,
  `cat_description` VARCHAR(64) NOT NULL,
  `cat_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `delectable`.`menu_item_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`menu_item_category` ;

CREATE TABLE IF NOT EXISTS `delectable`.`menu_item_category` (
  `item_cat_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_cat_name` VARCHAR(64) NOT NULL,
  `item_cat_description` VARCHAR(255) NULL,
  `item_status` BIT(1) NOT NULL DEFAULT 1,
  `fk_loc_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`item_cat_id`),
  CONSTRAINT `fk_menu_item_loc_id`
    FOREIGN KEY (`fk_loc_id`)
    REFERENCES `delectable`.`location` (`loc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `item_cat_name_UNIQUE` ON `delectable`.`menu_item_category` (`item_cat_name` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`menu_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`menu_item` ;

CREATE TABLE IF NOT EXISTS `delectable`.`menu_item` (
  `item_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` VARCHAR(64) NOT NULL,
  `item_description` VARCHAR(255) NULL,
  `item_price` DECIMAL(4,2) NOT NULL,
  `fk_item_cat_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`item_id`),
  CONSTRAINT `fk_menu_item_item_cat_id`
    FOREIGN KEY (`fk_item_cat_id`)
    REFERENCES `delectable`.`menu_item_category` (`item_cat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_item_cat_id_idx` ON `delectable`.`menu_item` (`fk_item_cat_id` ASC) VISIBLE;

CREATE INDEX `fk_loc_id_idx` ON `delectable`.`menu_item` (`fk_loc_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`menu_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`menu_category` ;

CREATE TABLE IF NOT EXISTS `delectable`.`menu_category` (
  `fk_loc_id` INT UNSIGNED NOT NULL,
  `fk_cat_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `fk_menu_category_res_id`
    FOREIGN KEY (`fk_loc_id`)
    REFERENCES `delectable`.`restaurant` (`res_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_category_cat_id`
    FOREIGN KEY (`fk_cat_id`)
    REFERENCES `delectable`.`category` (`cat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_cat_id_idx` ON `delectable`.`menu_category` (`fk_cat_id` ASC) VISIBLE;

CREATE INDEX `fk_res_id_idx` ON `delectable`.`menu_category` (`fk_loc_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`customer` ;

CREATE TABLE IF NOT EXISTS `delectable`.`customer` (
  `cust_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cust_first_name` VARCHAR(64) NOT NULL,
  `cust_last_name` VARCHAR(64) NOT NULL,
  `cust_username` VARCHAR(64) NOT NULL,
  `cust_password` VARCHAR(255) NOT NULL,
  `cust_email` VARCHAR(255) NOT NULL,
  `cust_access` INT NOT NULL,
  `cust_status` INT NOT NULL,
  `cust_last_login` TIMESTAMP NULL,
  `cust_address_1` VARCHAR(64) NULL,
  `cust_address_2` VARCHAR(64) NULL,
  `cust_city` VARCHAR(64) NULL,
  `cust_state` VARCHAR(64) NULL,
  `cust_postal_code` VARCHAR(64) NULL,
  `cust_country` VARCHAR(64) NULL,
  `cust_phone` VARCHAR(64) NULL,
  `cust_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cust_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cust_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `delectable`.`reservation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`reservation` ;

CREATE TABLE IF NOT EXISTS `delectable`.`reservation` (
  `rsvn_id` INT UNSIGNED NOT NULL,
  `rsvn_timeslot` TIMESTAMP NOT NULL,
  `rsvn_length` INT NOT NULL,
  `rsvn_status` VARCHAR(64) NOT NULL,
  `rsvn_created` TIMESTAMP NOT NULL,
  `rsvn_updated` TIMESTAMP NULL,
  `fk_loc_id` INT UNSIGNED NOT NULL,
  `fk_cust_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`rsvn_id`),
  CONSTRAINT `fk_reservation_loc_id`
    FOREIGN KEY (`fk_loc_id`)
    REFERENCES `delectable`.`location` (`loc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservation_cust_id`
    FOREIGN KEY (`fk_cust_id`)
    REFERENCES `delectable`.`customer` (`cust_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_loc_id_idx` ON `delectable`.`reservation` (`fk_loc_id` ASC) VISIBLE;

CREATE INDEX `fk_cust_id_idx` ON `delectable`.`reservation` (`fk_cust_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`reservation_staff`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`reservation_staff` ;

CREATE TABLE IF NOT EXISTS `delectable`.`reservation_staff` (
  `fk_rsvn_id` INT UNSIGNED NOT NULL,
  `fk_emp_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `fk_reservation_staff_rsvn_id`
    FOREIGN KEY (`fk_rsvn_id`)
    REFERENCES `delectable`.`reservation` (`rsvn_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservation_staff_emp_id`
    FOREIGN KEY (`fk_emp_id`)
    REFERENCES `delectable`.`employee` (`emp_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_rsvn_id_idx` ON `delectable`.`reservation_staff` (`fk_rsvn_id` ASC) VISIBLE;

CREATE INDEX `fk_emp_id_idx` ON `delectable`.`reservation_staff` (`fk_emp_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`order` ;

CREATE TABLE IF NOT EXISTS `delectable`.`order` (
  `order_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_total` DECIMAL(10,2) UNSIGNED NOT NULL,
  `order_status` VARCHAR(64) NOT NULL,
  `order_message` VARCHAR(255) NULL,
  `order_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_updated` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fk_cust_id` INT UNSIGNED NOT NULL,
  `fk_rsvn_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`order_id`),
  CONSTRAINT `fk_order_cust_id`
    FOREIGN KEY (`fk_cust_id`)
    REFERENCES `delectable`.`customer` (`cust_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_rsvn_id`
    FOREIGN KEY (`fk_rsvn_id`)
    REFERENCES `delectable`.`reservation` (`rsvn_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_cust_id_idx` ON `delectable`.`order` (`fk_cust_id` ASC) VISIBLE;

CREATE INDEX `fk_rsvn_id_idx` ON `delectable`.`order` (`fk_rsvn_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`order_item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`order_item` ;

CREATE TABLE IF NOT EXISTS `delectable`.`order_item` (
  `order_price` DECIMAL(4,2) NULL,
  `order_quantity` INT UNSIGNED NOT NULL,
  `fk_order_id` INT UNSIGNED NOT NULL,
  `fk_menu_item_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `fk_order_item_order_id`
    FOREIGN KEY (`fk_order_id`)
    REFERENCES `delectable`.`order` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_item_menu_item_id`
    FOREIGN KEY (`fk_menu_item_id`)
    REFERENCES `delectable`.`menu_item` (`item_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_order_id_idx` ON `delectable`.`order_item` (`fk_order_id` ASC) VISIBLE;

CREATE INDEX `fk_menu_item_id_idx` ON `delectable`.`order_item` (`fk_menu_item_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`table`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`table` ;

CREATE TABLE IF NOT EXISTS `delectable`.`table` (
  `table_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_uuid` VARCHAR(64) NOT NULL,
  `table_number` VARCHAR(64) NOT NULL,
  `table_seats` INT NOT NULL DEFAULT 1,
  `table_type` ENUM('circle', 'rectangle', 'square') NOT NULL,
  `table_height` INT NOT NULL,
  `table_width` INT NOT NULL,
  `table_left` INT NOT NULL,
  `table_top` INT NOT NULL,
  `table_angle` INT NOT NULL,
  `fk_loc_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`table_id`),
  CONSTRAINT `fk_table_loc_id`
    FOREIGN KEY (`fk_loc_id`)
    REFERENCES `delectable`.`location` (`loc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_loc_id_idx` ON `delectable`.`table` (`fk_loc_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`table_reservation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`table_reservation` ;

CREATE TABLE IF NOT EXISTS `delectable`.`table_reservation` (
  `table_rsvn_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_table_id` INT UNSIGNED NOT NULL,
  `fk_rsvn_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`table_rsvn_id`),
  CONSTRAINT `fk_table_reservation_table_id`
    FOREIGN KEY (`fk_table_id`)
    REFERENCES `delectable`.`table` (`table_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table_reservation_rsvn_id`
    FOREIGN KEY (`fk_rsvn_id`)
    REFERENCES `delectable`.`reservation` (`rsvn_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_table_id_idx` ON `delectable`.`table_reservation` (`fk_table_id` ASC) VISIBLE;

CREATE INDEX `fk_rsvn_id_idx` ON `delectable`.`table_reservation` (`fk_rsvn_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`review`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`review` ;

CREATE TABLE IF NOT EXISTS `delectable`.`review` (
  `review_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `review_text` TEXT NOT NULL,
  `review_rating` INT(1) UNSIGNED NOT NULL,
  `review_thumbs_up` INT NOT NULL DEFAULT 0,
  `review_thumbs_down` INT NOT NULL DEFAULT 0,
  `fk_cust_id` INT UNSIGNED NOT NULL,
  `fk_rsvn_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`review_id`),
  CONSTRAINT `fk_review_cust_id`
    FOREIGN KEY (`fk_cust_id`)
    REFERENCES `delectable`.`customer` (`cust_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_review_rsvn_id`
    FOREIGN KEY (`fk_rsvn_id`)
    REFERENCES `delectable`.`reservation` (`rsvn_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_cust_id_idx` ON `delectable`.`review` (`fk_cust_id` ASC) VISIBLE;

CREATE INDEX `fk_rsvn_id_idx` ON `delectable`.`review` (`fk_rsvn_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`payment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`payment` ;

CREATE TABLE IF NOT EXISTS `delectable`.`payment` (
  `pay_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pay_token` VARCHAR(128) NOT NULL,
  `pay_transaction` VARCHAR(128) NOT NULL,
  `pay_card_type` VARCHAR(32) NOT NULL,
  `pay_brand` VARCHAR(32) NOT NULL,
  `pay_last_digits` VARCHAR(4) NOT NULL,
  `pay_expiration` DATE NOT NULL,
  `pay_status` VARCHAR(32) NOT NULL,
  `pay_amount` DECIMAL(6,2) UNSIGNED NOT NULL,
  `pay_refund_status` VARCHAR(32) NULL,
  `pay_refund` DECIMAL(6,2) UNSIGNED NULL,
  `fk_order_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`pay_id`),
  CONSTRAINT `fk_payment_order_id`
    FOREIGN KEY (`fk_order_id`)
    REFERENCES `delectable`.`order` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_order_id_idx` ON `delectable`.`payment` (`fk_order_id` ASC) VISIBLE;

CREATE UNIQUE INDEX `pay_token_UNIQUE` ON `delectable`.`payment` (`pay_token` ASC) VISIBLE;

-- -----------------------------------------------------
-- Table `delectable`.`location_hours`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`location_hours` ;

CREATE TABLE IF NOT EXISTS `delectable`.`location_hours` (
  `hours_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `hours_day` INT UNSIGNED NOT NULL,
  `hours_open` TIME NOT NULL DEFAULT "8:00",
  `hours_close` TIME NOT NULL DEFAULT "20:00",
  `hours_valid_from` DATE NOT NULL,
  `hours_valid_thru` DATE DEFAULT NULL,
  `fk_loc_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`hours_id`),
  CONSTRAINT `fk_location_hours_loc_id`
    FOREIGN KEY (`fk_loc_id`)
    REFERENCES `delectable`.`location` (`loc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_loc_id_idx` ON `delectable`.`location_hours` (`fk_loc_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `delectable`.`object`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `delectable`.`object` ;

CREATE TABLE IF NOT EXISTS `delectable`.`object` (
  `object_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `object_uuid` VARCHAR(64) NOT NULL,
  `object_type` ENUM('other', 'chair') NOT NULL,
  `object_height` INT NOT NULL,
  `object_width` INT NOT NULL,
  `object_left` INT NOT NULL,
  `object_top` INT NOT NULL,
  `object_angle` INT NOT NULL,
  `fk_loc_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`object_id`),
  CONSTRAINT `fk_object_loc_id`
    FOREIGN KEY (`fk_loc_id`)
    REFERENCES `delectable`.`location` (`loc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `delectable`;

DELIMITER $$

USE `delectable`$$
DROP TRIGGER IF EXISTS `delectable`.`salary_BEFORE_INSERT` $$
USE `delectable`$$
CREATE DEFINER = CURRENT_USER TRIGGER `delectable`.`salary_BEFORE_INSERT` BEFORE INSERT ON `salary` FOR EACH ROW
BEGIN
SET NEW.salary_pay_rate = (SELECT emp_pay_rate FROM employee WHERE emp_id = NEW.fk_emp_id);
END$$


USE `delectable`$$
DROP TRIGGER IF EXISTS `delectable`.`order_item_BEFORE_INSERT` $$
USE `delectable`$$
CREATE DEFINER = CURRENT_USER TRIGGER `delectable`.`order_item_BEFORE_INSERT` BEFORE INSERT ON `order_item` FOR EACH ROW
BEGIN
SET NEW.order_price = (SELECT item_price FROM menu_item WHERE item_id = NEW.fk_menu_item_id);
END$$

USE `delectable`$$
DROP TRIGGER IF EXISTS `delectable`.`hours_AFTER_INSERT` $$
USE `delectable`$$
CREATE DEFINER = CURRENT_USER TRIGGER `delectable`.`hours_AFTER_INSERT` AFTER INSERT ON `location` FOR EACH ROW
BEGIN
  DECLARE x INT;
  DECLARE d INT;
  SET x = 7;
  SET d = 1;
  WHILE x > 0 DO
    INSERT INTO location_hours(hours_day, hours_valid_from, fk_loc_id) VALUES (d, CURRENT_DATE, NEW.loc_id);
    SET x = x - 1;
    SET d = d + 1;
  END WHILE;
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- TEST DATA
INSERT INTO administrator VALUES 
(1, 'Esteban', 'Rodriguez', 'esteban', '$2y$10$t2QL6MJRS7R81F/Uh9xW1eEs9JIW10Z9aMW/tT6WIdwOo4E6CtPIG', 'esteban@esteban.com', 1, 1, CURRENT_TIMESTAMP, 'Male', '1994-07-05', '123 Street Ave', NULL, 'Bakersfield', 'California', '93307', '661-123-4567', '2020-02-04', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO restaurant (res_name, res_slogan, res_description) VALUES ('BANGABURGER', 'Deliciousness with a BANG!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies urna sed rutrum lobortis. Nullam imperdiet libero et dignissim placerat. Etiam nunc massa, elementum id dui et, mattis iaculis tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse volutpat ante lectus, quis varius nisi tempus ac.');

INSERT INTO location (loc_address_1, loc_address_2, loc_city, loc_state, loc_postal_code, loc_phone, fk_res_id)
VALUES ('2550 California Ave', 'Suite #200', 'Bakersfield', 'California', '93308', '(661)-844-7071', 1);
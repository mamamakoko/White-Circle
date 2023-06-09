-- MySQL Script generated by MySQL Workbench
-- Thu Apr  6 15:17:09 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema White_Circle
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema White_Circle
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `White_Circle` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ;
USE `White_Circle` ;

-- -----------------------------------------------------
-- Table `White_Circle`.`Customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Customers` (
  `Customers_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Customers_Email` VARCHAR(45) NOT NULL,
  `Customers_Password` VARCHAR(45) NOT NULL,
  `Customers_Phone` VARCHAR(11) NOT NULL,
  `Customers_FirstName` VARCHAR(45) NOT NULL,
  `Customers_LastName` VARCHAR(45) NOT NULL,
  `Customers_City` VARCHAR(45) NOT NULL,
  `Customers_State` VARCHAR(45) NOT NULL,
  `Customers_Zip` VARCHAR(45) NOT NULL,
  `Customers_Country` VARCHAR(45) NOT NULL,
  `Customers_Address1` VARCHAR(45) NOT NULL,
  `Customers_Address2` VARCHAR(45) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`Customers_ID`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `White_Circle`.`Product_Categories`
-- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `White_Circle`.`Product_Categories` (
--   `CatPro_ID` INT(10) NOT NULL AUTO_INCREMENT,
--   `Categories_ID` INT(10) NOT NULL,
--   `Categories_Name` VARCHAR(45) NOT NULL,
--   `Product_ID` INT(10) NOT NULL,
--   `Product_Name` VARCHAR(50) NOT NULL,
--   `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
--   `update_time` TIMESTAMP NULL,
--   PRIMARY KEY (`CatPro_ID`))
-- ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `White_Circle`.`Categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Categories` (
  `Categories_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Categories_Name` VARCHAR(45) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`Categories_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `White_Circle`.`Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Products` (
  `Product_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Categories_ID` INT(10) NOT NULL,
  `Product_Name` VARCHAR(50) NOT NULL,
  `Product_Price` DECIMAL(10,2) NOT NULL,
  `Product_Weight` DECIMAL(10,2) NOT NULL,
  `Product_Thumbnail` VARCHAR(100) BINARY NOT NULL,
  `Product_Stock` INT(11) NOT NULL,
  `Product_Description` TEXT NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`Product_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `White_Circle`.`Product_Images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Products_images` (
  `ProductImages_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Product_ID` INT(10) NOT NULL,
  `Product_Image` VARCHAR(255) BINARY NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`ProductImages_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `White_Circle`.`Orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Orders` (
  `Order_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Customers_ID` INT(10) NOT NULL,
  `Order_Amount` DECIMAL(10,2) NOT NULL,
  `Order_ShipName` VARCHAR(100) NOT NULL,
  `Order_Address` VARCHAR(100) NOT NULL,
  `Order_City` VARCHAR(45) NOT NULL,
  `Order_State` VARCHAR(45) NOT NULL,
  `Order_Zip` VARCHAR(45) NOT NULL,
  `Order_Country` VARCHAR(45) NOT NULL,
  `Order_Email` VARCHAR(45) NOT NULL,
  `Order_TrackingNumber` INT(14) NOT NULL,
  `Order_Quantity` INT(10) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`Order_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `White_Circle`.`Orders_Items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Orders_Items` (
  `Order_ItemID` INT(10) NOT NULL AUTO_INCREMENT,
  `Order_ID` INT(10) NOT NULL,
  `Product_ID` INT(10) NOT NULL,
  `Order_Amount` DECIMAL(10,2) NULL,
  `Order_Quantity` INT(10) NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`Order_ItemID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `White_Circle`.`Reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Reviews` (
  `Review_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Customers_ID` INT(10) NOT NULL,
  `Product_ID` INT(10) NOT NULL,
  `Rating` INT(5) NOT NULL,
  `Reviews` TEXT NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`Review_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `White_Circle`.`Cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Cart` (
  `Cart_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Customers_ID` INT(10) NOT NULL,
  `Product_ID` INT(10) NOT NULL,
  `Cart_Quantity` INT(10) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`Cart_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `White_Circle`.`Payments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `White_Circle`.`Payments` (
  `Payments_ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Order_ID` INT(10) NOT NULL,
  `Customer_ID` INT(10) NOT NULL,
  `Payment_Method` VARCHAR(45) NOT NULL,
  `Payment_Amount` DECIMAL(10,2) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`Payments_ID`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

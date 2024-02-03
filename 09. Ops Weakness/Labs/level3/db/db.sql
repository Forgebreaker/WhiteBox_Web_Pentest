CREATE DATABASE IF NOT EXISTS myDB;

USE myDB;

DROP TABLE IF EXISTS `Users`;


CREATE TABLE `Users` (
    `phone_number` VARCHAR(10) NOT NULL,
    `otp` VARCHAR(4) DEFAULT NULL,
    `opt_created_time` VARCHAR(100)
);


INSERT INTO Users(phone_number, otp, opt_created_time) values ('0123456789',NULL, '2022-07-08 09:53:41');
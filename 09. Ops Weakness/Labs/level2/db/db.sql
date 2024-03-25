CREATE DATABASE IF NOT EXISTS myDB;

USE myDB;

DROP TABLE IF EXISTS `Users`;


CREATE TABLE `Users` (
    `email` VARCHAR(10) NOT NULL,
    `otp` VARCHAR(4) DEFAULT NULL,
    `opt_created_time` VARCHAR(100)
);


INSERT INTO Users(email, otp, opt_created_time) values ('superadmin@bountyboys.com',NULL, '2024-03-03 10:33:09');
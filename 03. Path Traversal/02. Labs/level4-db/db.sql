create database IF NOT EXISTS myDB;

use myDB;

CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    points INT DEFAULT 0,
    name VARCHAR(30) NOT NULL UNIQUE
);

INSERT INTO `users`(name, points) VALUES ('admin', 100000);

create database IF NOT EXISTS myDB;

use myDB;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

INSERT INTO `users` (`id`, `username`, `password`) VALUES (1, 'admin', 'admin123');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (2, 'trudie92', 'trudie92');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (3, 'deckow.vernie', 'abc123');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (4, 'guest', '123456');
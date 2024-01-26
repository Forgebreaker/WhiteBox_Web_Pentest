CREATE DATABASE IF NOT EXISTS plaintext_db;
CREATE DATABASE IF NOT EXISTS hashed_db;
CREATE DATABASE IF NOT EXISTS posts_db;
CREATE DATABASE IF NOT EXISTS advanced_db;
GRANT SELECT, INSERT, UPDATE ON *.* TO 'db_user'@'%';
#==================================================================================================#
USE plaintext_db; -- This database stores passwords as plaintext, use for level 1-3

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

INSERT INTO `users` (`id`, `username`, `password`) VALUES (1, 'conmeo', 'meow');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (2, 'trudie92', '123456');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (3, 'deckow.vernie', '123456789');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (4, 'alta35', 'qwerty');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (5, 'nikki13', 'password');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (6, 'ritchie.benton', '1q2w3e');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (7, 'kzboncak', 'guest');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (8, 'ulueilwitz', 'luzit2000');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (9, 'maegan.roob', 'football');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (10, 'nicholaus.ledner', 'master');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (11, 'admin', 'impossible@password');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (12, 'maria.gulgowski', 'qazwsxedc');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (13, 'delphia69', 'super123');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (14, 'ondricka.judd', 'pokemon');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (15, 'eleanora36', 'eleanora36');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (16, 'qkling', 'sunshine');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (17, 'pconsidine', '1234554321');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (18, 'vcruickshank', 'googledummy');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (19, 'mozelle31', 'wow12345');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (20, 'orunte', 'michelle');

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
);

INSERT INTO `test` VALUES ('aan', 'haha'), ('bo8', 'mothaiba');
#==================================================================================================#
USE hashed_db; -- This database stores MD5 hash of plaintext passwords, use for level 4-5

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

INSERT INTO `users` (`id`, `username`, `password`) VALUES (1, 'conmeo', '4a4be40c96ac6314e91d93f38043a634'); -- pass: meow
INSERT INTO `users` (`id`, `username`, `password`) VALUES (2, 'trudie92', '4520ae162c0aa006992454ad776377e3');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (3, 'deckow.vernie', '30ecdb365e4246775b7def432763b831');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (4, 'alta35', 'b66f2dbee288882f8c95be9900fdde46');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (5, 'nikki13', '2bc8a8d40f24d99d69365851e507a269');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (6, 'ritchie.benton', '056125d8f71d675d3d5d6284f91ba919');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (7, 'kzboncak', '2756b329bfc05b6238458442cf6f4cd9');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (8, 'ulueilwitz', '2d1040104f4ca09c4afa876f60cd881a');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (9, 'maegan.roob', 'd1c34701ced2dfeab09866fda9ace6bf');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (10, 'nicholaus.ledner', '95beceb552a962a254f04a4e94864e69');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (11, 'admin', '13442cabe383b86d1e1d2ce653845349');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (12, 'maria.gulgowski', '486a0006c25e757ce1f5ac3464e1438e');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (13, 'delphia69', 'aaac624267820628a52955ec628ce1e8');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (14, 'ondricka.judd', '65a909e08fe3441d6cdee7e02c239e54');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (15, 'eleanora36', 'cf5d6dec19e4c57c13db9787ab9e3bf5');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (16, 'qkling', '97903d820ac5d50e58697fd61df0238b');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (17, 'pconsidine', 'f8044b1baba0ca293584b9ba3048400f');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (18, 'vcruickshank', '32a6decd68de1c1cc3a943a79eccb81d');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (19, 'mozelle31', '6cb942b5f4cec7270045203551997b90');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (20, 'orunte', '6876c2f76f77d658cf40c967679252b0');

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
);

INSERT INTO `test` VALUES ('aan', 'haha'), ('bo8', 'mothaiba');
#==================================================================================================#
USE posts_db; -- This database use for level 6

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `posts` (`id`, `content`) VALUES (1, 'https://blog.cyberjutsu.io/2021/08/09/hoc-an-toan-thong-tin/');
INSERT INTO `posts` (`id`, `content`) VALUES (2, 'https://blog.cyberjutsu.io/2021/06/02/IDOL-streamer-vs-XSS/');
INSERT INTO `posts` (`id`, `content`) VALUES (3, 'https://blog.cyberjutsu.io/2021/05/13/HTML-sanitizer-vs-XSS/');

DROP TABLE IF EXISTS `secret6`;

CREATE TABLE `secret6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `secret6` (`id`, `content`) VALUES (1, 'CBJS{FAKE_FLAG_FAKE_FLAG}');
#==================================================================================================#
USE advanced_db; -- This database use for level 7-8

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

INSERT INTO `users` (`id`, `username`, `password`) VALUES (1, 'conmeo', '4a4be40c96ac6314e91d93f38043a634'); -- pass: meow
INSERT INTO `users` (`id`, `username`, `password`) VALUES (2, 'trudie92', '4520ae162c0aa006992454ad776377e3');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (3, 'deckow.vernie', '30ecdb365e4246775b7def432763b831');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (4, 'alta35', 'b66f2dbee288882f8c95be9900fdde46');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (5, 'nikki13', '2bc8a8d40f24d99d69365851e507a269');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (6, 'ritchie.benton', '056125d8f71d675d3d5d6284f91ba919');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (7, 'kzboncak', '2756b329bfc05b6238458442cf6f4cd9');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (8, 'ulueilwitz', '2d1040104f4ca09c4afa876f60cd881a');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (9, 'maegan.roob', 'd1c34701ced2dfeab09866fda9ace6bf');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (10, 'nicholaus.ledner', '95beceb552a962a254f04a4e94864e69');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (11, 'admin', '13442cabe383b86d1e1d2ce653845349');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (12, 'maria.gulgowski', '486a0006c25e757ce1f5ac3464e1438e');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (13, 'delphia69', 'aaac624267820628a52955ec628ce1e8');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (14, 'ondricka.judd', '65a909e08fe3441d6cdee7e02c239e54');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (15, 'eleanora36', 'cf5d6dec19e4c57c13db9787ab9e3bf5');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (16, 'qkling', '97903d820ac5d50e58697fd61df0238b');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (17, 'pconsidine', 'f8044b1baba0ca293584b9ba3048400f');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (18, 'vcruickshank', '32a6decd68de1c1cc3a943a79eccb81d');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (19, 'mozelle31', '6cb942b5f4cec7270045203551997b90');
INSERT INTO `users` (`id`, `username`, `password`) VALUES (20, 'orunte', '6876c2f76f77d658cf40c967679252b0');
INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (21, 'CBJS_FLAG', 'CBJS{FAKE_FLAG_FAKE_FLAG}', 'cbjs@cyberjutsu.io');

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
);

INSERT INTO `test` VALUES ('aan', 'haha'), ('bo8', 'mothaiba');
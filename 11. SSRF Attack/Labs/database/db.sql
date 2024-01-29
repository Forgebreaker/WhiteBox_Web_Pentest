CREATE DATABASE IF NOT EXISTS myDB;

use myDB;

DROP TABLE IF EXISTS `Posts`;

CREATE TABLE `Posts`(
    `id` INT NOT NULL PRIMARY KEY,
    `title` TEXT NOT NULL,
    `content` TEXT NOT NULL, 
    `author` VARCHAR(50) NOT NULL
);

INSERT INTO Posts(id,title, content, author) VALUES(1, 'SSRF TUTORIAL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pellentesque, libero sit amet ultricies semper, sapien arcu luctus nisi, quis sagittis tellus enim efficitur lorem. In fringilla feugiat metus, eu faucibus lacus condimentum id. Nam et lorem non augue vestibulum tempor vitae sit amet justo. Donec ultrices in tortor vel vulputate. ', 'admin');

INSERT INTO Posts(id,title, content, author) VALUES(2, 'XSS TUTORIAL', 'Nunc bibendum sapien sapien, id condimentum ligula aliquam sit amet. Mauris velit enim, tempor sed varius pellentesque, sagittis ut sapien. Phasellus a auctor ante..', 'admin');

INSERT INTO Posts(id,title, content, author) VALUES(3, 'RECON TUTORIAL', 'Ut vel arcu viverra, commodo dolor sit amet, ultrices elit. Fusce metus dui, consectetur in commodo eget, tempus eu diam. Nam laoreet massa eros, a porta diam volutpat sit amet. Integer a diam dapibus, posuere arcu in, mattis dolor.', 'admin');


DROP TABLE IF EXISTS `Flag`;

CREATE TABLE `Flag` (
    `secret` TEXT NOT NULL 
);

INSERT INTO Flag(secret) VALUES('Flag3:CBJS{FAKE_FLAG_FAKE_FLAG}');

create database IF NOT EXISTS database_1;
CREATE USER 'db1_user'@'%' IDENTIFIED BY 'db1_password';
GRANT SELECT, INSERT ON database_1.* TO 'db1_user'@'%';

USE database_1;

CREATE TABLE users (
  user_id int primary key auto_increment,
  username varchar(30) not null,
  password varchar(40) not null
);

INSERT INTO users (username, password) VALUES ('admin','thisisapassword');
INSERT INTO users (username, password) VALUES ('crush','1z8m81z2y1zy28z');

CREATE TABLE posts (
  post_id int primary key auto_increment,
  content text,
  author_id int not null,
  public tinyint(1) not null
);

INSERT INTO posts (content, author_id, public) VALUES ('Welcome to Fakebook! Fakebook helps you connect and stalk your crush', 1, 1);
INSERT INTO posts (content, author_id, public) VALUES ('Nice catch! You are rewarded XXXX$ by Fakebook', 1, 0);
INSERT INTO posts (content, author_id, public) VALUES ('Thich nhat may anh hacker <3 CBJS{FAKE_FLAG_FAKE_FLAG} <3', 2, 0);
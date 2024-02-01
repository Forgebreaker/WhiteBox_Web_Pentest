create database IF NOT EXISTS database_5;
CREATE USER 'db5_user'@'%' IDENTIFIED BY 'db5_password';
GRANT SELECT, INSERT ON database_5.* TO 'db5_user'@'%';

USE database_5;

CREATE TABLE users (
  user_id int primary key auto_increment,
  username varchar(30) not null,
  password varchar(40) not null
);

INSERT INTO users (username, password) VALUES ('admin','thisisapassword');
INSERT INTO users (username, password) VALUES ('crush','1z8m81z2y1zy28z');

CREATE TABLE posts (
  post_id char(32) primary key,
  content text,
  author_id int not null,
  public tinyint(1) not null
);

INSERT INTO posts (post_id, content, author_id, public) VALUES ('b957ffad5194cb676610031a6aef2729', 'Welcome to Fakebook! Fakebook helps you connect and stalk your crush', 1, 1);
INSERT INTO posts (post_id, content, author_id, public) VALUES ('e2e408f29a4ece20b2d308d6467127bb', 'Nice catch! You are rewarded XXXX$ by Fakebook', 1, 0);
INSERT INTO posts (post_id, content, author_id, public) VALUES ('a7381cbd118b5699a69c576c7a2205ef', 'Thich nhat may anh hacker <3 CBJS{FAKE_FLAG_FAKE_FLAG} <3', 2, 0);

CREATE TABLE notifications (
  noti_id int primary key auto_increment,
  content text
);

INSERT INTO notifications (content) VALUES ('This is Fakebook version 5.0.9');
INSERT INTO notifications (content) VALUES ('Welcome to our amazing platform!');
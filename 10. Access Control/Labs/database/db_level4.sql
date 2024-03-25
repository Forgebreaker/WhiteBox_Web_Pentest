create database IF NOT EXISTS database_4;
CREATE USER 'db4_user'@'%' IDENTIFIED BY 'db4_password';
GRANT SELECT, INSERT ON database_4.* TO 'db4_user'@'%';

USE database_4;

CREATE TABLE users (
  user_id int primary key auto_increment,
  username varchar(30) not null,
  password varchar(40) not null
);

INSERT INTO users (username, password) VALUES ('admin','test');
INSERT INTO users (username, password) VALUES ('crush','test');

CREATE TABLE posts (
  post_id char(32) primary key,
  content text,
  author_id int not null,
  public tinyint(1) not null
);

INSERT INTO posts (post_id, content, author_id, public) VALUES ('b957ffad5194cb676610031a6aef2729', 'Welcome to Fakebook! Fakebook helps you connect and stalk your crush', 1, 1);
INSERT INTO posts (post_id, content, author_id, public) VALUES ('e2e408f29a4ece20b2d308d6467127bb', 'Nice catch! You are rewarded XXXX$ by Fakebook', 1, 0);
INSERT INTO posts (post_id, content, author_id, public) VALUES ('a7381cbd118b5699a69c576c7a2205ef', 'Thich nhat may anh hacker <3 CBJS{FAKE_FLAG_FAKE_FLAG} <3', 2, 0);
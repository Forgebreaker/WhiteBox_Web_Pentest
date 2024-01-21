create database IF NOT EXISTS database_3;
CREATE USER 'db3_user'@'%' IDENTIFIED BY 'db3_password';
GRANT SELECT, INSERT ON database_3.* TO 'db3_user'@'%';

USE database_3;

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

INSERT INTO posts (post_id, content, author_id, public) VALUES ('5a7041cfa5505e1f56a360b0ecbc32e3', 'Welcome to Fakebook! Fakebook helps you connect and stalk your crush', 1, 1);
INSERT INTO posts (post_id, content, author_id, public) VALUES ('843aee05febb92380748648dc6db311a', 'Nice catch! You are rewarded XXXX$ by Fakebook', 1, 0);
INSERT INTO posts (post_id, content, author_id, public) VALUES ('38405b03f1c29368beaaa94f24a1c893', 'Thich nhat may anh hacker <3 CBJS{FAKE_FLAG_FAKE_FLAG} <3', 2, 0);
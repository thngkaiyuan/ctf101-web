#!/bin/bash

service mysql start
service apache2 start
mysql -u root -pAdmin2015 -e """
drop database exampleDB;
SET PASSWORD = PASSWORD('why w0uld 4nyb0dy 3v3n 7h1nk 0f u51n6 5uch 4 l0n6 p455w0rd w17h 5p4c35?');
CREATE USER 'sqli'@'localhost' IDENTIFIED BY 'cmon lah, you can guess this?';
GRANT SELECT, INSERT, CREATE ON sqli.* TO 'sqli'@'localhost';
CREATE DATABASE sqli;
USE sqli;
CREATE TABLE users (id INT NOT NULL AUTO_INCREMENT, username varchar(30) NOT NULL, password varchar(64) NOT NULL, nickname varchar(255) NOT NULL, PRIMARY KEY (id));
INSERT INTO users VALUES (null, 'admin', md5('computer'), 'superuser');
INSERT INTO users VALUES (null, 'xinan', md5('hfw98aH99a*d&fynd88Svn983j(#j*syugh'), 'the guy');
INSERT INTO users VALUES (null, 'wenyan', md5('hfw98aH99a*d&fynd88Svn983j(#j*syugh'), 'the girl');
INSERT INTO users VALUES (null, 'potato', md5('hfw98aH99a*d&fynd88Svn983j(#j*syugh'), 'the food');
INSERT INTO users VALUES (null, 'sadhi', md5('hfw98aH99a*d&fynd88Svn983j(#j*syugh'), 'the friend');
INSERT INTO users VALUES (null, 'john', md5('hfw98aH99a*d&fynd88Svn983j(#j*syugh'), 'the stranger');
"""

tail -f /dev/null

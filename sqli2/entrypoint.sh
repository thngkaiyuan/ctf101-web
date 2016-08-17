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
CREATE TABLE users (id INT NOT NULL AUTO_INCREMENT, username varchar(30) NOT NULL, password INT NOT NULL, PRIMARY KEY (id));
INSERT INTO users VALUES (null, 'admin', 7824);
INSERT INTO users VALUES (null, 'xinan', 3298);
INSERT INTO users VALUES (null, 'wenyan', 3298);
INSERT INTO users VALUES (null, 'potato', 3298);
INSERT INTO users VALUES (null, 'sadhi', 3298);
INSERT INTO users VALUES (null, 'john', 3298);
"""

tail -f /dev/null

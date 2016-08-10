#!/bin/bash

service mysql start
service apache2 start
mysql -u root -pAdmin2015 -e "drop database exampleDB; SET PASSWORD = PASSWORD('why w0uld 4nyb0dy 3v3n 7h1nk 0f u51n6 5uch 4 l0n6 p455w0rd w17h 5p4c35?');"

/bin/bash

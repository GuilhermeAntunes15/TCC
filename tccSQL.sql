create database tcc;
use tcc;

create table users(
   user_id INT NOT NULL AUTO_INCREMENT,
   user_name VARCHAR(40) NOT NULL,
   user_email VARCHAR(40) NOT NULL,
   user_passwd VARCHAR(300) NOT NULL,
   PRIMARY KEY ( user_id )
);
-- Active: 1729180487890@@127.0.0.1@3306@bienesRaices
CREATE DATABASE bienesRaices;
USE bienesRaices;
CREATE TABLE sellers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    phone VARCHAR(10)
);
CREATE TABLE propiertes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(64) NOT NULL,
    price DECIMAL (10,2) NOT NULL,
    image VARCHAR(128),
    description LONGTEXT,
    rooms INT(1),
    wc INT(1),
    garage INT(1),
    timestamp date,
    idSeller INT NOT NULL,
    Foreign Key (idSeller) REFERENCES sellers(id)
);


insert into sellers(name, email, phone)
values ("Andres Zaragoza", "andres23@gmiail.com", "6645657897")
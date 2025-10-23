create database isaac;

use isaac;

create table items(
    id_item int AUTO_INCREMENT PRIMARY key,
    nombre varchar(100),
    tipo varchar(100),
    efecto varchar(100),
    danho_extra varchar(100)
);
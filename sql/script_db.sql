/**
    @file script_db.sql
    @description Script para realizar la base de datos de la aplicación Aprende Inglés.
    @author Julio Antonio Ramos Gago <jramosgago.guadalupe@alumnado.fundacionloyola.net>.
*/

-- Creo la base de datos aprende inglés
CREATE DATABASE Aprende_Ingles;

-- Uso la base de datos creada anteriormente para crear la estructura de esta 
USE Aprende_Ingles;

-- Creo la tabla Categorías
CREATE TABLE Categorias(

    id_categoria tinyint unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(30) NOT NULL
);

-- Creo la tabla Palabras
CREATE TABLE Palabras(

    id_palabra smallint unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    espanol varchar(30) NOT NULL,
    ingles varchar(30) NOT NULL,
    audio varchar(30) NULL,
    categoria tinyint unsigned NOT NULL,
    CONSTRAINT FK_Categoria FOREIGN KEY (categoria) REFERENCES Categorias (id_categoria)
);

-- Creo la tabla Usuarios
CREATE TABLE Usuarios(

    id_usuario smallint unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email varchar(80) NOT NULL UNIQUE,
    password varchar(25) NOT NULL
);

-- Creo la tabla Prac_Ejer
CREATE TABLE Prac_Ejer(

    id_prac_ejer smallint unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fecha_hora datetime NOT NULL,
    numIntentos tinyint unsigned DEFAULT 0,
    superado char(1) NOT NULL CHECK (superado IN ('S','N')),
    usuario smallint unsigned NOT NULL,
    CONSTRAINT FK_Usuario FOREIGN KEY (usuario) REFERENCES Usuarios (id_usuario)
);

-- Creo la tabla Palabras_Ejer
CREATE TABLE Palabras_Ejer(

    id_palabra smallint unsigned,
    id_prac_ejer smallint unsigned,
    fallada char(1) NOT NULL CHECK (fallada IN ('S','N')),
    PRIMARY KEY (id_palabra, id_prac_ejer),
    CONSTRAINT FK_Palabra FOREIGN KEY (id_palabra) REFERENCES Palabras (id_palabra),
    CONSTRAINT FK_Prac_Ejer FOREIGN KEY (id_prac_ejer) REFERENCES Prac_Ejer (id_prac_ejer)
)
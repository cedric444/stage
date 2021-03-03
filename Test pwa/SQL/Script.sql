DROP DATABASE IF EXISTS testpwa;

CREATE DATABASE IF NOT EXISTS testpwa;
USE testpwa;

DROP TABLE IF EXISTS albums;
DROP TABLE IF EXISTS titres;

CREATE TABLE albums(
    idAlbum int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nomAlbum varchar(255) NOT NULL
)ENGINE=InnoDB, CHARSET=UTF8;

CREATE TABLE titres(
    idTitre int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    libelleTitre varchar(255) NOT NULL,
    idAlbum int NOT NULL
)ENGINE=InnoDB, CHARSET=UTF8;
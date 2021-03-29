DROP DATABASE IF EXISTS pizzeria;

CREATE DATABASE IF NOT EXISTS pizzeria DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE pizzeria;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS commandes;
DROP TABLE IF EXISTS produits;
DROP TABLE IF EXISTS typeProduits;
DROP TABLE IF EXISTS taillesPizzas;
DROP TABLE IF EXISTS recettes;
DROP TABLE IF EXISTS allergenes;
DROP TABLE IF EXISTS comporteProduitRecette;
DROP TABLE IF EXISTS pizzas;
DROP TABLE IF EXISTS compositions;



CREATE TABLE users(
    idUser           INT  AUTO_INCREMENT  NOT NULL PRIMARY KEY,
    nomUser          VARCHAR(100)  NOT NULL,
    prenomUser       VARCHAR(100)  NOT NULL,
    adresse          VARCHAR(255)  NOT NULL,
    codePostal       VARCHAR(5)  NOT NULL,
    ville            VARCHAR(100)  NOT NULL,
    mailUser         VARCHAR(150)  NOT NULL,
    telUser          VARCHAR(10)  NOT NULL,
    nbPointFidelite  INT(3)  NOT NULL,
    idRole           INT  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE roles(
    idRole                  INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    libelleRole             VARCHAR(14)  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;


CREATE TABLE produits(
    idProduit               INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    libelleProduit          VARCHAR(100)  NOT NULL,
    idTypeProduit           INT  NOT NULL,
    prixProduit             FLOAT    
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE typesProduits(
    idTypeProduit           INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    libelleTypeProduit      VARCHAR(150) NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE allergenes(
    idAllergene             INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    libelleAllergene        VARCHAR(150)  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE compositions(
    idComposition           INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    idProduit               INT  NOT NULL,
    idAllergene             INT  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8; 

CREATE TABLE recettes(
    idRecette               INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    libelleRecette          VARCHAR(50)  NOT NULL,
    prixRecette             FLOAT  NOT NULL,
    imagePizza              TEXT  NOT NULL,
    dateDebut               DATE  NOT NULL,
    dateFin                 DATE NOT NULL 
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE comporteProduitRecette(
    idComporteProduitRecette    INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    idRecette                   INT  NOT NULL,
    idProduit                   INT  NOT NULL,
    quantiteProduitPizza        INT  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE taillesPizzas(
    idTaillePizza               INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    libelleTaillePizza          INT(2)  NOT NULL,
    tarifSupplement             FLOAT  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE pizzas(
    idPizza                 INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    idRecette               INT  NOT NULL,
    idTaillePizza           INT  NOT NULL,
    prix                    FLOAT  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE commandes(
    idCommande              INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    dateCommande            DATE  NOT NULL,
    nbPointFidelite         INT(3)  NOT NULL,
    horaireLivraison        TIME  NOT NULL,
    idUser                  INT  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;

CREATE TABLE lignesDeCommandes(
    idLigneDeCommande           INT  AUTO_INCREMENT  NOT NULL  PRIMARY KEY,
    idCommande                  INT  NOT NULL,
    quantite                    INT  NOT NULL,
    idProduit                   INT  NOT NULL,
    idTaillePizza               INT  NOT NULL,
    idPizza                     INT  NOT NULL,
    prix                        INT  NOT NULL
)ENGINE=InnoDB, CHARSET = UTF8;



ALTER TABLE users
ADD CONSTRAINT FK_users_roles
FOREIGN KEY (idRole)
REFERENCES roles(idRole);

ALTER TABLE produits
ADD CONSTRAINT FK_produits_typesProduits
FOREIGN KEY (idTypeProduit)
REFERENCES typesProduits(idTypeProduit);

ALTER TABLE pizzas
ADD CONSTRAINT FK_pizzas_recettes
FOREIGN KEY (idRecette)
REFERENCES recettes(idRecette);

ALTER TABLE pizzas
ADD CONSTRAINT FK_pizzas_taillesPizzas
FOREIGN KEY (idTaillePizza)
REFERENCES taillesPizzas(idTaillePizza);

ALTER TABLE commandes
ADD CONSTRAINT FK_commandes_users
FOREIGN KEY (idUser)
REFERENCES users(idUser);

ALTER TABLE comporteProduitRecette
ADD CONSTRAINT FK_comporteProduitRecette_recettes
FOREIGN KEY (idRecette)
REFERENCES recettes(idRecette);

ALTER TABLE comporteProduitRecette
ADD CONSTRAINT FK_comporteProduitRecette_produits
FOREIGN KEY (idProduit)
REFERENCES produits(idProduit);

ALTER TABLE compositions
ADD CONSTRAINT FK_compositions_produits
FOREIGN KEY (idProduit)
REFERENCES produits(idProduit);

ALTER TABLE compositions
ADD CONSTRAINT FK_compositions_allergenes
FOREIGN KEY (idAllergene)
REFERENCES allergenes(idAllergene);

ALTER TABLE lignesDeCommandes
ADD CONSTRAINT FK_lignesDeCommandes_commandes
FOREIGN KEY (idCommande)
REFERENCES commandes(idCommande);

ALTER TABLE lignesDeCommandes
ADD CONSTRAINT FK_lignesDeCommandes_produits
FOREIGN KEY (idProduit)
REFERENCES produits(idProduit);

ALTER TABLE lignesDeCommandes
ADD CONSTRAINT FK_lignesDeCommandes_pizzas
FOREIGN KEY (idPizza)
REFERENCES pizzas(idPizza);

ALTER TABLE lignesDeCommandes
ADD CONSTRAINT FK_lignesDeCommandes_taillesPizzas
FOREIGN KEY (idTaillePizza)
REFERENCES taillesPizzas(idTaillePizza);
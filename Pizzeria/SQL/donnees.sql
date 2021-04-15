use pizzeria;

INSERT INTO roles(idRole, libelleRole) VALUES(1, "administrateur");
INSERT INTO roles(idRole, libelleRole) VALUES(2, "client");

INSERT INTO users(idUser, nomUser, prenomUser, adresse, codePostal, ville, mailUser, telUser, motDePasse, nbPointFidelite, idRole) VALUES(1, "doe", "john", "123 main", "59470", "wormhout", "johndoe@gmail.com", "0652545153", "Mdp111!!", 5, 2);
INSERT INTO users(idUser, nomUser, prenomUser, adresse, codePostal, ville, mailUser, telUser, motDePasse, nbPointFidelite, idRole) VALUES(2, "doe", "jane", "125 main", "59470", "esquelbecq", "johndoe@gmail.com", "0652545154", "Mot2Pass!", 3, 2);
INSERT INTO users(idUser, nomUser, prenomUser, adresse, codePostal, ville, mailUser, telUser, motDePasse, nbPointFidelite, idRole) VALUES(3, "doex", "john", "100 main", "59470", "esquelbecq", "johndoex@gmail.com", "0652545150", "Password2!", 0, 1);

INSERT INTO typesProduits (idTypeProduit, libelleTypeProduit) VALUES (NULL, "base");
INSERT INTO typesProduits (idTypeProduit, libelleTypeProduit) VALUES (NULL, "legumes");
INSERT INTO typesProduits (idTypeProduit, libelleTypeProduit) VALUES (NULL, "fromage");
INSERT INTO typesProduits (idTypeProduit, libelleTypeProduit) VALUES (NULL, "viande");
INSERT INTO typesProduits (idTypeProduit, libelleTypeProduit) VALUES (NULL, "boisson");
INSERT INTO typesProduits (idTypeProduit, libelleTypeProduit) VALUES (NULL, "dessert");

INSERT INTO produits (idProduit, libelleProduit, idTypeProduit) VALUES (NULL, "sauce tomate", 2);
INSERT INTO produits (idProduit, libelleProduit, idTypeProduit) VALUES (NULL, "creme fraiche", 2);
INSERT INTO produits (idProduit, libelleProduit, idTypeProduit) VALUES (NULL, "boeuf", 4);
INSERT INTO produits (idProduit, libelleProduit, idTypeProduit, prixProduit, quantite) VALUES (NULL, "biere", 5, 3, 15);
INSERT INTO produits (idProduit, libelleProduit, idTypeProduit) VALUES (NULL, "jambon", 2);
INSERT INTO produits (idProduit, libelleProduit, idTypeProduit, prixProduit, quantite) VALUES (NULL, "mousse chocolat", 6, 4, 12);
INSERT INTO produits (idProduit, libelleProduit, idTypeProduit) VALUES (NULL, "champignons", 1);
INSERT INTO produits (idProduit, libelleProduit, idTypeProduit) VALUES (NULL, "fromage", 3);



INSERT INTO allergenes (idAllergene, libelleAllergene) VALUES (NULL, "arachide");

INSERT INTO recettes (idRecette, libelleRecette, prixRecette) VALUES (NULL, "reine", 10);
INSERT INTO recettes (idRecette, libelleRecette, prixRecette) VALUES (NULL, "bolo", 11);
INSERT INTO recettes (idRecette, libelleRecette, prixRecette, dateDebut, dateFin) VALUES (NULL, "printanière", 11, "2021-04-21", "2021-05-21");

INSERT INTO taillesPizzas (idTaillePizza, libelleTaillePizza, tarifSupplement) VALUES (NULL, 25, 0.80);
INSERT INTO taillesPizzas (idTaillePizza, libelleTaillePizza, tarifSupplement) VALUES (NULL, 28, 1);

INSERT INTO compositions (idComposition, idProduit, idAllergene) VALUES (NULL, 1, 1);

INSERT INTO comporteProduitRecette (idComporteProduitRecette, idProduit, idRecette) VALUES (NULL, 1, 1);
INSERT INTO comporteProduitRecette (idComporteProduitRecette, idProduit, idRecette) VALUES (NULL, 1, 2);
INSERT INTO comporteProduitRecette (idComporteProduitRecette, idProduit, idRecette) VALUES (NULL, 2, 1);
INSERT INTO comporteProduitRecette (idComporteProduitRecette, idProduit, idRecette) VALUES (NULL, 2, 2);

INSERT INTO pizzas (idPizza, idRecette, idTaillePizza, prix) VALUES (NULL, 1, 1, 10);
INSERT INTO pizzas (idPizza, idRecette, idTaillePizza, prix) VALUES (NULL, 1, 2, 12);
INSERT INTO pizzas (idPizza, idRecette, idTaillePizza, prix) VALUES (NULL, 2, 2, 11);
INSERT INTO pizzas (idPizza, idRecette, idTaillePizza, prix) VALUES (NULL, 3, 2, 13);

INSERT INTO commandes (idCommande, idUser, dateCommande, nbPointFidelite, horaireLivraison) VALUES (NULL, 1, "2021-07-01", 10, "19:00:00");

INSERT INTO lignesDeCommandes (idLigneDeCommande, idCommande, quantite, idProduit, prix) VALUES (NULL, 1,3,1, 11);
INSERT INTO lignesDeCommandes (idLigneDeCommande, idCommande, quantite, idProduit,idPizza, prix) VALUES (NULL, 1,1, 4, 2, 0.8);
INSERT INTO lignesDeCommandes (idLigneDeCommande, idCommande, quantite, idProduit, prix) VALUES (NULL, 1, 2, 4, 3);
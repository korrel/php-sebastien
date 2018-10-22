Types de données
VARCHAR : permet de stocker un texte de 255 caractères.
TEXT : permet de stocker un texte de 65 535 caractères.
INT : permet de stocker un nombre positif ou négatif sans décimales (maxi 4 294 967 295).
FLOAT : permet de stocker un nombre positif ou négatif avec décimales.
DATE : permet de stocker une date au format YYYY-MM-DD.
DATETIME : permet de stocker une date et une heure au format YYYY-MM-DD HH:MM:SS.
ENUM : permet de stocker une liste de choix, très ressemblant à un array en PHP.


/**************************  Les requêtes SQL  ********************************************/

-- Insère un nouvel utilisateur
INSERT INTO user (firstname, lastname, email) VALUES ('John', 'Doe', 'john.doe@mail.com');

-- Insère plusieurs utilisateurs
INSERT INTO user (firstname, lastname, email) VALUES
('John', 'Doe', 'john.doe@mail.com'), 
('Bob', 'Arctor', 'bob.arctor@mail.com');

-- Sélectionne certaines colonnes d'un utilisateur
SELECT firstname, lastname FROM user;

-- Sélectionne toutes les colonnes d'un utilisateur
SELECT * FROM user;

-- Mets à jour un utilisateur, attention sans le where,
-- s'applique sur toutes les lignes
UPDATE user SET firstname = 'John', lastname = 'Doe' WHERE id = 123;

-- Supprime un utilisateur, attention sans le where,
-- s'applique sur toutes les lignes
DELETE FROM user WHERE email = 'john.doe@mail.com';


/**************************  Les clauses SQL  ********************************************/

SELECT : Précise les colonnes à sélectionner
FROM : Précise la table où on doit effectuer la sélection
WHERE : Réservé aux requêtes SELECT, UPDATE et DELETE. Permet de filtrer la sélection ou les lignes à mettre à jour ou à supprimer.

-- Remonte le prénom et le nom de tous les utilisateurs de 18 ans ou plus
SELECT firstname, lastname FROM user WHERE age >= 18;
-- Mets à jour le champ newsletter de tous les contacts avec un email vide
UPDATE contact SET newsletter = 0 WHERE email = '';
-- Supprime tous les posts dont la colonne archive vaut 1
DELETE FROM post WHERE archive = 1;

-- Remonte tous les utilisateurs dont l'email n'est pas vide,
-- qui ont accepté de recevoir la newsletter et
-- qui résident en France OU en Belgique OU en Suisse
SELECT firstname, lastname, email
FROM user
WHERE email != '' AND newsletter = 1 AND (country = 'FR' OR country = 'BE' OR country = 'CH');




ORDER BY : Réservé aux requêtes SELECT, permet de trier la liste des résultats 
de la requête, en ordre croissant (ASC) ou décroissant (DESC). 
Par défaut si on ne précise pas l'ordre de tri, c'est un tri croissant qui est 
effectué. On peut combiner plusieurs clauses de tri en les séparant avec des virgules.

-- Remonte tous les films triés par date de sortie décroissante
SELECT * FROM movies ORDER BY release_date DESC;
-- Remonte tous les films dans un ordre pseudo aléatoire
SELECT * FROM movies ORDER BY RAND();
-- Remonte tous les films triés par ordre alphabétique sur le nom de famille,
-- et à nom égal par ordre alphabétique croissant sur le prénom
SELECT * FROM movies ORDER BY lastname ASC, firstname ASC;



LIMIT : Réservé aux requêtes SELECT, permet de restreindre la sélection en précisant 
un nombre de ligne, et éventuellement un point de départ, permettant entre autres de 
gérer une pagination.

-- Remonte 3 films aléatoires
SELECT * FROM movies ORDER BY RAND() LIMIT 3;
-- Remonte 10 films à partir de la ligne 50
SELECT * FROM movies LIMIT 50, 10;



/**************************  Les clauses SQL  ********************************************/

INSERT INTO : Permet d'insérer une ligne dans une table en précisant les colonnes à remplir avec leur valeur respective.


UPDATE : Permet de modifier une ou plusieurs ligne(s) existante(s) d'une table.
ATTENTION : Une requête UPDATE sans clause WHERE affectera toutes les lignes de la table

-- Insère une ligne dans la table user
INSERT INTO user (firstname, lastname, email) VALUES ('John', 'Doe', 'john.doe@mail.com');
-- Syntaxe alternative, même résultat que la requête précédente
INSERT INTO user SET firstname = 'John', lastname = 'Doe', email = 'john.doe@mail.com';

-- Modifie la colonne newsletter et update_date de l'utilisateur 42
UPDATE contact SET newsletter = 1, update_date = NOW() WHERE id = 42;
-- Modifie le champ rank en l'incrémentant de 1 pour l'identifiant 123
UPDATE movies SET rank = rank + 1 WHERE id = 123;
-- Modifie la colonne newsletter pour tous les user avec une colonne email vide
UPDATE user SET newsletter = 0 WHERE email = '';




DELETE : Permet de supprimer une ou plusieurs ligne(s) depuis une table.
ATTENTION : Une requête DELETE sans clause WHERE affectera toutes les lignes de la table

-- Supprime la ligne de la table user dont l'identifiant est 42
DELETE FROM user WHERE id = 42;
-- Supprime tous les lignes de la table mail dont la colonne deleted vaut 1
DELETE FROM mail WHERE deleted = 1;


/**************************  Fonctions SQL  ********************************************/

-- Remonte le nombre de lignes de la table user
SELECT COUNT(id) FROM user;

-- Renvoie l'année du film le plus ancien et l'année du film le plus récent
SELECT MIN(year) as min_year, MAX(year) as max_year FROM movies;

-- Calcul et renvoit la moyenne de la colonne scores pour toutes les lignes
SELECT AVG(scores) FROM nom_de_la_table;

-- Calcul et renvoit la somme des valeurs de la colonne scores
SELECT SUM(scores) FROM games;

-- Même chose avec des prix de produits
SELECT SUM(price) FROM products;

-- Modifie la date de dernière connexion au format "Y-m-d H:i:s"
UDPATE user SET last_connexion = NOW();


/**************************  Erreurs SQL  ********************************************/

Parfois, on peut rencontrer des erreurs sous MySQL.

-- Erreur de syntaxe dans la requête, il faut vérifier l'ordre des instructions, 
-- s'il ne manque pas une , un ; un opérateur (=, !=)
-- si on a une table qui se nomme select, il faut écrire
-- SELECT from `select` et non SELECT from select
[42000] Syntax error or access violation [1064]
You have an error in your SQL syntax; check the manual that corresponds to your
MySQL server version for the right syntax to use near 'SELECT FROM'...

-- La table n'existe pas
[42S02] Base table or view not found [1146]
Table 'db_name.table2' doesn't exist

-- La colonne n'existe pas
[42S22] Column not found: 1054


/**************************  References avancées  ********************************************/

-- Sélection d'une base de données 
USE maBDD;

-- Afficher toutes les tables de la base de données
SHOW tables;

-- Afficher toutes les colonnes d'une table
SHOW columns FROM maTable;


/**************************  Requete avec CASE ********************************************/


On peut écrire une condition (switch) dans une requête.

-- Ajout d'une condition à la requête pour avoir un message associé par ligne
SELECT *,
    CASE 
      WHEN price>100 THEN 'Produit de luxe'
      WHEN price<1 THEN 'Produit lowcost'
      ELSE 'Produit bon marché'
    END
FROM product


/**************************  Requete avec LIKE ********************************************/

Plutôt que de tester une égalité stricte, on peut tester si des données contiennent un mot ou une phrase

-- Le % permet de préciser s'il peut y avoir
-- n'importe quel caractère devant le terme ou après
SELECT * FROM product WHERE name LIKE %iphone%

-- Va afficher "iPhone 4" ou "Apple iPhone" ou "iPhone 6"


/* *************************  Requete avec UNION ******************************************* */

Rassembler les résultats de plusieurs SELECT. 
Il faut que les 2 tables aient le même nombre de colonnes, 
de même type et dans le même ordre.


SELECT * FROM table1
UNION
-- UNION ALL si on ne veut pas filtrer les doubons
SELECT * FROM table2
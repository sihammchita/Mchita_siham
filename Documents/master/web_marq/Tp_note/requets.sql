/*1Les titres et années de sortie des films du plus récent au plus ancien :*/

SELECT titre, annee_sortie
FROM films
ORDER BY annee_sortie DESC;

---------------------------------------------------------------------------
/*La liste des acteurs/actrices principaux pour un film donné :*/

SELECT a.nom, a.prenom
FROM acteurs a
JOIN casting c ON a.id_acteur = c.id_acteur
JOIN films f ON f.id_film = c.id_film
WHERE f.titre = 'Titanic' AND a.role = 'principal';
/*on remplace 'Titanic' par le titre du film dont on veut voir 
les acteurs principaux. La requête sélectionne les noms et prénoms des acteurs principaux pour le film "Titanic".*/

---------------------------------------------------------------------------
/*3. La liste des films pour un acteur/actrice donné :*/

SELECT f.titre, f.annee_sortie
FROM films f
JOIN casting c ON f.id_film = c.id_film
JOIN acteurs a ON a.id_acteur = c.id_acteur
WHERE a.nom = 'DiCaprio' AND a.prenom = 'Leonardo';
/*Remplace 'DiCaprio' et 'Leonardo' par le nom et prénom de l’acteur qu'on  souhaite a rechercher.*/

---------------------------------------------------------------------------
/*Ajouter un film :*/
INSERT INTO films (titre, duree, annee_sortie, id_real)
VALUES ('Inception', 120, 2023, 1);
/*ici j'ai pris un exemple Inception comme titre du film etc*/

---------------------------------------------------------------------------
/*5.Ajouter un acteur/actrice :*/
INSERT INTO acteurs (nom, prenom, role, date_naissance)
VALUES ('Winslet', 'Kate', 'principal', '1990-05-15');


---------------------------------------------------------------------------
/*6.Modifier un film :*/
UPDATE films
SET titre = 'NouveauTitre', duree = 130, annee_sortie = 2022
WHERE id_film = id_du_film;
/*on Remplace id_du_film par l'ID spécifique du film qu'on veux la  mettre à jour*/

---------------------------------------------------------------------------
/*Supprimer un acteur/actrice :*/
DELETE FROM acteurs
WHERE id_acteur = 1;
/*on Remplace 1 par l'ID de l'acteur/actrice à supprimer.*/

---------------------------------------------------------------------------
/*Afficher les 3 derniers acteurs/actrices ajouté(e)s :*/
SELECT nom, prenom
FROM acteurs
ORDER BY id_acteur DESC
LIMIT 3;


---------------------------------------------------------------------------
/*Afficher le film le plus ancien :*/
SELECT titre, annee_sortie
FROM films
ORDER BY annee_sortie ASC
LIMIT 1;

---------------------------------------------------------------------------
/*10.Afficher l’acteur le plus jeune :*/

SELECT nom, prenom, date_naissance
FROM acteurs
ORDER BY date_naissance DESC
LIMIT 1;

---------------------------------------------------------------------------
/*11.Compter le nombre de films réalisés en 1990 :*/
SELECT COUNT(*) as nombre_films_1990
FROM films
WHERE annee_sortie = 1990;

---------------------------------------------------------------------------
/*Faire la somme de tous les acteurs ayant joué dans un film :*/
SELECT COUNT(DISTINCT id_acteur) AS nombre_acteurs
FROM casting;


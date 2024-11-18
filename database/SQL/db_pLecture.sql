DROP DATABASE IF EXISTS db_pLecture;

CREATE DATABASE IF NOT EXISTS db_pLecture;

USE db_pLecture;

CREATE TABLE t_categorie(
   categorie_id INT AUTO_INCREMENT,
   Nom VARCHAR(128) NOT NULL,
   PRIMARY KEY(categorie_id),
   UNIQUE(Nom)
);

CREATE TABLE t_auteur(
   auteur_id INT AUTO_INCREMENT,
   Nom VARCHAR(128) NOT NULL,
   Prenom VARCHAR(128) NOT NULL,
   PRIMARY KEY(auteur_id)
);

CREATE TABLE t_editeur(
   editeur_id INT AUTO_INCREMENT,
   Nom VARCHAR(128) NOT NULL,
   PRIMARY KEY(editeur_id)
);

CREATE TABLE t_utilisateur(
   utilisateur_id INT AUTO_INCREMENT,
   Pseudo VARCHAR(128) NOT NULL,
   DateEntree DATE NOT NULL,
   Admin BOOLEAN NOT NULL,
   PRIMARY KEY(utilisateur_id)
);

CREATE TABLE t_ouvrage(
   ouvrage_id INT AUTO_INCREMENT,
   Titre VARCHAR(128) NOT NULL,
   Extrait VARCHAR(255) NOT NULL,
   Resume TEXT NOT NULL,
   Annee DATE NOT NULL,
   Image VARCHAR(128) NOT NULL,
   NbPages SMALLINT NOT NULL,
   utilisateur_id INT NOT NULL,
   categorie_id INT NOT NULL,
   editeur_id INT NOT NULL,
   auteur_id INT NOT NULL,
   PRIMARY KEY(ouvrage_id),
   FOREIGN KEY(utilisateur_id) REFERENCES t_utilisateur(utilisateur_id),
   FOREIGN KEY(categorie_id) REFERENCES t_categorie(categorie_id),
   FOREIGN KEY(editeur_id) REFERENCES t_editeur(editeur_id),
   FOREIGN KEY(auteur_id) REFERENCES t_auteur(auteur_id)
);

CREATE TABLE apprecier(
   ouvrage_id INT,
   utilisateur_id INT,
   Note TINYINT,
   PRIMARY KEY(ouvrage_id, utilisateur_id),
   FOREIGN KEY(ouvrage_id) REFERENCES t_ouvrage(ouvrage_id),
   FOREIGN KEY(utilisateur_id) REFERENCES t_utilisateur(utilisateur_id)
);

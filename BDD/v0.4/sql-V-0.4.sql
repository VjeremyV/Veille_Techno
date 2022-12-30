DROP TABLE IF EXISTS
    Catégories;
CREATE TABLE Catégories(
    id_Catégories INT AUTO_INCREMENT NOT NULL,
    nom_Catégories VARCHAR(255),
    PRIMARY KEY(id_Catégories)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    Fiches;
CREATE TABLE Fiches(
    id_Fiches INT AUTO_INCREMENT NOT NULL,
    titre_Fiches VARCHAR(255),
    contenu_Fiches TEXT,
    date_Fiches DATETIME,
    id_Catégories INT,
    id_Users INT,
    PRIMARY KEY(id_Fiches)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    Fichiers;
CREATE TABLE Fichiers(
    id_Fichiers INT AUTO_INCREMENT NOT NULL,
    nom_Fichiers VARCHAR(255),
    chemin_Fichiers VARCHAR(255),
    id_Fiches INT,
    PRIMARY KEY(id_Fichiers)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    Bibliographie;
CREATE TABLE Bibliographie(
    id_Bibliographie INT AUTO_INCREMENT NOT NULL,
    nom_Bibliographie VARCHAR(255),
    site_Bibliographie VARCHAR(255),
    flux_rss_Bibliographie VARCHAR(255),
    id_Users INT,
    config_id_config_config INT,
    PRIMARY KEY(id_Bibliographie)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    Config;
CREATE TABLE Config(
    id_Config INT AUTO_INCREMENT NOT NULL,
    intitule_Config VARCHAR(255),
    corps_Config VARCHAR(255),
    PRIMARY KEY(id_Config)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    Users;
CREATE TABLE Users(
    id_Users INT AUTO_INCREMENT NOT NULL,
    pseudo_Users VARCHAR(255),
    nom_Users VARCHAR(255),
    prenom_Users VARCHAR(255),
    mdp_Users VARCHAR(255),
    mail_Users VARCHAR(255),
    PRIMARY KEY(id_Users)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    Articles;
CREATE TABLE Articles(
    id_Articles INT AUTO_INCREMENT NOT NULL,
    titre_Articles VARCHAR(255),
    lien_Articles VARCHAR(255),
    date_Articles DATETIME,
    description_Articles TEXT,
    img_Articles VARCHAR(255),
    etat_Articles VARCHAR(255),
    id_Catégories INT,
    id_Users INT,
    id_Bibliographie INT,
    PRIMARY KEY(id_Articles)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    config;
CREATE TABLE config(
    id_config_config INT AUTO_INCREMENT NOT NULL,
    is_active_config BOOL,
    nbre_elements_config INT,
    ordre_config INT,
    bibliographie_id_bibliographie INT,
    PRIMARY KEY(id_config_config)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    renvoie;
CREATE TABLE renvoie(
    id_Bibliographie INT AUTO_INCREMENT NOT NULL,
    id_Fiches INT NOT NULL,
    PRIMARY KEY(id_Bibliographie, id_Fiches)
) ENGINE = InnoDB; DROP TABLE IF EXISTS
    partage;
CREATE TABLE partage(
    id_Articles INT AUTO_INCREMENT NOT NULL,
    id_Users INT NOT NULL,
    user_cible_partage INT,
    PRIMARY KEY(id_Articles, id_Users)
) ENGINE = InnoDB; ALTER TABLE
    Fiches ADD CONSTRAINT FK_Fiches_id_Catégories FOREIGN KEY(id_Catégories) REFERENCES Catégories(id_Catégories);
ALTER TABLE
    Fiches ADD CONSTRAINT FK_Fiches_id_Users FOREIGN KEY(id_Users) REFERENCES Users(id_Users);
ALTER TABLE
    Fichiers ADD CONSTRAINT FK_Fichiers_id_Fiches FOREIGN KEY(id_Fiches) REFERENCES Fiches(id_Fiches);
ALTER TABLE
    Bibliographie ADD CONSTRAINT FK_Bibliographie_id_Users FOREIGN KEY(id_Users) REFERENCES Users(id_Users);
ALTER TABLE
    Bibliographie ADD CONSTRAINT FK_Bibliographie_config_id_config_config FOREIGN KEY(config_id_config_config) REFERENCES config(id_config_config);
ALTER TABLE
    Articles ADD CONSTRAINT FK_Articles_id_Catégories FOREIGN KEY(id_Catégories) REFERENCES Catégories(id_Catégories);
ALTER TABLE
    Articles ADD CONSTRAINT FK_Articles_id_Users FOREIGN KEY(id_Users) REFERENCES Users(id_Users);
ALTER TABLE
    Articles ADD CONSTRAINT FK_Articles_id_Bibliographie FOREIGN KEY(id_Bibliographie) REFERENCES Bibliographie(id_Bibliographie);
ALTER TABLE
    config ADD CONSTRAINT FK_config_bibliographie_id_bibliographie FOREIGN KEY(bibliographie_id_bibliographie) REFERENCES Bibliographie(id_Bibliographie);
ALTER TABLE
    renvoie ADD CONSTRAINT FK_renvoie_id_Bibliographie FOREIGN KEY(id_Bibliographie) REFERENCES Bibliographie(id_Bibliographie);
ALTER TABLE
    renvoie ADD CONSTRAINT FK_renvoie_id_Fiches FOREIGN KEY(id_Fiches) REFERENCES Fiches(id_Fiches);
ALTER TABLE
    partage ADD CONSTRAINT FK_partage_id_Articles FOREIGN KEY(id_Articles) REFERENCES Articles(id_Articles);
ALTER TABLE
    partage ADD CONSTRAINT FK_partage_id_Users FOREIGN KEY(id_Users) REFERENCES Users(id_Users);
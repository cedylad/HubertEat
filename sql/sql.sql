CREATE TABLE typeUser(
    idT INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nameT varchar(25)
);

CREATE TABLE users(
    mailU varchar(30) PRIMARY KEY NOT NULL,
    lastNameU varchar(25),
    firstNameU varchar(25),
    passwordU varchar(255),
    typeU INT,
    FOREIGN KEY (typeU) REFERENCES typeUser (idT)
);
CREATE TABLE resto (
    idR INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nameR varchar(25),
    ownerR varchar(30),
    hourOpenR varchar(25),
    hourCloseR varchar(25),
    phoneR varchar(10),
    FOREIGN KEY (ownerR) REFERENCES users (mailU)

);
CREATE TABLE address (
    idA INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cityA varchar(25),
    countryA varchar(25),
    idR INT, 
    FOREIGN KEY (idR) REFERENCES resto (idR)
);

CREATE TABLE plat (
    idP INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomP varchar(25),
    restoR INT,
    FOREIGN KEY (restoR) REFERENCES resto (idR)
);

un CLIENT COMMANDE un plat et attend que la RESTAURATEUR valide

Si le RESTAURATEUR valide alors la COMMANDE est AFFICHER sur son PROFIL

idCommance, idPlat, mailU, livraisonCommande (boolean), 


CREATE TABLE commande (
    idC INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    idP INT, 
    mailU varchar(30), 
    livraison boolean DEFAULT false, 
    FOREIGN KEY (idP) REFERENCES plat (idP),
    FOREIGN KEY (mailU) REFERENCES users (mailU)
)

CREATE TABLE banque (
    idB INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    argent varchar(30)
);

ALTER TABLE users
ADD idB INT,
ADD FOREIGN KEY (idB) REFERENCES banque(idB);

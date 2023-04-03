CREATE TABLE address (
    idA INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cityA varchar(25),
    countryA varchar(25)
);

CREATE TABLE typeUser(
    idT INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nameT varchar(25)
);

CREATE TABLE users(
    idU INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lastNameU varchar(25),
    firstNameU varchar(25),
    mailU varchar(30),
    passwordU varchar(255),
    typeU INT,
    FOREIGN KEY (typeU) REFERENCES typeUser (idT)
);
CREATE TABLE resto (
    idR INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nameR varchar(25),
    ownerR INT,
    hourOpenR varchar(25),
    hourCloseR varchar(25),
    addressR INT,
    phoneR varchar(10),
    FOREIGN KEY (addressR) REFERENCES address (idA),
    FOREIGN KEY (ownerR) REFERENCES users (idU)
);

CREATE TABLE plat (
    idP INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomP varchar(25),
    restoR INT,
    FOREIGN KEY (restoR) REFERENCES resto (idR)
);
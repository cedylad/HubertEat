INSERT INTO typeUser(nameT) VALUES('Restaurateur');
INSERT INTO typeUser(nameT) VALUES('Client');
INSERT INTO typeUser(nameT) VALUES('Administrateur');

INSERT INTO address(cityA, countryA, idR) VALUES('Paris', 'France', 1);
INSERT INTO address(cityA, countryA, idR) VALUES('Nancy', 'France' 2);
INSERT INTO address(cityA, countryA, idR) VALUES('Nancy', 'France' 2);

INSERT INTO users(lastNameU, firstNameU, mailU, passwordU, typeU) VALUES('Brassens', 'Georges', 'bg@mail.fr', 'mdp', 1);

INSERT INTO resto(nameR, ownerR, hourOpenR, hourCloseR, phoneR) VALUES("L'Anglade", 'bg@mail.fr', '09h00', '18h00', '0123456789')
INSERT INTO resto(nameR, ownerR, hourOpenR, hourCloseR, phoneR) VALUES("La Méduse", 'johndoe@mail.fr', '09h00', '18h00', '0123456789')

INSERT INTO resto(nameR, ownerR, hourOpenR, hourCloseR, addressR, phoneR) VALUES("Le Soleil", , '09h00', '18h00', 1, '0123456789');
INSERT INTO resto(nameR, ownerR, hourOpenR, hourCloseR, addressR, phoneR) VALUES("L'aristocrate", 2, '10h00', '22h00', 2, '0123456789');
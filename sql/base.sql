CREATE DATABASE colis;
USE colis;

CREATE TABLE livreur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(20)
);

CREATE TABLE vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(10)
);

CREATE TABLE statut (
    id INT PRIMARY KEY,
    value VARCHAR(10) 
);

CREATE TABLE livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    id_livreur INT,
    id_vehicule INT,
    addresse_depart VARCHAR(20),
    addresse_destination VARCHAR(20),
    statut_id INT,
    salaire_livreur DECIMAL(10,2),
    charge DECIMAL(10,2),
    total_kg DECIMAL(10,2),
    produit DECIMAL(10,2),
    FOREIGN KEY (id_livreur) REFERENCES livreur(id),
    FOREIGN KEY (statut_id) REFERENCES statut(id)
);

CREATE TABLE charge_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_livraison INT,
    type_charge VARCHAR(50),
    montant DECIMAL(10,2),
    FOREIGN KEY (id_livraison) REFERENCES livraison(id)
);

CREATE TABLE colis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_livraison INT NOT NULL,
    poids_kg DECIMAL(10,2),
    prix_par_kg DECIMAL(10,2),
    montant_total DECIMAL(10,2),
    FOREIGN KEY (id_livraison) REFERENCES livraison(id)
);

-- Livreur
INSERT INTO livreur (nom) VALUES 
('Jean'), 
('Aina'), 
('Sofia');

-- Véhicules
INSERT INTO vehicules (numero) VALUES 
('ABC123'), 
('XYZ789');

-- Statut
INSERT INTO statut (id, value) VALUES 
(1, 'En cours'), 
(2, 'Livré'), 
(3, 'Annulé');

-- Livraison
INSERT INTO livraison (date, id_livreur, id_vehicule, addresse_depart, addresse_destination, statut_id, salaire_livreur, charge, total_kg, produit)
VALUES
('2025-12-15', 1, 1, 'Antananarivo', 'Toamasina', 2, 50.00, 20.00, 100.00, 500.00),
('2025-12-16', 2, 2, 'Antananarivo', 'Mahajanga', 1, 60.00, 25.00, 80.00, 400.00),
('2025-12-17', 3, 1, 'Antananarivo', 'Fianarantsoa', 2, 55.00, 30.00, 120.00, 600.00);

-- Charges supplémentaires
INSERT INTO charge_livraison (id_livraison, type_charge, montant) VALUES
(1, 'Carburant', 15.00),
(1, 'Peage', 5.00),
(2, 'Carburant', 20.00),
(3, 'Carburant', 25.00);

-- Colis
INSERT INTO colis (id_livraison, poids_kg, prix_par_kg, montant_total) VALUES
(1, 50.00, 5.00, 250.00),
(1, 50.00, 5.00, 250.00),
(2, 80.00, 5.00, 400.00),
(3, 120.00, 5.00, 600.00);

--montant_total DECIMAL(10,2) AS (poids_kg * prix_par_kg) STORED

CREATE DATABASE ProjetQR;


CREATE TABLE Roles(
    rol_id INT PRIMARY KEY NOT NULL,
    rol_libelle VARCHAR (100) NOT NULL;
CREATE TABLE QR_code(qr_code_id, qr_code_img)
    qr_code_id INT PRIMARY KEY NOT NULL,
    qr_code_img BLOB NOT NULL;
);
CREATE TABLE Utilisateurs(
    uti_id INT PRIMARY KEY NOT NULL, 
    uti_nom VARCHAR(), 
    uti_prenom VARCHAR(),
    uti_date_de_naissance DATE, 
    uti_adresse VARCHAR(), 
    uti_telephone VARCHAR(),
    uti_email VARCHAR() , 
    uti_mot_de_passe VARCHAR(),
    uti_rol_id INT NOT NULL,
    uti_QR_code_id INT NOT NULL,
    );
CREATE DATABASE portfolio_db;
USE portfolio_db;

CREATE TABLE projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    descricao TEXT,
    imagem VARCHAR(255)
);

CREATE TABLE visitantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(45),
    data_visita DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE vagas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    empresa VARCHAR(255),
    link VARCHAR(255),
    data_adicao DATETIME DEFAULT CURRENT_TIMESTAMP
);
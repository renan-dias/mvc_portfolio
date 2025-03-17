CREATE DATABASE portfolio;
USE portfolio;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255),
    usuario_url VARCHAR(100) UNIQUE,
    bio TEXT,
    foto_perfil VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    titulo VARCHAR(100),
    descricao TEXT,
    link VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE visitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    ip VARCHAR(45),
    data_visita TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE vagas_emprego (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    empresa VARCHAR(100),
    localizacao VARCHAR(100),
    descricao TEXT,
    link_vaga VARCHAR(255),
    data_postagem TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

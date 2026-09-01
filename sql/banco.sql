CREATE DATABASE IF NOT EXISTS loja;
USE loja;

CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(100),
    preco_produto DECIMAL(5,2),
    descricao TEXT
);

CREATE TABLE imagens (
    id_imagem INT AUTO_INCREMENT PRIMARY KEY,
    nome_imagem VARCHAR(100),
    fk_id_produto INT,
    FOREIGN KEY (fk_id_produto) REFERENCES produtos(id_produto)
CREATE DATABASE db_film;
USE db_film;

-- Tabel Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

-- Tabel Genre
CREATE TABLE genre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100)
);

-- Tabel Film
CREATE TABLE film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100),
    tahun_rilis INT,
    poster VARCHAR(100),
    id_genre INT,
    FOREIGN KEY (id_genre) REFERENCES genre(id)
);

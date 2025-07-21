CREATE DATABASE IF NOT EXISTS ppdb_online;
USE ppdb_online;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    email VARCHAR(100),
    password VARCHAR(100),
    status VARCHAR(20) DEFAULT 'draft',
    hasil VARCHAR(20) DEFAULT '-'
);

CREATE TABLE biodata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    alamat TEXT,
    ttl VARCHAR(50),
    agama VARCHAR(50),
    asal_sekolah VARCHAR(100),
    jurusan VARCHAR(100)
);

CREATE TABLE berkas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    jenis VARCHAR(50),
    file VARCHAR(255)
);

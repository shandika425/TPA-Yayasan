CREATE DATABASE IF NOT EXISTS yayasan_al_fatah;
USE yayasan_al_fatah;

-- Tabel Admin (Data Kepala Sekolah)
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

-- Tabel Murid
CREATE TABLE IF NOT EXISTS murid (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    no_tlp VARCHAR(20),
    email VARCHAR(100)
);

-- Tabel Guru
CREATE TABLE IF NOT EXISTS guru (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    mapel VARCHAR(100),
    no_tlp VARCHAR(20),
    email VARCHAR(100)
);

-- Tabel Kegiatan
CREATE TABLE IF NOT EXISTS kegiatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kegiatan VARCHAR(100) NOT NULL,
    tanggal DATE,
    deskripsi TEXT
);

-- Tabel Administrasi
CREATE TABLE IF NOT EXISTS administrasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_murid INT,
    tgl_bayar DATE,
    jumlah_bayar INT,
    status ENUM('Lunas', 'Belum Lunas'),
    FOREIGN KEY (id_murid) REFERENCES murid(id) ON DELETE CASCADE
);

-- Tabel Users untuk login multi-user
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'guru', 'murid') NOT NULL,
    related_id INT DEFAULT NULL
);

-- View relasi users ke guru
CREATE VIEW view_user_guru AS
SELECT u.id AS user_id, u.username, g.*
FROM users u
JOIN guru g ON u.related_id = g.id_guru
WHERE u.role = 'guru';

-- View relasi users ke murid
CREATE VIEW view_user_murid AS
SELECT u.id AS user_id, u.username, m.*
FROM users u
JOIN murid m ON u.related_id = m.id_murid
WHERE u.role = 'murid';

-- Contoh data user
INSERT INTO users (username, password, role) VALUES
('admin', MD5('admin123'), 'admin');

INSERT INTO users (username, password, role, related_id) VALUES
('guruku', MD5('gurupassword'), 'guru', 1),
('muridku', MD5('muridpassword'), 'murid', 1);
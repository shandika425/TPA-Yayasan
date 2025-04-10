
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

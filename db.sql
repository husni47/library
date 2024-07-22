CREATE DATABASE perpustakaan;

USE perpustakaan;

CREATE TABLE Anggota (
    id_anggota INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255),
    alamat VARCHAR(255),
    no_telepon VARCHAR(15)
);

CREATE TABLE Petugas (
    id_petugas INT AUTO_INCREMENT PRIMARY KEY,
    nama_petugas VARCHAR(255),
    jenis_kelamin VARCHAR(10),
    shift VARCHAR(50),
    alamat VARCHAR(255),
    jabatan VARCHAR(50)
);

CREATE TABLE Buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    penerbit VARCHAR(255),
    tahun_terbit INT
);

CREATE TABLE Kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(255),
    jenis_kategori VARCHAR(255)
);

CREATE TABLE Penulis (
    id_penulis INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255),
    asal_negara VARCHAR(255),
    jumlah_karya INT
);

CREATE TABLE Peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_anggota INT,
    id_petugas INT,
    tanggal_pinjam DATE,
    tanggal_kembali DATE
);

CREATE TABLE Detail_Peminjaman (
    id_detail_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_peminjaman INT,
    id_buku INT,
    nama_buku VARCHAR(255),
    denda DECIMAL(10, 2)
);

CREATE TABLE Melayani (
    id_petugas INT,
    id_peminjaman INT,
    PRIMARY KEY (id_petugas, id_peminjaman)
);

CREATE TABLE Terkait (
    id_peminjaman INT,
    id_detail_peminjaman INT,
    PRIMARY KEY (id_peminjaman, id_detail_peminjaman)
);

CREATE TABLE Indikasi (
    id_detail_peminjaman INT,
    id_buku INT,
    PRIMARY KEY (id_detail_peminjaman, id_buku)
);

CREATE TABLE Relasi_Buku_Kategori (
    id_buku INT,
    id_kategori INT,
    PRIMARY KEY (id_buku, id_kategori)
);

CREATE TABLE Relasi_Buku_Penulis (
    id_buku INT,
    id_penulis INT,
    PRIMARY KEY (id_buku, id_penulis)
);

CREATE TABLE Klasifikasi (
    id_kategori INT,
    id_buku INT,
    PRIMARY KEY (id_kategori, id_buku)
);

CREATE TABLE Penulisan (
    id_penulis INT,
    id_buku INT,
    PRIMARY KEY (id_penulis, id_buku)
);

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2025 at 11:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(1, 'Toilet dan WC'),
(2, 'Tempat Parkir'),
(3, 'Mushola'),
(4, 'Warung Makan'),
(5, 'WiFi'),
(6, 'Pemandu Wisata'),
(7, 'Area Bermain Anak'),
(8, 'Penginapan'),
(9, 'Spot Foto'),
(10, 'Toko Oleh-oleh'),
(11, 'Mobil');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Wisata Alam', 'Wisata yang menampilkan keindahan alam'),
(2, 'Wisata Budaya', 'Wisata yang berkaitan dengan budaya dan sejarah'),
(3, 'Wisata Religi', 'Wisata untuk tujuan spiritual'),
(4, 'Wisata Keluarga', 'Wisata yang cocok untuk keluarga'),
(5, 'Wisata Rekreasi', 'Tempat rekreasi dan hiburan'),
(6, 'Wisata Sejarah', 'Wisata sejarah cocok untuk yang mau belajar sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Magelang Utara'),
(2, 'Magelang Selatan'),
(3, 'Magelang Tengah'),
(4, 'Borobudur'),
(5, 'Secang'),
(6, 'Grabag'),
(7, 'Mertoyudan'),
(8, 'Salaman'),
(9, 'Mungkid'),
(10, 'Bandongan'),
(11, 'Kaliangkrik');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `nik_pemilik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pemilik`, `nik_pemilik`, `no_telp`) VALUES
(1, 'Siti Aminah', '3508123456789001', '08123456789'),
(2, 'Budi Santoso', '3508123456789002', '08123456790'),
(3, 'Ratna Dewi', '3508123456789003', '08123456791'),
(4, 'Eko Prasetyo', '3508123456789004', '08123456792'),
(5, 'Rina Kartika', '3508123456789005', '08123456793'),
(6, 'Dimas Wahyu', '3508123456789006', '08123456794'),
(7, 'Nur Hayati', '3508123456789007', '08123456795'),
(8, 'Andi Setiawan', '3508123456789008', '08123456796'),
(10, 'Yakiya Ratna Sari', NULL, '083825349154'),
(11, 'Zesi', '3508123456778901', '08123456788'),
(12, 'Yakiya Ratna Sari', '123038261731', '083825349154'),
(13, 'Yakiya', '3308115656789123', '087234678901'),
(14, 'Novia', '330811111112222', '083825349121'),
(15, 'Winda', '3308115656713452', '0888934678901'),
(16, 'Winda', '0335121821819', '08111112222333');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Yakiya Ratna Sari', 'yakiya', 'a92af96f3ceab65713b22f3f4c9558a6', '2025-11-02 15:57:16', NULL),
(2, 'Yakiya Ratna Sari', 'yak', '3cf7d3bc0742a5b8e30b3ccdad3a067b', '2025-11-02 15:57:16', '2025-11-02 08:58:24'),
(3, 'Darrel Novrilan', 'errel', '32ce4d49dad0dfd93bb0cad29a830b30', '2025-11-02 09:02:11', NULL),
(4, 'Zesi Walikhsani', 'zesi1', 'd1631fe08c954fb82b96042397efba9f', '2025-11-02 19:51:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `id_pemilik` int DEFAULT NULL,
  `id_kecamatan` int DEFAULT NULL,
  `id_kategori` int NOT NULL,
  `alamat` text,
  `jumlah_karyawan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `id_pemilik`, `id_kecamatan`, `id_kategori`, `alamat`, `jumlah_karyawan`) VALUES
(1, 'Punthuk Setumbuuuu', 1, 4, 1, 'Borobudur, Magelang', 15),
(2, 'Kyai Langgeng Park', 2, 2, 5, 'Jl. Cempaka No.6, Magelang Selatan', 30),
(3, 'Bukit Rhema (Gereja Ayam)', 3, 4, 3, 'Gombong, Borobudur', 20),
(4, 'Candi Mendut', 4, 9, 6, 'Jl. Mayor Kusen, Mungkid', 12),
(5, 'Air Terjun Sekar Langit', 5, 6, 1, 'Telogorejo, Grabag', 10),
(6, 'Kampoeng Wisata Borobudur', 6, 4, 2, 'Borobudur, Magelang', 18),
(7, 'Silancur Highland', 7, 5, 1, 'Dadapan, Kaliangkrik', 25),
(8, 'Taman Badaan', 8, 1, 4, 'Jl. Badaan, Magelang Utara', 8),
(14, 'Candi', 12, 1, 2, 'Magelang', 1234),
(15, 'Punthuk', 11, 6, 5, 'Magelang', 15),
(16, 'Kolam Renang', 13, 11, 5, 'Magelang', 14),
(17, 'Kolam ', 15, 10, 4, 'Magelang', 18);

-- --------------------------------------------------------

--
-- Table structure for table `wisata_fasilitas`
--

CREATE TABLE `wisata_fasilitas` (
  `id_wisata` int NOT NULL,
  `id_fasilitas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wisata_fasilitas`
--

INSERT INTO `wisata_fasilitas` (`id_wisata`, `id_fasilitas`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(14, 2),
(15, 2),
(1, 3),
(2, 3),
(3, 3),
(6, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(1, 4),
(2, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(2, 5),
(7, 5),
(15, 5),
(16, 5),
(17, 5),
(4, 6),
(14, 6),
(2, 7),
(6, 7),
(8, 7),
(1, 8),
(15, 8),
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(14, 9),
(3, 10),
(4, 10),
(6, 10),
(14, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD UNIQUE KEY `nik` (`nik_pemilik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `wisata_fasilitas`
--
ALTER TABLE `wisata_fasilitas`
  ADD PRIMARY KEY (`id_wisata`,`id_fasilitas`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`),
  ADD CONSTRAINT `wisata_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `wisata_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_wisata` (`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `wisata_fasilitas`
--
ALTER TABLE `wisata_fasilitas`
  ADD CONSTRAINT `wisata_fasilitas_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE,
  ADD CONSTRAINT `wisata_fasilitas_ibfk_2` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

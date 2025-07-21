-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2025 at 05:29 PM
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
-- Database: `ppdb_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `user`, `jenis`, `file`) VALUES
(6, 'Alin Sukmawati', 'pas_foto', 'pas_foto.jpeg'),
(7, 'Alin Sukmawati', 'akta_kelahiran', 'akta.jpeg'),
(8, 'Alin Sukmawati', 'transkrip_nilai', 'transkip_nilai.jpeg'),
(9, 'Alin Sukmawati', 'ijazah', 'ijazah.jpeg'),
(10, 'Alin Sukmawati', 'sertifikat', 'sertifikat.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `NISN` int NOT NULL,
  `alamat` text,
  `ttl` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `jalur_pendaftaran` varchar(20) DEFAULT NULL,
  `status` enum('diterima','ditolak') DEFAULT NULL,
  `pas_foto` varchar(255) DEFAULT NULL,
  `akta_kelahiran` varchar(255) DEFAULT NULL,
  `transkrip_nilai` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `user_id`, `nama`, `NISN`, `alamat`, `ttl`, `agama`, `asal_sekolah`, `jurusan`, `tahun_ajaran`, `jalur_pendaftaran`, `status`, `pas_foto`, `akta_kelahiran`, `transkrip_nilai`, `ijazah`, `sertifikat`) VALUES
(1, 1, 'Retno Mulyani', 1515, 'Tonjong', 'Brebes, 25 Juli 2010', 'Islam', 'SMP NEGERI 3 TALOK', 'BAHASA', '2025/2026', 'Reguler', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 9, 'Alin Sukmawati', 1616, 'Laren', 'Brebes, 4 April 2010', 'Islam', 'SMP NEGERI 2 BUMIAYU', 'IPS', '2025/2026', 'Prestasi', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pendaftar`
--

CREATE TABLE `data_pendaftar` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `jalur_pendaftaran` enum('prestasi','reguler') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'draft',
  `hasil` varchar(20) DEFAULT '-',
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `hasil`, `role`) VALUES
(1, 'retno', '$2y$10$yhNwnkhtXQoSdExMMkf0f.yO7HRj2btQ5ZnTDN5T6SQT55f293s/K', 'submitted', 'Diterima', 'user'),
(9, 'admin', '$2y$10$EoUR4gQpMGLKmT2/LSbsQeF9GgvugX83oWApdit8TRnZlZYAiEL2.', 'draft', 'Diterima', 'admin'),
(10, 'bela', '$2y$10$mM1DCUzqF5YrEis2zrfPaOlWuBrSotBLWm3oIJa95GY/CqbdMkTIO', 'draft', '-', 'user'),
(11, 'Retno Mulyani', '$2y$10$FbK3vrzBEOdskpKp1E1MTuMdVCipTiusHgx4KlTnVuXjL5FW8QOaK', 'draft', '-', 'user'),
(12, 'Alin Sukmawati', '$2y$10$.97p2tSx36aABjnpKJta0uLoy9avcm5GVF5LMfhtFT2Bewf8za6Oe', 'draft', '-', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pendaftar`
--
ALTER TABLE `data_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_pendaftar`
--
ALTER TABLE `data_pendaftar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

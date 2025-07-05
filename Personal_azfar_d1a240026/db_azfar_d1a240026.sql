-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 07:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_azfar_d1a240026`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(2) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `about`) VALUES
(1, 'Haiii! Saya Azfar M Wildan P, seorang mahasiswa aktif di Universitas Subang. Saat ini saya sedang menempuh pendidikan di Fakultas Ilmu Komputer, Program Studi Sistem Informasi, dan berada di semester 2.\r\n\r\nHalaman ini adalah halaman PHP pertama yang saya buat menggunakan Tailwind CSS versi CDN 4.0. Proyek ini merupakan langkah awal saya dalam mengembangkan keterampilan di bidang web development, khususnya dalam penggunaan framework CSS modern.\r\n\r\nTerima kasih telah mengunjungi halaman saya!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(5) NOT NULL,
  `nama_artikel` text NOT NULL,
  `isi_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `nama_artikel`, `isi_artikel`) VALUES
(1, 'Menjelajahi Dunia GTA V Roleplay di Server HopePully', 'Pengantar GTA V Roleplay\r\nGrand Theft Auto V (GTA V) adalah salah satu game open-world paling populer yang pernah dibuat oleh Rockstar Games. Selain mode cerita dan online-nya yang mendebarkan, komunitas pemain juga menciptakan dunia baru melalui Roleplay (RP). Dalam GTA V RP, pemain mengambil peran sebagai karakter yang hidup dalam dunia virtual, dengan aturan sosial, hukum, pekerjaan, dan kehidupan seperti di dunia nyata.\r\n\r\nApa Itu Server HopePully?\r\nHopePully adalah salah satu server GTA V RP yang berbasis di Indonesia, yang menawarkan pengalaman bermain yang realistis, seru, dan penuh cerita. Server ini dikenal dengan komunitasnya yang aktif dan tim manajemen yang profesional, yang berusaha memberikan pengalaman roleplay yang imersif dan adil untuk semua pemain.\r\n\r\nFitur-Fitur Unggulan di Server HopePully\r\nSistem Ekonomi Realistis\r\nHopePully menawarkan sistem ekonomi yang stabil dan seimbang. Pemain bisa menjalani berbagai pekerjaan legal seperti polisi, dokter, pemadam kebakaran, hingga wiraswasta. Untuk mereka yang lebih \"liar\", jalur kriminal juga tersedia seperti geng, mafia, atau bandar narkoba—tentu dengan risiko hukum yang tinggi.\r\n\r\nKustomisasi Karakter dan Kendaraan\r\nServer ini menyediakan banyak pilihan untuk kustomisasi karakter dan kendaraan. Pemain bisa mengatur gaya berpakaian, rambut, hingga aksesoris. Kendaraan pun dapat dimodifikasi sesuai keinginan, mulai dari mesin hingga tampilan.\r\n\r\nSkrip dan Sistem Unik\r\nHopePully menghadirkan berbagai skrip yang membuat gameplay lebih seru dan mendalam, seperti sistem luka dan kesehatan, sistem pengadilan, serta inventaris yang kompleks namun mudah digunakan.\r\n\r\nKomunitas yang Ramah dan Aktif\r\nSalah satu keunggulan HopePully adalah komunitasnya yang suportif. Pemain lama dengan senang hati membantu pemula. Selain itu, server ini sering mengadakan event seru seperti balap liar, turnamen tinju, hingga festival musik dalam game.\r\n\r\nCara Bergabung di HopePully\r\nUntuk bermain di server HopePully, kamu perlu:\r\n\r\nMemiliki game GTA V versi original.\r\n\r\nMenginstal aplikasi FiveM, yaitu platform untuk bermain GTA V modded.\r\n\r\nMendaftar dan melalui proses whitelist di komunitas resmi HopePully (biasanya melalui Discord).\r\n\r\nMengikuti aturan dan panduan roleplay sebelum bergabung ke dunia server.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(5) NOT NULL,
  `judul` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `judul`, `foto`) VALUES
(1, 'SAYA SEDANG BERMAIN GITAR', 'foto 1.jfif'),
(2, 'SAYA SEDANG TURNAMEN ML DENGAN TEMAN - TEMAN ', 'foto 6.jfif'),
(3, 'SAYA SEDANG DI CAFESHOP', 'foto 4.jfif'),
(4, 'SAYA DAN TEMAN - TEMAN SAYA ', 'foto 5.jfif'),
(5, 'SAYA SEDANG DI BANDUNG ', 'foto 3.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`) VALUES
('azfar', 'azfar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

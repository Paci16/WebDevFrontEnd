-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 03.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita0108` char(11) NOT NULL,
  `beritaJUDUL` varchar(255) NOT NULL,
  `kategoriberitavalencia` char(25) NOT NULL,
  `event0108` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita0108`, `beritaJUDUL`, `kategoriberitavalencia`, `event0108`) VALUES
('0909', '5 Makanan yang dapat dimasak dalam 5 menit !', 'Masak', '09/12/23'),
('09F', 'Kokk bisa? makan dengan jempol?', 'Fun Fact', '12/06/22'),
('12S', 'Beginilah efek dari sinar UV secara Sains!', 'Sains', '09/08/21'),
('80J', 'Hutan semakin menghilang', 'Jungle', '21/11/22'),
('908S', 'Apa kah hukum tyndall masih berlaku didunia???', 'Sains', '04/12/23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita0108`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

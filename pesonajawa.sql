-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2023 pada 03.25
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
('80J', 'Hutan semakin menghilang', 'Jungle', '21/11/22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `kategoriKODE` char(4) NOT NULL,
  `destinasiKET` text NOT NULL,
  `destinasiFOTO` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `kategoriKODE`, `destinasiKET`, `destinasiFOTO`) VALUES
('009G', 'Travel to Hotel', '70C', 'Perjalanan ke Kota Bandung', '4.jpg'),
('09F', 'Perjalanan ke Surabaya', '70C', 'Mengelingi kota Surabaya seharian kemana saja', 'ibis.jpg'),
('76J', 'Indahnya Pemandangan Sore Pantai Anyer', '09P', 'Melakukan perjalanan dan menikmati pemadangan di sore hari', '2020_1212_11242500.jpg'),
('89L', 'Helo its me', '09P', 'Yah begitulah', '1998CAM_2022_02_24_17_08_59_FN.jpg'),
('90D', 'Pasar Bali ', '70C', 'Perjalanan mengitari pasar yang terkenal di tempat tersebut', '3.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `namaWISATA` char(50) NOT NULL,
  `lokasiWISATA` char(120) NOT NULL,
  `fotoWISATA` char(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`namaWISATA`, `lokasiWISATA`, `fotoWISATA`) VALUES
('Center Jakarta', 'DKI Jakarta', '1998CAM_2022_02_24_17_11_39_FN.jpg'),
('Labuan Bajo', 'Bali', 'c2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `IDhotel` char(5) NOT NULL,
  `NAMAhotel` varchar(30) NOT NULL,
  `ALAMAThotel` varchar(120) NOT NULL,
  `FOTOhotel` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`IDhotel`, `NAMAhotel`, `ALAMAThotel`, `FOTOhotel`) VALUES
('89J', 'Pullman', 'Jakarta', '2022-02-24-050429109.jpg'),
('90L', 'Harris Hotel', 'Lampung', 'harris.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriberita`
--

CREATE TABLE `kategoriberita` (
  `kategoriberitaKODE` char(4) NOT NULL,
  `kategoriberitaNAMA` varchar(60) NOT NULL,
  `kategoriberitaKET` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategoriberita`
--

INSERT INTO `kategoriberita` (`kategoriberitaKODE`, `kategoriberitaNAMA`, `kategoriberitaKET`) VALUES
('helo', 'helo', 'helo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(25) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategoriwisata`
--

INSERT INTO `kategoriwisata` (`kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREFERENCE`) VALUES
('090G', 'Gunung', 'Gunung adalah suatu bentuk permukaan tanah yang letaknya jauh lebih tinggi daripada tanah-tanah di daerah sekitarnya.', 'Wikipedia'),
('09P', 'Pantai', 'Pantai adalah daerah di tepi perairan yang dipengaruhi oleh air pasang tertinggi dan surut terendah. Pantai merupakan batas antara wilayah yang bersifat daratan dengan wilayah yang bersifat lautan.', 'Wikipedia'),
('70C', 'City', ' Kota diartikan sebagai tempat tinggal dari beberapa ribu atau lebih penduduk, sedangkan perkotaan diartikan sebagai area terbangun dengan struktur dan jalan-jalan, sebagai suatu permukiman terpusat pada suatu area dengan kepadatan tertentu', 'Pemko'),
('90D', 'Hutan', 'hutan adalah suatu kesatuan ekosistem berupa hamparan lahan berisi sumber daya alam hayati yang didominasi pepohonan dalam persekutuan alam lingkungannya, yang satu dengan yang lainnya tidak dapat dipisahkan.', 'Wikipedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuliner`
--

CREATE TABLE `kuliner` (
  `namaKULINER` char(50) NOT NULL,
  `lokasiKULINER` char(255) NOT NULL,
  `fotoKULINER` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuliner`
--

INSERT INTO `kuliner` (`namaKULINER`, `lokasiKULINER`, `fotoKULINER`) VALUES
('Gulai Belacan', 'Riau', 'gulaibelacan.jpg'),
('Lapa-lapa', 'Sulawesi Tenggara', 'lapa-lapa.jpg'),
('Rendang', 'Sumatra Barat', 'ilustrasi-rendang-1_169.jpg'),
('Rujak Cingur', 'Jakarta', 'rujak-cingur_169.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi`
--

CREATE TABLE `transportasi` (
  `KODEtransport` char(5) NOT NULL,
  `JENIStransport` char(30) NOT NULL,
  `PLATtransport` char(10) NOT NULL,
  `KODEtravel` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transportasi`
--

INSERT INTO `transportasi` (`KODEtransport`, `JENIStransport`, `PLATtransport`, `KODEtravel`) VALUES
('54M', 'Mobil', 'B6543DWW', '75Q'),
('78B', 'Bus', 'B6575GRT', '12AS'),
('78KJ', 'Bus', 'B6575DWA', '90DS'),
('87MB', 'Mini Bus', 'B5432GFG', 'Kode'),
('88B', 'Bus', 'B1790KLO', '12AS'),
('89K', 'Mobil', 'B6575SDA', '12AS'),
('900JK', 'Mobil', 'B6575DAW', 'Kode');

-- --------------------------------------------------------

--
-- Struktur dari tabel `travel`
--

CREATE TABLE `travel` (
  `KODEtravel` char(5) NOT NULL,
  `NAMAtravel` char(50) NOT NULL,
  `LOKASItravel` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `travel`
--

INSERT INTO `travel` (`KODEtravel`, `NAMAtravel`, `LOKASItravel`) VALUES
('12AS', 'AsFast Travel', 'Denpasar'),
('75Q', 'Queenz Travel', 'Sulawesi Tenggara'),
('78L', 'KolJang Travel', 'Lombok'),
('90DS', 'IpKol Travel', 'Riau'),
('90L', 'LowKick Travel', 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('1202', 'Paci', 'user@gmail.com', 'cfb55a6388b712570b42fade1468fff4'),
('1604', 'valencia', 'paci16@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `valencia`
--

CREATE TABLE `valencia` (
  `valenciaID` char(5) NOT NULL,
  `valenciaKOTA` char(255) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `valencia`
--

INSERT INTO `valencia` (`valenciaID`, `valenciaKOTA`, `destinasiKODE`) VALUES
('08G', 'Lampung', '90D'),
('108J', 'Jakarta', '09F'),
('23B', 'Bogor', '09F'),
('787F', 'Jakarta', '009G'),
('99JK', 'Palembang', '009G');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita0108`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indeks untuk tabel `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`namaWISATA`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`IDhotel`);

--
-- Indeks untuk tabel `kategoriberita`
--
ALTER TABLE `kategoriberita`
  ADD PRIMARY KEY (`kategoriberitaKODE`);

--
-- Indeks untuk tabel `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indeks untuk tabel `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`namaKULINER`);

--
-- Indeks untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`KODEtransport`);

--
-- Indeks untuk tabel `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`KODEtravel`);

--
-- Indeks untuk tabel `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);

--
-- Indeks untuk tabel `valencia`
--
ALTER TABLE `valencia`
  ADD PRIMARY KEY (`valenciaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

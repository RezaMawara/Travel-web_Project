-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Jun 2024 pada 13.08
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
-- Database: `db_trasul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul` text NOT NULL,
  `artikel` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id`, `foto`, `judul`, `artikel`, `link`) VALUES
(1, 'artikel1.jpg', 'TAMAN NASIONAL BUNAKEN: SURGA BAWAH LAUT DENGAN PESONA TERUMBU KARANG', 'Taman Nasional Bunaken di Sulawesi Utara adalah surga menyelam dunia dengan lebih dari 390 jenis terumbu karang dan 2.000 spesies ikan, termasuk pari, hiu, dan kerapu. Destinasi ini menawarkan berbagai lokasi menyelam untuk semua tingkat keahlian, serta snorkeling, perjalanan perahu kaca, dan pantai indah. Sebagai Taman Nasional, Bunaken berkomitmen pada konservasi ekosistem lautnya, menjadikannya tempat yang wajib dikunjungi oleh pecinta alam dan penyelam.', 'https://digitani.ipb.ac.id/taman-nasional-bunaken-surga-bawah-laut-dengan-pesona-terumbu-karang/'),
(2, 'artikel2.jpg', 'Menjelajahi Keindahan Bawah Laut Pulau Siladen, Surga Tersembunyi di Sulawesi Utara', 'Pulau Siladen di Sulawesi Utara adalah destinasi tersembunyi yang menawarkan keindahan alam bawah laut dan pantai eksotis. Terletak di sebelah timur Pulau Bunaken, pulau ini dapat dicapai dengan perahu dari Pelabuhan Manado dalam 30-40 menit. Pulau Siladen menyuguhkan air jernih, pasir putih lembut, dan terumbu karang alami dengan berbagai spesies ikan cantik. Pengunjung dapat menikmati snorkeling, diving, serta bersantai di pantai yang tenang. Tersedia berbagai akomodasi mulai dari resort mewah hingga homestay sederhana. Pulau ini juga terkenal dengan matahari terbenam yang menakjubkan, menjadikannya destinasi sempurna untuk liburan dan bersantai.', 'https://manadopost.jawapos.com/kapol/28613602/menjelajahi-keindahan-bawah-laut-pulau-siladen-surga-tersembunyi-di-sulawesi-utara'),
(13, 'bunaken.jpg', 'sdadw', 'sdwa', 'sdwa'),
(14, 'bunaken.jpg', 'SDWA', 'SDWA', 'SDWA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_destination`
--

CREATE TABLE `tbl_destination` (
  `foto` varchar(255) NOT NULL,
  `judul` text NOT NULL,
  `artikel` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_destination`
--

INSERT INTO `tbl_destination` (`foto`, `judul`, `artikel`, `id`) VALUES
('image 6.png', 'fdsfsd', 'dfes', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`fullname`, `username`, `email`, `password`, `role`) VALUES
('Daffa Nur Fiat', 'daffa', 'admin@gmail.com', '12345678', 1),
('Daffa Nur Fiat', 'Daffa', 'Daffa@gmail.com', '12345678', 0),
('roman bojoh', 'roman', 'roman@gmail.com', '12345678', 0),
('sdadasads', 'sdadwa', 'sdfdf@gmail.com', 'sdfasdw', 0),
('sdadasads', 'sdadwa', 'sdwa@gmail.com', '12534', 0),
('sdadasads', 'sdadwa', 'sdwasd@gmail.com', 'sdwasd', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_destination`
--
ALTER TABLE `tbl_destination`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_destination`
--
ALTER TABLE `tbl_destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

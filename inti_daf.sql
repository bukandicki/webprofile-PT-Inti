-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Okt 2018 pada 05.26
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inti_daf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `ID_LAMARAN` int(5) NOT NULL,
  `NAMA` text NOT NULL,
  `TEMPAT` text NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT_LENGKAP` longtext NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `NO_TELEPON` varchar(13) NOT NULL,
  `LAMPIRAN_IJAZAH` varchar(100) NOT NULL,
  `LAMPIRAN_KTP` varchar(100) NOT NULL,
  `LAMPIRAN_HIDUP` varchar(100) NOT NULL,
  `LAMPIRAN_SKCK` varchar(100) NOT NULL,
  `FOTO` varchar(100) NOT NULL,
  `TANGGAL_LAMARAN` varchar(35) NOT NULL,
  `STATUS` enum('DITANGGUHKAN','DITERIMA','DITOLAK','BELUMDIBACA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lamaran`
--

INSERT INTO `lamaran` (`ID_LAMARAN`, `NAMA`, `TEMPAT`, `TANGGAL_LAHIR`, `ALAMAT_LENGKAP`, `EMAIL`, `NO_TELEPON`, `LAMPIRAN_IJAZAH`, `LAMPIRAN_KTP`, `LAMPIRAN_HIDUP`, `LAMPIRAN_SKCK`, `FOTO`, `TANGGAL_LAMARAN`, `STATUS`) VALUES
(1, 'Dicki Maulana', 'Bandung', '2001-02-16', 'Jl.Babakan Sari III Rt.001/15 No.08', 'dicqmawlanaucup@gmail.com', '0895411833747', '../data_lamaran/Dicki Maulana/53-512.png', '../data_lamaran/Dicki Maulana/@dickimaulana.png', '../data_lamaran/Dicki Maulana/a.pdf', '../data_lamaran/Dicki Maulana/cat-1583462__340.png', '../data_lamaran/Dicki Maulana/Untitled-1.png', '12 October, 2018', 'DITOLAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(5) NOT NULL,
  `LEVEL` enum('ADMIN','USER') NOT NULL,
  `STATUS` enum('ONLINE','OFFLINE') NOT NULL,
  `NAME` text NOT NULL,
  `USERNAME` varchar(15) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `LEVEL`, `STATUS`, `NAME`, `USERNAME`, `PASSWORD`) VALUES
(1, 'ADMIN', 'ONLINE', 'Cecep Jamaludin', 'admin', '90d4240d408a27ba4759dea9d758474b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`ID_LAMARAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `ID_LAMARAN` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

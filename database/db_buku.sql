-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2017 at 12:48 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kesehatan'),
(2, 'Olahraga'),
(3, 'IT'),
(4, 'Politik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `level` enum('master','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `email`, `password`, `level`) VALUES
(1, 'master@gmail.com', '4f26aeafdb2367620a393c973eddbe8f8b846ebd', 'master'),
(2, 'member1@gmail.com', 'bead7302b5d7d91a1c9fd800940081f90f4920f9', 'member'),
(3, 'member2@gmail.com', 'e3070b522277c5cf015a97fb86cbaefe3df1db8f', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(40) NOT NULL,
  `keterangan` text NOT NULL,
  `path_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `keterangan`, `path_foto`) VALUES
(1, 1, 'Panduan Kesehatan Wanita', 'Buku ini berisi tentang panduan kesehatan wanita', 'gambar_produk/panduan_kesehatan_wanita.jpeg'),
(2, 2, 'Ilmu Kesehatan Olahraga', 'Buku ini berisi tentang  ilmu kesehatan olahraga', 'gambar_produk/ilmu_kesehatan_olahraga.jpg'),
(3, 1, 'Gizi dan Kesehatan Masyarakat', 'Buku ini berisi tentang gizi dan kesehatan masyarakat', 'gambar_produk/gizi_dan_kesehatan_masyarakat.jpeg'),
(4, 3, 'Database System', 'Buku ini berisi tentang database system', 'gambar_produk/database_systems.jpg'),
(5, 4, 'Ilmu Politik', 'Buku ini berisi tentang ilmu politik', 'gambar_produk/ilmu_politik.jpg'),
(6, 3, 'Javascript', 'Buku ini berisi tentang Javascript', 'gambar_produk/javascript.jpg'),
(7, 2, 'Psikologi Olahraga', 'Buku ini berisi tentang psikologi olahraga', 'gambar_produk/psokologi_olahraga.jpg'),
(8, 3, 'Komunikasi Politik Khalayak dan Efek', 'Buku ini berisi tentang komunikasi politik khalayak dan efek', 'gambar_produk/komunikasi_politik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_member` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL DEFAULT 'Pria',
  `no_telepon` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `path_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_member`, `nama_lengkap`, `jenis_kelamin`, `no_telepon`, `alamat`, `path_foto`) VALUES
(1, 'Master', 'Pria', '085612345833', 'Kelapa Gading', 'foto_member/master.jpg'),
(2, 'Member 1', 'Wanita', '085612345678', 'Pulo Gadung', 'foto_member/member1.jpg'),
(3, 'Member 2', 'Pria', '087788888112', 'Rawamangun', 'foto_member/member2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD UNIQUE KEY `id_member` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD CONSTRAINT `tb_profil_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

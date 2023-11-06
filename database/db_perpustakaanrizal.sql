-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 08:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaanrizal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(5) NOT NULL,
  `nama_anggota` varchar(45) DEFAULT NULL,
  `no_telp_anggota` varchar(15) DEFAULT NULL,
  `alamat_anggota` varchar(50) DEFAULT NULL,
  `email_anggota` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nama_anggota`, `no_telp_anggota`, `alamat_anggota`, `email_anggota`) VALUES
(1, 'rizal', '080305030608', 'jln_sindang_palay', 'rzl4093@gmail.com'),
(2, 'romeo', '081234567890', 'cidahu', 'RR@gmail.com'),
(3, 'ramy', '082783638237', 'cibeber', 'rerea@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(5) NOT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `nama_buku` varchar(50) DEFAULT NULL,
  `stok` int(3) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `id_penerbit`, `id_rak`, `kategori`, `nama_buku`, `stok`, `harga`) VALUES
(1, 1, 1, 'harem', 'isekai', 199, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(45) DEFAULT NULL,
  `alamat_penerbit` text DEFAULT NULL,
  `kota_penerbit` varchar(40) DEFAULT NULL,
  `no_telp_penerbit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `nama_penerbit`, `alamat_penerbit`, `kota_penerbit`, `no_telp_penerbit`) VALUES
(1, 'rizal', 'sindangpalay', 'sukabumi', '083675920462'),
(5, 'ichika', 'isekai', 'jepang', '02174644738');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_pinjaman` int(11) DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id_pengembalian`, `id_pinjaman`, `tanggal_pengembalian`, `denda`, `total`) VALUES
(2, 1, '2023-03-24', 0, 200000),
(3, 2, '2023-03-23', 0, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjaman`
--

CREATE TABLE `tbl_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_pinjaman` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pinjaman`
--

INSERT INTO `tbl_pinjaman` (`id_pinjaman`, `id_buku`, `id_anggota`, `tanggal_pinjam`, `tanggal_kembali`, `status_pinjaman`) VALUES
(1, 1, 1, '2023-03-01', '2023-03-31', '1'),
(2, 1, 2, '2023-03-01', '2023-03-31', '1'),
(3, 1, 3, '2023-03-01', '2023-03-31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `kode_rak` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `kode_rak`) VALUES
(1, '001'),
(2, '002'),
(3, '003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_admin`, `username`, `password`) VALUES
(1, 'rizal', 'ed6b202e937c3e83cfc9f9ea1aedbe0e'),
(2, 'ramy', '5649461d621510108e84cd3967129663');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indexes for table `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- Indexes for table `tbl_pinjaman`
--
ALTER TABLE `tbl_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `tbl_penerbit` (`id_penerbit`),
  ADD CONSTRAINT `tbl_buku_ibfk_2` FOREIGN KEY (`id_rak`) REFERENCES `tbl_rak` (`id_rak`);

--
-- Constraints for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD CONSTRAINT `tbl_pengembalian_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `tbl_pinjaman` (`id_pinjaman`);

--
-- Constraints for table `tbl_pinjaman`
--
ALTER TABLE `tbl_pinjaman`
  ADD CONSTRAINT `tbl_pinjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tbl_buku` (`id_buku`),
  ADD CONSTRAINT `tbl_pinjaman_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `tbl_anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

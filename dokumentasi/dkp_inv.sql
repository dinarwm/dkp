-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2015 at 03:44 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkp_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(128) NOT NULL,
  `id_jenis` varchar(128) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `id_penyaluran` varchar(128) NOT NULL,
  `id_rak` varchar(128) NOT NULL,
  `id_status` int(11) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `barcode` varchar(128) NOT NULL,
  `lokasi_penempatan` varchar(256) NOT NULL,
  `foto_barang` longblob NOT NULL,
  `foto_bukti` longblob NOT NULL,
  `kode_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE IF NOT EXISTS `bidang` (
  `id_bidang` varchar(128) NOT NULL,
  `nama_bidang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
  `id_gudang` varchar(128) NOT NULL,
  `id_kasi` varchar(128) NOT NULL,
  `nama_gudang` varchar(128) NOT NULL,
  `alamat_gudang` varchar(256) NOT NULL,
  `pj_gudang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id_jenis` varchar(128) NOT NULL,
  `nama_jenis` varchar(256) NOT NULL,
  `stok` int(11) NOT NULL,
  `nomor_kpb` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kasi`
--

CREATE TABLE IF NOT EXISTS `kasi` (
  `id_kasi` varchar(128) NOT NULL,
  `id_bidang` varchar(128) NOT NULL,
  `nama_kasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_barang`
--

CREATE TABLE IF NOT EXISTS `kondisi_barang` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran`
--

CREATE TABLE IF NOT EXISTS `penyaluran` (
  `id_penyaluran` varchar(128) NOT NULL,
  `nama_penerima` varchar(128) NOT NULL,
  `tgl_penyaluran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_penyaluran` varchar(64) NOT NULL,
  `nomor_surat` varchar(128) NOT NULL,
  `tgl_surat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE IF NOT EXISTS `rak` (
  `id_rak` varchar(128) NOT NULL,
  `id_gudang` varchar(128) NOT NULL,
  `nama_rak` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_barang`
--

CREATE TABLE IF NOT EXISTS `status_barang` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(128) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `jabatan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kasi`
--
ALTER TABLE `kasi`
  ADD PRIMARY KEY (`id_kasi`);

--
-- Indexes for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `penyaluran`
--
ALTER TABLE `penyaluran`
  ADD PRIMARY KEY (`id_penyaluran`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `status_barang`
--
ALTER TABLE `status_barang`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

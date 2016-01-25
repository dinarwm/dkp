-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2016 at 11:25 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kondisi` int(11) DEFAULT NULL,
  `id_penyaluran` varchar(128) DEFAULT NULL,
  `id_pengadaan` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `lokasi_penempatan` varchar(256) DEFAULT NULL,
  `harga_satuan` bigint(20) DEFAULT NULL,
  `harga_total` bigint(20) DEFAULT NULL,
  `foto_bukti` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `id_kondisi`, `id_penyaluran`, `id_pengadaan`, `id_rak`, `id_status`, `jumlah_barang`, `lokasi_penempatan`, `harga_satuan`, `harga_total`, `foto_bukti`) VALUES
(49, 1, 1, NULL, 75, 2, 1, 1, '', 1, 1, ''),
(50, 1, 1, NULL, 76, 1, 1, 1, '', 1, 1, ''),
(51, 1, 1, NULL, 76, 1, 1, 1, '', 1, 1, ''),
(52, 1, 1, NULL, 77, 1, 1, 10, '', 3, 30, ''),
(53, 1, 1, NULL, 77, 1, 1, 10, '', 3, 30, ''),
(54, 1, 1, NULL, 78, 2, 1, 100, '', 1111, 111100, ''),
(55, 2, 1, NULL, 78, 2, 1, 100, '', 1111, 111100, ''),
(56, 1, 1, NULL, 79, 3, 1, 1, '', 13213123, 13213123, ''),
(57, 2, 1, NULL, 79, 2, 1, 1, '', 13213123, 13213123, ''),
(60, 1, NULL, 'PNY01102016-01', NULL, NULL, 3, 12, 'Dinas', NULL, NULL, NULL),
(61, 2, NULL, 'PNY01102016-01', NULL, NULL, 3, 123, 'Dinas', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama_gudang` varchar(128) NOT NULL,
  `alamat_gudang` varchar(256) DEFAULT NULL,
  `pj_gudang` varchar(128) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama_gudang`, `alamat_gudang`, `pj_gudang`, `deleted_at`) VALUES
(1, 'Penerangan Jalan Umum (PJU)', NULL, 'Moh. Nur Fathan', NULL),
(2, 'Alat Tulis Kantor', NULL, 'Moh. Nur Fathan', NULL),
(3, 'Peralatan Kebersihan', NULL, 'Moh. Nur Fathan', NULL),
(4, 'Tanaman', NULL, 'Moh. Nur Fathan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(256) NOT NULL,
  `stok` int(11) NOT NULL,
  `nomor_kpb` varchar(128) NOT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `jenis_barang` varchar(40) DEFAULT NULL,
  `tipe` varchar(64) DEFAULT NULL,
  `warna` varchar(64) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `barcode` varchar(512) DEFAULT NULL,
  `foto_barang` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama_jenis`, `stok`, `nomor_kpb`, `satuan`, `jenis_barang`, `tipe`, `warna`, `deleted_at`, `barcode`, `foto_barang`) VALUES
(1, 'Amplop putih besar', 123, '0', 'box', NULL, NULL, NULL, NULL, '', NULL),
(2, 'Amplop putih kecil', 101, '0', 'box', NULL, NULL, NULL, NULL, '', NULL),
(3, 'hoho', 199, '123', 'kilo', NULL, NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_barang`
--

CREATE TABLE IF NOT EXISTS `kondisi_barang` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(30) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi_barang`
--

INSERT INTO `kondisi_barang` (`id_kondisi`, `nama_kondisi`, `deleted_at`) VALUES
(1, 'Baik', NULL),
(2, 'Rusak', NULL),
(3, 'Hilang', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `tipe_pengadaan` varchar(20) DEFAULT NULL,
  `asal_penerimaan` varchar(128) DEFAULT NULL,
  `no_ba_penerimaan` varchar(128) DEFAULT NULL,
  `no_ba_pemeriksaan` varchar(128) DEFAULT NULL,
  `no_ba_serahterima` varchar(128) DEFAULT NULL,
  `tgl_ba_penerimaan` date DEFAULT NULL,
  `tgl_ba_pemeriksaan` date DEFAULT NULL,
  `tgl_ba_serahterima` date DEFAULT NULL,
  `kegiatan` varchar(128) DEFAULT NULL,
  `nomer_spk` varchar(128) DEFAULT NULL,
  `tgl_spk` date DEFAULT NULL,
  `uraian_pekerjaan` varchar(512) DEFAULT NULL,
  `nama_rekanan` varchar(128) DEFAULT NULL,
  `alamat_rekanan` varchar(256) DEFAULT NULL,
  `nilai_spk` bigint(20) DEFAULT NULL,
  `rekening_belanja` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `tipe_pengadaan`, `asal_penerimaan`, `no_ba_penerimaan`, `no_ba_pemeriksaan`, `no_ba_serahterima`, `tgl_ba_penerimaan`, `tgl_ba_pemeriksaan`, `tgl_ba_serahterima`, `kegiatan`, `nomer_spk`, `tgl_spk`, `uraian_pekerjaan`, `nama_rekanan`, `alamat_rekanan`, `nilai_spk`, `rekening_belanja`) VALUES
(74, 'hibah', '1', NULL, NULL, '', NULL, NULL, '2015-11-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'hibah', '1', NULL, NULL, '', NULL, NULL, '2015-11-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'pemda', '1', NULL, NULL, '1', NULL, NULL, '2015-09-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'pemda', '1', NULL, NULL, '1', NULL, NULL, '2015-07-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'hibah', '1', NULL, NULL, '', NULL, NULL, '2015-09-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'pengadaan', NULL, '', '', NULL, '0000-00-00', '0000-00-00', NULL, '', '', '0000-00-00', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran`
--

CREATE TABLE IF NOT EXISTS `penyaluran` (
  `id_penyaluran` varchar(128) NOT NULL,
  `nama_penerima` varchar(128) NOT NULL,
  `tgl_penyaluran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nomor_surat` varchar(128) NOT NULL,
  `tgl_surat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyaluran`
--

INSERT INTO `penyaluran` (`id_penyaluran`, `nama_penerima`, `tgl_penyaluran`, `nomor_surat`, `tgl_surat`) VALUES
('PNY01102016-01', 'Udin', '2016-09-30 17:00:00', 'DKP_COK_01', '2016-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE IF NOT EXISTS `rak` (
  `id_rak` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `nama_rak` varchar(128) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `id_gudang`, `nama_rak`, `deleted_at`) VALUES
(1, 1, 'Rak 1', NULL),
(2, 2, 'Rak 2', NULL),
(3, 2, 'Rak 3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_barang`
--

CREATE TABLE IF NOT EXISTS `status_barang` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(128) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_barang`
--

INSERT INTO `status_barang` (`id_status`, `nama_status`, `deleted_at`) VALUES
(1, 'OK', NULL),
(2, 'Out', NULL),
(3, 'Reported', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `jabatan` varchar(64) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jabatan`, `password`, `deleted_at`) VALUES
(3, 'asd', 'Admin', 'a8f5f167f44f4964e6c998dee827110c', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `FK_barang_jenis` (`id_jenis`),
  ADD KEY `FK_barang` (`id_kondisi`),
  ADD KEY `FK_barang_penyaluran` (`id_penyaluran`),
  ADD KEY `FK_barang_pengadaan` (`id_pengadaan`),
  ADD KEY `FK_barang_rak` (`id_rak`),
  ADD KEY `FK_barang_status` (`id_status`);

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
-- Indexes for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `penyaluran`
--
ALTER TABLE `penyaluran`
  ADD PRIMARY KEY (`id_penyaluran`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`),
  ADD KEY `FK_rak` (`id_gudang`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status_barang`
--
ALTER TABLE `status_barang`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_barang` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_barang` (`id_kondisi`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_barang_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_barang_pengadaan` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan` (`id_pengadaan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_barang_rak` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id_rak`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_barang_status` FOREIGN KEY (`id_status`) REFERENCES `status_barang` (`id_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `rak`
--
ALTER TABLE `rak`
  ADD CONSTRAINT `FK_rak` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2015 at 12:38 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

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
  `id_kondisi` int(11) NOT NULL,
  `id_penyaluran` int(11) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `barcode` varchar(128) NOT NULL,
  `ukuran` varchar(128) NOT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `lokasi_penempatan` varchar(256) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `harga_total` bigint(20) NOT NULL,
  `foto_barang` varchar(256) NOT NULL,
  `foto_bukti` varchar(256) NOT NULL,
  `kode_barang` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
  `id_gudang` int(11) NOT NULL,
  `id_kasi` int(128) NOT NULL,
  `nama_gudang` varchar(128) NOT NULL,
  `alamat_gudang` varchar(256) NOT NULL,
  `pj_gudang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama_jenis`, `stok`, `nomor_kpb`, `satuan`, `jenis_barang`, `tipe`, `warna`, `deleted_at`) VALUES
(1, 'Amplop putih besar', 0, '0', 'box', NULL, NULL, NULL, NULL),
(2, 'Amplop putih kecil', 0, '0', 'box', NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `tipe_pengadaan`, `asal_penerimaan`, `no_ba_penerimaan`, `no_ba_pemeriksaan`, `no_ba_serahterima`, `tgl_ba_penerimaan`, `tgl_ba_pemeriksaan`, `tgl_ba_serahterima`, `kegiatan`, `nomer_spk`, `tgl_spk`, `uraian_pekerjaan`, `nama_rekanan`, `alamat_rekanan`, `nilai_spk`, `rekening_belanja`) VALUES
(8, 'pemda', '123', NULL, NULL, '123', NULL, NULL, '2015-01-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'pemda', 'Pemda', NULL, NULL, '123', NULL, NULL, '2015-01-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran`
--

CREATE TABLE IF NOT EXISTS `penyaluran` (
  `id_penyaluran` int(11) NOT NULL,
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
  `id_rak` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `nama_rak` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'pemeriksaan BPHP', NULL),
(2, 'OK', NULL),
(3, 'out', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jabatan`, `password`, `deleted_at`) VALUES
(1, 'asd', 'asd', 'asd', '0000-00-00 00:00:00'),
(2, 'dg', 'jd', 'kdf', '0000-00-00 00:00:00');

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `penyaluran`
--
ALTER TABLE `penyaluran`
  MODIFY `id_penyaluran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_barang`
--
ALTER TABLE `status_barang`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `FK_barang_penyaluran` FOREIGN KEY (`id_penyaluran`) REFERENCES `penyaluran` (`id_penyaluran`) ON DELETE NO ACTION ON UPDATE CASCADE,
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

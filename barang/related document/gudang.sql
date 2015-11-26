-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Nov 2015 pada 10.48
-- Versi Server: 5.6.25
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
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_kondisi` int(11) DEFAULT NULL,
  `id_penyaluran` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `nama_barang` varchar(200) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `barcode` longblob,
  `lokasi_penempatan` varchar(200) DEFAULT NULL,
  `foto_barang` longblob,
  `foto_bukti` longblob,
  `kode_rekening` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE IF NOT EXISTS `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
  `id_gudang` int(11) NOT NULL,
  `id_kasi` int(11) DEFAULT NULL,
  `nama_gudang` varchar(100) DEFAULT NULL,
  `alamat_gudang` varchar(200) DEFAULT NULL,
  `pj_gudang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `nomor_kpb` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasi`
--

CREATE TABLE IF NOT EXISTS `kasi` (
  `id_kasi` int(11) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `nama_kasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_barang`
--

CREATE TABLE IF NOT EXISTS `kondisi_barang` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyaluran`
--

CREATE TABLE IF NOT EXISTS `penyaluran` (
  `id_penyaluran` int(11) NOT NULL,
  `nama_penerima` varchar(100) DEFAULT NULL,
  `tgl_penyaluran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_penyaluran` varchar(50) DEFAULT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE IF NOT EXISTS `rak` (
  `id_rak` int(11) NOT NULL,
  `id_gudang` int(11) DEFAULT NULL,
  `nama_rak` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_barang`
--

CREATE TABLE IF NOT EXISTS `status_barang` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `FK_barang_kondisi` (`id_kondisi`),
  ADD KEY `FK_barang_jenis` (`id_jenis`),
  ADD KEY `FK_barang` (`id_status`),
  ADD KEY `FK_barang_penyaluran` (`id_penyaluran`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `FK_gudang_kasi` (`id_kasi`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kasi`
--
ALTER TABLE `kasi`
  ADD PRIMARY KEY (`id_kasi`),
  ADD KEY `FK_kasi_bidang` (`id_bidang`);

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
  ADD PRIMARY KEY (`id_rak`),
  ADD KEY `FK_rak_gudang` (`id_gudang`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kasi`
--
ALTER TABLE `kasi`
  MODIFY `id_kasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_barang` FOREIGN KEY (`id_status`) REFERENCES `status_barang` (`id_status`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_barang_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_barang_kondisi` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_barang` (`id_kondisi`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_barang_penyaluran` FOREIGN KEY (`id_penyaluran`) REFERENCES `penyaluran` (`id_penyaluran`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `FK_gudang_kasi` FOREIGN KEY (`id_kasi`) REFERENCES `kasi` (`id_kasi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kasi`
--
ALTER TABLE `kasi`
  ADD CONSTRAINT `FK_kasi_bidang` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD CONSTRAINT `FK_rak_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2017 at 11:31 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ferrscreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(25) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `hp` varchar(25) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `limit_piutang` int(11) DEFAULT NULL,
  `jatuh_tempo` int(11) DEFAULT NULL,
  `is_aktif` enum('0','1') NOT NULL COMMENT '0 = not aktif, 1 = aktif',
  `id_kota` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_merk` int(11) DEFAULT NULL,
  `kode` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL COMMENT 'harga jual',
  `deskripsi` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `komisi_low` int(11) NOT NULL COMMENT 'komisi ketika ambil harga low',
  `komisi_diskon` int(11) NOT NULL COMMENT 'komisi ketika ambil harga diskon',
  `komisi_normal` int(11) NOT NULL COMMENT 'komisi ketika ambil harga normal',
  `plus_low` int(11) NOT NULL COMMENT 'wipes / tempered glass yg low',
  `plus_normal` int(11) NOT NULL COMMENT 'wipes / tempered glass yg normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `komisi_low`, `komisi_diskon`, `komisi_normal`, `plus_low`, `plus_normal`) VALUES
(1, 500, 300, 1000, 1000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `deskripsi`, `created_at`) VALUES
(1, 'ADMIN', NULL, '2017-10-15 15:02:54'),
(2, 'SALES', NULL, '2017-10-15 15:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_beli`
--

CREATE TABLE `nota_beli` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL COMMENT 'generated otomatis',
  `id_user` int(11) DEFAULT NULL COMMENT 'admin yang buat nota',
  `id_supplier` int(11) DEFAULT NULL,
  `tgl_buat` datetime NOT NULL,
  `waktu_kirim` int(11) DEFAULT NULL COMMENT 'dalam hari',
  `total` int(11) NOT NULL,
  `ppn` float DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `grand_total` int(11) NOT NULL,
  `deskripsi` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_beli_barang`
--

CREATE TABLE `nota_beli_barang` (
  `id_nota_beli` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `deskripsi` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_jual`
--

CREATE TABLE `nota_jual` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL COMMENT 'kode unik hasil generate',
  `id_user` int(11) DEFAULT NULL COMMENT 'admin yang membuat nota',
  `id_customer` int(11) DEFAULT NULL,
  `waktu_kirim` int(11) DEFAULT NULL COMMENT 'dalam hari',
  `total` int(11) NOT NULL,
  `ppn` float DEFAULT NULL COMMENT 'dalam persentase',
  `diskon` float DEFAULT NULL,
  `biaya_kirim` int(11) DEFAULT NULL,
  `grand_total` int(11) NOT NULL,
  `deskripsi` text,
  `is_terkirim` enum('0','1') NOT NULL COMMENT '0 = belom terkirim, 1 = terkirim',
  `created_at` datetime NOT NULL COMMENT 'untuk tanggal pembuatan nota'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(25) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `hp` varchar(25) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `limit_hutang` int(11) DEFAULT NULL,
  `jatuh_tempo` int(11) DEFAULT NULL,
  `is_aktif` enum('0','1') NOT NULL COMMENT '0 = not aktif, 1 = aktif',
  `id_kota` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_barang`
--

CREATE TABLE `supplier_barang` (
  `id_supplier` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL COMMENT 'harga beli dari supplier',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL COMMENT 'kode unik hasil generate',
  `id_user` int(11) NOT NULL COMMENT 'sales yang kirim',
  `id_nota_jual` int(11) NOT NULL,
  `created_at` datetime NOT NULL COMMENT 'tanggal buat surat jalan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text,
  `telp` varchar(25) DEFAULT NULL,
  `hp` varchar(25) DEFAULT NULL,
  `deskripsi` text,
  `tgl_masuk` datetime NOT NULL,
  `tgl_keluar` datetime DEFAULT NULL,
  `is_aktif` enum('0','1') NOT NULL COMMENT '0 = sudah keluar, 1 = aktif',
  `id_kota` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_jabatan`
--

CREATE TABLE `user_jabatan` (
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota_beli`
--
ALTER TABLE `nota_beli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `nota_beli_barang`
--
ALTER TABLE `nota_beli_barang`
  ADD PRIMARY KEY (`id_nota_beli`,`id_barang`),
  ADD KEY `fk_notabelibarang_barnag` (`id_barang`);

--
-- Indexes for table `nota_jual`
--
ALTER TABLE `nota_jual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `supplier_barang`
--
ALTER TABLE `supplier_barang`
  ADD PRIMARY KEY (`id_supplier`,`id_barang`),
  ADD KEY `fk_supplierbarang_barang` (`id_barang`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
  ADD PRIMARY KEY (`id_user`,`id_jabatan`),
  ADD KEY `fk_userjabatan_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nota_beli`
--
ALTER TABLE `nota_beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nota_jual`
--
ALTER TABLE `nota_jual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `fk_detailbarang_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detailbarang_merk` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `fk_kota_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `nota_beli`
--
ALTER TABLE `nota_beli`
  ADD CONSTRAINT `fk_notabeli_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notabeli_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `nota_beli_barang`
--
ALTER TABLE `nota_beli_barang`
  ADD CONSTRAINT `fk_notabelibarang_barnag` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notabelibarang_notabeli` FOREIGN KEY (`id_nota_beli`) REFERENCES `nota_beli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_jual`
--
ALTER TABLE `nota_jual`
  ADD CONSTRAINT `fk_notajual_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notajual_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `fk_supplier_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `supplier_barang`
--
ALTER TABLE `supplier_barang`
  ADD CONSTRAINT `fk_supplierbarang_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supplierbarang_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
  ADD CONSTRAINT `fk_userjabatan_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userjabatan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

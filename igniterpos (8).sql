-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2023 pada 03.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igniterpos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `satuan_id`, `jenis_id`, `harga`) VALUES
('CA0000', 'WEN Benchtop Drill Press', 101, 3, 8, 177),
('CA0001', 'Hermes Hardware Magnetic Drilling Machine', 159, 3, 8, 296),
('CA0002', 'CubiCubi Study Computer Desk', 89, 3, 13, 97),
('CA0003', 'Samsung 870 EVO 1TB SATA III Internal SSD', 219, 3, 14, 102),
('CA0004', 'Logitech BRIO Ultra HD Webcam', 73, 2, 9, 224),
('CA0005', 'MR.SIGA Microfiber Cleaning Cloth', 552, 2, 10, 11),
('CA0006', 'Amazon Basics LR44 Alkaline Button Coin Cell Battery', 1105, 2, 12, 4),
('CA0007', 'Kaisi 136 in 1 Electronics Repair Tool Kit', 141, 2, 11, 47),
('CA0008', 'Logitech MK270 Wireless Keyboard', 242, 3, 9, 31),
('CA0009', 'Duracell CopperTop Alkaline Batteries', 823, 2, 12, 16),
('CA0010', 'SAMSUNG T5 1TB External SSD', 116, 3, 14, 105),
('CA0011', 'Bolanburg Console Table', 9, 3, 13, 575),
('CA0012', 'Air Fryer Max XL Digital Hot Oven Cooker', 108, 3, 15, 119);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_penerima` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `diskon` double(11,0) DEFAULT 0,
  `total_nominal` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `user_id`, `nama_penerima`, `alamat`, `tanggal_keluar`, `diskon`, `total_nominal`, `grand_total`) VALUES
('S2106030000', 1, 'Colin Stuart', '2445 Allace Avenue', '2021-06-03', 3, 407, 404),
('S2106030001', 1, 'Naomi Valencia', '1560  Lonely Oak Drive', '2021-06-03', 4, 837, 833),
('S2106030002', 1, 'Christine', '71 Bridge Road', '2021-06-03', 1, 1568, 1567),
('S2106030003', 1, 'Wilson Smith', '714 Bleck Street', '2021-06-03', 3, 544, 541),
('S2106030004', 1, 'Stephen McCaul', '714 Alv Lane', '2021-06-03', 2, 1792, 1790),
('S2106030005', 1, 'Christopher Coates', '2471 Strother Street', '2021-06-03', 15, 8984, 8969),
('S2106030006', 1, 'Michelle Jacobson', '2270 Skips Lane', '2021-06-03', 15, 2023, 2008);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar_copy1`
--

CREATE TABLE `barang_keluar_copy1` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `nama_penerima` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `total_nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Trigger `barang_keluar_copy1`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar_copy1` BEFORE INSERT ON `barang_keluar_copy1` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar_dtl`
--

CREATE TABLE `barang_keluar_dtl` (
  `id_detail` int(11) NOT NULL,
  `id_barang_keluar` char(16) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `total_nominal_dtl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `barang_keluar_dtl`
--

INSERT INTO `barang_keluar_dtl` (`id_detail`, `id_barang_keluar`, `barang_id`, `harga`, `jumlah_keluar`, `total_nominal_dtl`) VALUES
(20, 'S2106030000', 'CA0005', 11, 37, 407),
(21, 'S2106030001', 'CA0008', 31, 27, 837),
(22, 'S2106030002', 'CA0004', 224, 7, 1568),
(23, 'S2106030003', 'CA0009', 16, 29, 464),
(24, 'S2106030003', 'CA0006', 4, 20, 80),
(25, 'S2106030004', 'CA0004', 224, 8, 1792),
(26, 'S2106030005', 'CA0010', 105, 56, 5880),
(27, 'S2106030005', 'CA0002', 97, 32, 3104),
(28, 'S2106030006', 'CA0012', 119, 17, 2023);

--
-- Trigger `barang_keluar_dtl`
--
DELIMITER $$
CREATE TRIGGER `delete_stok_keluar` AFTER DELETE ON `barang_keluar_dtl` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + OLD.jumlah_keluar WHERE `barang`.`id_barang` = OLD.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar_dtl` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(16) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(8, 'Machinery'),
(9, 'Computer Accessories'),
(10, 'Cleaning Supplies'),
(11, 'Repair Tools'),
(12, 'Batteries'),
(13, 'Furniture'),
(14, 'Computer Components'),
(15, 'Home & Kitchen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ncr`
--

CREATE TABLE `ncr` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `end_user` varchar(100) NOT NULL,
  `vendor_panel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `management_project` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id_panel` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `panel_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `panel_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quality_inspector` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `panel_vendor` varchar(100) NOT NULL,
  `production` int(11) NOT NULL,
  `engineering` int(11) NOT NULL,
  `conditions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_panel`, `supplier_id`, `panel_name`, `panel_number`, `quality_inspector`, `date`, `panel_vendor`, `production`, `engineering`, `conditions`) VALUES
(10, 17, '150kV SAS Server Panel 1', 'SC1+X1', '', '0000-00-00', 'GSPE', 0, 0, 'Complete 100%'),
(11, 18, '150kV SAS Server Panel 1', '', '', '0000-00-00', 'GSPE', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(2, 'units'),
(3, 'Piece'),
(5, 'Unit'),
(6, 'KG'),
(7, 'Meter'),
(8, 'yoga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_number` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `end_user` varchar(50) NOT NULL,
  `vendor_panel` varchar(50) NOT NULL,
  `management_project` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `project_name`, `project_number`, `customer`, `end_user`, `vendor_panel`, `management_project`) VALUES
(18, 'Rele Obsoleted (UP2B Jabar & Jateng DIY)', 'S24040', 'PT. PLN UIP2B Jamali', 'PT. PLN (PERSERO)', 'GSPE', 'Dwi Puspito Rini'),
(19, '150kV GITET Ampel New_150kV Side', 'N25074', 'PT. Siemens Indonesia GP EPC TS-ID', 'PT. PLN (PERSERO)', 'PT. Graha Sumber Prima Elektronik', 'Dwi Puspito Rini'),
(20, '500kV GITET Ampel', 'N25074', 'PT. Siemens Indonesia GP EPC TS-ID', 'PT. PLN (PERSERO)', 'PT. Graha Sumber Prima Elektronik', 'Dwi Puspito Rini'),
(21, 'Jawa 9&10 - 2x1000MW - Coal Fired Steam Power Plan', 'N15085', 'Hutama Karya - Doosan', 'PT. Indoraya - Doosan', 'PT. Graha Sumber Prima Elektronik', 'Dwi Puspito Rini'),
(22, '150kV GIS Power Distribution System RAPP Phase II', 'N15153', 'SE-GP T SO', 'PT. Riau Andalan Pulp & Paper', 'PT. Graha Sumber Prima Elektronik', 'Ahmad Randi Saputra'),
(23, 'SCADA Manyar Smelter', 'S27092', 'PT. Chiyoda International Indonesia', 'PT. Freeport Indonesia', 'PT. Graha Sumber Prima Elektronik', 'Ahmad Randi Saputra'),
(24, '150kV Capacitor Bay GI Puger-2', 'S23145', 'PT. Mahakam Jaya Sejahtera', 'PT. PLN (PERSERO)', 'PT. Graha Sumber Prima Elektronik', 'Ahmad Randi Saputra'),
(25, 'SCADA Pertamina Hulu Rokan', 'S33014', 'PT. Tritama Mitra Lestari', 'PT. Pertamina Power Indonesia', 'PT. Graha Sumber Prima Elektronik', 'Adiatma'),
(26, 'Sistem Kelistrikan Istana Negara', 'S23132', 'KSO Nindya - Mahakam', 'PT. PLN PERSERO', 'PT. Graha Sumber Prima Elektronik', 'Adiatma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('gudang','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Administrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$7rLSvRVyTQORapkDOqmkhetjF6H9lJHngr4hJMSM2lHObJbW5EQh6', 1568689561, 'admin-icn.png', 1),
(7, 'Will Williams', 'williams', 'williams@gmail.com', '7401000010', 'gudang', '$2y$10$5es8WhFQj8xCmrhDtH86Fu71j97og9f8aR4T22soa7716kAusmaeK', 1568691611, 'user.png', 1),
(15, 'Liam Moore', 'liamoore', 'liamoore@gmail.com', '7474754520', 'gudang', '$2y$10$1Yxca5aH4q8XZpMZm0kE..IZk1L/tqDYS0JkAr.mWJ7BeNmRzYdCq', 1622746060, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE,
  ADD KEY `satuan_id` (`satuan_id`) USING BTREE,
  ADD KEY `kategori_id` (`jenis_id`) USING BTREE;

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`) USING BTREE,
  ADD KEY `id_user` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `barang_keluar_copy1`
--
ALTER TABLE `barang_keluar_copy1`
  ADD PRIMARY KEY (`id_barang_keluar`) USING BTREE,
  ADD KEY `id_user` (`user_id`) USING BTREE,
  ADD KEY `barang_id` (`barang_id`) USING BTREE;

--
-- Indeks untuk tabel `barang_keluar_dtl`
--
ALTER TABLE `barang_keluar_dtl`
  ADD PRIMARY KEY (`id_detail`) USING BTREE,
  ADD KEY `barang_keluar_dtl_ibfk_1` (`id_barang_keluar`) USING BTREE;

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`) USING BTREE,
  ADD KEY `id_user` (`user_id`) USING BTREE,
  ADD KEY `supplier_id` (`supplier_id`) USING BTREE,
  ADD KEY `barang_id` (`barang_id`) USING BTREE;

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`) USING BTREE;

--
-- Indeks untuk tabel `ncr`
--
ALTER TABLE `ncr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_panel`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`) USING BTREE;

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar_dtl`
--
ALTER TABLE `barang_keluar_dtl`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ncr`
--
ALTER TABLE `ncr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id_panel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar_copy1`
--
ALTER TABLE `barang_keluar_copy1`
  ADD CONSTRAINT `barang_keluar_copy1_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_copy1_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar_dtl`
--
ALTER TABLE `barang_keluar_dtl`
  ADD CONSTRAINT `barang_keluar_dtl_ibfk_1` FOREIGN KEY (`id_barang_keluar`) REFERENCES `barang_keluar` (`id_barang_keluar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

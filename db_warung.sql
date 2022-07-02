-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 06:27 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warung`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_user`
--

CREATE TABLE `akses_user` (
  `id_akses` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_user`
--

INSERT INTO `akses_user` (`id_akses`, `nama`, `ket`) VALUES
(1, 'admin', 'Administrator'),
(2, 'pimpinan', 'pimpinan perusahaan'),
(3, 'Kasir', 'Kasir'),
(4, 'Pelanggan', 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `kd_customer` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `kd_customer`, `username`, `password`, `nama`, `notelp`, `alamat`, `id_akses`) VALUES
(1, '', 't', 't', 'Ria', '087687678342', 'Cirebon', 4),
(3, 'tes', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes', '123123', 'tes', 4),
(4, 'CUS00001', 'tes2', '7a8a80e50f6ff558f552079cefe2715d', 'tes2', '123123', 'tes', 4);

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `id_menu`, `harga`) VALUES
(1, 1, 21000),
(2, 2, 18000),
(3, 3, 18000),
(4, 4, 12000),
(5, 5, 13000),
(6, 6, 16000),
(7, 7, 16500),
(8, 8, 14500),
(9, 9, 16500),
(10, 10, 16500),
(11, 11, 15000),
(12, 12, 35000),
(13, 13, 37500),
(14, 14, 27500),
(15, 15, 27500),
(16, 16, 18000),
(17, 17, 16000),
(18, 18, 13000),
(19, 19, 8500),
(20, 20, 10000),
(21, 21, 8500),
(22, 22, 5000),
(23, 23, 5000),
(24, 24, 13500),
(25, 25, 15000),
(26, 26, 17000),
(27, 27, 16000),
(28, 28, 10000),
(29, 29, 12500),
(30, 30, 10000),
(31, 31, 12500),
(32, 32, 10000),
(33, 33, 10000),
(34, 34, 17000),
(35, 35, 16000),
(36, 36, 12500),
(37, 37, 7500),
(38, 38, 18000),
(39, 39, 10000),
(40, 40, 10000),
(41, 41, 10000),
(42, 42, 15000),
(43, 43, 6000),
(44, 44, 13500),
(45, 45, 15000),
(46, 46, 9000),
(47, 47, 9500),
(48, 48, 10000),
(49, 49, 10500),
(50, 50, 10500),
(51, 51, 11000),
(52, 52, 10500),
(53, 53, 11000),
(54, 54, 11500),
(55, 55, 11500),
(56, 56, 12000),
(57, 57, 25500),
(58, 58, 24000),
(59, 59, 27000),
(60, 60, 23000),
(61, 61, 21500),
(62, 62, 23000),
(63, 63, 15000),
(64, 64, 25500),
(65, 65, 31500),
(66, 66, 35000),
(67, 67, 25500),
(68, 68, 25500),
(69, 69, 21500),
(70, 70, 33500),
(71, 71, 35000),
(72, 72, 52500),
(73, 73, 55000),
(74, 74, 55000),
(75, 75, 55000),
(76, 76, 4000),
(77, 77, 6000),
(78, 78, 6000),
(79, 79, 8500),
(80, 80, 11000),
(81, 81, 11000),
(82, 82, 8500),
(83, 83, 12000),
(84, 84, 12000),
(85, 85, 13500),
(86, 86, 13500),
(87, 87, 16000),
(88, 88, 16000),
(89, 89, 16000),
(90, 90, 18000),
(91, 91, 4000),
(92, 92, 4000),
(93, 93, 5000),
(94, 94, 5000),
(95, 95, 6000),
(96, 96, 6000),
(97, 97, 6000),
(98, 98, 5000),
(99, 99, 2500),
(100, 100, 3500),
(101, 101, 7000),
(102, 102, 7000),
(103, 103, 7000),
(104, 104, 9000),
(105, 105, 10000),
(106, 106, 10000),
(107, 107, 8000),
(108, 108, 12000),
(109, 109, 13000),
(110, 110, 4000),
(111, 111, 5000),
(112, 112, 10000),
(113, 113, 8000),
(114, 114, 4000),
(115, 115, 3000),
(116, 116, 11000),
(117, 117, 8000),
(118, 118, 8000),
(119, 119, 10000),
(120, 120, 8000),
(121, 121, 12000),
(122, 122, 8000),
(123, 123, 8000),
(124, 124, 8000),
(125, 125, 8000),
(126, 126, 8000),
(127, 127, 15000),
(128, 129, 25000),
(129, 130, 25000),
(130, 131, 23500),
(131, 132, 22000),
(132, 133, 175000),
(133, 134, 150000),
(134, 135, 185000),
(135, 136, 150000),
(136, 141, 30000),
(137, 142, 4000),
(138, 142, 5000),
(139, 143, 7500),
(140, 145, 5000),
(141, 146, 5000),
(142, 147, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id`, `nama_kategori`, `ket`) VALUES
(1, 'Hidangan Pembuka', '-'),
(2, 'Ayam', '-'),
(3, 'Sop', '-'),
(4, 'Aneka Pepes', '-'),
(5, 'Aneka Tumis', '-'),
(6, 'Aneka Sayur', '-'),
(7, 'Aneka Ikan', '-'),
(8, 'Hidangan Laut', '-'),
(9, 'Cumi-Cumi', '-'),
(10, 'Udang', '-'),
(11, 'Kepiting', '-'),
(12, 'Aneka Nasi', '-'),
(13, 'Aneka Lauk Pendamping', '-'),
(14, 'Aneka Minuman', '-'),
(15, 'Aneka Menu Paket', '-'),
(16, 'Aneka Paket Keluarga', '-'),
(17, 'Sea food', '-'),
(18, 'Es Kelapa Muda Merah', '-');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `gambar` text,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_kategori`, `nama_menu`, `gambar`, `ket`) VALUES
(127, 15, 'PAKET MERIAM (Murah Meriah Pake Ayam)', '127.jpeg', 'Nasi Timbel, Ayam Goreng/Bakar Cirebon, Sambal & Lalapan, Gratis Es Teh Manis'),
(129, 15, 'PAKET NASI TIMBEL KOMPLIT', '129.JPG', 'Nasi Timbel, Ayam Goreng Cirebon, Ikan Asin Jambal, Sayur Asem, Tahu Goreng, Tempe Goreng, Sambal & Lalapan'),
(130, 15, 'PAKET NASI TUTUG ONCOM', '130.jpeg', 'Nasi Tutug Oncom, Empal Gepuk, Sayur Asem, Ikan Asin Jambal, Tahu Goreng, Tempe Goreng, Emping, Sambal & Lalapan'),
(131, 15, 'PAKET NASI CONGCOT', '131.jpeg', '-'),
(132, 16, 'Paket Gurame Komplit (4 Porsi)', '132.jpeg', 'Nasi Timbel,  Ikan Gurame,  Empal Gepuk, Sayur Asem, Perkedel Jagung, Es Teh Manis,  Sambal & Lalapan'),
(133, 16, 'Paket Ayam Bakakak', '133.jpeg', 'Nasi Putih (4 Porsi), Ayam Bakakak (1 Ekor), Tahu Telor (1 Porsi), Sayur Asem (4 Porsi), Perkedel Kentang Kornet (4 Porsi), Es Jeruk (4 porsi), Sambal & Lalapan'),
(134, 16, 'Paket Seafood', '134.jpeg', 'Nasi Timbel (4 Porsi), Ikan Gurame (1Ekor), Sate Udang (1 Porsi), Sate Cumi (1 Porsi), Tumis Kangkung Seafood (1 Porsi), Lemon Juice (4 Porsi)'),
(135, 16, 'Paket Nasi Liwet Komplit', '135.jpeg', 'Nasi Liwet (1 Castrol), Ayam Bakakak (1 Ekor), Jambal Cabe Ijo (1 Porsi)'),
(142, 14, 'Teh Manis Anget', '99.jpeg', '-'),
(143, 14, 'Es Teh Manis Jeruk', '101.jpeg', '-'),
(144, 14, 'Es Kelapa Muda', '107.jpeg', '-'),
(145, 14, 'Es Dawet Merah', '105.jpeg', '-'),
(146, 13, 'Es Dawet Coklat', '103.jpeg', '-'),
(147, 18, 'Kelapa Muda Merah', '107.jpeg', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pesbuk`
--

CREATE TABLE `pesbuk` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesbuk`
--

INSERT INTO `pesbuk` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(1, 'tes', 'tes@gmail.com', '$2y$10$hVNE5LHVOiXeV78J28iEkeAcCBOAKYKGjIE9GtLOI2s8iiALgdX/y', 'tes', 'default.svg');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `id_menu`, `stok`, `sisa`) VALUES
(1, 4, 12, 143),
(128, 128, 20, 0),
(129, 129, 20, 19),
(130, 130, 20, 19),
(131, 131, 20, 0),
(132, 132, 20, 12),
(133, 133, 20, 0),
(134, 134, 20, 14),
(136, 130, 143, 6),
(137, 142, 20, 50),
(138, 143, 12, 30),
(139, 144, 12, 0),
(140, 145, 20, 0),
(141, 0, 20, 5),
(142, 147, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`) VALUES
(1, 'CV. Chaya Abadi', 'jl. pasuketan');

-- --------------------------------------------------------

--
-- Table structure for table `temp_transaksi_pemesanan`
--

CREATE TABLE `temp_transaksi_pemesanan` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=sudah proses, 0 belum proses',
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_transaksi_pemesanan`
--

INSERT INTO `temp_transaksi_pemesanan` (`id`, `tgl`, `id_menu`, `jumlah`, `id_harga`, `status`, `total`) VALUES
(11, '2020-12-22', 134, 1, 133, 0, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembayaran`
--

CREATE TABLE `transaksi_pembayaran` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(50) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `total` int(11) NOT NULL,
  `nominal_bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembayaran`
--

INSERT INTO `transaksi_pembayaran` (`id`, `kd_transaksi`, `id_pemesanan`, `tgl`, `total`, `nominal_bayar`, `kembali`) VALUES
(2, 'PBY08112000001', 1, '2020-11-08', 78000, 80000, 2000),
(3, 'PBY08112000002', 13, '2020-11-08', 36000, 50000, 14000),
(4, 'PBY21122000001', 19, '2020-12-21', 39000, 50000, 11000),
(5, 'PBY21122000002', 20, '2020-12-21', 0, 50000, 50000),
(6, 'PBY22122000001', 22, '2020-12-22', 57500, 100000, 42500);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(40) NOT NULL,
  `tgl` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pemesanan`
--

CREATE TABLE `transaksi_pemesanan` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `nomer_meja` int(11) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `total` int(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = belum bayar, 1 = sudah bayar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pemesanan`
--

INSERT INTO `transaksi_pemesanan` (`id`, `kd_transaksi`, `tgl`, `nomer_meja`, `atas_nama`, `total`, `status`) VALUES
(19, 'PSN21122000003', '2020-12-21', 2, 'Akang Fira', 39000, 1),
(20, 'PSN21122000004', '2020-12-21', 3, 'Pelanggan 2', 0, 1),
(21, 'PSN21122000005', '2020-12-21', 0, 'admin', 0, 0),
(22, 'PSN22122000001', '2020-12-22', 10, 'Pembeli 1', 57500, 1),
(23, 'PSN22122000002', '2020-12-22', 1, 'Pembeli 2', 75000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pemesanan_detail`
--

CREATE TABLE `transaksi_pemesanan_detail` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `porsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pemesanan_detail`
--

INSERT INTO `transaksi_pemesanan_detail` (`id`, `id_pemesanan`, `id_menu`, `porsi`) VALUES
(1, 1, 2, 2),
(2, 1, 1, 2),
(3, 2, 1, 5),
(4, 3, 1, 5),
(5, 4, 1, 5),
(6, 5, 1, 5),
(7, 6, 3, 2),
(8, 6, 6, 1),
(9, 7, 2, 1),
(10, 8, 8, 1),
(11, 9, 1, 1),
(12, 9, 3, 1),
(13, 9, 6, 1),
(14, 10, 1, 1),
(15, 10, 2, 1),
(16, 11, 2, 1),
(17, 11, 3, 1),
(18, 12, 6, 1),
(19, 12, 3, 1),
(20, 13, 3, 1),
(21, 13, 3, 1),
(22, 14, 2, 1),
(23, 15, 2, 1),
(24, 16, 1, 1),
(25, 17, 1, 1),
(26, 17, 8, 1),
(27, 18, 3, 1),
(28, 19, 1, 1),
(29, 19, 3, 1),
(30, 22, 143, 4),
(31, 22, 130, 2),
(32, 22, 130, 2),
(33, 23, 130, 1),
(34, 23, 129, 1),
(35, 23, 130, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(40) NOT NULL,
  `tgl` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id`, `kd_transaksi`, `tgl`, `id_barang`, `id_harga`, `id_customer`, `jumlah`, `total`) VALUES
(1, 'PNJ23071800001', '2018-07-23', 1, 1, 1, 5, 78125);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(5) NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`, `status`, `id_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Y', 1),
(2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Y', 2),
(3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Y', 3),
(4, 'hakim', 'c96041081de85714712a79319cb2be5f', 'Y', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_user`
--
ALTER TABLE `akses_user`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_transaksi_pemesanan`
--
ALTER TABLE `temp_transaksi_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pemesanan_detail`
--
ALTER TABLE `transaksi_pemesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : db_warung

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 03/07/2022 15:42:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for akses_user
-- ----------------------------
DROP TABLE IF EXISTS `akses_user`;
CREATE TABLE `akses_user`  (
  `id_akses` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ket` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_akses`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of akses_user
-- ----------------------------
INSERT INTO `akses_user` VALUES (1, 'admin', 'Administrator');
INSERT INTO `akses_user` VALUES (2, 'pimpinan', 'pimpinan perusahaan');
INSERT INTO `akses_user` VALUES (3, 'Kasir', 'Kasir');
INSERT INTO `akses_user` VALUES (4, 'Pelanggan', 'Pelanggan');

-- ----------------------------
-- Table structure for buka_tutup
-- ----------------------------
DROP TABLE IF EXISTS `buka_tutup`;
CREATE TABLE `buka_tutup`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of buka_tutup
-- ----------------------------
INSERT INTO `buka_tutup` VALUES (3, '2022-07-03', '1');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` int(11) NOT NULL,
  `kd_customer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `notelp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_akses` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, '', 't', 't', 'Ria', '087687678342', 'Cirebon', 4);
INSERT INTO `customers` VALUES (3, 'tes', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes', '123123', 'tes', 4);
INSERT INTO `customers` VALUES (4, 'CUS00001', 'tes2', '7a8a80e50f6ff558f552079cefe2715d', 'tes2', '123123', 'tes', 4);

-- ----------------------------
-- Table structure for harga
-- ----------------------------
DROP TABLE IF EXISTS `harga`;
CREATE TABLE `harga`  (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of harga
-- ----------------------------
INSERT INTO `harga` VALUES (1, 1, 21000);
INSERT INTO `harga` VALUES (2, 2, 18000);
INSERT INTO `harga` VALUES (3, 3, 18000);
INSERT INTO `harga` VALUES (4, 4, 12000);
INSERT INTO `harga` VALUES (5, 5, 13000);
INSERT INTO `harga` VALUES (6, 6, 16000);
INSERT INTO `harga` VALUES (7, 7, 16500);
INSERT INTO `harga` VALUES (8, 8, 14500);
INSERT INTO `harga` VALUES (9, 9, 16500);
INSERT INTO `harga` VALUES (10, 10, 16500);
INSERT INTO `harga` VALUES (11, 11, 15000);
INSERT INTO `harga` VALUES (12, 12, 35000);
INSERT INTO `harga` VALUES (13, 13, 37500);
INSERT INTO `harga` VALUES (14, 14, 27500);
INSERT INTO `harga` VALUES (15, 15, 27500);
INSERT INTO `harga` VALUES (16, 16, 18000);
INSERT INTO `harga` VALUES (17, 17, 16000);
INSERT INTO `harga` VALUES (18, 18, 13000);
INSERT INTO `harga` VALUES (19, 19, 8500);
INSERT INTO `harga` VALUES (20, 20, 10000);
INSERT INTO `harga` VALUES (21, 21, 8500);
INSERT INTO `harga` VALUES (22, 22, 5000);
INSERT INTO `harga` VALUES (23, 23, 5000);
INSERT INTO `harga` VALUES (24, 24, 13500);
INSERT INTO `harga` VALUES (25, 25, 15000);
INSERT INTO `harga` VALUES (26, 26, 17000);
INSERT INTO `harga` VALUES (27, 27, 16000);
INSERT INTO `harga` VALUES (28, 28, 10000);
INSERT INTO `harga` VALUES (29, 29, 12500);
INSERT INTO `harga` VALUES (30, 30, 10000);
INSERT INTO `harga` VALUES (31, 31, 12500);
INSERT INTO `harga` VALUES (32, 32, 10000);
INSERT INTO `harga` VALUES (33, 33, 10000);
INSERT INTO `harga` VALUES (34, 34, 17000);
INSERT INTO `harga` VALUES (35, 35, 16000);
INSERT INTO `harga` VALUES (36, 36, 12500);
INSERT INTO `harga` VALUES (37, 37, 7500);
INSERT INTO `harga` VALUES (38, 38, 18000);
INSERT INTO `harga` VALUES (39, 39, 10000);
INSERT INTO `harga` VALUES (40, 40, 10000);
INSERT INTO `harga` VALUES (41, 41, 10000);
INSERT INTO `harga` VALUES (42, 42, 15000);
INSERT INTO `harga` VALUES (43, 43, 6000);
INSERT INTO `harga` VALUES (44, 44, 13500);
INSERT INTO `harga` VALUES (45, 45, 15000);
INSERT INTO `harga` VALUES (46, 46, 9000);
INSERT INTO `harga` VALUES (47, 47, 9500);
INSERT INTO `harga` VALUES (48, 48, 10000);
INSERT INTO `harga` VALUES (49, 49, 10500);
INSERT INTO `harga` VALUES (50, 50, 10500);
INSERT INTO `harga` VALUES (51, 51, 11000);
INSERT INTO `harga` VALUES (52, 52, 10500);
INSERT INTO `harga` VALUES (53, 53, 11000);
INSERT INTO `harga` VALUES (54, 54, 11500);
INSERT INTO `harga` VALUES (55, 55, 11500);
INSERT INTO `harga` VALUES (56, 56, 12000);
INSERT INTO `harga` VALUES (57, 57, 25500);
INSERT INTO `harga` VALUES (58, 58, 24000);
INSERT INTO `harga` VALUES (59, 59, 27000);
INSERT INTO `harga` VALUES (60, 60, 23000);
INSERT INTO `harga` VALUES (61, 61, 21500);
INSERT INTO `harga` VALUES (62, 62, 23000);
INSERT INTO `harga` VALUES (63, 63, 15000);
INSERT INTO `harga` VALUES (64, 64, 25500);
INSERT INTO `harga` VALUES (65, 65, 31500);
INSERT INTO `harga` VALUES (66, 66, 35000);
INSERT INTO `harga` VALUES (67, 67, 25500);
INSERT INTO `harga` VALUES (68, 68, 25500);
INSERT INTO `harga` VALUES (69, 69, 21500);
INSERT INTO `harga` VALUES (70, 70, 33500);
INSERT INTO `harga` VALUES (71, 71, 35000);
INSERT INTO `harga` VALUES (72, 72, 52500);
INSERT INTO `harga` VALUES (73, 73, 55000);
INSERT INTO `harga` VALUES (74, 74, 55000);
INSERT INTO `harga` VALUES (75, 75, 55000);
INSERT INTO `harga` VALUES (76, 76, 4000);
INSERT INTO `harga` VALUES (77, 77, 6000);
INSERT INTO `harga` VALUES (78, 78, 6000);
INSERT INTO `harga` VALUES (79, 79, 8500);
INSERT INTO `harga` VALUES (80, 80, 11000);
INSERT INTO `harga` VALUES (81, 81, 11000);
INSERT INTO `harga` VALUES (82, 82, 8500);
INSERT INTO `harga` VALUES (83, 83, 12000);
INSERT INTO `harga` VALUES (84, 84, 12000);
INSERT INTO `harga` VALUES (85, 85, 13500);
INSERT INTO `harga` VALUES (86, 86, 13500);
INSERT INTO `harga` VALUES (87, 87, 16000);
INSERT INTO `harga` VALUES (88, 88, 16000);
INSERT INTO `harga` VALUES (89, 89, 16000);
INSERT INTO `harga` VALUES (90, 90, 18000);
INSERT INTO `harga` VALUES (91, 91, 4000);
INSERT INTO `harga` VALUES (92, 92, 4000);
INSERT INTO `harga` VALUES (93, 93, 5000);
INSERT INTO `harga` VALUES (94, 94, 5000);
INSERT INTO `harga` VALUES (95, 95, 6000);
INSERT INTO `harga` VALUES (96, 96, 6000);
INSERT INTO `harga` VALUES (97, 97, 6000);
INSERT INTO `harga` VALUES (98, 98, 5000);
INSERT INTO `harga` VALUES (99, 99, 2500);
INSERT INTO `harga` VALUES (100, 100, 3500);
INSERT INTO `harga` VALUES (101, 101, 7000);
INSERT INTO `harga` VALUES (102, 102, 7000);
INSERT INTO `harga` VALUES (103, 103, 7000);
INSERT INTO `harga` VALUES (104, 104, 9000);
INSERT INTO `harga` VALUES (105, 105, 10000);
INSERT INTO `harga` VALUES (106, 106, 10000);
INSERT INTO `harga` VALUES (107, 107, 8000);
INSERT INTO `harga` VALUES (108, 108, 12000);
INSERT INTO `harga` VALUES (109, 109, 13000);
INSERT INTO `harga` VALUES (110, 110, 4000);
INSERT INTO `harga` VALUES (111, 111, 5000);
INSERT INTO `harga` VALUES (112, 112, 10000);
INSERT INTO `harga` VALUES (113, 113, 8000);
INSERT INTO `harga` VALUES (114, 114, 4000);
INSERT INTO `harga` VALUES (115, 115, 3000);
INSERT INTO `harga` VALUES (116, 116, 11000);
INSERT INTO `harga` VALUES (117, 117, 8000);
INSERT INTO `harga` VALUES (118, 118, 8000);
INSERT INTO `harga` VALUES (119, 119, 10000);
INSERT INTO `harga` VALUES (120, 120, 8000);
INSERT INTO `harga` VALUES (121, 121, 12000);
INSERT INTO `harga` VALUES (122, 122, 8000);
INSERT INTO `harga` VALUES (123, 123, 8000);
INSERT INTO `harga` VALUES (124, 124, 8000);
INSERT INTO `harga` VALUES (125, 125, 8000);
INSERT INTO `harga` VALUES (126, 126, 8000);
INSERT INTO `harga` VALUES (127, 127, 15000);
INSERT INTO `harga` VALUES (128, 129, 25000);
INSERT INTO `harga` VALUES (129, 130, 25000);
INSERT INTO `harga` VALUES (130, 131, 23500);
INSERT INTO `harga` VALUES (131, 132, 22000);
INSERT INTO `harga` VALUES (132, 133, 175000);
INSERT INTO `harga` VALUES (133, 134, 150000);
INSERT INTO `harga` VALUES (134, 135, 185000);
INSERT INTO `harga` VALUES (135, 136, 150000);
INSERT INTO `harga` VALUES (136, 141, 30000);
INSERT INTO `harga` VALUES (137, 142, 4000);
INSERT INTO `harga` VALUES (138, 142, 5000);
INSERT INTO `harga` VALUES (139, 143, 7500);
INSERT INTO `harga` VALUES (140, 145, 5000);
INSERT INTO `harga` VALUES (141, 146, 5000);
INSERT INTO `harga` VALUES (142, 147, 20000);

-- ----------------------------
-- Table structure for kategori_menu
-- ----------------------------
DROP TABLE IF EXISTS `kategori_menu`;
CREATE TABLE `kategori_menu`  (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_menu
-- ----------------------------
INSERT INTO `kategori_menu` VALUES (1, 'Hidangan Pembuka', '-');
INSERT INTO `kategori_menu` VALUES (2, 'Ayam', '-');
INSERT INTO `kategori_menu` VALUES (3, 'Sop', '-');
INSERT INTO `kategori_menu` VALUES (4, 'Aneka Pepes', '-');
INSERT INTO `kategori_menu` VALUES (5, 'Aneka Tumis', '-');
INSERT INTO `kategori_menu` VALUES (6, 'Aneka Sayur', '-');
INSERT INTO `kategori_menu` VALUES (7, 'Aneka Ikan', '-');
INSERT INTO `kategori_menu` VALUES (8, 'Hidangan Laut', '-');
INSERT INTO `kategori_menu` VALUES (9, 'Cumi-Cumi', '-');
INSERT INTO `kategori_menu` VALUES (10, 'Udang', '-');
INSERT INTO `kategori_menu` VALUES (11, 'Kepiting', '-');
INSERT INTO `kategori_menu` VALUES (12, 'Aneka Nasi', '-');
INSERT INTO `kategori_menu` VALUES (13, 'Aneka Lauk Pendamping', '-');
INSERT INTO `kategori_menu` VALUES (14, 'Aneka Minuman', '-');
INSERT INTO `kategori_menu` VALUES (15, 'Aneka Menu Paket', '-');
INSERT INTO `kategori_menu` VALUES (16, 'Aneka Paket Keluarga', '-');
INSERT INTO `kategori_menu` VALUES (17, 'Sea food', '-');
INSERT INTO `kategori_menu` VALUES (18, 'Es Kelapa Muda Merah', '-');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (127, 15, 'PAKET MERIAM (Murah Meriah Pake Ayam)', '127.jpeg', 'Nasi Timbel, Ayam Goreng/Bakar Cirebon, Sambal & Lalapan, Gratis Es Teh Manis');
INSERT INTO `menu` VALUES (129, 15, 'PAKET NASI TIMBEL KOMPLIT', '129.JPG', 'Nasi Timbel, Ayam Goreng Cirebon, Ikan Asin Jambal, Sayur Asem, Tahu Goreng, Tempe Goreng, Sambal & Lalapan');
INSERT INTO `menu` VALUES (130, 15, 'PAKET NASI TUTUG ONCOM', '130.jpeg', 'Nasi Tutug Oncom, Empal Gepuk, Sayur Asem, Ikan Asin Jambal, Tahu Goreng, Tempe Goreng, Emping, Sambal & Lalapan');
INSERT INTO `menu` VALUES (131, 15, 'PAKET NASI CONGCOT', '131.jpeg', '-');
INSERT INTO `menu` VALUES (132, 16, 'Paket Gurame Komplit (4 Porsi)', '132.jpeg', 'Nasi Timbel,  Ikan Gurame,  Empal Gepuk, Sayur Asem, Perkedel Jagung, Es Teh Manis,  Sambal & Lalapan');
INSERT INTO `menu` VALUES (133, 16, 'Paket Ayam Bakakak', '133.jpeg', 'Nasi Putih (4 Porsi), Ayam Bakakak (1 Ekor), Tahu Telor (1 Porsi), Sayur Asem (4 Porsi), Perkedel Kentang Kornet (4 Porsi), Es Jeruk (4 porsi), Sambal & Lalapan');
INSERT INTO `menu` VALUES (134, 16, 'Paket Seafood', '134.jpeg', 'Nasi Timbel (4 Porsi), Ikan Gurame (1Ekor), Sate Udang (1 Porsi), Sate Cumi (1 Porsi), Tumis Kangkung Seafood (1 Porsi), Lemon Juice (4 Porsi)');
INSERT INTO `menu` VALUES (135, 16, 'Paket Nasi Liwet Komplit', '135.jpeg', 'Nasi Liwet (1 Castrol), Ayam Bakakak (1 Ekor), Jambal Cabe Ijo (1 Porsi)');
INSERT INTO `menu` VALUES (142, 14, 'Teh Manis Anget', '99.jpeg', '-');
INSERT INTO `menu` VALUES (143, 14, 'Es Teh Manis Jeruk', '101.jpeg', '-');
INSERT INTO `menu` VALUES (144, 14, 'Es Kelapa Muda', '107.jpeg', '-');
INSERT INTO `menu` VALUES (145, 14, 'Es Dawet Merah', '105.jpeg', '-');
INSERT INTO `menu` VALUES (146, 13, 'Es Dawet Coklat', '103.jpeg', '-');
INSERT INTO `menu` VALUES (147, 18, 'Kelapa Muda Merah', '107.jpeg', '-');

-- ----------------------------
-- Table structure for pesbuk
-- ----------------------------
DROP TABLE IF EXISTS `pesbuk`;
CREATE TABLE `pesbuk`  (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.svg'
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pesbuk
-- ----------------------------
INSERT INTO `pesbuk` VALUES (1, 'tes', 'tes@gmail.com', '$2y$10$hVNE5LHVOiXeV78J28iEkeAcCBOAKYKGjIE9GtLOI2s8iiALgdX/y', 'tes', 'default.svg');

-- ----------------------------
-- Table structure for stok
-- ----------------------------
DROP TABLE IF EXISTS `stok`;
CREATE TABLE `stok`  (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stok
-- ----------------------------
INSERT INTO `stok` VALUES (1, 4, 12, 143);
INSERT INTO `stok` VALUES (128, 128, 20, 0);
INSERT INTO `stok` VALUES (129, 129, 20, 18);
INSERT INTO `stok` VALUES (130, 130, 20, 17);
INSERT INTO `stok` VALUES (131, 131, 20, 0);
INSERT INTO `stok` VALUES (132, 132, 20, 9);
INSERT INTO `stok` VALUES (133, 133, 20, 0);
INSERT INTO `stok` VALUES (134, 134, 20, 14);
INSERT INTO `stok` VALUES (136, 130, 143, 4);
INSERT INTO `stok` VALUES (137, 142, 20, 50);
INSERT INTO `stok` VALUES (138, 143, 12, 30);
INSERT INTO `stok` VALUES (139, 144, 12, 0);
INSERT INTO `stok` VALUES (140, 145, 20, 0);
INSERT INTO `stok` VALUES (141, 0, 20, 5);
INSERT INTO `stok` VALUES (142, 147, 20, 0);

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'CV. Chaya Abadi', 'jl. pasuketan');

-- ----------------------------
-- Table structure for temp_transaksi_pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `temp_transaksi_pemesanan`;
CREATE TABLE `temp_transaksi_pemesanan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=sudah proses, 0 belum proses',
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of temp_transaksi_pemesanan
-- ----------------------------
INSERT INTO `temp_transaksi_pemesanan` VALUES (7, '2022-06-03', 130, 1, 129, 0, 25000);

-- ----------------------------
-- Table structure for transaksi_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pembayaran`;
CREATE TABLE `transaksi_pembayaran`  (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `total` int(11) NOT NULL,
  `nominal_bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_pembayaran
-- ----------------------------
INSERT INTO `transaksi_pembayaran` VALUES (2, 'PBY08112000001', 1, '2020-11-08', 78000, 80000, 2000);
INSERT INTO `transaksi_pembayaran` VALUES (3, 'PBY08112000002', 13, '2020-11-08', 36000, 50000, 14000);
INSERT INTO `transaksi_pembayaran` VALUES (4, 'PBY21122000001', 19, '2020-12-21', 39000, 50000, 11000);
INSERT INTO `transaksi_pembayaran` VALUES (5, 'PBY21122000002', 20, '2020-12-21', 0, 50000, 50000);
INSERT INTO `transaksi_pembayaran` VALUES (6, 'PBY22122000001', 22, '2020-12-22', 57500, 100000, 42500);

-- ----------------------------
-- Table structure for transaksi_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pembelian`;
CREATE TABLE `transaksi_pembelian`  (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for transaksi_pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pemesanan`;
CREATE TABLE `transaksi_pemesanan`  (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NOT NULL,
  `nomer_meja` int(11) NOT NULL,
  `atas_nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total` int(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = belum bayar, 1 = sudah bayar',
  `no_hp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pembayaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reservasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_reservasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_pemesanan
-- ----------------------------
INSERT INTO `transaksi_pemesanan` VALUES (0, 'PSN03072200001', '2022-07-03', 333, 'hoho', 47000, 1, '222', 'Cash', 'Reservation', 'Sudah');
INSERT INTO `transaksi_pemesanan` VALUES (19, 'PSN21122000003', '2020-12-21', 2, 'Akang Fira', 39000, 1, NULL, NULL, NULL, NULL);
INSERT INTO `transaksi_pemesanan` VALUES (20, 'PSN21122000004', '2020-12-21', 3, 'Pelanggan 2', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `transaksi_pemesanan` VALUES (21, 'PSN21122000005', '2020-12-21', 0, 'admin', 0, 0, NULL, NULL, NULL, NULL);
INSERT INTO `transaksi_pemesanan` VALUES (22, 'PSN22122000001', '2020-12-22', 10, 'Pembeli 1', 57500, 1, NULL, NULL, NULL, NULL);
INSERT INTO `transaksi_pemesanan` VALUES (23, 'PSN22122000002', '2020-12-22', 1, 'Pembeli 2', 75000, 0, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for transaksi_pemesanan_detail
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pemesanan_detail`;
CREATE TABLE `transaksi_pemesanan_detail`  (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `porsi` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_pemesanan_detail
-- ----------------------------
INSERT INTO `transaksi_pemesanan_detail` VALUES (0, 0, 130, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (1, 1, 2, 2);
INSERT INTO `transaksi_pemesanan_detail` VALUES (2, 1, 1, 2);
INSERT INTO `transaksi_pemesanan_detail` VALUES (3, 2, 1, 5);
INSERT INTO `transaksi_pemesanan_detail` VALUES (4, 3, 1, 5);
INSERT INTO `transaksi_pemesanan_detail` VALUES (5, 4, 1, 5);
INSERT INTO `transaksi_pemesanan_detail` VALUES (6, 5, 1, 5);
INSERT INTO `transaksi_pemesanan_detail` VALUES (7, 6, 3, 2);
INSERT INTO `transaksi_pemesanan_detail` VALUES (8, 6, 6, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (9, 7, 2, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (10, 8, 8, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (11, 9, 1, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (12, 9, 3, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (13, 9, 6, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (14, 10, 1, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (15, 10, 2, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (16, 11, 2, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (17, 11, 3, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (18, 12, 6, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (19, 12, 3, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (20, 13, 3, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (21, 13, 3, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (22, 14, 2, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (23, 15, 2, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (24, 16, 1, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (25, 17, 1, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (26, 17, 8, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (27, 18, 3, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (28, 19, 1, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (29, 19, 3, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (30, 22, 143, 4);
INSERT INTO `transaksi_pemesanan_detail` VALUES (31, 22, 130, 2);
INSERT INTO `transaksi_pemesanan_detail` VALUES (32, 22, 130, 2);
INSERT INTO `transaksi_pemesanan_detail` VALUES (33, 23, 130, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (34, 23, 129, 1);
INSERT INTO `transaksi_pemesanan_detail` VALUES (35, 23, 130, 1);

-- ----------------------------
-- Table structure for transaksi_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_penjualan`;
CREATE TABLE `transaksi_penjualan`  (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_penjualan
-- ----------------------------
INSERT INTO `transaksi_penjualan` VALUES (1, 'PNJ23071800001', '2018-07-23', 1, 1, 1, 5, 78125);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `idusers` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Y', 1);
INSERT INTO `users` VALUES (2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Y', 2);
INSERT INTO `users` VALUES (3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Y', 3);
INSERT INTO `users` VALUES (4, 'hakim', 'c96041081de85714712a79319cb2be5f', 'Y', 4);

SET FOREIGN_KEY_CHECKS = 1;

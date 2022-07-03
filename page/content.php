<?php

if (!isset($_GET['pg'])) {
	include 'dashboard.php';
} else {
	switch ($_GET['pg']) {
		case 'dashboard':
			include 'dashboard.php';
			break;

			////////////////case untuk halaman Data Master
		case 'pggna':
			include 'hal_pengguna.php';
			break;
		case 'kategori':
			include 'hal_kategori.php';
			break;
		case 'menu':
			include 'hal_menu.php';
			break;
		case 'hrg':
			include 'hal_harga.php';
			break;
		case 'stok':
			include 'hal_stok.php';
			break;
		case 'spplr':
			include 'hal_supplier.php';
			break;
		case 'customer':
			include 'hal_customer.php';
			break;
		case 'barang':
			include 'barang.php';
			break;
		case 'reservasi':
			include 'reservasi.php';
			break;
			////////////////case untuk halaman transaksi
		case 'pnjln':
			include 'hal_transaksi_penjualan.php';
			break;
		case 'pmbln':
			include 'hal_transaksi_pembelian.php';
			break;
		case 'pmsn':
			include 'hal_transaksi_pemesanan.php';
			break;
		case 'pmby':
			include 'hal_transaksi_pembayaran.php';
			break;
			////////////////case untuk halaman laporan
		case 'lap_pembayaran':
			include 'hal_laporan_pembayaran.php';
			break;
		case 'lap_pemesanan':
			include 'hal_laporan_pemesanan.php';
			break;
			////////////////case untuk halaman data karyawan
		case 'absen':
			include 'absen.php';
			break;
		case 'lembur':
			include 'lembur.php';
			break;
			////////////////case untuk halaman pengaturan
		case 'pengaturan':
			include 'pengaturan.php';
			break;
		case 'kode':
			include 'kode.php';
			break;

			// case 'lap_stok':
			// 	include 'hal_laporan_stok.php';
			// 	break;




		default:
			echo "<label>404 Halaman tidak ditemukan</label>";
			break;
	}
}

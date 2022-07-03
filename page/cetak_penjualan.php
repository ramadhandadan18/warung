<?php
// sesuai kan root file mPDF anda
$nama_dokumen = 'Laporan Penjualan MCC'; //Beri nama file PDF hasil.
define('_MPDF_PATH', '../config/MPDF60/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf = new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();

//Tuliskan file HTML di bawah sini , sesuai File anda .
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak
    masalah.-->
<?php

// Koneksi ke database //

error_reporting(0);
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";

$tglpenjualanaw = $_POST['tglpenjualanaw'];
$tglpenjualanak = $_POST['tglpenjualanak'];


$tglaw = tgl_indo($tglpenjualanaw);
$tglak = tgl_indo($tglpenjualanak);

?>

<!--CONTOH Code START-->
<table border='0' align='LEFT'>
    <tr>
        <th>
            <img src="../dist/img/logo.jpg" align="left" width='110' height='100px'>
        </th>
        <th width="20">
        </th>
        <th width="900px" align="left">
            <h2>
                <left> LAPORAN PENJUALAN DIGITAL MENU CAFE ROADWAY COFFEE<br> </left>
                <center> <?php echo "TANGGAL $tglaw SAMPAI  $tglak" ?> </center>
            </h2>

        </th>
    </tr>
</table>
<hr style="height:8px;" />

<br>
<h3 style="text-align:center;"> LAPORAN PENJUALAN DIGITAL MENU CAFE ROADWAY COFFEE </h3>


<table cellspacing="0" cellpadding="5" border="1">

    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kode Transaksi</th>
        <th>Nama Menu</th>
        <th>Nama Customer</th>
        <th>Harga</th>
        <th>Jumlah Beli</th>
        <th>Total Penjualan</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $tampil = $mysqli->query("SELECT a.*,a.id as id_trans ,b.*,b.nama as nama_barang, c.*,d.*,d.nama as nama_customer FROM transaksi_penjualan a
     INNER JOIN barang b ON a.id_barang=b.id INNER JOIN harga c ON a.id_harga=c.id INNER JOIN customer d ON a.id_customer=d.id
     WHERE tgl BETWEEN  '$_POST[tglpenjualanaw]' AND  '$_POST[tglpenjualanak]'order by a.tgl asc");
        $no = 1;
        while ($r = mysqli_fetch_array($tampil)) {
        ?>
            <tr>
                <td><?php echo "$no" ?></td>
                <td><?php echo "$r[tgl]" ?></td>
                <td><?php echo "$r[kd_transaksi]" ?></td>
                <td><?php echo "$r[nama_barang]" ?></td>
                <td><?php echo "$r[nama_customer]" ?></td>
                <td><?php echo "Rp. " . number_format("$r[harga]", '0', '.', '.') . " / $r[satuan]" ?></td>
                <td><?php echo "<b>$r[jumlah]</b> $r[satuan]" ?> </td>
                <td><?php echo "Rp. " . number_format("$r[total]", '0', '.', '.') ?></td>

            </tr>
        <?php
            $no++;
        }
        ?>

        <tr>
            <td align="center" colspan="7"> <span style="font-weight:bold">TOTAL</span></td>
            <?php

            $liatHarga = mysqli_fetch_array($mysqli->query("SELECT sum(total) as total_penjualan FROM transaksi_penjualan 
        where  tgl BETWEEN '$_POST[tglpenjualanaw]' AND  '$_POST[tglpenjualanak]'
        ORDER BY kd_transaksi ASC"));
            ?>

            <td><span style="font-weight:bold"><?php echo "Rp." . number_format("$liatHarga[total_penjualan]", '0', '.', '.') ?></td>

        </tr>
    </tbody>
</table>

<br> <br>

<br>
<br>
<table border='0' align='right'>
    <tr>
        <br>
        <th><?php
            $tanggal = tgl_indo(date('Y-m-d'));
            ?>
            <p style="margin: 50px 8px 5px 420px;"> Gresik, <?php echo "$tanggal" ?>
                <h4>
                    <center> </center>
                </h4>
                <br>
                <br>
                <br>
                <br>
                Pemilik
        </th>
    </tr>
</table>

<?php
//Batas file sampe sini
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//$stylesheet = file_get_contents('css/zebra.css');
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>
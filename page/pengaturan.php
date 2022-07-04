<?php
$tgl = date('Y-m-d');
?>

<?php
$d = mysqli_fetch_array($mysqli->query("SELECT * FROM buka_tutup WHERE tanggal='$tgl'"));
if ($d == null) {
    $d['status'] = '0';
}
if (isset($_POST['simpan'])) {
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM buka_tutup WHERE tanggal='$tgl'"));
    if ($d == null) {
        //INSERT
        $query = $mysqli->query("INSERT INTO buka_tutup (tanggal, status) VALUES ('$tgl','$_POST[status]')");
    } else {
        //update
        $mysqli->query("UPDATE buka_tutup SET status='$_POST[status]' WHERE tanggal='$tgl'");
    }

    echo "<script>window.location='home.php'</script>";
}
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-md-3 connectedSortable">
                            <div class="callout callout-danger" style="background-color: red !important">
                                <form role="form" method="POST" action="">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status Buka Warung Hari ini</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="1" <?php if ($d['status'] == '1') {
                                                                        echo "selected";
                                                                    } ?>>Buka</option>
                                                <option value="0" <?php if ($d['status'] == '0') {
                                                                        echo "selected";
                                                                    } ?>>Tutup</option>
                                            </select>
                                        </div>
                                        <button type="submit" name='simpan' class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div><!-- /.row (main row) -->
                </div>
            </div>
        </div>
    </div>
</section>
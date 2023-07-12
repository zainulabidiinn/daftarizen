<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost", "root", "", "db_daftarizen");

$idKegiatan = $_GET['id_kegiatan'];
$sql = $koneksi->query("select * from tb_kegiatan where id_kegiatan='$idKegiatan'");
$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Kegiatan
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" value="<?php echo $tampil['nama_kegiatan']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" class="form-control" name="tgl_kegiatan" value="<?php echo $tampil['tgl_kegiatan']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Lampiran</label>
                        <img src="images/<?php echo $tampil['lampiran']; ?>" width="200px" height="200px" alt="">
                    </div>
                    <div class="form-group">
                        <label>Ganti Lampiran</label>
                        <input type="file" class="form-control" name="lampiran" />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="<?php echo $tampil['keterangan']; ?>" />
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Ubah" class="btn btn-primary" style="background-color:rgb(194, 61, 90);">
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php

if (isset($_POST['simpan'])) {
    $namaKegiatan = $_POST['nama_kegiatan'];
    $tglKegiatan = $_POST['tgl_kegiatan'];

    $lampiran = $_FILES['lampiran']['name'];
    $lokasi = $_FILES['lampiran']['tmp_name'];
    
    $keterangan = $_POST['keterangan'];

    if (! empty($lokasi)) {

        $upload = move_uploaded_file($lokasi, "images/".$lampiran);

        $sql = $koneksi->query("update tb_kegiatan set nama_kegiatan='$namaKegiatan', tgl_kegiatan='$tglKegiatan', 
                                lampiran='$lampiran', keterangan='$keterangan' where id_kegiatan='$idKegiatan'");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Ubah Data Berhasil Disimpan");
                window.location.href = "?page=listkegiatan";
            </script>
            <?php
        }
    }else{

        $sql = $koneksi->query("update tb_kegiatan set nama_kegiatan='$namaKegiatan', tgl_kegiatan='$tglKegiatan', keterangan='$keterangan' where id_kegiatan='$idKegiatan'");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Ubah Data Berhasil Disimpan");
                window.location.href = "?page=listkegiatan";
            </script>
            <?php
        }
}
}
?>

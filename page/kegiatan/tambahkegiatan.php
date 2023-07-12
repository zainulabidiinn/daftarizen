<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost", "root", "", "db_daftarizen");

?>

<div class="panel panel-default">
    <div class="panel-heading" style="color:rgb(194, 61, 90);">
        Tambah Kegiatan
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" placeholder="masukkan nama kegiatan" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" class="form-control" name="tgl_kegiatan" />
                    </div>
                    <div class="form-group">
                        <label>Lampiran</label>
                        <input type="file" class="form-control" name="lampiran" />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="masukkan deskripsi kegiatan" />
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" style="background-color:rgb(194, 61, 90);">
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
    $upload = move_uploaded_file($lokasi, "images/" . $lampiran);
    $keterangan = $_POST['keterangan'];

    if ($upload) {

        $sql = $koneksi->query("insert into tb_kegiatan (nama_kegiatan, tgl_kegiatan, lampiran, keterangan) 
        values('$namaKegiatan', '$tglKegiatan', '$lampiran', '$keterangan')");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Data Berhasil Disimpan");
                window.location.href = "?page=listkegiatan";
            </script>
            <?php
        }
    }
}
?>

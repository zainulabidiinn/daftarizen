<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost", "root", "", "db_daftarizen");

$idKegiatan = $_GET['id_kegiatan'];

$sql = $koneksi->query("select * from tb_kegiatan where id_kegiatan='$idKegiatan'");

$tampil = $sql->fetch_assoc();

?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Detail Kegiatan</h1>
                </div>
                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <p name="nama_kegiatan" class="form-control-static"><?php echo $tampil['nama_kegiatan']; ?></p>
                </div>
                <div class="form-group">
                    <label>Tanggal Kegiatan</label>
                    <p name="tgl_kegiatan" class="form-control-static"><?php echo $tampil['tgl_kegiatan']; ?></p>
                </div>
                <div class="form-group">
                    <label>Lampiran</label>
                    <p name="lampiran" class="form-control-static"><img src="images/<?php echo $tampil['lampiran']; ?>" width="200px" height="200px" alt=""></p>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <p name="keterangan" class="form-control-static"><?php echo $tampil['keterangan']; ?></p>
                </div>
                <a href="?page=daftarkegiatan&aksi=ikutkegiatan" class="btn btn-primary">Daftar</a>
                <a href="?page=daftarkegiatan" class="btn btn-info">Kembali</a>
            </div>
        </div>
    </div>
</div>
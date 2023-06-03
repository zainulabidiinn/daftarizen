<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost", "root", "", "db_daftarizen");

$idPeserta = $_GET['id_peserta'];
$sql = $koneksi->query("select * from tb_peserta where id_peserta='$idPeserta'");
$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Peserta
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input type="text" class="form-control" name="nama_peserta" value="<?php echo $tampil['nama_peserta']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Id Kegiatan</label>
                        <input type="text" class="form-control" name="id_kegiatan" value="<?php echo $tampil['id_kegiatan']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Daftar</label>
                        <input type="date" class="form-control" name="tgl_daftar" value="<?php echo $tampil['tgl_daftar']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $tampil['email']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Kota Asal</label>
                        <input type="text" class="form-control" name="kota" value="<?php echo $tampil['kota']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Foto</label><br>
                        <img src="images/<?php echo $tampil['foto']; ?>" width="200px" height="200px" alt="">
                    </div>
                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" class="form-control" name="foto" />
                    </div>
                    <div>
                        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php

if (isset($_POST['ubah'])) {
    $namaPeserta = $_POST['nama_peserta'];
    $idKegiatan = $_POST['id_kegiatan'];
    $tglDaftar = $_POST['tgl_daftar'];
    $email = $_POST['email'];
    $kota = $_POST['kota'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (! empty($lokasi)) {

        $upload = move_uploaded_file($lokasi, "images/" . $foto);

        $sql = $koneksi->query("update tb_peserta set nama_peserta='$namaPeserta', id_kegiatan='$idKegiatan', 
                                tgl_daftar='$tglDaftar', email='$email', kota='$kota', foto='$foto' where id_peserta='$idPeserta'");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Ubah Data Berhasil Disimpan");
                window.location.href = "?page=listpendaftaran";
            </script>
            <?php
        }
    }else{
        
        $sql = $koneksi->query("update tb_peserta set nama_peserta='$namaPeserta', id_kegiatan='$idKegiatan', 
                                tgl_daftar='$tglDaftar', email='$email', kota='$kota', foto='$foto' where id_peserta='$idPeserta'");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Ubah Data Berhasil Disimpan");
                window.location.href = "?page=listpendaftaran";
            </script>
            <?php
        }
    }
}
?>
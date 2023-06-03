<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost", "root", "", "db_daftarizen");

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Daftar Kegiatan
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input type="text" class="form-control" name="nama_peserta" placeholder="masukkan nama anda" />
                    </div>
                    <div class="form-group">
                        <label>Id Kegiatan</label>
                        <input type="text" class="form-control" name="id_kegiatan" placeholder="masukkan no kegiatan"/>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pendaftaran</label>
                        <input type="date" class="form-control" name="tgl_daftar" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="masukkan email anda" />
                    </div>
                    <div class="form-group">
                        <label>Kota Asal</label>
                        <input type="text" class="form-control" name="kota" placeholder="masukkan kota asal anda" />
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" />
                    </div>
                    <div>
                        <input type="submit" name="daftar" value="Daftar" class="btn btn-primary">
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php

if (isset($_POST['daftar'])) {
    $namaPeserta = $_POST['nama_peserta'];
    $idKegiatan = $_POST['id_kegiatan'];
    $tglDaftar = $_POST['tgl_daftar'];
    $email = $_POST['email'];
    $kota = $_POST['kota'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "images/" . $foto);

    if ($upload) {

        $sql = $koneksi->query("insert into tb_peserta (nama_peserta, id_kegiatan, tgl_daftar, email, kota, foto) 
        values('$namaPeserta', '$idKegiatan', '$tglDaftar', '$email', '$kota', '$foto')");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Pendaftaran Berhasil");
                window.location.href = "?page=daftarkegiatan";
            </script>
            <?php
        }
    }
}
?>
<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost", "root", "", "db_daftarizen");

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Pengguna
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control" name="nama_user" placeholder="masukkan nama pengguna" />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="masukkan username" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="masukkan email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="masukkan password" />
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control show-tick">
                            <option value="">Pilih Level</option>
                            <option value="admin">Admin</option>
                            <option value="user">Pengguna</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" />
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php

if (isset($_POST['simpan'])) {
    $namaUser = $_POST['nama_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "images/" . $foto);

    if ($upload) {

        $sql = $koneksi->query("insert into tb_user (nama_user, username, email, password, level, foto) 
        values('$namaUser', '$username', '$email', '$password', '$level', '$foto')");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Data Berhasil Disimpan");
                window.location.href = "?page=listpengguna";
            </script>
            <?php
        }
    }
}
?>
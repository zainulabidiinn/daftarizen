<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost", "root", "", "db_daftarizen");

$idUser = $_GET['id_user'];
$sql = $koneksi->query("select * from tb_user where id_user='$idUser'");
$tampil = $sql->fetch_assoc();

$level = $tampil['level'];

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Pengguna
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control" name="nama_user" value="<?php echo $tampil['nama_user']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $tampil['username']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $tampil['email']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $tampil['password']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control show-tick">
                            <option value="admin" <?php if($level=='admin'){echo "selected";} ?>>Admin</option>
                            <option value="user" <?php if($level=='user'){echo"selected";}?>>Pengguna</option>
                        </select>
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
    $namaUser = $_POST['nama_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (! empty($lokasi)) {

        $upload = move_uploaded_file($lokasi, "images/" . $foto);

        $sql = $koneksi->query("update tb_user set nama_user='$namaUser', username='$username', 
                                email='$email', password='$password', level='$level', foto='$foto' where id_user='$idUser'");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Ubah Data Berhasil Disimpan");
                window.location.href = "?page=listpengguna";
            </script>
            <?php
        }
    }else{
        
        $sql = $koneksi->query("update tb_user set nama_user='$namaUser', username='$username', 
                                email='$email', password='$password', level='$level', foto='$foto' where id_user='$idUser'");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Ubah Data Berhasil Disimpan");
                window.location.href = "?page=listpengguna";
            </script>
            <?php
        }
    }
}
?>
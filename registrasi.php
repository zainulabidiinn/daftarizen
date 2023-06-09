<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost", "root", "", "db_daftarizen");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Registrasi Akun</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2>Registrasi Akun</h2>
                <br />
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Masukkan Data Registrasi Dibawah Ini! </strong>
                    </div>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input type="text" name="nama_user" class="form-control" placeholder="Masukkan Nama" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" name="email" class="form-control" placeholder="Masukkan Email" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <select name="level" class="form-control show-tick">
                                    <option value="">Pilih Level</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">Pengguna</option>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="file" name="foto" class="form-control" />
                            </div>

                            <input type="submit" name="registrasi" value="Daftar" class="btn btn-primary">
                            <hr />
                            Sudah Punya Akun ? <a href="login.php">Login disini</a>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>

</html>

<?php

if (isset($_POST['registrasi'])) {
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
                alert("Berhasil Terdaftar");
                window.location.href = "login.php";
            </script>
            <?php
        }
    }
}
?>
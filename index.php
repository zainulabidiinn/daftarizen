<?php

    session_start();
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $koneksi = new mysqli("localhost","root","","db_daftarizen");

        if($_SESSION['admin']){

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DAFTARIZEN</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">DAFTARIZEN</a>
            </div>
            <div style="color: rgb(194, 61, 90);
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2023 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="?page=listkegiatan"><i class="fa fa-desktop fa-3x"></i>Data Kegiatan</a>
                    </li>
                    <li>
                        <a href="?page=listpengguna"><i class="fa fa-laptop fa-3x"></i>Data Pengguna</a>
                    </li>
                    <li>
                        <a href="?page=listpendaftaran"><i class="fa fa-edit fa-3x"></i>Laporan Pendaftaran</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $page = $_GET['page'];
                            $aksi = $_GET['aksi'];

                            if($page == "listkegiatan"){
                                if($aksi == ""){
                                    include "page/kegiatan/listkegiatan.php";
                                } elseif($aksi=="tambahkegiatan"){
                                    include "page/kegiatan/tambahkegiatan.php";
                                }elseif($aksi=="ubahkegiatan"){
                                    include "page/kegiatan/ubahkegiatan.php";
                                }elseif($aksi=="hapuskegiatan"){
                                    include "page/kegiatan/hapuskegiatan.php";
                                }elseif($aksi=="lihatkegiatan"){
                                    include "page/kegiatan/lihatkegiatan.php";
                                }

                            } elseif($page == "listpengguna"){
                                if($aksi == ""){
                                    include "page/pengguna/listpengguna.php";
                                }elseif($aksi=="tambahpengguna"){
                                    include "page/pengguna/tambahpengguna.php";
                                }elseif($aksi=="ubahpengguna"){
                                    include "page/pengguna/ubahpengguna.php";
                                }elseif($aksi=="hapuspengguna"){
                                    include "page/pengguna/hapuspengguna.php";
                                }

                            } elseif($page == "listpendaftaran"){
                                if($aksi == ""){
                                    include "page/pendaftaran/listpendaftaran.php";
                                }elseif($aksi=="ubahpeserta"){
                                    include "page/pendaftaran/ubahpeserta.php";
                                }elseif($aksi=="hapuspeserta"){
                                    include "page/pendaftaran/hapuspeserta.php";
                                }

                            } elseif($page==""){
                                include "home.php";
                            }
                        ?>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>

<?php
        }else{
            header("location:login.php");
        }
?>

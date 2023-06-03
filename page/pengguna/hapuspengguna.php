<?php

$idUser = $_GET['id_user'];
$sql = $koneksi->query("delete from tb_user where id_user='$idUser'");

if ($sql) {

?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus");
        window.location.href = "?page=listpengguna";
    </script>
<?php

}

?>
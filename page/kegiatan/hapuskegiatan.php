<?php

$idKegiatan = $_GET['id_kegiatan'];
$sql = $koneksi->query("delete from tb_kegiatan where id_kegiatan='$idKegiatan'");

if ($sql) {

?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus");
        window.location.href = "?page=listkegiatan";
    </script>
<?php

}

?>
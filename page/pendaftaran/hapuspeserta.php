<?php

$idPeserta = $_GET['id_peserta'];
$sql = $koneksi->query("delete from tb_peserta where id_peserta='$idPeserta'");

if ($sql) {

?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus");
        window.location.href = "?page=listpendaftaran";
    </script>
<?php

}

?>
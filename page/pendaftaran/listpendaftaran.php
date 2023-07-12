<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading" style="color:rgb(194, 61, 90);">
                Daftar Peserta
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Id Kegiatan</th>
                                <th>Tanggal Daftar</th>
                                <th>Email</th>
                                <th>Kota Asal</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;
                            $sql = $koneksi->query("select * from tb_peserta");
                            while ($data = $sql->fetch_assoc()) {

                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama_peserta']; ?></td>
                                    <td><?php echo $data['id_kegiatan']; ?></td>
                                    <td><?php echo $data['tgl_daftar']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['kota']; ?></td>
                                    <td align="center"><img src="images/<?php echo $data['foto'] ?>" width="100" height="100" alt=""/></td>
                                    <td>
                                        <a href="?page=listpendaftaran&aksi=ubahpeserta&id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-info">Ubah</a>
                                        <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')" a href="?page=listpendaftaran&aksi=hapuspeserta&id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>

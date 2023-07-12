<a href="?page=listpengguna&aksi=tambahpengguna" 
   class="btn btn-primary"
   style="margin-bottom: 10px; background-color:rgb(194, 61, 90);">Tambah Pengguna</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading" style="color:rgb(194, 61, 90);">
                Daftar Pengguna
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;
                            $sql = $koneksi->query("select * from tb_user");
                            while ($data = $sql->fetch_assoc()) {

                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama_user']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td><?php echo $data['level']; ?></td>
                                    <td align="center"><img src="images/<?php echo $data['foto'] ?>" width="100" height="100" alt=""/></td>
                                    <td>
                                        <a href="?page=listpengguna&aksi=ubahpengguna&id_user=<?php echo $data['id_user']; ?>" class="btn btn-info">Ubah</a>
                                        <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')" a href="?page=listpengguna&aksi=hapuspengguna&id_user=<?php echo $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>

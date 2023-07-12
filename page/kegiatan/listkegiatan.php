<a href="?page=listkegiatan&aksi=tambahkegiatan" 
   class="btn btn-primary"
   style="margin-bottom: 10px; background-color:rgb(194, 61, 90);" >Tambah Kegiatan</a>  
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading" style="color:rgb(194, 61, 90);" >
                Daftar Kegiatan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Lampiran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;
                            $sql = $koneksi->query("select * from tb_kegiatan");
                            while ($data = $sql->fetch_assoc()) {

                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama_kegiatan']; ?></td>
                                    <td><?php echo $data['tgl_kegiatan']; ?></td>
                                    <td align="center"><img src="images/<?php echo $data['lampiran'] ?>" width="100" height="100" alt=""/></td>
                                    <td>
                                        <a href="?page=listkegiatan&aksi=lihatkegiatan&id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-info">Detail</a>
                                        <a href="?page=listkegiatan&aksi=ubahkegiatan&id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-info">Ubah</a>
                                        <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')" a href="?page=listkegiatan&aksi=hapuskegiatan&id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-danger" >Hapus</a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>

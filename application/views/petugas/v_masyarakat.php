<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Masyarakat</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Masyarakat</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($masyarakat as $al) : ?>
                                <tr>
                                    <input type="hidden" name="nik" value="<? $al['nik'] ?>">
                                    <input type="hidden" name="nama" value="<? $al['nama'] ?>">
                                    <input type="hidden" name="telepon" value="<? $al['no_telp'] ?>">
                                    <input type="hidden" name="status" value="<? $al['status'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $al['nik'] ?></td>
                                    <td><?= $al['nama'] ?></td>
                                    <td><?= $al['no_telp'] ?></td>
                                    <td><?= $al['active'] ?></td>
                                    <td>
                                        <a href="<?= base_url('c_petugas/ban_masyarakat/') . $al['id'] ?>" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></a>
                                        <a href="<?= base_url('c_petugas/aktif_masyarakat/') . $al['id'] ?>" type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Isi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
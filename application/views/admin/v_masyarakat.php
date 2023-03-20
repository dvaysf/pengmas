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
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $al['id'] ?>"><i class="fa fa-edit"></i></button>
                                        <a href="<?= base_url('c_admin/ban_masyarakat/') . $al['id'] ?>" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></a>
                                        <a href="<?= base_url('c_admin/hapus_masyarakat/') . $al['id'] ?>" type="submit" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="edit<?= $al['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <form action="<?= base_url('c_admin/edit_masyarakat/') . $al['id'] ?>" method="post">

                                                            <div class="form-group">
                                                                <label for="">Nama</label>
                                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $al['nama'] ?>">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="">Username</label>
                                                            <input type="text" class="form-control" name="username" id="username" value="<?= $al['username'] ?>">
                                                        </div>

                                                        </div>
                                                        <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label for="">NIK</label>
                                                            <input type="number" class="form-control" name="nik" id="nik" value="<?= $al['nik'] ?>">
                                                        </div>

                                                        </div>
                                                        <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="">Telepon</label>
                                                            <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $al['no_telp'] ?>">
                                                        </div>

                                                        </div>
                                                        <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input type="password" class="form-control" name="password" id="password">
                                                        </div>

                                                        </div>
                                                        <div class="col-md-12">

                                                        <div class="form-check mt-3">
                                                            <input class="form-check-input" type="checkbox" name="active" id="active">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                Aktifasi Akun
                                                            </label>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="submit">Update</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php $i++;
                            endforeach ?>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Isi</th>
                                    <th>Status</th>
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
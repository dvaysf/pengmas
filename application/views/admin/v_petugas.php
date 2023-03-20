<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahpetugas">Tambah</button>
                    <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                    <th>status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($petugas as $al) : ?>
                                <tr>
                                    <input type="hidden" name="nik" value="<? $al['username'] ?>">
                                    <input type="hidden" name="nama" value="<? $al['nama'] ?>">
                                    <input type="hidden" name="telepon" value="<? $al['no_telp'] ?>">
                                    <input type="hidden" name="status" value="<? $al['status'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $al['username'] ?></td>
                                    <td><?= $al['nama'] ?></td>
                                    <td><?= $al['no_telp'] ?></td>
                                    <td><?= $al['role'] ?></td>
                                    <td><?= $al['active'] ?></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editpetugas<?= $al['id_petugas'] ?>"><i class="fa fa-edit"></i></button>
                                        <a href="<?= base_url('c_admin/ban_petugas/') . $al['id_petugas'] ?>" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i></a>
                                        <a href="<?= base_url('c_admin/ban_petugas/') . $al['id_petugas'] ?>" type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Yakin ingin hapus?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal tambah admin/petugas -->
                                <div class="modal fade" id="tambahpetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form action="<?= base_url('c_auth/registration_admin') ?>" method="post">
                                                            <div class="form-group">
                                                                <label class="form-label">Username</label>
                                                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                                                            </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label class="form-label">Telepon</label>
                                                            <input type="number" class="form-control" id="telepon" name="telepon" aria-describedby="emailHelp">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label class="form-label">Level</label>
                                                            <select name="level" id="level" class="form-control">
                                                                <option selected value="">- Pilih -</option>
                                                                <option>Admin</option>
                                                                <option>Petugas</option>
                                                            </select>
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

                                <!-- Modal edit admin/petugas -->
                                <div class="modal fade" id="editpetugas<?= $al['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form action="<?= base_url('c_admin/edit_petugas/') . $al['id_petugas'] ?>" method="post">
                                                            <div class="form-group">
                                                                <label class="form-label">Username</label>
                                                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value="<?= $al['username'] ?>">
                                                            </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="<?= $al['nama'] ?>">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label class="form-label">Telepon</label>
                                                            <input type="number" class="form-control" id="telepon" name="telepon" aria-describedby="emailHelp" value="<?= $al['no_telp'] ?>">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label class="form-label">Level</label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option selected value="<?= $al['status'] ?>"><?= $al['status'] ?></option>
                                                                <option>Admin</option>
                                                                <option>Petugas</option>
                                                            </select>
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
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                    <th>status</th>
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
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
    </div>

    <!-- kategori -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1">Tambah</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($kategori as $al) : ?>
                                <tr>
                                    <input type="hidden" name="Kategori" value="<? $al['Kategori'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $al['kategori'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_kp_Modal<?php echo $al['id']; ?>"> Edit</button>
                                        <a class="btn btn-danger" href="<?= base_url('c_admin/delete_kategori/' . $al['id'] . '/') ?>" onclick="return confirm('Apakah Anda Yakin?');">Delete</a>
                                    </td>
                                </tr>

                                <!-- Edit Kategori Modal -->
                                <div class="modal fade" id="edit_kp_Modal<?php echo $al['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('c_admin/edit_kategori/') . $al['id'] ?>" method="post">
                                                    <div class="form-group">
                                                        <label for="edit_kategori">Kategori</label>
                                                        <input type="edit_kategori" class="form-control" name="edit_kategori" id="edit_kategori" value="<?= $al['kategori'] ?>">
                                                        <input type="hidden" name="edit_id" value="<?= $al['id'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;
                            endforeach ?>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url('c_admin/tambahkategori') ?>" method="post">
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <input type="kategori" class="form-control" name="kategori" id="kategori">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end kategori -->

    <!-- kategori -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal2">Tambah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="sub" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Sub-Kategori</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php $i = 1 ?>
                    <?php foreach ($sub_kategori as $al) : ?>
                        <tr>
                            <th><?= $i ?></th>
                            <input type="hidden" name="kategori" value="<? $al['kategori'] ?>">
                            <input type="hidden" name="sub_kategori" value="<? $al['sub_kategori'] ?>">
                            <td><?= $al['kategori'] ?></td>
                            <td><?= $al['sub_kategori'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_kpp_Modal<?php echo $al['id']; ?>"> Edit</button>
                                <a class="btn btn-danger" href="<?= base_url('c_admin/delete_subkategori/' . $al['subkategori_id'] . '/') ?>" onclick="return confirm('Apakah Anda Yakin?');">Delete</a>
                            </td>
                        </tr>

                        <!-- edit sub kategori -->
                        <div class="modal fade" id="edit_kpp_Modal<?php echo $al['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('c_admin/edit_sub_kategori/') . $al['subkategori_id'] ?>" method="post">
                                            <div class="form-group">
                                                <label for="edit_sub_kategori">Kategori</label>
                                                <input type="edit_sub_kategori" class="form-control" name="edit_sub_kategori" id="edit_sub_kategori" value="<?= $al['sub_kategori'] ?>">
                                                <input type="hidden" name="edit_id" value="<?= $al['id'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    endforeach ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url('c_admin/tambahsubkategori') ?>" method="post">
                                        <div class="form-group">
                                            <label for="sub_kategori">Example select</label>
                                            <select name="kategori" class="form-control" id="">
                                                <option value="<?= $al['kategori'] ?>">Pilih kategori</option>
                                                <?php foreach ($kategori as $kp) : ?>
                                                    <option value=" <?= $kp['id'] ?>"> <?= $kp['kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sub_kategori">Sub-Kategori</label>
                                            <input type="sub_kategori" class="form-control" name="sub_kategori" id="sub_kategori">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
    <!-- end kategori -->
</div>
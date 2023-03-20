<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan</h1>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($pengaduan as $p) { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Pelapor</label>
                                    <input type="text" class="form-control" id="nis" value="<?= $p['nama'] ?>" readonly>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Tanggal</label>
                                    <input type="text" class="form-control" id="nama" value="<?= $p['tgl_pengaduan'] ?>" readonly>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Kategori</label>
                                    <input type="text" class="form-control" id="kompetensi" value="<?= $p['kategori'] ?>" readonly>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Sub Kategori</label>
                                    <input type="text" class="form-control" id="kompetensi" value="<?= $p['sub_kategori'] ?>" readonly>
                                </div>

                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Isi Pengaduan</label>
                                    <input type="text" class="form-control" id="kompetensi" value="<?= $p['isi_laporan'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
                </div>
                <div class="card-body">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <?php foreach ($pengaduan as $p) { ?>
                                <a type="sumbit" class="
                                    <?php
                                    if ($p['status'] == 'segera') {
                                        echo 'btn btn-primary';
                                    } else if ($p['status'] == 'proses') {
                                        echo 'btn btn-primary ';
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                    " data-toggle="modal" data-target="#tanggapi<?= $p['id_pengaduan'] ?>">
                                    <?php
                                    if ($p['status'] == 'segera') {
                                        echo '<i class="fa fa-plus fa-sm"></i> Tanggapi';
                                    } else if ($p['status'] == 'proses') {
                                        echo '<i class="fa fa-plus fa-sm"></i> Tanggapi';
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </a>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Tanggapan</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($tanggapan as $al) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $al['tgl_pengaduan'] ?></td>
                                            <td><?= $al['tanggapan'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Tanggapan</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->
            <?php foreach ($pengaduan as $p) { ?>
                <div class="modal fade" id="tanggapi<?= $p['id_pengaduan'] ?>" tabindex="-1" role="dialog" aria-labelledby="tanggapi" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tanggapi">Respon Tanggapan</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('c_petugas/balas_pengaduan/') . $p['id_pengaduan'] ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Tanggal Tangapan</label>
                                                <input type="date" name="tgl_tanggapan" id="tgl_tanggapan" class="form-control" value="<?= date('Y-m-d') ?>" disabled>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <label for="">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option selected>-Pilih-</option>
                                                <option>Proses</option>
                                                <option>Selesai</option>
                                            </select>

                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="">Respon Tanggapan</label>
                                                <textarea type="text" name="tanggapan" id="tanggapan" class="form-control"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
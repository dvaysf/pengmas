<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pengaduan</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($pengaduan2 as $al) : ?>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal</label>
                            <input type="text" class="form-control" id="nis" value="<?= $al['tgl_pengaduan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kategori</label>
                            <input type="text" class="form-control" id="nis" value="<?= $al['kategori'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Sub Kategori</label>
                            <input type="text" class="form-control" id="nis" value="<?= $al['sub_kategori'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Isi Laporan</label>
                            <input type="text" class="form-control" id="nis" value="<?= $al['isi_laporan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Status</label>
                            <input type="text" class="form-control" id="nis" value="<?= $al['status'] ?>" readonly>
                        </div>
                    <?php
                    endforeach ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar Laporan</h6>
                </div>
                <div class="card-body">
                    <img src="<?php echo base_url() . 'assets/uploads/img/' . $al['foto']; ?>" width="500">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                </div>
                <div class="card-body">
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
                            <?php foreach ($tanggapan as $a) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $a['tgl_pengaduan'] ?></td>
                                    <td><?= $a['tanggapan'] ?></td>
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
</div>
</div>
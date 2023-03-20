<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaduan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelapor</th>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Isi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($pengaduan as $al) : ?>
                                <tr>

                                    <input type="hidden" name="nik" value="<? $al['nama'] ?>">
                                    <input type="hidden" name="tgl_pengaduan" value="<? $al['tgl_pengaduan'] ?>">
                                    <input type="hidden" name="kategori" value="<? $al['kategori'] ?>">
                                    <input type="hidden" name="isi_laporan" value="<? $al['isi_laporan'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $al['nama'] ?></td>
                                    <td><?= $al['tgl_pengaduan'] ?></td>
                                    <td><?= $al['kategori'] ?></td>
                                    <td><?= $al['isi_laporan'] ?></td>
                                    <td>
                                        <a href="<?= base_url('c_petugas/tanggapan_pengaduan/') . $al['id_pengaduan'] ?>" type="submit" class="
                                            <?php if ($al['status'] == 'segera') {
                                                echo 'btn btn-dark';
                                            } else if ($al['status'] == 'proses') {
                                                echo 'btn btn-warning';
                                            } else {
                                                echo 'btn btn-success';
                                            } ?> btn-sm"><?= $al['status'] ?>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="tindakan<?= $al['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <form action="<?= base_url('c_petugas/balas_pengaduan/') . $al['id_pengaduan'] ?>" method="post">

                                                            <div class="form-group">
                                                                <label for="pelapor">Pelapor</label>
                                                                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $al['nama'] ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="pelapor">Kategori</label>
                                                                <input type="text" class="form-control" id="pengaduan" name="pengaduan" value="<?= $al['kategori'] ?>" readonly>
                                                            </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="pelapor">Tanggal</label>
                                                            <input type="text" class="form-control" id="pengaduan" name="pengaduan" value="<?= $al['tgl_pengaduan'] ?>" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="pelapor">Sub Kategori</label>
                                                            <input type="text" class="form-control" id="pengaduan" name="pengaduan" value="<?= $al['sub_kategori'] ?>" readonly>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label for="">Isi Laporan Pengaduan</label>
                                                            <textarea type="text" class="form-control" disabled> <?= $al['isi_laporan'] ?></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-7">

                                                        <div class="form-group">
                                                            <label>Tanggapan</label>
                                                            <textarea class="form-control" id="tanggapan" name="tanggapan" rows="6"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-5">

                                                        <div class="form-group">
                                                            <label class="form-label">Level</label>
                                                            <select name="level" id="level" class="form-control">
                                                                <option selected value="">- Pilih -</option>
                                                                <option>Proses</option>
                                                                <option>Selesai</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            <?php $i++;
                            endforeach ?>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Pelapor</th>
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
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
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1">Tambah</button>
                    <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Isi</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($pengaduan2 as $al) : ?>
                                <tr>
                                    <input type="hidden" name="tgl_pengaduan" value="<? $al['tgl_pengaduan'] ?>">
                                    <input type="hidden" name="kategori" value="<? $al['kategori'] ?>">
                                    <input type="hidden" name="isi_laporan" value="<? $al['isi_laporan'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $al['tgl_pengaduan'] ?></td>
                                    <td><?= $al['kategori'] ?></td>
                                    <td><?= $al['isi_laporan'] ?></td>
                                    <td><img src="<?php echo base_url() . 'assets/uploads/img/' . $al['foto']; ?>" width="100"></td>
                                    <td>
                                        <a href="<?=base_url('C_masyarakat/detailpengaduan/') . $al['id_pengaduan']?>" class="
                                        btn <?php if($al['status']=='segera'){
                                            echo "btn-dark";
                                        }else if($al['status']=="proses"){
                                            echo 'btn-warning';
                                        }else{
                                            echo 'btn-success';
                                        } ?> btn-block btn-xs btn-sm"> <?=$al['status']?> </a>
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
                                    <th>Foto</th>
                                    <th>Status</th>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form action="<?php echo base_url('C_masyarakat/isipengaduan') ?>" method="post" enctype="multipart/form-data">

                                                    </div>
                                                    <div class="col-md-12">

                                                        <div class="mb-3">
                                                            <label for="nik" class="form-label">NIK</label>
                                                            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukan NIK Anda" value="<?= $user['nik'] ?>" aria-label="Disabled input example" disabled>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Pilih Kategori</label>
                                                            <select class="form-select form-control" name="kategori" id="kategori">
                                                                <option selected>- Pilih -</option>
                                                                <?php foreach ($kategori as $kp) { ?>
                                                                    <option value="<?= $kp['id'] ?>"><?= $kp['kategori'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Foto</label>
                                                            <input type="file" class="form-control-file" id="foto" name="foto" placeholder="date">
                                                        </div>


                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="sub_kategori">Pilih Sub-Kategori</label>
                                                            <select class="form-select form-control" name="sub_kategori" id="sub_kategori">
                                                                <option selected>- Pilih -</option>
                                                                
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="hidden" name="tgl_pengaduan" value="<?php echo date("d-m-Y"); ?>">
                                                        </div>


                                                        <div class="form-group">
                                                            <label>Isi Laporan Pengaduan</label>
                                                            <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="6"></textarea>
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
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
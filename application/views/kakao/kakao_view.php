<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-database"> </i> Daftar Data Kakao
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data Kakao</li>
        </ol>
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="kakao/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah</button></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">

                            <br />
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten</th>
                                        <th>Alamat</th>
                                        <th>Luas Areal</th>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kakao as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td> <img src="<?= base_url(); ?>assets_style/file/<?php echo $isi['foto']; ?>" class="img-responsive" style="height:auto;width:100px;" /></td>
                                            <td><?= $isi['desa']; ?></td>
                                            <td><?= $isi['kecamatan']; ?></td>
                                            <td><?= $isi['kabupaten']; ?></td>
                                            <td><?= $isi['alamat']; ?></td>
                                            <td><?= $isi['luas']; ?></td>
                                            <td><?= $isi['kategori']; ?></td>
                                            <td><?= $isi['keterangan']; ?></td>
                                            <td style="width:17%;">
                                                <a href="<?= base_url('kakao/edit/' . $isi['id_kakao']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                <a href="<?= base_url('kakao/detail/' . $isi['id_kakao']); ?>">
                                                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
                                                <button data-toggle="modal" data-target="#del<?= $isi['id_kakao'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Hapus -->
<?php foreach ($kakao as $isi) : ?>
    <div class="modal fade" id="del<?= $isi['id_kakao'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Hapus Kakao</b></h4>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus kakao <strong><?= $isi['desa'] ?></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-danger" href="<?= base_url('kakao/del/' . $isi['id_kakao']); ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Update User - <?= $user->namaLengkap; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update User - <?= $user->namaLengkap; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($this->session->flashdata())) {
                    echo $this->session->flashdata('pesan');
                } ?>

                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('user/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" value="<?= $user->namaLengkap; ?>" name="namaLengkap" required="required">
                                        <input type="hidden" class="form-control" value="<?= $user->idUsers; ?>" name="idUsers">
                                        <input type="hidden" class="form-control" value="<?= $user->foto; ?>" name="gambar">
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="<?= $user->username; ?>" name="username" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Password (opsional)</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control" required="required">
                                            <option <?php if ($user->status == 'admin') {
                                                        echo 'selected';
                                                    } ?>>admin</option>
                                            <option <?php if ($user->status == 'users') {
                                                        echo 'selected';
                                                    } ?>>users</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pas Foto</label>
                                        <input type="file" accept="image/*" name="foto">
                                        <br />
                                        <img src="<?= base_url('assets_style/image/' . $user->foto); ?>" style="height:auto;width:210px;" class="img-responsive" alt="#">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Edit Data</button>
                        </form>
                        <a href="<?= base_url('user'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
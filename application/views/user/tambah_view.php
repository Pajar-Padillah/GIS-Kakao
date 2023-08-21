<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Tambah User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah User</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('user/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" autofocus class="form-control" name="namaLengkap" required="required" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" required="required" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required="required" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control" required="required">
                                            <option value="admin">Admin</option>
                                            <option value="users">Users</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pas Foto</label>
                                        <input type="file" accept="image/*" name="foto" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                        </form>
                        <a href="<?= base_url('user'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#asal_unit").hide();
        tampil_unit();
    });

    function tampil_unit() {
        $("#level").change(function() {
            var a = $("#level").val();

            if (a == "Unit") {
                $("#asal_unit").show();
            } else {
                $("#asal_unit").hide();
            }
        });
    }
</script>
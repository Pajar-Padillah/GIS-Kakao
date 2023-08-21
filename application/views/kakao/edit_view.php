<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<script>
    function fetch() {
        var get = document.getElementById("get").value;
        document.getElementById("put").value = get;
    }
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Update kakao - <?= $kakao->desa; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update kakao - <?= $kakao->desa; ?></li>
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
                        <form action="<?php echo base_url('kakao/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" class="form-control" value="<?= $kakao->id_kakao; ?>" name="id_kakao">
                                <input type="hidden" name="foto_old" value="<?= $kakao->foto; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Desa</label>
                                        <input type="text" class="form-control" name="desa" value="<?= $kakao->desa; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" value="<?= $kakao->kecamatan; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" class="form-control" name="kabupaten" value="<?= $kakao->kabupaten; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Luas Areal</label>
                                        <input type="text" class="form-control" name="luas" value="<?= $kakao->luas; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" rows="5" class="form-control" required="required"><?= $kakao->alamat; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" rows="5" class="form-control" required="required"><?= $kakao->keterangan; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control" required="required">
                                            <option <?php if ($kakao->kategori == 'Angin') {
                                                        echo 'selected';
                                                    } ?>>Angin</option>
                                            <option <?php if ($kakao->kategori == 'Banjir') {
                                                        echo 'selected';
                                                    } ?>>Banjir</option>
                                            <option <?php if ($kakao->kategori == 'Gempa Bumi') {
                                                        echo 'selected';
                                                    } ?>>Gempa Bumi</option>
                                            <option <?php if ($kakao->kategori == 'Kebakaran') {
                                                        echo 'selected';
                                                    } ?>>Kebakaran</option>
                                            <option <?php if ($kakao->kategori == 'Kecelakaan') {
                                                        echo 'selected';
                                                    } ?>>Kecelakaan</option>
                                            <option <?php if ($kakao->kategori == 'Longsor') {
                                                        echo 'selected';
                                                    } ?>>Longsor</option>
                                            <option <?php if ($kakao->kategori == 'Pohon Tumbang') {
                                                        echo 'selected';
                                                    } ?>>Pohon Tumbang</option>
                                            <option <?php if ($kakao->kategori == 'Tsunami') {
                                                        echo 'selected';
                                                    } ?>>Tsunami</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" accept="image/*" name="foto">
                                        <br />
                                        <img src="<?= base_url('assets_style/file/' . $kakao->foto); ?>" class="img-responsive" width="150">
                                    </div>
                                    <div class="form-group">
                                        <label>GeoJSON</label>
                                        <textarea name="geojson" rows="5" class="form-control" required="required"><?= $kakao->geojson; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" value="<?= $kakao->latitude; ?>" name="latitude" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" value="<?= $kakao->longitude; ?>" name="longitude" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" name="warna" id="put" value="<?= $kakao->warna; ?>" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="color" id="get" onchange="fetch()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Edit Unit</button>
                        </form>
                        <a href="<?= base_url('unit'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
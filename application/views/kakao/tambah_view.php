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
            <i class="fa fa-plus"> </i> Tambah Kakao
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Kakao</li>
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
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('kakao/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Desa</label>
                                        <input type="text" class="form-control" name="desa" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" class="form-control" name="kabupaten" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Luas Areal</label>
                                        <input type="text" class="form-control" name="luas" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" rows="3" class="form-control" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" rows="3" class="form-control" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control" required="required">
                                            <option value="0">-- Pilih Kategori --</option>
                                            <option>Angin</option>
                                            <option>Banjir</option>
                                            <option>Gempa Bumi</option>
                                            <option>Kebakaran</option>
                                            <option>Kecelakaan</option>
                                            <option>Longsor</option>
                                            <option>Pohon Tumbang</option>
                                            <option>Tsunami</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto <small style="color:red">(.jpg|.jpeg) * wajib</small></label>
                                        <input type="file" accept="image/*" name="foto" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>GeoJSON</label>
                                        <textarea name="geojson" rows="5" class="form-control" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="longitude" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" name="warna" id="put" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="color" id="get" onchange="fetch()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                        </form>
                        <a href="<?= base_url('kakao'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
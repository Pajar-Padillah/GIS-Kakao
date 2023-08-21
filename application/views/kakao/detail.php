<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<link href="<?= base_url() ?>assets_style/leaflet/leaflet.css" rel="stylesheet">
<script src="<?= base_url() ?>assets_style/leaflet/leaflet.js"></script>

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-list" style="color:green"> </i> Detail Kakao
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-list"></i>&nbsp; Detail Kakao</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-sm-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="card-title">Lokasi Kakao <?= $kakao->desa; ?></h4>
					</div>
					<div class="box-body">
						<div id="map" style="width: 100%; height: 400px;"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4>Detail Kakao <?= $kakao->desa; ?></h4>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-striped table-bordered">
							<tr>
								<td>Gambar</td>
								<td>:</td>
								<td> <img src="<?= base_url(); ?>assets_style/file/<?php echo $kakao->foto; ?>" class="img-responsive" style="height:auto;width:250px;" /></td>
							</tr>
							<tr>
								<td>Nama Desa</td>
								<td>:</td>
								<td><?= $kakao->desa; ?></td>
							</tr>
							<tr>
								<td>Kecamatan</td>
								<td>:</td>
								<td><?= $kakao->kecamatan; ?></td>
							</tr>
							<tr>
								<td>Kabupaten</td>
								<td>:</td>
								<td><?= $kakao->kabupaten; ?></td>
							</tr>
							<tr>
								<td>Luas Areal</td>
								<td>:</td>
								<td><?= $kakao->luas; ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?= $kakao->alamat; ?></td>
							</tr>
							<tr>
								<td>Keterangan</td>
								<td>:</td>
								<td><?= $kakao->keterangan; ?></td>
							</tr>
							<tr>
								<td>Kategori</td>
								<td>:</td>
								<td><?= $kakao->kategori; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	var kakao = L.layerGroup();
	var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});


	var peta2 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
		attribution: 'google'
	});

	var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

	var map = L.map('map', {
		center: [<?= $kakao->latitude ?>, <?= $kakao->longitude ?>],
		zoom: 14,
		layers: [peta2, kakao]
	});

	var baseLayers = {
		"Grayscale": peta1,
		"Satelite": peta2,
		"Streets": peta3
	};

	var overlays = {
		"Kakao": kakao,
	};

	L.control.layers(baseLayers, overlays).addTo(map);

	L.geoJSON({
		"type": "FeatureCollection",
		"features": [<?= $kakao->geojson; ?>]
	}, {
		style: {
			color: "black",
			fillOpacity: 0.4,
			weight: 1.5,
			opacity: 1,
			fillColor: "<?= $kakao->warna ?>"
		},
	}).addTo(kakao)
</script>
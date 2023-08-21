<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>

<body>
    <!-- Nav Bar Start -->
    <div class="navbar navbar-dark bg-primary sticky-top">
        <div class="navbar-left">
            <a href="<?= base_url('home/') ?>" class="navbar-item logo" style="color: white;">
                <img width="50" src="<?= base_url('assets_style/image/logo_kakao.png') ?>" /> &nbsp; GIS UNTUK PEMETAAN LAHAN KAKAO DI KAB. PESAWARAN
            </a>
        </div>
        <div class="navbar-right">
            <div class="navbar-item">
                <button type="button" class="btn btn-primary" id="info">
                    INFO
                </button>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->


    <div class="container-fluid mt-2">
        <div id="mapid" style="width: 100%; height: 550px;"></div>
    </div>
    <script type="text/javascript">
        const info = document.getElementById('info');
        info.addEventListener('click', function() {
            Swal.fire({
                imageUrl: '<?= base_url('assets_style/logo_polinela.png') ?>',
                html: 'Pajar Padillah <br> Politeknik Negeri Lampung',
                imageHeight: 180,
                showConfirmButton: false,
                footer: '<b> Aplikasi Tentang Pemetaan Lahan Kakao </b>'
            })
        });

        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        });


        var peta2 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
            attribution: 'google'
        });

        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var map = L.map('mapid', {
            center: [-5.47245, 105.07533],
            zoom: 10,
            layers: [peta3]
        });

        var baseLayers = {
            "Grayscale": peta1,
            "Satelite": peta2,
            "Streets": peta3
        };

        //Home Button
        var homebutton = L.easyButton('fa-home fa-lg', function() {
            map.setView([-5.47245, 105.07533], 10);
        }, 'home position', {
            position: 'topright'
        });
        L.control.layers(baseLayers).addTo(map);
        homebutton.addTo(map);
        L.control.scale().addTo(map);
        //Minimap
        var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib = 'Map data &copy; OpenStreetMap contributors';
        var osm2 = new L.TileLayer(osmUrl, {
            minZoom: 0,
            maxZoom: 13,
            attribution: osmAttrib
        });
        var miniMap = new L.Control.MiniMap(osm2, {
            toggleDisplay: true
        }).addTo(map);

        //Pencarian
        var markersLayer = new L.LayerGroup();
        markersLayer.addTo(map);

        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            initial: false,
            zoom: 14,
            marker: false
        });

        new L.Control.Search({
            layer: markersLayer,
            zoom: 14,
            initial: false,
            collapsed: true,
        }).addTo(map);

        var angin = L.icon({
            iconUrl: '<?= base_url('assets_style/icon/angin.png') ?>',
            iconSize: [35, 40]
        });

        var banjir = L.icon({
            iconUrl: '<?= base_url('assets_style/icon/banjir.png') ?>',
            iconSize: [35, 40]
        });

        var gempabumi = L.icon({
            iconUrl: '<?= base_url('assets_style/icon/gempabumi.png') ?>',
            iconSize: [35, 40]
        });

        var kebakaran = L.icon({
            iconUrl: '<?= base_url('assets_style/icon/kebakaran.png') ?>',
            iconSize: [35, 40]
        });

        var kecelakaan = L.icon({
            iconUrl: '<?= base_url('assets_style/icon/kecelakaan.png') ?>',
            iconSize: [35, 40]
        });

        var longsor = L.icon({
            iconUrl: '<?= base_url('assets_style/icon/longsor.png') ?>',
            iconSize: [35, 40]
        });

        var pohontumbang = L.icon({
            iconUrl: '<?= base_url('assets_style/icon/pohontumbang.png') ?>',
            iconSize: [35, 40]
        });

        var tsunami = L.icon({
            iconUrl: '<?= base_url('assets_style/icon/tsunami.png') ?>',
            iconSize: [35, 40]
        });

        var icons = "";

        //Kakao marker
        <?php foreach ($kakao as $isi) { ?>
            var kategori = '<?= $isi->kategori ?>';
            if (kategori == "Banjir") {
                icons = banjir;
            } else if (kategori == "Angin") {
                icons = angin;
            } else if (kategori == "Tsunami") {
                icons = tsunami;

            } else if (kategori == "Gempa Bumi") {
                icons = gempabumi;

            } else if (kategori == "Kebakaran") {
                icons = kebakaran;

            } else if (kategori == "Kecelakaan") {
                icons = kecelakaan;
            } else if (kategori == "Longsor") {
                icons = longsor;
            } else if (kategori == "Pohon Tumbang") {
                icons = pohontumbang;
            }
            var kakao = L.marker([<?= $isi->latitude ?>, <?= $isi->longitude ?>], {
                title: '<?= $isi->kecamatan ?>',
                icon: icons
            }).addTo(map).on('click', function() {
                Swal.fire({
                    imageUrl: '<?= base_url('assets_style/file/' .  $isi->foto) ?>',
                    title: '<span class="text-uppercase">Kebun Kakao <?= $isi->desa ?></span>',
                    html: "Desa : <?= $isi->desa ?><br> Kecamatan : <?= $isi->kecamatan ?><br> Kabupaten : <?= $isi->kabupaten ?><br> Luas Area : <?= $isi->luas ?>",
                    imageHeight: 200,
                    showCancelButton: true,
                    cancelButtonText: "Tutup",
                    confirmButtonText: "Detail",
                    confirmButtonColor: "Green"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '<?= base_url('home/detail/' . $isi->id_kakao) ?>';
                    }
                })
            });
            markersLayer.addLayer(kakao);
        <?php } ?>
    </script>
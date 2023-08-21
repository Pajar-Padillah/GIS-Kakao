<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title_web; ?> </title>
  <!-- Tell the browser to be responsive to screen width -->

  <link href="<?= base_url('assets_style/image/logo_kakao.png') ?>" rel="icon">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">


  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/select2/dist/css/select2.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->

  <link href="<?php echo base_url(); ?>assets_style/assets/plugins/summernote/summernote-lite.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/dist/css/responsive.css">

  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/plugins/pace/pace.min.css">
  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets_style/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?= base_url() ?>assets_style/leaflet/leaflet.css" rel="stylesheet">
  <script src="<?= base_url() ?>assets_style/leaflet/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="<?= base_url() ?>assets_style/leaflet/leaflet-search/dist/leaflet-search.min.css" />
  <script src="<?= base_url() ?>assets_style/leaflet/leaflet-search/dist/leaflet-search.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
  <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
  <link href="<?= base_url() ?>assets_style/leaflet/dist/Control.MiniMap.min.css" rel="stylesheet">
  <script src="<?= base_url() ?>assets_style/leaflet/dist/Control.MiniMap.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- offline -->
  <script type="text/javascript">
    $(document).ajaxStart(function() {
      Pace.restart();
    });
  </script>
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
  <div class="wrapper">
    <header class="main-header">

      <!-- Logo -->
      <a href="<?php echo base_url('index.php/dashboard'); ?>" class="logo">
        <span class="logo-mini"><b></b>SIG</span>
        <span class="logo-lg">ADMINISTRATOR</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a data-toggle="modal" href="#logout">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Modal Logout -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel"><b>Logout</b></h4>
          </div>
          <div class="modal-body">
            Yakin ingin logout ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <a class="btn btn-danger" href="<?= base_url('administrator/logout/'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
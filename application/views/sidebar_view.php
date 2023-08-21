<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<aside class="main-sidebar">
  <!-- sidebar: sidebar.less -->
  <section class="sidebar">
    <div class="user-panel">
      <div class="image" style="text-align: center;">
        <?php
        $d = $this->db->query("SELECT * FROM users WHERE idUsers ='$idbo'")->row();
        if (!empty($d->foto !== "-")) {
        ?>
          <br />
          <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $d->foto; ?>" alt="#" class="user-image" style="border:2px solid #fff;height:auto;width:100%;" />
        <?php } else { ?>
          <i class="fa fa-user fa-4x" style="color:#fff;"></i>
        <?php } ?>
      </div>
      <div class="info" style="margin-top: 5px; text-align: center;">
        <p><?php echo $d->namaLengkap; ?></p>
        <p>( <?= $d->status; ?> )
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
      <br />
      <br />
      <br />
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <li class="<?php if ($this->uri->uri_string() == 'dashboard') {
                    echo 'active';
                  } ?>">
        <a href="<?php echo base_url('dashboard'); ?>">
          <i class="fa fa-dashboard"></i> <span>Beranda</span>
        </a>
      </li>
      <li class="<?php if ($this->uri->uri_string() == 'kakao') {
                    echo 'active';
                  } ?>
        <?php if ($this->uri->uri_string() == 'kakao/tambah') {
          echo 'active';
        } ?>
        <?php if ($this->uri->uri_string() == 'kakao/edit/' . $this->uri->segment('3')) {
          echo 'active';
        } ?>">
        <a href="<?php echo base_url('kakao'); ?>" class="cursor">
          <i class="fa fa-database"></i> <span>Pemetaan Kakao</span></a>
      </li>

      <li class="<?php if ($this->uri->uri_string() == 'home/info') {
                    echo 'active';
                  } ?>">
        <a href="<?php echo base_url('home/info'); ?>">
          <i class="fa fa-file-text"></i> <span>Info</span>
        </a>
      </li>

      <?php if ($this->session->userdata('status') == 'admin') { ?>
        <li class="<?php if ($this->uri->uri_string() == 'user') {
                      echo 'active';
                    } ?>
        <?php if ($this->uri->uri_string() == 'user/tambah') {
          echo 'active';
        } ?>
        <?php if ($this->uri->uri_string() == 'user/edit/' . $this->uri->segment('3')) {
          echo 'active';
        } ?>">
          <a href="<?php echo base_url('user'); ?>" class="cursor">
            <i class="fa fa-users"></i> <span>Users</span></a>
        </li>
      <?php } ?>
    </ul>


    <div class="clearfix"></div>
    <br />
    <br />
  </section>
  <!-- /.sidebar -->
</aside>
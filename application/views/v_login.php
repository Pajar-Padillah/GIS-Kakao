<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title_web; ?></title>
    <link href="<?= base_url('assets_style/image/logo_kakao.png') ?>" rel="icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets_style/login/login.css" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Silahkan Login</span></div>
            <form action="<?= base_url('administrator/auth'); ?>" method="POST">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" minlength="3" id="username" name="username" placeholder="Username" required autofocus autocomplete="off">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" minlength="3" id="password" name="password" placeholder="Password" required autocomplete="off">
                </div>
                <div class="pass"><a href="#">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" id="login" value="LOGIN">
                </div>
            </form>
        </div>
    </div>



    <!-- Javascript file -->

    <script src="<?= base_url() ?>assets_style/login/app.js"></script>
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets_style/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets_style/assets/plugins/iCheck/icheck.min.js'); ?>"></script>
</body>

</html>
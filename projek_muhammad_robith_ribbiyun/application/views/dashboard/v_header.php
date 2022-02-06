<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Poliklinik</title>
  <link href="<?php echo base_url();?>assets/dist/img/sehat.png" rel="icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }

  .example-modal .modal {
    background: transparent !important;
  }
</style>
</head>
<?php
  if($this->session->userdata('level') != "pasien"){     ?> 
     <body class="hold-transition skin-blue sidebar-mini"> 
   <?php } ?>
  <?php
  if($this->session->userdata('level') == "pasien"){     ?> 
     <body class="hold-transition skin-red light sidebar-mini"> 
   <?php } ?>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="<?php echo base_url().'dashboard' ?>" class="logo">
        <span class="logo-mini"><b>SI</b></span>
        <span class="logo-lg"><b>Sistem</b>Informasi</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu"
        role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" datatoggle="
            dropdown">
            <img src="<?php echo base_url();?>assets/img/avatar/user.png" class="user-image" alt="User Image">
            <span class="hidden-xs">HAK AKSES :
              <b><?php echo $this->session->userdata('level') ?></b></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/img/avatar/user.png" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('username') ?>
                  <small>Hak akses :
                    <?php echo $this->session->userdata('level') ?></small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo
                    base_url().'dashboard/profil' ?>" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url().'dashboard/keluar' ?>" class="btn btn-default btn-flat">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <?php
            if($this->session->userdata('level') != "pasien"){
              ?>
            <img src="<?php echo base_url(); ?>assets/img/avatar/user.png" class="img-circle" alt="User Image">
          <?php } ?>
          <?php
            if($this->session->userdata('level') == "pasien"){
              ?>
            <img src="<?php echo base_url(); ?>assets/img/avatar/user.png" class="img-circle" alt="User Image">
          <?php } ?>
          </div>
          <div class="pull-left info">
            <?php
            $id_user = $this->session->userdata('id');
            $user = $this->db->query("select * from pengguna
              where pengguna_id='$id_user'")->row();
              ?>
              <p><?php echo $user->pengguna_nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i>
              Online</a>
            </div>
          </div>
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo base_url().'dashboard' ?>">
                <i class="fa fa-dashboard"></i>
                <span>DASHBOARD</span>
              </a>
            </li>
         <?php
            if($this->session->userdata('level') == "dokter"){
//tampilkan menu
              ?>
          <li>
            <a href="<?php echo base_url().'dashboard/penyakit'
            ?>">
            <i class="fa fa-list"></i>
            <span>Daftar Penyakit</span>
          </a>
        </li>
          <li>
            <a href="<?php echo base_url().'dashboard/pasien'
            ?>">
            <i class="fa fa-user"></i>
            <span>List Pasien</span>
          </a>
        </li>
        <li>
            <a href="<?php echo base_url().'dashboard/periksa'
            ?>">
            <i class="fa fa-file-o"></i>
            <span>Rekam Medik Saya</span>
          </a>
        </li>
        <?php
      } ?>
      <?php
            if($this->session->userdata('level') == "pasien"){
//tampilkan menu
              ?>
        <li>
            <a href="<?php echo base_url().'dashboard/periksa'
            ?>">
            <i class="fa fa-file-o"></i>
            <span>Rekam Medik</span>
          </a>
        </li>
        <?php
      } ?>
        <?php
            if($this->session->userdata('level') == "pegawai"){
//tampilkan menu
              ?>
          <li>
            <a href="<?php echo base_url().'dashboard/pembayaran'
            ?>">
            <i class="fa fa-money"></i>
            <span>Data Administrasi</span>
          </a>
        </li>
          <li>
            <a href="<?php echo base_url().'dashboard/pengguna'
            ?>">
            <i class="fa fa-edit"></i>
            <span>Pengguna & Hak Akses</span>
          </a>
        </li>
        <?php
      } ?>
        <li>
          <a href="<?php echo base_url().'dashboard/profil' ?>">
            <i class="fa fa-user"></i>
            <span>PROFIL</span>
          </a>
        </li>

        <li>
          <a href="<?php echo
          base_url().'dashboard/ganti_password' ?>">
          <i class="fa fa-lock"></i>
          <span>GANTI PASSWORD</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url().'dashboard/keluar' ?>">
          <i class="fa fa-share"></i>
          <span>KELUAR</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
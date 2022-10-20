<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | PT. Akurat Intan Madya</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
<?php if($this->session->userdata('level')=="Admin"){
            $home='dashboard_controllers/Administrator';
          } else {
            $home='dashboard_controllers/User';
          };
          ?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?=site_url($home)?>" class="navbar-brand">
        <img src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Akurat Intan Madya</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user large"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <span class="float-right"><textoverflow><?php echo $this->session->userdata('nama');?></textoverflow></span>
                  </h3>
                  <p class="text-sm" ><?php echo $this->session->userdata('nama_instansi');?></p>
                  <p class="text-sm text-muted"><i class="fas fa-user-tag"></i>  <?php echo $this->session->userdata('level');?></p>
                </div>
              </div>
            </a>
            <br>
            <div class="dropdown-divider"></div>
            <a class="dropdown-footer">
              <table>
              <tr></tr>
                <td style="width: 77%"></td>
                <td><a href="<?=site_url('Auth/logout')?>"> <button type="button" class="btn btn-block btn-outline-danger btn-xs">Sign Out</button></a></td>
              </table>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" type="Boolean" id="darkOn" onclick="darkMode()">
            <i class="fas fa-moon"></i>
          </a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#cart">
            <i class=" fa fa-print"></i>
            
          </a>
        </li> -->
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- /dark_mode -->
  <script>
    function darkMode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
    }
  </script>
  <!-- /.dark_mode -->

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

    <!-- Main content -->
    <div class="content-wrapper">
      <div class="container">
        <?php echo $contents?>
      </div>
  </div>
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Akurat Intan Madya</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

</body>
</html>

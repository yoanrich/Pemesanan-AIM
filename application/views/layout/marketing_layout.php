<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User | PT Akurat Intan Madya</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">

  <style>
    textoverflow {
      display: block;
      width: 180px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }

    /* Vertical Scrolling */
    .scrollable {
      overflow-y: auto;
      max-height: 300px;
    }

    .table {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }
  </style>

  <!-- Dynamic Tabs -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#myTab a").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
      });
    });
  </script>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-footer-fixed">
  <div class="wrapper">
    <?php if ($this->session->userdata('level') == "Admin") {
      $home = 'dashboard_controllers/Administrator';
    } else {
      $home = 'dashboard_controllers/User';
    };
    ?>
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- /dark_mode -->
    <script>
      function darkMode() {
        var element = document.body;
        element.classList.toggle("dark-mode");
      }
    </script>
    <!-- /.dark_mode -->

    <!-- /model_cart -->
    <div class="modal fade" id="cart">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Keranjang Belanja</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped" id="countit">
              <thead style="background-color: #9ee">
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Jenis Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Catatan</th>
                  <th>Harga Jual</th>
                  <th>Sub Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($order as $items) : ?>
                  <tr>
                    <td><?= $items['kode_barang']; ?></td>
                    <td><?= $items['nama_barang']; ?></td>
                    <td><?= $items['jenis_barang']; ?></td>
                    <td><?php echo $items['jml_barang']; ?></td>
                    <td><?= $items['catatan']; ?></td>
                    <td><?php echo $items['harga_jual']; ?></td>
                    <td class="count-me"><?php echo $items['subtotal']; ?></td>
                    <td><a href="<?php echo base_url() . 'Order/hapus_keranjang/' . $items['id_keranjang']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <br>
            <?php foreach ($user as $user) : ?>
              <form action="<?php echo base_url() . 'Order/simpan_transaksi' ?>" method="post">
                <table class="pull-right">
                  <tr>
                    <th>Pilih User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</th>
                    <th><select class="form-control" name="username" id="username">
                        <?php

                        foreach ($all as $row) {
                          echo '<option value="' . $row->username . '">' . $row->nama . ' - ' . $row->level . ' - ' . $row->nama_instansi . '</option>';
                        }
                        ?>
                      </select></th>
                  </tr>
                  <tr>
                    <th>Total (Rp)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</th>
                    <th><input type="text" name="total" id="total" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                  </tr>
                  <tr>
                    <th>Diskon (%)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</th>
                    <th><input type="number" id="diskon" name="diskon" max="100" min="0" class="form-control input-sm" required> </th>
                  </tr>
                  <!-- <tr>
								<th><input type="hidden" id="username" name="username" value= "<?php echo $user->username ?>" class="form-control input-sm"> </th>
							</tr> -->
                  <!-- <tr>
								<th><input type="hidden" id="nama" name="nama" value= "<?php echo $user->nama ?>" class="form-control input-sm"> </th>
							</tr>
							<tr>
								<th><input type="hidden" id="alamat" name="alamat" value= "<?php echo $user->alamat ?>" class="form-control input-sm"> </th>
							</tr> -->
                </table>
                <br>
                <div class="col-md-12">
                  <?php if ($count != 0) {
                    echo ('<button type="submit" class="btn btn-outline-success" style="float: right;">Pesan</button>');
                  } else {
                    echo "";
                  }
                  ?>
                </div>
          </div>
        </div>
        </form>
      <?php endforeach; ?>

      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.modal_cart -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= site_url($home) ?>" class="nav-link">Beranda</a>
        </li>
      </ul>

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
                <img src="<?= base_url() ?><?php echo $user->profile_pic ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <span class="float-right">
                      <textoverflow><?php echo $this->session->userdata('nama'); ?></textoverflow>
                    </span>
                  </h3>
                  <p class="text-sm"><?php echo $this->session->userdata('nama_instansi'); ?></p>
                  <p class="text-sm text-muted"><i class="fas fa-user-tag"></i> <?php echo $this->session->userdata('level'); ?></p>
                </div>
              </div>
            </a>
            <br>
            <div class="dropdown-divider"></div>
            <a class="dropdown-footer">
              <table>
                <tr></tr>
                <td style="width: 77%"></td>
                <td><a href="<?= site_url('Auth/logout') ?>"> <button type="button" class="btn btn-block btn-outline-danger btn-xs">Sign Out</button></a></td>
              </table>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" type="Boolean" id="darkOn" onclick="darkMode()">
            <i class="fas fa-moon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#cart">
            <i class=" fa fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge"><?php echo $count ?></span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= site_url($home) ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Akurat Intan Madya</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <br>
            </li>
            <?php if ($this->session->userdata('level') == "Admin") {
              $home = 'dashboard_controllers/Administrator';
            } else {
              $home = 'dashboard_controllers/User';
            };
            ?>
            <li class="nav-item">
              <a href="<?= site_url($home) ?>" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-item">
              <br>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('Order') ?>" class="nav-link">
                <i class="nav-icon fa fa-shopping-cart"></i>
                <p>
                  Pesan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <br>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('Order_Process') ?>" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                  Daftar Pesanan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <br>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('Order_Process/History') ?>" class="nav-link">
                <i class="nav-icon fa fa-clock"></i>
                <p>
                  History Pesanan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <br>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('help') ?>" class="nav-link">
                <i class="nav-icon fa fa-question-circle"></i>
                <p>
                  Bantuan
                </p>
              </a>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="container">
            <?php echo $contents ?>
          </div>
        </div>

        <!-- /.content-wrapper -->

        <footer class="main-footer">
          <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
          </div>
          <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Akurat Intan Madya</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Login Success -->
    <?php if ($this->session->flashdata('success')) { ?>
      <script>
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        toastr.success('Sign In Berhasil')
      </script>
    <?php } ?>

    <!-- Konfirmasi Pesanan Batal -->
    <script type="text/javascript">
      $(".cancelled").click(function() {
        var id = $(this).parents("tr").attr("id");

        Swal.fire({
          title: 'Anda Yakin Akan Membatalkan Pesanan ini ?',
          showDenyButton: true,
          showCancelButton: false,
          confirmButtonText: 'Ya',
          denyButtonText: `Tidak`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            Swal.fire('Pesanan Dibatalkan', '', 'success')
          }
        })
      });
    </script>

    <!-- Sum Total ke Subtotal -->
    <script language="javascript" type="text/javascript">
      var tds = document.getElementById('countit').getElementsByTagName('td');
      var sum = 0;
      for (var i = 0; i < tds.length; i++) {
        if (tds[i].className == 'count-me') {
          sum += isNaN(tds[i].innerHTML) ? 0 : parseFloat(tds[i].innerHTML);
        }
      }
      $('#total').val(sum);
      // document.getElementById('total2').innerHTML += '<tr><td>' + sum + '</td><td>total</td></tr>';
    </script>
</body>

</html>
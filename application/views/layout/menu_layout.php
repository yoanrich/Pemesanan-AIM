<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu | PT. Akurat Intan Madya</title>

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

  <style>
  textoverflow {
  display: block;
  width: 200px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  }

  /* Vertical Scrolling */
  .scrollable{
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
  <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
      $("#myTab a").click(function(e){
          e.preventDefault();
          $(this).tab("show");
      });
  });
  </script>
  
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?=site_url('dashboard_controllers/Marketing')?>" class="navbar-brand">
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
                <img src="<?=base_url()?>assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <span class="float-right"><textoverflow><?php echo $this->session->userdata('nama');?></textoverflow></span>
                  </h3>
                  <p class="text-sm" ><?php echo $this->session->userdata('username');?></p>
                  <p class="text-sm text-muted"><i class="fas fa-user-tag"></i>  <?php echo $this->session->userdata('level');?></p>
                </div>
              </div>
            </a>
            <br>
            <div class="dropdown-divider"></div>
            <a class="dropdown-footer">
              <table>
                <tr></tr>
                <td><button type="button" class="btn btn-block btn-outline-success btn-xs">Edit Profile</button></td>
                <td style="width: 54%"></td>
                <td><a href="<?=site_url('Auth/logout')?>"> <button type="button" class="btn btn-block btn-outline-danger btn-xs">Sign Out</button></a></td>
              </table>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" type="Boolean" id="darkOn" onclick="darkMode()">
            <i class="fa fa-moon"></i>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#cart">
            <i class=" fa fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge"><?php echo $count ?></span>
          </a>
        </li>
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
							<?php foreach ($order as $items): ?>
							<tr>
								<td><?=$items['kode_barang'];?></td>
								<td><?=$items['nama_barang'];?></td>
                <td><?=$items['jenis_barang'];?></td>
								<td><?php echo $items['jml_barang'];?></td>
                <td><?=$items['catatan'];?></td>
								<td><?php echo $items['harga_jual'];?></td>
								<td class="count-me"><?php echo $items['subtotal'];?></td>
								<td ><a href="<?php echo base_url().'Order/hapus_keranjang/'.$items['id_keranjang'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<br>
					<?php foreach ($user as $user) : ?>
					<form action="<?php echo base_url().'Order/simpan_transaksi'?>" method="post">
						<table class="pull-right">
							<tr>
								<th>Total (Rp)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</th>
								<th><input type="text" name="total" id="total" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
							</tr>
							<tr>
								<th><input type="hidden" id="username" name="username" value= "<?php echo $user->username ?>" class="form-control input-sm"> </th>
							</tr>
							<tr>
								<th><input type="hidden" id="nama" name="nama" value= "<?php echo $user->nama ?>" class="form-control input-sm"> </th>
							</tr>
							<tr>
								<th><input type="hidden" id="alamat" name="alamat" value= "<?php echo $user->alamat ?>" class="form-control input-sm"> </th>
							</tr>
						</table>
						<br>
						<div class="col-md-12">
            <?php if($count != 0){ echo ('<button type="submit" class="btn btn-outline-success" style="float: right;">Pesan</button>');}else{echo "";}
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

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Selamat Datang | <small><span class="brand-text font-weight-light"> 
              <?php echo $this->session->userdata('nama');?></small></h1></span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Home</a></li>
            </ol> -->
          <!-- </div>
        </div>
      </div>
    </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-wrapper">
      <div class="container">
        <?php echo $contents?>
      </div>
    </div>
    </div>
    <!-- /.content -->
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
<!-- jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>


<!-- Login Success -->
<?php if($this->session->flashdata('success')){ ?>
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

<!-- Order Success -->
<?php if($this->session->flashdata('order_success')){ ?>
<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  toastr.success('Pesanan Ditambahkan Ke Keranjang Belanja')
</script>
<?php } ?>

<!-- Sum Total ke Subtotal -->
<script language="javascript" type="text/javascript">
  var tds = document.getElementById('countit').getElementsByTagName('td');
  var sum = 0;
  for(var i = 0; i < tds.length; i ++) {
      if(tds[i].className == 'count-me') {
          sum += isNaN(tds[i].innerHTML) ? 0 : parseFloat(tds[i].innerHTML);
      }
  }
  $('#total').val(sum);
  // document.getElementById('total2').innerHTML += '<tr><td>' + sum + '</td><td>total</td></tr>';
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | PT Akurat Intan Madya</title>
  <!-- Datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">
  <!-- cropperjs -->
  <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
  <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
  <script src="https://unpkg.com/dropzone"></script>
  <script src="https://unpkg.com/cropperjs"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

    .scrollable_item_form {
      overflow-y: auto;
      max-height: 420px;
    }

    .table {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }

    .container_photo {
      width: 400px;
      height: 225px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 10px;
      border: 1px solid black;
    }

    #display_image {
      width: 200px;
      height: 200px;
      border: 1px solid black;
      background-position: center;
      background-size: cover;
    }
  </style>

  <style>
    .image_area {
      position: relative;
    }

    .image_area_edit {
      position: relative;
    }


    img {
      display: block;
      max-width: 100%;
    }

    .preview {
      overflow: hidden;
      width: 160px;
      height: 160px;
      margin: 10px;
      border: 1px solid red;
    }

    .modal-lg {
      max-width: 1000px !important;
    }

    .overlay {
      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
      background-color: rgba(255, 255, 255, 0.5);
      overflow: hidden;
      height: 0;
      transition: .5s ease;
      width: 100%;
      color: white;
    }

    .image_area:hover .overlay {
      height: 50%;
      cursor: pointer;
    }

    .text {
      color: #ffffff;
      font-size: 12px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      text-align: center;
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

  <?php if ($this->session->userdata('level') == "Admin") {
    $home = 'dashboard_controllers/Administrator';
  } else {
    $home = 'dashboard_controllers/User';
  };
  ?>
  <div class="wrapper">

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
                    <td><a href="<?php echo base_url() . 'Order/remove/' . $items['kode_barang']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <br>
            <?php foreach ($user as $user) : ?>
              <form action="<?php echo base_url() . 'Order/simpan_transaksi' ?>" method="post">
                <table class="pull-right">
                  <tr>
                    <th>Total (Rp)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</th>
                    <th><input type="text" name="total" id="total" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                  </tr>
                  <tr>
                    <th><input type="hidden" id="username" name="username" value="<?php echo $user->username ?>" class="form-control input-sm"> </th>
                  </tr>
                  <tr>
                    <th><input type="hidden" id="nama" name="nama" value="<?php echo $user->nama ?>" class="form-control input-sm"> </th>
                  </tr>
                  <tr>
                    <th><input type="hidden" id="alamat" name="alamat" value="<?php echo $user->alamat ?>" class="form-control input-sm"> </th>
                  </tr>
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
        <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#cart">
            <i class=" fa fa-shopping-cart"></i>
            <span class="badge badge-danger navbar-badge"><?php echo $count ?></span>
          </a>
        </li> -->
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
            <li class="nav-item">
              <a href="<?= site_url($home) ?>" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <!-- <li class="nav-item">
          <br>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Pesan
              </p>
            </a>
          </li> -->
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
              <a href="<?= site_url('Stock') ?>" class="nav-link">
                <i class="nav-icon fa fa-store"></i>
                <p>
                  Manajemen Barang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <br>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('User') ?>" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Manajemen User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <br>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('Laporan') ?>" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>
                  Laporan
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
    <!-- bootstrap datepicker -->
    <script src="<?= base_url() ?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?= base_url() ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?= base_url() ?>assets/plugins/dropzone/min/dropzone.min.js"></script>

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

    <!-- <script>
const image_input = document.querySelector("#image_input");
image_input.addEventListener("change", function() {
   const reader = new FileReader();
   reader.addEventListener("load", () => {
   const uploaded_image = reader.result;
   document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image})`;
  });
    reader.readAsDataURL(this.files[0]);
  });
</script> -->

    <script>
      $(document).ready(function() {
        var $modal = $('#modal');
        var image = document.getElementById('sample_image');
        var cropper;

        //$("body").on("change", ".image", function(e){
        $('#upload_image').change(function(event) {
          var files = event.target.files;
          var done = function(url) {
            image.src = url;
            $modal.modal('show');
          };
          //var reader;
          //var file;
          //var url;

          if (files && files.length > 0) {
            /*file = files[0];
      		if(URL)
      		{
        		done(URL.createObjectURL(file));
      		}
      		else if(FileReader)
      		{*/
            reader = new FileReader();
            reader.onload = function(event) {
              done(reader.result);
            };
            reader.readAsDataURL(files[0]);
            //}
          }
        });

        $modal.on('shown.bs.modal', function() {
          cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
          });
        }).on('hidden.bs.modal', function() {
          cropper.destroy();
          cropper = null;
        });

        $("#crop").click(function() {
          canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400,
          });

          canvas.toBlob(function(blob) {
            //url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
              var base64data = reader.result;
              var filename = true;

              $.ajax({
                url: "<?php echo base_url() . 'upload.php' ?>",
                method: "POST",
                data: {
                  image: base64data
                },
                success: function(data) {
                  console.log(data);
                  $modal.modal('hide');
                  $('#uploaded_image').attr('src', data);
                  $('#profile_pic').val(data);
                  //alert("success upload image");
                }
              });

            }
          });
        });

      });
    </script>


    <?php if ($this->session->flashdata('add_success')) { ?>
      <script>
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        toastr.success('Barang Ditambahkan')
      </script>
    <?php } ?>

    <script>
      $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
          'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
          'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
          format: 'yyyy-MM-DD'
        });

        $('#reservationdate2').datetimepicker({
          format: 'yyyy-MM-DD'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
          icons: {
            time: 'far fa-clock'
          }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'MM/DD/YYYY hh:mm A'
          }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          },
          function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
          $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
          $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

      })
      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })

      // DropzoneJS Demo Code Start
      Dropzone.autoDiscover = false

      // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
      var previewNode = document.querySelector("#template")
      previewNode.id = ""
      var previewTemplate = previewNode.parentNode.innerHTML
      previewNode.parentNode.removeChild(previewNode)

      var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
      })

      myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
          myDropzone.enqueueFile(file)
        }
      })

      // Update the total progress bar
      myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
      })

      myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
      })

      // Hide the total progress bar when nothing's uploading anymore
      myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
      })

      // Setup the buttons for all transfers
      // The "add files" button doesn't need to be setup because the config
      // `clickable` has already been specified.
      document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
      }
      document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
      }
      // DropzoneJS Demo Code End
    </script>
</body>

</html>
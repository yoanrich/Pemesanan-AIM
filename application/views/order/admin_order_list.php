<section class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0">Daftar Semua Pesanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <?php if ($this->session->userdata('level') == "Admin") {
                $home = 'dashboard_controllers/Administrator';
            } else {
                $home = 'dashboard_controllers/User';
            };
            ?>
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= site_url($home) ?>">Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Pesanan</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>

<style>
    overflow {
        display: block;
        width: 280px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">List</h3>
                </div>
                <div class="card-body">
                    <div class="m-4 justify-content-center">
                        <ul class="nav nav-pills" id="myTab">
                            <li class="nav-item">
                                <a href="#process" class="nav-link active">Dalam Proses</a>
                            </li>
                            <li class="nav-item">
                                <a href="#checked" class="nav-link">Sudah Diperiksa</a>
                            </li>
                            <li class="nav-item">
                                <a href="#delivered" class="nav-link">Sedang Dikirim</a>
                            </li>
                            <li class="nav-item">
                                <a href="#canceled" class="nav-link">Dibatalkan</a>
                            </li>
                        </ul>
                        <br><br>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="process">
                                <div class="scrollable">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead style="background-color: #9ee">
                                                            <tr>
                                                                <th>No. Faktur</th>
                                                                <th>Nama Mitra</th>
                                                                <th>Alamat Mitra</th>
                                                                <th>Total Pembelian</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($before_payment as $before_payment) : ?>
                                                                <tr>
                                                                    <td> <?php echo $before_payment->jual_kode ?> </td>
                                                                    <td> <?php echo $before_payment->nama ?> </td>
                                                                    <td>
                                                                        <overflow> <?php echo $before_payment->alamat ?> </overflow>
                                                                    </td>
                                                                    <td> Rp. <?php echo number_format($before_payment->jual_total) ?> </td>
                                                                    <td> <?php echo $before_payment->step ?> </td>
                                                                    <td><?php echo anchor('Order_Process/rincian/' . $before_payment->jual_kode, '<button type="button" class="btn btn-outline-info btn-xs">&nbspRincian</button>') ?>
                                                                        &nbsp <a href="<?php echo base_url() . 'Order_Process/sudah_membayar/' . $before_payment->jual_kode ?>" <?php if ($this->session->userdata('level') == "Admin") {
                                                                                                                                                                                echo ('class="btn btn-outline-success btn-xs">&nbspLunas</a>');
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "";
                                                                                                                                                                            } ?> </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="checked">
                                <div class="scrollable">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead style="background-color: #9ee">
                                                            <tr>
                                                                <th>No. Faktur</th>
                                                                <th>Nama Mitra</th>
                                                                <th>Alamat Mitra</th>
                                                                <th>Total Pembelian</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($after_payment as $after_payment) : ?>
                                                                <tr>
                                                                    <td> <?php echo $after_payment->jual_kode ?> </td>
                                                                    <td> <?php echo $after_payment->nama ?> </td>
                                                                    <td>
                                                                        <overflow> <?php echo $after_payment->alamat ?> </overflow>
                                                                    </td>
                                                                    <td> Rp. <?php echo number_format($after_payment->jual_total) ?> </td>
                                                                    <td> <?php echo $after_payment->step ?> </td>
                                                                    <td><?php echo anchor('Order_Process/rincian/' . $after_payment->jual_kode, '<button type="button" class="btn btn-outline-info btn-xs">&nbspRincian</button>') ?>
                                                                        &nbsp <?php echo anchor('Order_Process/kirim/' . $after_payment->jual_kode, '<button class="btn btn-outline-success btn-xs">&nbspKirim</button>') ?> </td>
                                                                </tr>
                                                        </tbody>
                                                    <?php endforeach; ?>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="delivered">
                                <div class="scrollable">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead style="background-color: #9ee">
                                                            <tr>
                                                                <th>No. Faktur</th>
                                                                <th>Nama Mitra</th>
                                                                <th>Alamat Mitra</th>
                                                                <th>Total Pembelian</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($delivered as $delivered) : ?>
                                                                <tr>
                                                                    <td> <?php echo $delivered->jual_kode ?> </td>
                                                                    <td> <?php echo $delivered->nama ?> </td>
                                                                    <td>
                                                                        <overflow> <?php echo $delivered->alamat ?> </overflow>
                                                                    </td>
                                                                    <td> Rp. <?php echo number_format($delivered->jual_total) ?> </td>
                                                                    <td> <?php echo $delivered->step ?> </td>
                                                                    <td><?php echo anchor('Order_Process/surat_jalan/' . $delivered->jual_kode, '<button type="button" class="btn btn-outline-info">&nbspRincian</button>') ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="canceled">
                                <div class="scrollable">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead style="background-color: #9ee">
                                                            <tr>
                                                                <th>No. Faktur</th>
                                                                <th>Nama Mitra</th>
                                                                <th>Alamat Mitra</th>
                                                                <th>Total Pembelian</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($canceled as $canceled) : ?>
                                                                <tr>
                                                                    <td> <?php echo $canceled->jual_kode ?> </td>
                                                                    <td> <?php echo $canceled->nama ?> </td>
                                                                    <td>
                                                                        <overflow> <?php echo $canceled->alamat ?> </overflow>
                                                                    </td>
                                                                    <td> Rp. <?php echo number_format($canceled->jual_total) ?> </td>
                                                                    <td> <?php echo $canceled->step ?> </td>
                                                                    <td><?php echo anchor('Order_Process/rincian/' . $canceled->jual_kode, '<button type="button" class="btn btn-outline-info">&nbspRincian</button>') ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {

        $('#submit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('Order_Process/do_upload') ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    alert("Upload File Berhasil.");
                }
            });
        });
    });
</script>
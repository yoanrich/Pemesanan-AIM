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
                <li class="breadcrumb-item"><a href=<?= site_url($home) ?>>Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Pesanan</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>

<style>
    overflow {
        display: block;
        width: 270px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        text-align: left;
    }

    overflow_th {
        display: block;
        text-align: center;
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
                                                                <th>
                                                                    <overflow_th> No. Faktur
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Tanggal Pembelian
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Total Pembelian
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Aksi
                                                                </th>
                                                                </overflow_th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($before_payment as $before_payment) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <overflow> <?php echo $before_payment->jual_kode ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td>
                                                                        <overflow> <?php echo $before_payment->jual_tanggal ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td>
                                                                        <overflow> Rp. <?php echo number_format($before_payment->jual_total) ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td><?php echo anchor('Order_Process/rincian/' . $before_payment->jual_kode, '<button type="button" class="btn btn-outline-info btn-xs">&nbspRincian</button>') ?>
                                                                        &nbsp <a href="<?php echo base_url() . 'Order_Process/pesanan_dibatalkan/' . $before_payment->jual_kode ?>" class="btn btn-outline-danger btn-xs">&nbspBatal</a> </td>
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
                                                                <th>
                                                                    <overflow_th> No. Faktur
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Tanggal Pembelian
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Total Pembelian
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Aksi
                                                                </th>
                                                                </overflow_th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($after_payment as $after_payment) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <overflow> <?php echo $after_payment->jual_kode ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td>
                                                                        <overflow> <?php echo $after_payment->jual_tanggal ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td>
                                                                        <overflow> Rp. <?php echo number_format($after_payment->jual_total) ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td><?php echo anchor('Order_Process/rincian/' . $after_payment->jual_kode, '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-outline-info btn-xs">&nbspRincian</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp') ?> </td>
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
                            <div class="tab-pane fade" id="delivered">
                                <div class="scrollable">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead style="background-color: #9ee">
                                                            <tr>
                                                                <th>
                                                                    <overflow_th> No. Faktur
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Tanggal Pembelian
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Total Pembelian
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Aksi
                                                                </th>
                                                                </overflow_th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($delivered as $delivered) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <overflow> <?php echo $delivered->jual_kode ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td>
                                                                        <overflow> <?php echo $delivered->jual_tanggal ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td>
                                                                        <overflow> Rp. <?php echo number_format($delivered->jual_total) ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td><?php echo anchor('Order_Process/surat_jalan/' . $delivered->jual_kode, '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-outline-success btn-xs">&nbspRincian</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp') ?> </td>
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
                                                                <th>
                                                                    <overflow_th> No. Faktur
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Tanggal Pembelian
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Total Pembelian
                                                                </th>
                                                                </overflow_th>
                                                                <th>
                                                                    <overflow_th> Aksi
                                                                </th>
                                                                </overflow_th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($canceled as $canceled) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <overflow> <?php echo $canceled->jual_kode ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td>
                                                                        <overflow> <?php echo $canceled->jual_tanggal ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td>
                                                                        <overflow> Rp. <?php echo number_format($canceled->jual_total) ?>
                                                                    </td>
                                                                    </overflow>
                                                                    <td><?php echo anchor('Order_Process/rincian/' . $canceled->jual_kode, '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-outline-info btn-xs">&nbspRincian</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp') ?> </td>
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
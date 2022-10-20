<section class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0">History Pesanan</h1>
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
                <li class="breadcrumb-item active">History Pesanan</li>
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
                <div class="card-header with-border">
                    <h3 class="card-title">Daftar Pesanan Yang Berhasil</h3>
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="m-4 justify-content-center">
                        <br>
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
                                    <?php foreach ($finished as $finished) : ?>
                                        <tr>
                                            <td>
                                                <overflow> <?php echo $finished->jual_kode ?>
                                            </td>
                                            </overflow>
                                            <td>
                                                <overflow> <?php echo $finished->jual_tanggal ?>
                                            </td>
                                            </overflow>
                                            <td>
                                                <overflow> Rp. <?php echo number_format($finished->jual_total) ?>
                                            </td>
                                            </overflow>
                                            <td><?php echo anchor('Order_Process/surat_jalan/' . $finished->jual_kode, '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-outline-info btn-xs">Rincian</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp') ?> </td>
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
</section>
<section class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0">History Pesanan</h1>
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
                <li class="breadcrumb-item active">History Pesanan</li>
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
                <div class="card-header with-border">
                    <h3 class="card-title">Daftar Pesanan Yang Berhasil</h3>
                    <div class="card-tools pull-right">
                        <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="m-4 justify-content-center">
                        <br>
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
                                    <?php foreach ($finished as $finished) : ?>
                                        <tr>
                                            <td>
                                                <overflow> <?php echo $finished->jual_kode ?>
                                            </td>
                                            </overflow>
                                            <td>
                                                <overflow> <?php echo $finished->jual_tanggal ?>
                                            </td>
                                            </overflow>
                                            <td>
                                                <overflow> Rp. <?php echo number_format($finished->jual_total) ?>
                                            </td>
                                            </overflow>
                                            <td><?php echo anchor('Order_Process/surat_jalan/' . $finished->jual_kode, '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-outline-info btn-xs">Rincian</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp') ?> </td>
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
</section>
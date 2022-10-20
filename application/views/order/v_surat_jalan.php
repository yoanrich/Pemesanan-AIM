<section class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0">Rincian Pesanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <?php if($this->session->userdata('level')=="Admin"){
                $home='dashboard_controllers/Administrator';
            } else {
                $home='dashboard_controllers/User';
            };
            ?>
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=site_url($home)?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?=site_url('Order_Process')?>">Daftar Pesanan</a></li>
                <li class="breadcrumb-item active">Rincian Pesanan</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info" >
            <div class="card-header" >
					<h3 class="card-title">List</h3>
				</div>
                    <div class="card-body">
                        <?php
                            $b=$data->row_array();
                        ?>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Dikirim Ke : </strong><br>
                                    <strong>Nama Mitra : </strong> <?= $b['nama'];?><br><br>
                                    <strong>Alamat : </strong> <?= $b['alamat'];?><br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <br>
                                <br>
                                <b>Faktur No: <?= $b['jual_kode'];?></b>
                                <br>
                                <b>Tanggal: <?= $b['jual_tanggal']?></b>
                                <br>
                                <b>Status : <?= $b['step']?></b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead style="background-color: #9ee">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Pokok</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;
                                        foreach ($data->result_array() as $i){
                                            $no++;
                                            $id_barang=$i['d_jual_barang_id'];
                                            $nabar=$i['d_jual_barang_nama'];
                                            $harga=$i['d_jual_harga'];
                                            $jumlah=$i['d_jual_jumlah'];
                                            $total=$i['d_jual_total'];
                                            ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$id_barang;?></td>
                                            <td><?=$nabar;?></td>
                                            <td><?=number_format($harga);?></td>
                                            <td><?=$jumlah;?></td>
                                            <td><?=number_format($total);?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                
                            </div>
                            <div class="col-xs-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width: 50%">Total:</th>
                                            <td><?= 'Rp '.number_format($b['jual_total']).';-';?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>
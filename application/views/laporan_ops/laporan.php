<section class="content-header">
<div class="row">
        <div class="col-sm-6">
        <h1 class="m-0">Daftar Semua Laporan</h1>
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
            <li class="breadcrumb-item active">Daftar Semua Laporan</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>

<style>
  overflow {
  display: block;
  width:270px;
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
		<div class="col-md-12" >
			<div class="card card-info" >
				<div class="card-header" >
					<h3 class="card-title">List Laporan</h3>
				</div>
			<div class="card-body">
				<div class="m-4 justify-content-center">
					<div class="tab-content">
						<div class="tab-pane fade show active">
							<div class="scrollable_item_form">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-bordered table-striped">
                                                <thead style="background-color: #9ee">
                                                    <tr>
                                                        <th style="width: 40px; text-align: center; ">No.</th>		
                                                        <th style="width: 1080px; text-align: center; ">Pilih Laporan</th>
                                                        <th style="width: 160px; text-align: center; ">Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                        <td style="text-align: center;">1</td>
                                                        <td>Laporan Stok Barang</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="<?php echo base_url().'laporan/lap_stok_barang'?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                        <tr>
                                                        <td style="text-align: center;">2</td>
                                                        <td>Laporan Pemasukkan Barang</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="<?php echo base_url().'laporan/lap_pemasukan_barang'?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                        <tr>
                                                        <td style="text-align: center;">3</td>
                                                        <td>Laporan Pemasukkan Barang PerTanggal</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="#lap_masuk_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                        <tr>
                                                        <td style="text-align: center;">4</td>
                                                        <td>Laporan Pemasukkan Barang PerBulan</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="#lap_m_bulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                        <tr>
                                                        <td style="text-align: center;">5</td>
                                                        <td>Laporan Pemasukkan Barang PerTahun</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="#lap_m_tahun" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                        <tr>
                                                        <td style="text-align: center;">6</td>
                                                        <td>Laporan Penjualan</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="<?php echo base_url().'laporan/lap_penjualan_barang'?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                        <tr>
                                                        <td style="text-align: center;">7</td>
                                                        <td>Laporan Penjualan PerTanggal</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                        <tr>
                                                        <td style="text-align: center;">8</td>
                                                        <td>Laporan Penjualan PerBulan</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="#lap_jual_bulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                        <tr>
                                                        <td style="text-align: center;">9</td>
                                                        <td>Laporan Penjualan PerTahun</td>
                                                        <td style="text-align:center;">
                                                        <a class="btn btn-sm btn-info" href="#lap_jual_tahun" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                                        </tr>
                                                    </tbody>
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

                <div class="modal fade" id="lap_masuk_pertanggal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Laporan Pemasukan PerTanggal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                                <form class="form-horizontal" method="post" action="<?php echo base_url().'laporan/lap_pemasukan_per'?>" target="_blank">
                            <div class="modal-body">
                                <div class="form-group">
                                <label>Masukkan Tanggal:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="filter" class="form-control datetimepicker-input" data-target="#reservationdate" required>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
                <!-- /.modal -->
                <div class="modal fade" id="lap_m_bulan" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Pilih Pemasukan PerBulan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'laporan/lap_pemasukan_per'?>" target="_blank">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Bulan</label>
                                            <div class="col-xs-9">
                                                <select name="filter" class="form-control" required>
                                                    <?php 
                                                    foreach($bulan_tahun_pmsk as $row)
                                                    { 
                                                    echo '<option value="'.$row->bulan_tahun.'">'.$row->bulan.' - '.$row->tahun.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>                                                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="lap_m_tahun" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Pilih Pemasukan PerTahun</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'laporan/lap_pemasukan_per'?>" target="_blank">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Tahun</label>
                                            <div class="col-xs-9">
                                                <select name="filter" id="thn" class="form-control" required>
                                                <?php 
                                                    foreach($bulan_tahun_pmsk as $row)
                                                    { 
                                                    echo '<option value="'.$row->tahun.'">'.$row->tahun.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>                                                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Laporan Penjualan PerTanggal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                                <form class="form-horizontal" method="post" action="<?php echo base_url().'laporan/lap_penjualan_per'?>" target="_blank">
                            <div class="modal-body">
                                <div class="form-group">
                                <label>Masukan Tanggal:</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input type="text" name="filter2" class="form-control datetimepicker-input" data-target="#reservationdate2"required>
                                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
                <!-- /.modal -->
                <div class="modal fade" id="lap_jual_bulan" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Laporan Penjualan PerTanggal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'laporan/lap_penjualan_per'?>" target="_blank">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Bulan</label>
                                            <div class="col-xs-9">
                                                <select name="filter2" id="bln2" class="form-control" required>
                                                    <?php 
                                                        foreach($bulan_tahun_pjln as $row)
                                                        { 
                                                        echo '<option value="'.$row->bulan_tahun.'">'.$row->bulan.' - '.$row->tahun.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>                                                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="lap_jual_tahun" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Laporan Penjualan PerTanggal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'laporan/lap_penjualan_per'?>" target="_blank">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Tahun</label>
                                            <div class="col-xs-9">
                                                <select name="filter2" id="thn2" class="form-control" required>
                                                        <?php 
                                                            foreach($bulan_tahun_pjln as $row)
                                                            { 
                                                            echo '<option value="'.$row->tahun.'">'.$row->tahun.'</option>';
                                                            }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>                                                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</section>
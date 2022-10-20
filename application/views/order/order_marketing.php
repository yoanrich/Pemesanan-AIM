<section class="content-header">
<div class="content-header">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Pemesanan</h1>
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
              <li class="breadcrumb-item active">Pemesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
</section>

<style>
  overflow {
  display: block;
  width: 140px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  }
</style>

<section class="content">
	<div class="row">
		<div class="col-md-12" >
			<div class="card card-info" >
				<div class="card-header" >
					<h3 class="card-title">List Barang</h3>
				</div>
			<div class="card-body">
				<div class="m-4 justify-content-center">
					<ul class="nav nav-pills" id="myTab">
						<li class="nav-item">
							<a href="#tests" class="nav-link active">T E S T S</a>
						</li>
						<li class="nav-item">
							<a href="#mpbio" class="nav-link">M P - B I O M E D I C A L S</a>
						</li>
						<li class="nav-item">
							<a href="#rapidqveda" class="nav-link">R A P I D - Q  -  V E D A - L A B</a>
						</li>
						<li class="nav-item">
							<a href="#instrument" class="nav-link">I N S T R U M E N T S</a>
						</li>
					</ul>
					<br><br>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tests">
							<div class="scrollable">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<?php $no = 1;  
												foreach  ($tests as $item) : ?>
													<div class="col-md-2">
														<div class="small-box bg-info">
															<div class="inner"> 
																<?php echo $no++; ?>
																<h6> <overflow> <?php echo $item['nama_barang']; ?> </overflow> </h6> 
																<br>
																<small> Tersedia : <?php echo $item['jml_barang']; ?> </small>
																<br>
																<small> Rp. <?php echo number_format($item['harga_jual']); ?> </small>
															</div>
															<a class="small-box-footer" data-toggle="modal" data-target="#detail-order<?php echo $item['id_barang']; ?>">Pesan <i class="fas fa-arrow-circle-right"></i><br></a>
														</div>
													</div>
													<div class="modal fade" id="detail-order<?php echo $item['id_barang']; ?>">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">Rincian Pemesanan</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form  method="post" action="<?php echo base_url().'Order/tambah_keranjang'?>">
																		<div class="form-group">
																			<input type="hidden" name="kode_barang" id="kode_barang" class="form-control" value="<?php echo $item['id_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Nama Barang</label>
																			<input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $item['nama_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>jenis Barang</label>
																			<input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="<?php echo $item['jenis_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<input type="hidden" name="harga_jual" id="harga_jual" class="form-control" value="<?php echo $item['harga_jual']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Pilih User</label>
																			<select class="form-control" name="username" id="username">
																				<?php 

																				foreach($all as $row)
																				{ 
																				echo '<option value="'.$row->username.'">'.$row->nama.' - '.$row->level.' - '.$row->nama_instansi.'</option>';
																				}
																				?>
																			</select>
																		</div>
																		<div class="form-group">
																			<input type="hidden" name="username_marketing" id="username_marketing" class="form-control" value="<?php echo $this->session->userdata('username');?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Jumlah Pesanan</label>
																			<input type="number" name="jml_barang" id="jml_barang" class="form-control" min="1" max="<?php echo $item['jml_barang']; ?>" class="form-control" required>
																		</div>
																		<div class="form-group">
																			<label>Catatan (Opsional)</label>
																			<input type="text" name="catatan" id="catatan" class="form-control">
																		</div>
																</div>
																<div class="modal-footer right">
																	<button type="submit" class="btn btn-outline-success fa fa-save"> Tambah Pesanan</button>
																</div>
															</form>
															</div>
														<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>
												<!-- /.modal -->
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<div class="tab-pane fade" id="mpbio">
							<div class="scrollable">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<?php $no = 1;  
												foreach  ($MP_Biomedicals as $item) : ?>
													<div class="col-md-2">
														<div class="small-box bg-info">
															<div class="inner"> 
																<?php echo $no++; ?>
																<h6> <overflow> <?php echo $item['nama_barang']; ?> <overflow> </h6>
																<br>
																<small> Tersedia : <?php echo $item['jml_barang']; ?> </small>
																<br>
																<small> Rp. <?php echo number_format($item['harga_jual']); ?> </small>
															</div>
															<a class="small-box-footer" data-toggle="modal" data-target="#detail-order<?php echo $item['id_barang']; ?>">Pesan <i class="fas fa-arrow-circle-right"></i><br></a>
														</div>
													</div>
													<div class="modal fade" id="detail-order<?php echo $item['id_barang']; ?>">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">Rincian Pemesanan</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form  method="post" action="<?php echo base_url().'Order/tambah_keranjang'?>">
																		<div class="form-group">
																			<input type="hidden" name="kode_barang" id="kode_barang" class="form-control" value="<?php echo $item['id_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Nama Barang</label>
																			<input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $item['nama_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>jenis Barang</label>
																			<input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="<?php echo $item['jenis_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<input type="hidden" name="harga_jual" id="harga_jual" class="form-control" value="<?php echo $item['harga_jual']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<input type="hidden" name="username" id="username" class="form-control" value="<?php echo $this->session->userdata('username');?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Jumlah Pesanan</label>
																			<input type="number" name="jml_barang" id="jml_barang" class="form-control" min="1" max="<?php echo $item['jml_barang']; ?>" class="form-control" required>
																		</div>
																		<div class="form-group">
																			<label>Catatan (Opsional)</label>
																			<input type="text" name="catatan" id="catatan" class="form-control">
																		</div>
																</div>
																<div class="modal-footer right">
																	<button type="submit" class="btn btn-outline-success fa fa-save"> Tambah Pesanan</button>
																</div>
															</form>
															</div>
														<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>
												<!-- /.modal -->
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<div class="tab-pane fade" id="rapidqveda">
							<div class="scrollable">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<?php $no = 1;  
												foreach  ($RapidVeda as $item) : ?>
													<div class="col-md-2">
														<div class="small-box bg-info">
															<div class="inner"> 
																<?php echo $no++; ?>
																<h6> <overflow> <?php echo $item['nama_barang']; ?> <overflow> </h6>
																<br>
																<small> Tersedia : <?php echo $item['jml_barang']; ?> </small>
																<br>
																<small> Rp. <?php echo number_format($item['harga_jual']); ?> </small>
															</div>
															<a class="small-box-footer" data-toggle="modal" data-target="#detail-order<?php echo $item['id_barang']; ?>">Pesan <i class="fas fa-arrow-circle-right"></i><br></a>
														</div>
													</div>
													<div class="modal fade" id="detail-order<?php echo $item['id_barang']; ?>">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">Rincian Pemesanan</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form  method="post" action="<?php echo base_url().'Order/tambah_keranjang'?>">
																		<div class="form-group">
																			<input type="hidden" name="kode_barang" id="kode_barang" class="form-control" value="<?php echo $item['id_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Nama Barang</label>
																			<input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $item['nama_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>jenis Barang</label>
																			<input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="<?php echo $item['jenis_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<input type="hidden" name="harga_jual" id="harga_jual" class="form-control" value="<?php echo $item['harga_jual']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<input type="hidden" name="username" id="username" class="form-control" value="<?php echo $this->session->userdata('username');?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Jumlah Pesanan</label>
																			<input type="number" name="jml_barang" id="jml_barang" class="form-control" min="1" max="<?php echo $item['jml_barang']; ?>" class="form-control" required>
																		</div>
																		<div class="form-group">
																			<label>Catatan (Opsional)</label>
																			<input type="text" name="catatan" id="catatan" class="form-control">
																		</div>
																</div>
																<div class="modal-footer right">
																	<button type="submit" class="btn btn-outline-success fa fa-save"> Tambah Pesanan</button>
																</div>
															</form>
															</div>
														<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>
												<!-- /.modal -->
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="instrument">
							<div class="scrollable">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<?php $no = 1;  
												foreach  ($Instruments as $item) : ?>
													<div class="col-md-2">
														<div class="small-box bg-info">
															<div class="inner"> 
																<?php echo $no++; ?>
																<h6> <overflow> <?php echo $item['nama_barang']; ?> <overflow> </h6>
																<br>
																<small> Tersedia : <?php echo $item['jml_barang']; ?> </small>
																<br>
																<small> Rp. <?php echo number_format($item['harga_jual']); ?> </small>
															</div>
															<a class="small-box-footer" data-toggle="modal" data-target="#detail-order<?php echo $item['id_barang']; ?>">Pesan <i class="fas fa-arrow-circle-right"></i><br></a>
														</div>
													</div>
													<div class="modal fade" id="detail-order<?php echo $item['id_barang']; ?>">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">Rincian Pemesanan</h4>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form  method="post" action="<?php echo base_url().'Order/tambah_keranjang'?>">
																		<div class="form-group">
																			<input type="hidden" name="kode_barang" id="kode_barang" class="form-control" value="<?php echo $item['id_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Nama Barang</label>
																			<input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $item['nama_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>jenis Barang</label>
																			<input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="<?php echo $item['jenis_barang']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<input type="hidden" name="harga_jual" id="harga_jual" class="form-control" value="<?php echo $item['harga_jual']; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<input type="hidden" name="username" id="username" class="form-control" value="<?php echo $this->session->userdata('username');?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Jumlah Pesanan</label>
																			<input type="number" name="jml_barang" id="jml_barang" class="form-control" min="1" max="<?php echo $item['jml_barang']; ?>" class="form-control" required>
																		</div>
																		<div class="form-group">
																			<label>Catatan (Opsional)</label>
																			<input type="text" name="catatan" id="catatan" class="form-control">
																		</div>
																</div>
																<div class="modal-footer right">
																	<button type="submit" class="btn btn-outline-success fa fa-save"> Tambah Pesanan</button>
																</div>
															</form>
															</div>
														<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>
												<!-- /.modal -->
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="cartlist">
							<h4 class="mt-2">Messages tab content</h4>
							<p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
	$(function(){
            $('.jml_barang').on("input",function(){
                var harga_jual=$('.harga_jual').val();
				var jml_barang=$('.jml_barang').val();
                $('.subtotal').val(jml_barang*harga_jual);
            }) 
        });
</script>

<script type="text/javascript">
	function isi_otomatis(){
		var id_barang = $("#id_barang").val();
		$.ajax({
			url: "<?=base_url().'Order/get_barang'?>",
			type:"GET",
			data:"id_barang=" + id_barang,
			success: function(a){
				var json = a,
				obj = JSON.parse(json);
				$("#nama_barang").val(obj.nama_barang);
				$("#jml_barang").val(obj.jml_barang);
				$("#harga_jual").val(obj.harga_jual);
				$("#harga_beli").val(obj.harga_beli);
			},
		});
	}
</script>
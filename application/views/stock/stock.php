<section class="content-header">
<div class="content-header">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen Barang</h1>
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
              <li class="breadcrumb-item active">Manajemen Barang</li>
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
															<a class="small-box-footer" data-toggle="modal" data-target="#detail-order<?php echo $item['id_barang']; ?>">Manage <i class="fas fa-arrow-circle-right"></i><br></a>
														</div>
													</div>
													<div class="modal fade" id="detail-order<?php echo $item['id_barang']; ?>">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">Manajemen Barang  </h4>
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
																	<button type="submit" class="btn btn-outline-success fa fa-save"> Simpan</button>
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
															<a class="small-box-footer" data-toggle="modal" data-target="#detail-order<?php echo $item['id_barang']; ?>">Manage <i class="fas fa-arrow-circle-right"></i><br></a>
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
																	<button type="submit" class="btn btn-outline-success fa fa-save"> Simpan</button>
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
															<a class="small-box-footer" data-toggle="modal" data-target="#detail-order<?php echo $item['id_barang']; ?>">Manage <i class="fas fa-arrow-circle-right"></i><br></a>
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
																	<button type="submit" class="btn btn-outline-success fa fa-save"> Simpan</button>
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
															<a class="small-box-footer" data-toggle="modal" data-target="#detail-order<?php echo $item['id_barang']; ?>">Manage <i class="fas fa-arrow-circle-right"></i><br></a>
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
																	<button type="submit" class="btn btn-outline-success fa fa-save"> Simpan</button>
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
					</div>
				</div>
                <div class="modal-footer right">
					<button type="button" data-toggle="modal" data-target="#add_item" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp&nbsp  Tambah Barang</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal Add Barang -->
    <div class="modal fade" id="add_item">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="scrollable_item_form">
                    <form id="myForm"  method="post" action="<?php echo base_url().'Stock/tambah_barang'?>" >
						<div class="form-group">
							<label>No. Nota Pembelian</label>
							<input type="text" name="nofak" id="nofak" class="form-control" placeholder="Masukkan Nomor Nota / Faktur" required>
						</div>
							<div class="container-fluid">
								<div class="row">
								<br><br>
								    <div class="form-group">
										<input type="checkbox" id="checkbox" name="checkbox" onclick="checkbox()">
										<label for="checkbox">
											Barang Baru
										</label>
									</div>
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<div id="insert-form"></div>
									<div class="form-group" id="new">
										<label>Nama Barang Baru</label>
										<input type="text" name="nama_barang_new" id="new" class="form-control" placeholder="Masukkan Nama Barang">
									</div>
									&nbsp&nbsp
									<div class="form-group">
										<label>Nama Barang</label>
										<select class="form-control" name="nama_barang" id="existing">
										<?php 

										foreach($all as $row)
										{ 
										echo '<option value="'.$row->nama_barang.'">'.$row->id_barang.' - '.$row->nama_barang.' - '.$row->jenis_barang.'</option>';
										}
										?>
										</select>
									</div>
									&nbsp&nbsp
									<div class="form-group">
										<label>Jenis Barang</label>
										<select name="jenis_barang" id="jenis_barang" class="form-control" required>
											<option value="Tests">Tests</option>
											<option value="MP-Biomedicals">MP Biomedicals</option>
											<option value="Rapid-Q-Veda-Lab">Rapid Q-Veda Lab</option>
											<option value="Instruments">Instruments</option>
										</select>
									</div>
									&nbsp&nbsp
									<div class="form-group">
										<label>Harga Beli (Rp.)</label>
										<input type="number" name="harga_beli" id="harga_beli" class="form-control" placeholder="Masukkan Harga Beli" required>
									</div>
									&nbsp&nbsp
									<div class="form-group">
										<label>Harga Jual (Rp.)</label>
										<input type="number" name="harga_jual" id="harga_jual" class="form-control" placeholder="Masukkan Harga Jual" required>
									</div>
									&nbsp&nbsp
									<div class="form-group">
										<input type="hidden" name="nama" id="nama" class="form-control" value="<?php echo $this->session->userdata('nama');?>" required>
									</div>
									&nbsp&nbsp
									<div class="form-group">
										<label>Jumlah Barang Masuk</label>
										<input type="number" name="jml_barang" id="jml_barang" class="form-control" min="1"  class="form-control" required>
									</div>
									<div class="form-group">
										<input type="hidden" name="username" id="username" class="form-control" value="<?php echo $this->session->userdata('username');?>" readonly>
									</div>
									<div class="form-group">
										<input type="hidden" name="nama" id="nama" class="form-control" value="<?php echo $this->session->userdata('nama');?>" readonly>
									</div>
								</div>
								<button type="submit" class="btn-xs btn-outline-info fa fa-save" style="float: right"> Tambah Ke List</button>
								</div>
								</form>
								<br><br>
								<div class="table-responsive">
									<table class="table table-bordered table-striped" id="countit2">
									<thead style="background-color: #9ee">
										<tr>
										<th> <overflow_th> Kode Barang</th> </overflow_th>
										<th> <overflow_th> No Faktur</th> </overflow_th>
										<th> <overflow_th> Nama Barang</th> </overflow_th>
										<th> <overflow_th> Jumlah Barang </th> </overflow_th>
										<th> <overflow_th> Jenis Barang </th> </overflow_th>
										<th> <overflow_th> Harga Beli </th> </overflow_th>
										<th> <overflow_th> Harga Jual </th> </overflow_th>
										<th> <overflow_th> Total </th> </overflow_th>
										<th> <overflow_th> Aksi</th> </overflow_th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($temp_pemasukan as $items): ?>
										<tr>
											<td><?=$items['d_pemasukan_id_barang'];?></td>
											<td><?=$items['d_pemasukan_nofak'];?></td>
											<td><?=$items['d_pemasukan_barang_nama'];?></td>
											<td><?php echo $items['d_pemasukan_jumlah'];?></td>
                							<td><?=$items['d_pemasukan_jenis_barang'];?></td>
                							<td><?php echo number_format($items['d_pemasukan_harga_beli']);?></td>
											<td><?php echo number_format($items['d_pemasukan_harga_jual']);?></td>
											<td class="count-me2"><?php echo $items['d_pemasukan_total'];?></td>
											<td ><a href="<?php echo base_url().'Stock/cancel_pemasukan/'.$items['d_pemasukan_id'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
									</table>
									<br>
									<?php foreach ($user as $user) : ?>
									<form action="<?php echo base_url().'Stock/simpan_pemasukan'?>" method="post">
										<table class="pull-right">
											<tr>
												<th>Total (Rp)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</th>
												<th><input type="text" name="total2" id="total2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
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
										<div class="col-md-12">
										<?php if($temp_pemasukan != 0){ echo ('<button type="submit" class="btn btn-outline-success" style="float: right;">Simpan</button>');}else{echo "";}
											?>
										</div>  
									</form>
								</div>
								<?php endforeach; ?>
							</div>
						<div class="modal-footer right">
						
						</div>
					<!-- textbox untuk menampung jumlah data form -->
  					<input type="hidden" id="jumlah-form" value="1">
            	</div>
        		<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		</div>
		<!-- Modal Add Barang -->
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


<script>
	$(document).on('change','#checkbox',function(){
			if($(this).is(":checked")){
			$('#existing').closest('.form-group').hide();
			$('#new').closest('.form-group').show();
		}
		else{
			$('#existing').closest('.form-group').show();
			$('#new').closest('.form-group').hide();
		}
	});
</script>


<script language="javascript" type="text/javascript">
  var tds = document.getElementById('countit2').getElementsByTagName('td');
  var sum = 0;
  for(var i = 0; i < tds.length; i ++) {
      if(tds[i].className == 'count-me2') {
          sum += isNaN(tds[i].innerHTML) ? 0 : parseFloat(tds[i].innerHTML);
      }
  }
  $('#total2').val(sum);
  // document.getElementById('total2').innerHTML += '<tr><td>' + sum + '</td><td>total</td></tr>';
</script>
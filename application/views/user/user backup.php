<section class="content-header">
<div class="row">
        <div class="col-sm-6">
        <h1 class="m-0">Manajemen User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=site_url('dashboard_controllers/Marketing')?>">Beranda</a></li>
            <li class="breadcrumb-item active">Manajemen User</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>

<style>
  overflow {
  display: block;
  width:112px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  text-align: left;
  }

  overflow_th {
  display: block;
  text-align: center;
  }
  .first-column {
	width: 40%;
	float: left;
  }

  .second-column {
  width: 40%;
  float: right;
  }
</style>

<section class="content">
<div class="row">
		<div class="col-md-12" >
			<div class="card card-info" >
				<div class="card-header" >
					<h3 class="card-title">Daftar Semua User</h3>
				</div>
				<br>
			<div class="card-body">
				<div class="m-4 justify-content-center">
					<div class="scrollable">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table id="example1" class="table table-bordered table-striped">
											<thead style="background-color: #9ee">
												<tr>
												<th> No. </th>
												<th> <overflow_th> Nama Instansi </overflow_th> </th>
												<th> <overflow_th> Nama User </overflow_th> </th>
												<th> <overflow_th> Role / Level </overflow_th> </th>
												<th> <overflow_th> Alamat </overflow_th> </th>
												<th> <overflow_th> No. Handphone </overflow_th> </th>  
												<th> <overflow_th> Foto Profil </overflow_th> </th> 
												<th> <overflow_th> Aksi</th> </overflow_th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1;
												foreach ($user_data as $user) : ?>
												<tr>
													<td> <?php echo $no++; ?> </td>
													<td> <overflow> <?php echo $user->nama_instansi ?> </overflow> </td>
													<td> <overflow> <?php echo $user->nama ?> </overflow> </td> 
													<td> <overflow> <?php echo $user->level ?> </overflow> </td> 
													<td> <overflow> <?php echo $user->alamat ?> </overflow> </td>
													<td> <overflow> <?php echo $user->no_hp ?> </overflow> </td>
													<td> <overflow_th><img src="<?=base_url()?>uploads/<?php echo $user->profile_pic ?>" alt="User Avatar" class="img-size-50 img-circle mr-3"> </overflow_th> </td>
													<td><?php echo anchor('Order_Process/rincian/'.$user->id_user, '<button type="button" class="btn btn-outline-info btn-xs">&nbspRincian</button>') ?> 
                                                    &nbsp <button type="button" class="btn btn-outline-warning cancelled btn-xs">&nbspEdit</button> 
													&nbsp <button type="button" class="btn btn-outline-danger cancelled btn-xs">&nbspHapus</button> </td>
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
				<div class="modal-footer right">
					<button type="button" data-toggle="modal" data-target="#add_user" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp&nbsp  Tambah User</button>
				</div>		
			</div>                                    
        </div>      
	</div>

	<!-- Modal Tambah User -->
	<div class="modal fade" id="add_user">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  method="post" action="<?php echo base_url().'Order/tambah_user'?>">
						<div class="first-column">
							<div class="form-group">
								<label>Nama User</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama User" required>
							</div>
							<div class="form-group">
								<label>Level</label>
								<select name="level" class="form-control" required>
									<option value="Admin">Admin</option>
									<option value="Marketing">Marketing</option>
									<option value="Mitra">Mitra</option>
								</select>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" name="alamat" id="alamat" class="form-control"  placeholder="Masukkan Alamat User" required>
							</div>
							<div class="form-group">
								<label>No. Handphone</label>
								<input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan Alamat User" required>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
							</div>
						</div>
						<div class="second-column">
							<div class="form-group">
								<label>Foto Profil</label>
								<br>
								<small>Gunakan Rasio Foto 1:1</small>
								<br>
								<br>
								<div id="display_image" alt="Avatar"></div>
								<br><br>
								<input type='file' name='profile_pic' id="image_input" size='20' accept="image/png,image/jpeg" />
						</div>
					</div>	
				</div>
				<div class="modal-footer right">
					<button type="submit" class="btn btn-outline-success fa fa-save" value='upload'> Simpan</button>
				</div>
			</form>
			</div>
		<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<!-- /.modal -->

</section>
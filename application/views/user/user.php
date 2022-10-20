<section class="content-header">
	<div class="row">
		<div class="col-sm-6">
			<h1 class="m-0">Manajemen User</h1>
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
				<li class="breadcrumb-item active">Manajemen User</li>
			</ol>
		</div><!-- /.col -->
	</div><!-- /.row -->
</section>

<style>
	overflow {
		display: block;
		width: 112px;
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
		<div class="col-md-12">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title">Daftar Semua User</h3>
				</div>
				<br>
				<div class="card-body">
					<div class="m-4 justify-content-center">
						<div class="scrollable_item_form">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12">
										<div class="table-responsive">
											<table id="example1" class="table table-bordered table-striped">
												<thead style="background-color: #9ee">
													<tr>
														<th> No. </th>
														<th>
															<overflow_th> Nama Instansi </overflow_th>
														</th>
														<th>
															<overflow_th> Nama User </overflow_th>
														</th>
														<th>
															<overflow_th> Role / Level </overflow_th>
														</th>
														<th>
															<overflow_th> Alamat </overflow_th>
														</th>
														<th>
															<overflow_th> No. Handphone </overflow_th>
														</th>
														<th>
															<overflow_th> Foto Profil </overflow_th>
														</th>
														<th>
															<overflow_th> Aksi
														</th>
														</overflow_th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1;
													foreach ($user_data as $user) : ?>
														<tr>
															<td> <?php echo $no++; ?> </td>
															<td>
																<overflow> <?php echo $user->nama_instansi ?> </overflow>
															</td>
															<td>
																<overflow> <?php echo $user->nama ?> </overflow>
															</td>
															<td>
																<overflow> <?php echo $user->level ?> </overflow>
															</td>
															<td>
																<overflow> <?php echo $user->alamat ?> </overflow>
															</td>
															<td>
																<overflow> <?php echo $user->no_hp ?> </overflow>
															</td>
															<td>
																<overflow_th><img src="<?= base_url() ?><?php echo $user->profile_pic ?>" alt="User Avatar" class="img-size-50 img-circle mr-3"> </overflow_th>
															</td>
															<td> <a class="btn btn-outline-info btn-xs" href="<?php echo base_url() . 'User/edit_user/' . $user->id_user; ?>">&nbspRincian / Edit&nbsp&nbsp</a>
																<a class="btn btn-outline-danger cancelled btn-xs" href="<?php echo base_url() . 'User/hapus_user/' . $user->id_user; ?>">&nbspHapus</a>
															</td>
														</tr>
														<!-- <div class="modal fade" id="detail-user<?php echo $user->id_user; ?>">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Rincian Data User</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form  method="post" action="<?php echo base_url() . 'User/edit_user' ?>">
																	<div class="first-column">
																		<div class="form-group">
																			<input type="hidden" name="id_user" id="id_user" class="form-control" value="<?php echo $user->id_user; ?>" readonly>
																		</div>
																		<div class="form-group">
																			<label>Nama User</label>
																			<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user->nama; ?>" required>
																		</div>
																		<div class="form-group">
																			<label>Nama Instansi</label>
																			<input type="text" name="nama_instansi" id="nama_instansi" class="form-control" value="<?php echo $user->nama_instansi; ?>" required>
																		</div>
																		<div class="form-group">
																		<label>Level</label>
																			<select name="level" class="form-control" value="<?php echo $user->level; ?>" required>
																				<option value="Admin">Admin</option>
																				<option value="Marketing">Marketing</option>
																				<option value="Mitra">Mitra</option>
																			</select>
																		</div>
																		<div class="form-group">
																			<label>Alamat</label>
																			<input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $user->nama; ?>" required>
																		</div>
																		<div class="form-group">
																			<label>Nomor Handphone</label>
																			<input type="number" name="no_hp" id="no_hp" class="form-control" value="<?php echo $user->no_hp; ?>" required>
																		</div>
																		<div class="form-group">
																			<label>Username</label>
																			<input type="text" name="username" id="username" class="form-control" value="<?php echo $user->username; ?>" required>
																		</div>
																		<div class="form-group">
																			<label>Password</label>
																			<input type="text" name="password" id="password" class="form-control" value="<?php echo $user->password; ?>" required>
																		</div>
																	</div>	
																<div class="second-column">
																	<div class="form-group">
																	<div class="container" align="center"
																	<br />
																	<h3 align="center">Foto Profil</h3>
																	<br />
																	<div class="row">
																		<div class="col-md-4">&nbsp;</div>
																		<div class="col-md-4">
																			<div class="image_area">
																				<form method="post">
																					<label for="upload_image1">
																						<img src="<?= base_url() ?><?php echo $user->profile_pic ?>" id="uploaded_image" class="img-responsive img-circle" />
																						<div class="overlay">
																							<div class="text">Input Foto Profil</div>
																						</div>
																						<input type="file"  class="image" id="upload_image1" style="display:none">
																					</label>
																				</form>
																			</div>
																		</div>
																	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-lg" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">×</span>
																					</button>
																				</div>
																				<div class="modal-body">
																					<div class="img-container">
																						<div class="row">
																							<div class="col-md-8">
																								<img src="" id="sample_image1" />
																							</div>
																							<div class="col-md-4">
																								<div class="preview1" ></div>
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
																					<button type="button" class="btn btn-primary" id="crop1">Crop</button>
																				</div>
																			</div>
																		</div>
																	</div>			
																</div>
																<div class="modal-footer right">
																<button type="submit" class="btn btn-outline-success fa fa-save"> Edit User</button>
															</div>
														
														</div>	
														</form>
													</div>
											
												</div> -->
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
						<button type="button" data-toggle="modal" data-target="#add_user" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp&nbsp Tambah User</button>
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
						<form method="post" action="<?php echo base_url() . 'User/tambah_user' ?>">
							<div class="first-column">
								<div class="form-group">
									<label>Nama User</label>
									<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama User" required>
								</div>
								<div class="form-group">
									<label>Nama Instansi</label>
									<input type="text" name="nama_instansi" id="nama_instansi" class="form-control" placeholder="Masukkan Nama Instansi" required>
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
									<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat User" required>
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
								<div class="form-group">
									<input type="hidden" id="profile_pic" name="profile_pic" class="form-control" required>
								</div>
							</div>
							<div class="second-column">
								<div class="form-group">
									<div class="container" align="center">
										<br />
										<h3 align="center">Foto Profil</h3>
										<br />
										<div class="row">
											<div class="col-md-4">&nbsp;</div>
											<div class="col-md-4">
												<div class="image_area">
													<form method="post">
														<label for="upload_image">
															<img src="<?= base_url() ?>uploads/user.png ?>" id="uploaded_image" class="img-responsive img-circle" />
															<div class="overlay">
																<div class="text">Input Foto Profil</div>
															</div>
															<input type="file" class="image" id="upload_image" style="display:none">
														</label>
													</form>
												</div>
											</div>
											<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="img-container">
																<div class="row">
																	<div class="col-md-8">
																		<img id="sample_image" />
																	</div>
																	<div class="col-md-4">
																		<div class="preview"></div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
															<button type="button" class="btn btn-primary" id="crop">Crop</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer right">
									<button type="submit" class="btn btn-outline-success fa fa-save"> Simpan</button>
								</div>
							</div>

						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->

</section>
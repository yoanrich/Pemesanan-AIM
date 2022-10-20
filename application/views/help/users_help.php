<section class="content-header">
<div class="content-header">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Bantuan User</h1>
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
              <li class="breadcrumb-item active">Bantuan Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12" >
			<div class="card card-info" >
				<div class="card-header" >
					<h3 class="card-title">Panduan Penggunaan Manajemen Pemesanan PT.AIM</h3>
				</div>
			<div class="card-body">
				<div class="m-4 justify-content-center">
					<ul class="nav nav-pills" id="myTab">
						<li class="nav-item">
							<a href="#tests" class="nav-link active">Overview</a>
						</li>
						<li class="nav-item">
							<a href="#mpbio" class="nav-link">Menu Daftar Pesanan</a>
						</li>
						<li class="nav-item">
							<a href="#rapidqveda" class="nav-link">Menu Manajemen Barang</a>
						</li>
						<li class="nav-item">
							<a href="#instrument" class="nav-link">Menu Manajemen User</a>
						</li>
						<li class="nav-item">
							<a href="#instrument" class="nav-link">Menu Manajemen Laporan</a>
						</li>
					</ul>
					<br><br>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tests">
							<div class="scrollable_item_form">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<p>Sistem Manajemen Pemesanan PT AIM merupakan sistem yang dibangun untuk memudahkan dalam pemesanan dan rekapitulasi laporan secara terstruktur dan informatif. dalam sistem ini terdapat beberapa menu yang diperjelas dibawah ini :</p>
												<ol>
													<li> &nbsp;Menu Beranda merupakan tampilan awal pada sistem ini. pada menu beranda terdapat beberapa widget yang terintegrasi dengan menu - menu yang ditampilkan oleh sistem berdasarkan level pengguna sistem, dimana widget tersebut memudahkan pengguna dengan satu ketukan pada salah satu menu yang akan dituju.</li><br>
													<li> &nbsp;Menu Daftar Pesanan merupakan menu yang digunakan untuk melakukan manajemen pesanan dari user, terdapat 4 step / submenu daftar pesanan dari user yaitu : <br>
															&nbsp;A. Submenu Dalam Proses    : Submenu ini berisi pesanan user yang baru saja melakukan transaksi dan belum melakukan pembayaran, status yang muncul biasanya menunggu pembayaran<br>
															&nbsp;B. Submenu Sudah Diperiksa : Submenu ini berisi pesanan user yang sudah melakukan pelunasan pembayaran dan menunggu verifikasi dari Admin<br>
															&nbsp;C. Submenu Sedang Dikirim  : Submenu ini berisi pesanan user siap dikirimkan, surat jalan diupload admin dan dapat diakses oleh user <br>
															&nbsp;D. Submenu Dibatalkan  	 : Submenu ini berisi semua pesanan yang dibatalkan oleh user <br>
															</li> <br>
													<li> &nbsp;Menu Manajemen Barang merupakan menu yang digunakan untuk melakukan manajemen pemasukan barang baru maupun restock barang yang sudah ada</li><br>
													<li> &nbsp;Menu Manajemen User merupakan menu yang digunakan untuk melakukan manajemen hak akses pengguna dan manajamene informasi pribadi pengguna</li><br>
													<li> &nbsp;Menu Manajemen Laporan merupakan menu yang digunakan untuk rekapitulasi laporan penjualan, pemesanan dan stock barang yang tersedia</li><br>
												</ol>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<div class="tab-pane fade" id="mpbio">
							<div class="scrollable_item_form">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<p>Sistem Manajemen Pemesanan PT AIM merupakan sistem yang dibangun untuk memudahkan dalam pemesanan dan rekapitulasi laporan secara terstruktur dan informatif. dalam sistem ini terdapat beberapa menu yang diperjelas dibawah ini :</p>
												<ol>
													<li> &nbsp;Menu Beranda merupakan tampilan awal pada sistem ini. pada menu beranda terdapat beberapa widget yang terintegrasi dengan menu - menu yang ditampilkan oleh sistem berdasarkan level pengguna sistem, dimana widget tersebut memudahkan pengguna dengan satu ketukan pada salah satu menu yang akan dituju.</li><br>
													<li> &nbsp;Menu Daftar Pesanan merupakan menu yang digunakan untuk melakukan manajemen pesanan dari user, terdapat 4 step / submenu daftar pesanan dari user yaitu : <br>
															&nbsp;A. Submenu Dalam Proses    : Submenu ini berisi pesanan user yang baru saja melakukan transaksi dan belum melakukan pembayaran, status yang muncul biasanya menunggu pembayaran<br>
															&nbsp;B. Submenu Sudah Diperiksa : Submenu ini berisi pesanan user yang sudah melakukan pelunasan pembayaran dan menunggu verifikasi dari Admin<br>
															&nbsp;C. Submenu Sedang Dikirim  : Submenu ini berisi pesanan user siap dikirimkan, surat jalan diupload admin dan dapat diakses oleh user <br>
															&nbsp;D. Submenu Dibatalkan  	 : Submenu ini berisi semua pesanan yang dibatalkan oleh user <br>
															</li> <br>
													<li> &nbsp;Menu Manajemen Barang merupakan menu yang digunakan untuk melakukan manajemen pemasukan barang baru maupun restock barang yang sudah ada</li><br>
													<li> &nbsp;Menu Manajemen User merupakan menu yang digunakan untuk melakukan manajemen hak akses pengguna dan manajamene informasi pribadi pengguna</li><br>
													<li> &nbsp;Menu Manajemen Laporan merupakan menu yang digunakan untuk rekapitulasi laporan penjualan, pemesanan dan stock barang yang tersedia</li><br>
												</ol>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<div class="tab-pane fade" id="rapidqveda">
							<div class="scrollable_item_form">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<p>Sistem Manajemen Pemesanan PT AIM merupakan sistem yang dibangun untuk memudahkan dalam pemesanan dan rekapitulasi laporan secara terstruktur dan informatif. dalam sistem ini terdapat beberapa menu yang diperjelas dibawah ini :</p>
												<ol>
													<li> &nbsp;Menu Beranda merupakan tampilan awal pada sistem ini. pada menu beranda terdapat beberapa widget yang terintegrasi dengan menu - menu yang ditampilkan oleh sistem berdasarkan level pengguna sistem, dimana widget tersebut memudahkan pengguna dengan satu ketukan pada salah satu menu yang akan dituju.</li><br>
													<li> &nbsp;Menu Daftar Pesanan merupakan menu yang digunakan untuk melakukan manajemen pesanan dari user, terdapat 4 step / submenu daftar pesanan dari user yaitu : <br>
															&nbsp;A. Submenu Dalam Proses    : Submenu ini berisi pesanan user yang baru saja melakukan transaksi dan belum melakukan pembayaran, status yang muncul biasanya menunggu pembayaran<br>
															&nbsp;B. Submenu Sudah Diperiksa : Submenu ini berisi pesanan user yang sudah melakukan pelunasan pembayaran dan menunggu verifikasi dari Admin<br>
															&nbsp;C. Submenu Sedang Dikirim  : Submenu ini berisi pesanan user siap dikirimkan, surat jalan diupload admin dan dapat diakses oleh user <br>
															&nbsp;D. Submenu Dibatalkan  	 : Submenu ini berisi semua pesanan yang dibatalkan oleh user <br>
															</li> <br>
													<li> &nbsp;Menu Manajemen Barang merupakan menu yang digunakan untuk melakukan manajemen pemasukan barang baru maupun restock barang yang sudah ada</li><br>
													<li> &nbsp;Menu Manajemen User merupakan menu yang digunakan untuk melakukan manajemen hak akses pengguna dan manajamene informasi pribadi pengguna</li><br>
													<li> &nbsp;Menu Manajemen Laporan merupakan menu yang digunakan untuk rekapitulasi laporan penjualan, pemesanan dan stock barang yang tersedia</li><br>
												</ol>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="instrument">
							<div class="scrollable_item_form">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<p>Sistem Manajemen Pemesanan PT AIM merupakan sistem yang dibangun untuk memudahkan dalam pemesanan dan rekapitulasi laporan secara terstruktur dan informatif. dalam sistem ini terdapat beberapa menu yang diperjelas dibawah ini :</p>
												<ol>
													<li> &nbsp;Menu Beranda merupakan tampilan awal pada sistem ini. pada menu beranda terdapat beberapa widget yang terintegrasi dengan menu - menu yang ditampilkan oleh sistem berdasarkan level pengguna sistem, dimana widget tersebut memudahkan pengguna dengan satu ketukan pada salah satu menu yang akan dituju.</li><br>
													<li> &nbsp;Menu Daftar Pesanan merupakan menu yang digunakan untuk melakukan manajemen pesanan dari user, terdapat 4 step / submenu daftar pesanan dari user yaitu : <br>
															&nbsp;A. Submenu Dalam Proses    : Submenu ini berisi pesanan user yang baru saja melakukan transaksi dan belum melakukan pembayaran, status yang muncul biasanya menunggu pembayaran<br>
															&nbsp;B. Submenu Sudah Diperiksa : Submenu ini berisi pesanan user yang sudah melakukan pelunasan pembayaran dan menunggu verifikasi dari Admin<br>
															&nbsp;C. Submenu Sedang Dikirim  : Submenu ini berisi pesanan user siap dikirimkan, surat jalan diupload admin dan dapat diakses oleh user <br>
															&nbsp;D. Submenu Dibatalkan  	 : Submenu ini berisi semua pesanan yang dibatalkan oleh user <br>
															</li> <br>
													<li> &nbsp;Menu Manajemen Barang merupakan menu yang digunakan untuk melakukan manajemen pemasukan barang baru maupun restock barang yang sudah ada</li><br>
													<li> &nbsp;Menu Manajemen User merupakan menu yang digunakan untuk melakukan manajemen hak akses pengguna dan manajamene informasi pribadi pengguna</li><br>
													<li> &nbsp;Menu Manajemen Laporan merupakan menu yang digunakan untuk rekapitulasi laporan penjualan, pemesanan dan stock barang yang tersedia</li><br>
												</ol>
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
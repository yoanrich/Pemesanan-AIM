<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_stock');
		$this->load->model('M_user');
		$this->load->model('M_order');
		if(!$this->session->userdata('level')=='Admin'){
			redirect('Auth/login');
		}
		elseif (!$this->session->userdata('level')=='Mitra'){
			redirect('Auth/login');
		}
		elseif (!$this->session->userdata('level')=='Marketing'){
			redirect('Auth/login');
		}
	}

	public function index()
	{	
			// $x('bar')=$this->M_order->tampil_barang();
			$username = $this->session->userdata('username');
			$where = array ('username' => $username);
			$data('user') = $this->M_user->ubah_data($where, 'user')->result();

			// Get Data Keranjang Belanja By User
			$where = array ('username' => $this->session->userdata('username'));
			$data('order')=$this->M_order->order($where, 'keranjang');
			
			// Get Data Barang Jenis Tests
			$where =  array ('jenis_barang' => "Tests");
			$data('tests') = $this->M_stock->tampil_data($where, 'stock');

			// Get Data Barang Jenis MP Biomedicals
			$where =  array ('jenis_barang' => "MP-Biomedicals");
			$data('MP_Biomedicals') = $this->M_stock->tampil_data($where, 'stock');

			// Get Data Barang Jenis Rapid Q - Veda Lab
			$where =  array ('jenis_barang' => "Rapid-Q-Veda-Lab");
			$data('RapidVeda') = $this->M_stock->tampil_data($where, 'stock');

			// Get Data Barang Jenis Instruments
			$where =  array ('jenis_barang' => "Instruments");
			$data('Instruments') = $this->M_stock->tampil_data($where, 'stock');

			// Get Jumlah Pesanan By User
			$data('count') = $this->M_order->cart_count();

			
			$this->template->load('layout/admin_layout','stock/stock',$data);
	}

	public function tambah_barang()
	{	
		$nofak=$this->input->post('nofak');
		$nama_barang=$this->input->post('nama_barang');
		$jenis=$this->input->post('jenis');
		$harga_beli=$this->input->post('harga_beli');
		$harga_jual=$this->input->post('harga_jual');
		$jml_barang=$this->input->post('jml_barang');
		$total=$jml_barang*$harga_beli;
		$kobar=$this->M_stock->get_kobar();
		$kobel=$this->M_stock->get_kobel();
		$nama_instansi=$this->session->userdata('nama_instansi');
		$data = array();

		$index = 0;
		foreach($nofak as $nofak){
			array_push($data, array(
				'p_barang_nofak' 		    => $nofak,
				'p_barang_kode'		        => $kobel,
				'p_barang_nama_instansi'    => $nama_instansi
			));
			$index++;
		}
		
		$index = 0;
		foreach($nofak as $nofak){
			array_push($data, array(
				'd_pemasukan_nofak' 		    => $nofak,
				'd_pemasukan_id_barang' 		=> $kobar,
				'd_pemasukan_barang_nama' 		=> $nama_barang,
				'd_pemasukan_jenis'		  	    => $jenis,
				'd_pemasukan_harga'		  	    => $harga_beli,
				'd_pemasukan_jumlah'  	    	=> $jml_barang,
				'd_pemasukan_total'  	    	=> $total,
				'd_pemasukan_kode'		        => $kobel
			));
			$index++;	
		}

		$index = 0;
		foreach($kobar as $kobar){
			array_push($data, array(
				'id_barang' 		=> $kobar,
				'nama_barang' 		=> $nama_barang,
				'jenis_barang'		=> $jenis,
				'jml_barang'  	   	=> $jml_barang,
				'harga_beli'		=> $harga_beli,
				'harga_jual'		=> $harga_beli
			));
			$index++;
		}

		$this->M_stock->input_data_stock($data_stock, 'stock');
		$this->M_stock->input_data_pemasukan($data_pemasukan, 'pemasukan_barang');
		$this->M_stock->input_data_detail_pemasukan($data_detail_pemasukan, 'detail_pemasukan_barang');
		redirect('Stock/index');
	}

	// public function add_to_cart(){
	// 	$nofak=$this->input->post('nofak');
	// 	$nama_barang=$this->input->post('nama_barang');
	// 	$jenis=$this->input->post('jenis');
	// 	$harga_beli=$this->input->post('harga_beli');
	// 	$harga_jual=$this->input->post('harga_jual');
	// 	$jml_barang=$this->input->post('jml_barang');
	// 	$total=$jml_barang*$harga_beli;
	// 	$kobar=$this->M_stock->get_kobar();
	// 	$kobel=$this->M_stock->get_kobel();
	// 	$nama_instansi=$this->session->userdata('nama_instansi');
	// 	$no = 1;
	// 	$i=$no->row_array();
	// 	$a = array(
    //            'no'       		 => $no++,
    //            'nama_barang'     => $this->input->post('nama_barang'),
    //            'jenis'      	 => $this->input->post('jenis'),
    //            'harga_beli'      => $this->input->post('harga_beli'),
    //            'harga_jual'      => $this->input->post('harga_jual'),
	// 		   'jml_barang'    	 => $this->input->post('harga_jual'),
    //            'total'           => $this->input->post('total'),
    //         );

	// 	$this->cart->insert($a); 
	// }
}


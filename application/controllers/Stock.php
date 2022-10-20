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
			// $x['bar']=$this->M_order->tampil_barang();
			$username = $this->session->userdata('username');
			$where = array ('username' => $username);
			$data['user'] = $this->M_user->ubah_data($where, 'user')->result();

			// Get Data Keranjang Belanja By User
			$where = array ('username' => $this->session->userdata('username'));
			$data['order']=$this->M_order->order($where, 'keranjang');

			// Get Data Keranjang Belanja By User
			$where = array ('d_pemasukan_username' => $this->session->userdata('username'));
			$data['temp_pemasukan']=$this->M_order->order($where, 'pemasukan_barang_temp');

			// Get All Data Barang
			$data['all'] = $this->M_stock->get_all_barang();
			
			// Get Data Barang Jenis Tests
			$where =  array ('jenis_barang' => "Tests");
			$data['tests'] = $this->M_stock->tampil_data($where, 'stock');

			// Get Data Barang Jenis MP Biomedicals
			$where =  array ('jenis_barang' => "MP-Biomedicals");
			$data['MP_Biomedicals'] = $this->M_stock->tampil_data($where, 'stock');

			// Get Data Barang Jenis Rapid Q - Veda Lab
			$where =  array ('jenis_barang' => "Rapid-Q-Veda-Lab");
			$data['RapidVeda'] = $this->M_stock->tampil_data($where, 'stock');

			// Get Data Barang Jenis Instruments
			$where =  array ('jenis_barang' => "Instruments");
			$data['Instruments'] = $this->M_stock->tampil_data($where, 'stock');

			// Get Jumlah Pesanan By User
			$data['count'] = $this->M_order->cart_count();

			if($this->session->userdata('level')=='Admin'){
				$this->template->load('layout/admin_layout','stock/stock',$data);
				$this->session->set_flashdata('load','Action Completed');
			}
		}


	public function tambah_barang(){

		if ($this->input->post('nama_barang_new')!= ''){
			$kode_barang=$this->M_stock->get_kobar();
			$nofak=$this->input->post('nofak');
			$nama_barang=$this->input->post('nama_barang_new');
			$jenis_barang=$this->input->post('jenis_barang');
			$harga_jual=$this->input->post('harga_jual');
			$harga_beli=$this->input->post('harga_beli');
			$jml_barang=$this->input->post('jml_barang');
			$subtotal=$harga_beli*$jml_barang;
			$username=$this->input->post('username');
			$nama=$this->input->post('nama');
		} else {
			$nama_barang=$this->input->post('nama_barang');
			$kode_barang=$this->M_stock->get_kode_barang($nama_barang);
			$nofak=$this->input->post('nofak');
			$jenis_barang=$this->input->post('jenis_barang');
			$harga_jual=$this->input->post('harga_jual');
			$harga_beli=$this->input->post('harga_beli');
			$jml_barang=$this->input->post('jml_barang');
			$subtotal=$harga_beli*$jml_barang;
			$username=$this->input->post('username');
			$nama=$this->input->post('nama');
		}

		$cart_proses=$this->M_stock->tambah_pemasukan($nofak,$kode_barang,$nama_barang,$jenis_barang,$harga_jual,$harga_beli,$jml_barang,$subtotal,$username,$nama);
		$this->session->set_flashdata('add_success','Action Completed');
		redirect('Stock/index');
	}

	public function simpan_pemasukan(){
		$total=$this->input->post('total2');
		$username=$this->input->post('username');
		$nofak=$this->M_stock->get_nofak($username);
		$nama=$this->input->post('nama');
		$nobel=$this->M_stock->get_kobel();
		$this->session->set_userdata('nobel',$nobel);
		$order_proses=$this->M_stock->simpan_pemasukan($total,$nofak,$nobel,$username,$nama);
		
		if($order_proses){
			$username = $this->session->userdata('username');
			$where = array ('d_pemasukan_username' => $username);
			$this->M_order->del_order($where, 'pemasukan_barang_temp');
			redirect('Stock/index');	
		}else{
			redirect('Stock/index');
		}	
	}
	
	function cancel_pemasukan($d_pemasukan_id){
		$username = $this->session->userdata('username');
		$where = array ('d_pemasukan_username' => $username, 'd_pemasukan_id' => $d_pemasukan_id);
		$this->M_order->del_order($where, 'pemasukan_barang_temp');
		redirect('Stock/index');
	}

}
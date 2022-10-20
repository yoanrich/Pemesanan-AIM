<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_stock');
		$this->load->model('M_user');
		$this->load->model('M_order');
		$this->load->model('M_laporan');
		$this->load->helper('file'); 
		$this->load->library('form_validation');
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

			// Get Jumlah Pesanan By User
			$data['count'] = $this->M_order->cart_count();

			// Get Bulan Tahun Penjualan
			$data['bulan_tahun_pjln'] = $this->M_laporan->get_bulan_tahun_penjualan();

			// Get Bulan Tahun Pemasukan
			$data['bulan_tahun_pmsk'] = $this->M_laporan->get_bulan_tahun_pemasukan();

			$data['user_data'] = $this->M_user->tampil_data()->result();
			if($this->session->userdata('level')=='Admin'){
				$this->template->load('layout/admin_layout','laporan_ops/laporan',$data);
			}
	}

	function lap_stok_barang(){
		$x['data']=$this->M_laporan->laporan_stock_barang();
		$this->load->view('laporan_ops/v_laporan_stock',$x);
	}

	function lap_pemasukan_barang(){
		$x['data']=$this->M_laporan->laporan_pemasukan_barang();
		$this->load->view('laporan_ops/v_laporan_pemasukan_barang',$x);
	}

	function lap_penjualan_barang(){
		$x['data']=$this->M_laporan->laporan_penjualan_barang();
		$this->load->view('laporan_ops/v_laporan_penjualan_barang',$x);
	}

	function lap_pemasukan_per(){
		$where=$this->input->post('filter');
		$x['data']=$this->M_laporan->laporan_pemasukan_barang_per($where);
		$this->load->view('laporan_ops/v_laporan_pemasukan_barang',$x);
	}

	function lap_penjualan_per(){
		$where=$this->input->post('filter2');
		$x['data']=$this->M_laporan->laporan_penjualan_barang_per($where);
		$this->load->view('laporan_ops/v_laporan_penjualan_barang',$x);
	}
}
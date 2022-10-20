<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_Process extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_order');
		$this->load->model('M_user');
		if (!$this->session->userdata('level') == 'Admin') {
			redirect('Auth/login');
		} elseif (!$this->session->userdata('level') == 'Mitra') {
			redirect('Auth/login');
		} elseif (!$this->session->userdata('level') == 'Marketing') {
			redirect('Auth/login');
		}
	}

	public function index()
	{
		//$x['bar']=$this->M_order->tampil_barang();

		$where = array('username' => $this->session->userdata('username'));
		$data['order'] = $this->M_order->order($where, 'transaksi');

		if ($this->session->userdata('level') != "Mitra") {

			$wherebp = array('step' => 'Belum Dibayar');
			$data['before_payment'] = $this->M_order->before_payment($wherebp, 'transaksi')->result();

			$wherep = array('step' => 'Sudah Lunas');
			$data['after_payment'] = $this->M_order->after_payment($wherep, 'transaksi')->result();

			$wherep = array('step' => 'Pesanan Dibatalkan');
			$data['canceled'] = $this->M_order->after_payment($wherep, 'transaksi')->result();

			$wherep = array('step' => 'Pesanan Dikirim');
			$data['delivered'] = $this->M_order->after_payment($wherep, 'transaksi')->result();
		} else {

			$wherebp = array('step' => 'Belum Dibayar', 'username' => $this->session->userdata('username'));
			$data['before_payment'] = $this->M_order->before_payment($wherebp, 'transaksi')->result();

			$wherep = array('step' => 'Sudah Lunas', 'username' => $this->session->userdata('username'));
			$data['after_payment'] = $this->M_order->after_payment($wherep, 'transaksi')->result();

			$wherep = array('step' => 'Pesanan Dibatalkan', 'username' => $this->session->userdata('username'));
			$data['canceled'] = $this->M_order->after_payment($wherep, 'transaksi')->result();

			$wherep = array('step' => 'Pesanan Dikirim', 'username' => $this->session->userdata('username'));
			$data['delivered'] = $this->M_order->after_payment($wherep, 'transaksi')->result();
		}


		// $wherebp = array ('step' => 'Belum Dibayar', 'username' => $this->session->userdata('username'));
		// $data['before_payment']=$this->M_order->before_payment($wherebp, 'transaksi')->result();

		// $wherep = array ('step' => 'Sudah Lunas', 'username' => $this->session->userdata('username'));
		// $data['after_payment']=$this->M_order->after_payment($wherep, 'transaksi')->result();

		// $wherep = array ('step' => 'Pesanan Dibatalkan', 'username' => $this->session->userdata('username'));
		// $data['canceled']=$this->M_order->after_payment($wherep, 'transaksi')->result();

		// $wherep = array ('step' => 'Pesanan Dikirim', 'username' => $this->session->userdata('username'));
		// $data['delivered']=$this->M_order->after_payment($wherep, 'transaksi')->result();

		// Get Jumlah Pesanan By User
		$data['count'] = $this->M_order->cart_count();

		// Get Data Keranjang Belanja By User
		$where = array('username' => $this->session->userdata('username'));
		$data['order'] = $this->M_order->order($where, 'keranjang');

		// Get Data dari User
		$username = $this->session->userdata('username');
		$where = array('username' => $username);
		$data['user'] = $this->M_user->ubah_data($where, 'user')->result();

		$data['all'] = $this->M_user->get_all_user();


		if ($this->session->userdata('level') == 'Admin') {
			$this->template->load('layout/admin_layout', 'order/admin_order_list', $data);
		} else if ($this->session->userdata('level') == 'Marketing') {
			$this->template->load('layout/marketing_layout', 'order/admin_order_list', $data);
		} else {
			$this->template->load('layout/main_layout', 'order/order_list', $data);
		}
	}

	public function rincian($jual_kode)
	{
		// Get Data dari User
		$username = $this->session->userdata('username');
		$where = array('username' => $username);
		$data['user'] = $this->M_user->ubah_data($where, 'user')->result();

		// Get Jumlah Pesanan By User
		$data['count'] = $this->M_order->cart_count();

		$where = $jual_kode;
		$data['data'] = $this->M_order->rincian($where);
		$this->template->load('layout/invoice_layout', 'order/order_detail', $data);
	}

	public function surat_jalan($jual_kode)
	{
		// Get Data dari User
		$username = $this->session->userdata('username');
		$where = array('username' => $username);
		$data['user'] = $this->M_user->ubah_data($where, 'user')->result();

		// Get Jumlah Pesanan By User
		$data['count'] = $this->M_order->cart_count();

		$where = $jual_kode;
		$data['data'] = $this->M_order->rincian($where);
		$this->template->load('layout/invoice_layout', 'order/travel_doc', $data);
	}

	public function history()
	{
		$where = array('username' => $this->session->userdata('username'));
		$data['order'] = $this->M_order->order($where, 'transaksi');

		if ($this->session->userdata('level') != "Mitra") {
			$wherep = array('step' => 'Pesanan Selesai');
			$data['finished'] = $this->M_order->after_payment($wherep, 'transaksi')->result();
		} else {
			$wherep = array('step' => 'Pesanan Selesai',  'username' => $this->session->userdata('username'));
			$data['finished'] = $this->M_order->after_payment($wherep, 'transaksi')->result();
		}

		// Get Jumlah Pesanan By User
		$data['count'] = $this->M_order->cart_count();

		$data['all'] = $this->M_user->get_all_user();

		// Get Data Keranjang Belanja By User
		$where = array('username' => $this->session->userdata('username'));
		$data['order'] = $this->M_order->order($where, 'keranjang');

		// Get Data dari User
		$username = $this->session->userdata('username');
		$where = array('username' => $username);
		$data['user'] = $this->M_user->ubah_data($where, 'user')->result();


		if ($this->session->userdata('level') == 'Admin') {
			$this->template->load('layout/admin_layout', 'order/history', $data);
		} else if ($this->session->userdata('level') == 'Marketing') {
			$this->template->load('layout/marketing_layout', 'order/history', $data);
		} else {
			$this->template->load('layout/main_layout', 'order/history', $data);
		}
	}

	function pesanan_dibatalkan($jual_kode)
	{
		$step = 'Pesanan Dibatalkan';
		$data = array('step' => $step,);
		$where = array('jual_kode' => $jual_kode);
		$this->M_order->update($where, $data, 'transaksi');
		redirect('Order_Process/index');
	}

	function sudah_membayar($jual_kode)
	{
		$step = 'Sudah Lunas';
		$data = array('step' => $step,);
		$where = array('jual_kode' => $jual_kode);
		$this->M_order->update($where, $data, 'transaksi');
		redirect('Order_Process/index');
	}

	function kirim($jual_kode)
	{
		$step = 'Pesanan Dikirim';
		$data = array('step' => $step,);
		$where = array('jual_kode' => $jual_kode);
		$this->M_order->update($where, $data, 'transaksi');
		redirect('Order_Process/index');
	}

	function selesai($jual_kode)
	{
		$step = 'Pesanan Selesai';
		$data = array('step' => $step,);
		$where = array('jual_kode' => $jual_kode);
		$this->M_order->update($where, $data, 'transaksi');
		redirect('Order_Process/history');
	}


	function do_upload()
	{
		$config['upload_path'] = "./uploads/surat";
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload("file")) {
			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data']['file_name'];

			$str = array('file_surat' => $image,);
			$where = array('jual_kode' => $jual_kode);
			$this->M_order->update($where, $str, 'transaksi');
			echo json_decode($result);
		}
	}
}

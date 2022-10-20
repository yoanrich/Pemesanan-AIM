<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_stock');
		$this->load->model('M_user');
		$this->load->model('M_order');
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
		// $x['bar']=$this->M_order->tampil_barang();
		$username = $this->session->userdata('username');
		$where = array('username' => $username);
		$data['user'] = $this->M_user->ubah_data($where, 'user')->result();

		// Get Data Keranjang Belanja By User
		if ($this->session->userdata('level') != 'Admin') {
			$where = array('username' => $this->session->userdata('username'));
			$data['order'] = $this->M_order->order($where, 'keranjang');
		}

		// Get All User
		$data['all'] = $this->M_user->get_all_user();

		// Get Data Barang Jenis Tests
		$where =  array('jenis_barang' => "Tests");
		$data['tests'] = $this->M_stock->tampil_data($where, 'stock');

		// Get Data Barang Jenis MP Biomedicals
		$where =  array('jenis_barang' => "MP-Biomedicals");
		$data['MP_Biomedicals'] = $this->M_stock->tampil_data($where, 'stock');

		// Get Data Barang Jenis Rapid Q - Veda Lab
		$where =  array('jenis_barang' => "Rapid-Q-Veda-Lab");
		$data['RapidVeda'] = $this->M_stock->tampil_data($where, 'stock');

		// Get Data Barang Jenis Instruments
		$where =  array('jenis_barang' => "Instruments");
		$data['Instruments'] = $this->M_stock->tampil_data($where, 'stock');

		// Get Jumlah Pesanan By User
		$data['count'] = $this->M_order->cart_count();

		if ($this->session->userdata('level') == 'Mitra') {
			$this->template->load('layout/main_layout', 'order/order', $data);
		} elseif ($this->session->userdata('level') == 'Marketing') {
			$this->template->load('layout/marketing_layout', 'order/order_marketing', $data);
		}
	}

	public function tambah_keranjang()
	{
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$jenis_barang = $this->input->post('jenis_barang');
		$harga_jual = $this->input->post('harga_jual');
		$jml_barang = $this->input->post('jml_barang');
		$catatan = $this->input->post('catatan');
		$subtotal = $harga_jual * $jml_barang;
		$username = $this->session->userdata('username');

		$cart_proses = $this->M_order->tambah_keranjang(
			$kode_barang,
			$nama_barang,
			$jenis_barang,
			$harga_jual,
			$jml_barang,
			$catatan,
			$subtotal,
			$username
		);

		$this->session->set_flashdata('order_success', 'Action Completed');
		redirect('Order');
	}

	public function simpan_transaksi()
	{
		if ($username = $this->session->userdata('level') == "Marketing") {
			$diskon = $this->input->post('diskon');
			$calculate_disc = $this->input->post('total') * $diskon / 100;
			$total = $this->input->post('total');
			$total_with_disc = $total - $calculate_disc;
			$order_by_marketing = 1;
			$nama_marketing = $username = $this->session->userdata('nama');
		} else {
			$diskon = 0;
			$total_with_disc = 0;
			$total = $this->input->post('total');
			$order_by_marketing = 0;
			$nama_marketing = '-';
			$total_with_disc = $total;
		}

		$step = 'Belum Dibayar';
		$username = $this->input->post('username');
		$user_data = $this->M_user->get_data_user($username);

		foreach ($user_data->result_array() as $usr) {
			$nama = $usr['nama'];
			$nama_instansi = $usr['nama_instansi'];
			$alamat = $usr['alamat'];
		}
		$notrans = $this->M_order->get_kotrans();
		$this->session->set_userdata('notrans', $notrans);
		$order_proses = $this->M_order->simpan_penjualan(
			$total,
			$username,
			$diskon,
			$total_with_disc,
			$step,
			$nama_instansi,
			$nama,
			$alamat,
			$notrans,
			$order_by_marketing,
			$nama_marketing
		);

		if ($order_proses) {
			$username = $this->session->userdata('username');
			$where = array('username' => $username);
			$this->M_order->del_order($where, 'keranjang');
			redirect('Order_Process');
		} else {
			redirect('Order');
		}
	}

	public function cetak()
	{
		$x['data'] = $this->M_order->cetak_in();
		$this->load->view('c_tr', $x);
	}


	public function rincian($jual_kode)
	{
		$where = $jual_kode;
		$x['data'] = $this->M_order->rincian($where);
		$this->template->load('template_kasir', 'pemesanan/detail_order', $x);
	}

	public function sudah_membayar()
	{
		$jual_kode	 = $this->input->post('jual_kode');
		$step    	 = 'Lunas';

		$data = array(
			'step  ' => $step,
		);

		$where = array('jual_kode' => $jual_kode);

		$this->M_order->update($where, $data, 'transaksi');
		redirect('Pemesanan/index');
	}

	function hapus_keranjang($id_keranjang)
	{
		$username = $this->session->userdata('username');
		$where = array('username' => $username, 'id_keranjang' => $id_keranjang);
		$this->M_order->del_order($where, 'keranjang');
		redirect('Order/index');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_order');
		$this->load->model('M_user');
	}

public function index()
	{
		// Get Data User
		$username = $this->session->userdata('username');
		$where = array ('username' => $username);
		$data['user'] = $this->M_user->ubah_data($where, 'user')->result();

		// Get Jumlah Pesanan By User
		$data['count'] = $this->M_order->cart_count();

		// Get Data Keranjang Belanja By User
		$where = array ('username' => $this->session->userdata('username'));
		$data['order']=$this->M_order->order($where, 'keranjang');

        if($this->session->userdata('level')=="Admin"){
            $this->template->load('layout/admin_layout','help/admin_help', $data);
        }else{
            $this->template->load('layout/admin_layout','help/users_help', $data);
        }
	}
}

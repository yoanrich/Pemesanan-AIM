<?php

defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

	function __construct()
	{

		parent::__construct();

		$this->load->model('M_stock');

		$this->load->model('M_user');

		$this->load->model('M_order');

		$this->load->helper('file');

		$this->load->library('form_validation');

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



		$data['user_data'] = $this->M_user->tampil_data()->result();

		$this->template->load('layout/admin_layout', 'user/user', $data);
	}


	function edit_user($id_user)
	{

		$username = $this->session->userdata('username');

		$where = array('username' => $username);

		$data['user'] = $this->M_user->ubah_data($where, 'user')->result();


		$where = array('id_user' => $id_user);

		$data['user_data'] = $this->M_user->ubah_data($where, 'user')->result();

		$this->template->load('layout/admin_layout', 'user/edit_user', $data);
	}


	function simpan_edit_user($id_user)
	{

		$id_user = $this->input->post('id_user');

		$nama = $this->input->post('nama');

		$nama_instansi = $this->input->post('nama_instansi');

		$level = $this->input->post('level');

		$alamat = $this->input->post('alamat');

		$no_hp = $this->input->post('no_hp');

		$username = $this->input->post('username');

		$password = $this->input->post('password');

		$profile_pic = $this->input->post('profile_pic');


		$data = array(

			'id_user'		=> $id_user,

			'nama' 		    => $nama,

			'nama_instansi' => $nama_instansi,

			'level'  	    => $level,

			'no_hp'  	    => $no_hp,

			'alamat'  	    => $alamat,

			'username'      => $username,

			'password'      => $password,

			'profile_pic'   => $profile_pic

		);


		$user_data = $this->M_user->get_data_user_by_id($id_user);

		foreach ($user_data->result_array() as $usr) {

			$path = $usr['profile_pic'];
		}


		delete_files($path);


		$where = array('id_user' => $id_user);

		$this->M_user->ubah_data_simpan($where, $data, 'user');

		redirect('User/index');
	}




	public function tambah_user()
	{

		$nama = $this->input->post('nama');

		$nama_instansi = $this->input->post('nama_instansi');

		$level = $this->input->post('level');

		$alamat = $this->input->post('alamat');

		$no_hp = $this->input->post('no_hp');

		$username = $this->input->post('username');

		$password = $this->input->post('password');

		$profile_pic = $this->input->post('profile_pic');


		$data = array(

			'nama' 		    => $nama,

			'nama_instansi' => $nama_instansi,

			'level'  	    => $level,

			'no_hp'  	    => $no_hp,

			'alamat'  	    => $alamat,

			'username'      => $username,

			'password'      => $password,

			'profile_pic'   => $profile_pic

		);


		$this->M_user->input_data($data, 'user');

		redirect('User/index');
	}


	function hapus_user($id_user)
	{

		$where = array('id_user' => $id_user);

		$this->M_order->del_order($where, 'user');

		redirect('User/index');
	}
}

<?php

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_login');
        
    }
   public function index() {
        $this->load->view('login');
        
   }
   public function login(){

		$user=$this->input->post('username');
        $pass=$this->input->post('password');

        $ceklogin=$this->M_login->check_login($user,$pass);

        if($ceklogin){
            foreach ($ceklogin as $row); 
            $this->session->set_userdata('username',$row->username);
            $this->session->set_userdata('level',$row->level);
            $this->session->set_userdata('nama',$row->nama);
            $this->session->set_userdata('nama_instansi',$row->nama_instansi);
            
            if($this->session->userdata('level')=="Admin"){
                $this->session->set_flashdata('success','Action Completed');
                redirect('dashboard_controllers/Administrator');
            }elseif ($this->session->userdata('level')=="Marketing") {
                $this->session->set_flashdata('success','Action Completed');
                redirect('dashboard_controllers/User');
                # code...
            }elseif ($this->session->userdata('level')=="Mitra") {
                $this->session->set_flashdata('success','Action Completed');
                redirect('dashboard_controllers/User');
                # code...
            }
	    }
           	else{
                $this->session->set_flashdata('failed','Action Not Completed');
                redirect('Auth/index');
            }
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}

}
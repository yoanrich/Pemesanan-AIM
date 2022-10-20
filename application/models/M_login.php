<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    function check_login($username, $password) {

    	$this->db->select('username,password,level,nama,nama_instansi');
    	$this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows()==1){

        	return $query->result();

        }else{
        	return false;
        }
    }

}


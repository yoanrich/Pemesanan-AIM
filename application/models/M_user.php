<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

	public function tampil_data()
	{
		return $this->db->get('user');
	}

	public function input_data($data)
	{
		$this->db->insert('user', $data);
	}

	public function hapus($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ubah_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function get_all_user()
	{
		$query = $this->db->query('SELECT username,level,nama, nama_instansi FROM user WHERE level="Mitra"');
		return $query->result();
	}
}

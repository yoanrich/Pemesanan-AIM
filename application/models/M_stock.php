<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stock extends CI_Model {

	public function tampil_data($where, $table)
	{
		return $this->db->get_where($table,$where)->result_array();
	}

	function get_all_barang()
    {
        $query = $this->db->query('SELECT id_barang,nama_barang,jenis_barang FROM stock');
        return $query->result();
    }

	function tambah_pemasukan($kode_barang,$nofak,$nama_barang,$jenis_barang,$harga_jual,$harga_beli,$jml_barang,$subtotal,$username,$nama){
		$this->db->query("INSERT INTO pemasukan_barang_temp (d_pemasukan_id_barang,
						d_pemasukan_nofak,
						d_pemasukan_barang_nama,
						d_pemasukan_jenis_barang,
						d_pemasukan_harga_jual,
						d_pemasukan_harga_beli,
						d_pemasukan_jumlah,
						d_pemasukan_total,
						d_pemasukan_username,
						d_pemasukan_user) 
		VALUES ('$nofak',
				'$kode_barang',
				'$nama_barang',
				'$jenis_barang',
				'$harga_jual',
				'$harga_beli',
				'$jml_barang',
				'$subtotal',
				'$username',
				'$nama')");

	}

	function simpan_pemasukan($total,$nofak,$nobel,$username,$nama){
		// Insert Data ke Tabel Transaksi
		$this->db->query("INSERT INTO pemasukan_barang (p_barang_total,p_barang_kode,p_barang_username,p_barang_user) VALUES ('$total','$nobel','$username','$nama')");
		
		// Insert Data ke Tabel Detail Penjualan Barang
		$where = array ('d_pemasukan_username' => $this->session->userdata('username'));
		$pemasukan=$this->M_stock->tampil_data($where, 'pemasukan_barang_temp');
		foreach ($pemasukan as $item) {
			$data=array(
				'd_pemasukan_nofak'				=>	$item['d_pemasukan_nofak'],
				'd_pemasukan_id_barang'			=>  $item['d_pemasukan_id_barang'],
				'd_pemasukan_barang_nama'		=>	$item['d_pemasukan_barang_nama'],
				'd_pemasukan_jenis_barang'		=>	$item['d_pemasukan_jenis_barang'],
				'd_pemasukan_harga_jual'		=>	$item['d_pemasukan_harga_jual'],
				'd_pemasukan_harga_beli'		=>	$item['d_pemasukan_harga_beli'],
				'd_pemasukan_jumlah'			=>	$item['d_pemasukan_jumlah'],
				'd_pemasukan_total'				=>  $item['d_pemasukan_total'],
				'd_pemasukan_username'			=>  $item['d_pemasukan_username'],
				'd_pemasukan_user'				=>  $item['d_pemasukan_user'],   
				'd_pemasukan_kode'				=>	$nobel
			);

			$this->db->insert('detail_pemasukan_barang',$data);
			$this->db->select('id_barang')->from('stock')->where('id_barang',$item['d_pemasukan_id_barang'])->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$this->db->query("update stock set jml_barang=jml_barang+'$item[d_pemasukan_jumlah]',harga_jual='$item[d_pemasukan_harga_jual]', harga_beli='$item[d_pemasukan_harga_beli]' where id_barang='$item[d_pemasukan_id_barang]'");
			}
			else {
				$this->db->query("INSERT INTO stock (id_barang, nama_barang, jenis_barang, jml_barang, harga_beli, harga_jual) VALUES ('$item[d_pemasukan_id_barang]','$item[d_pemasukan_barang_nama]','$item[d_pemasukan_jenis_barang]','$item[d_pemasukan_jumlah]','$item[d_pemasukan_harga_beli]','$item[d_pemasukan_harga_jual]')");
			}
		}
		return true;
	}

	public function input_data_stock($data)
	{
		$this->db->insert('stock',$data);
	}

	public function hapus($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ubah_data($where, $table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function get_barang($idbar){
		$hsl=$this->db->query("SELECT * FROM stock where id_barang='$idbar'");
		return $hsl;
	}

	public function get_kode_barang($nama_barang){
		$this->db->select('id_barang')->from('stock')->where('nama_barang',$nama_barang);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row()->id_barang;
		}
		return false;
	}

	public function get_nofak($username){
		$this->db->select('d_pemasukan_nofak')->from('pemasukan_barang_temp')->where('d_pemasukan_username',$username)->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row()->d_pemasukan_nofak;
		}
		return false;
	}
	// function simpan_barang($kobar,$nabar,$stok,$harpok,$harjul){
	// 	$hsl=$this->db->query("INSERT INTO stock (id_barang,nama_barang,jml_barang,harga_beli,harga_jual) VALUES ('$kobar','$nabar','$stok','$harpok','$harjul')");
	// 	return $hsl;
	// }

	function get_kobel(){
		$q = $this->db->query("SELECT MAX(RIGHT(p_barang_kode,6)) AS kd_max FROM pemasukan_barang WHERE DATE(p_barang_tanggal)");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BL".date('dmy').$kd;
	}

	function get_kobar(){
		$query = $this->db->get('pemasukan_barang_temp');
		if ($query->num_rows() > 0) 
		{
			$q = $this->db->query("SELECT MAX(RIGHT(d_pemasukan_id_barang,3)) AS kd_max FROM pemasukan_barang_temp");
			$kd = "";
			if($q->num_rows()>0){
				foreach($q->result() as $k){
					$tmp = ((int)$k->kd_max)+1;
					$kd = sprintf("%03s", $tmp);
				}
			}else{
				$kd = "001";
			}
			return "BR".$kd;            
		} 
		else
		{
			$q = $this->db->query("SELECT MAX(RIGHT(id_barang,3)) AS kd_max FROM stock");
			$kd = "";
			if($q->num_rows()>0){
				foreach($q->result() as $k){
					$tmp = ((int)$k->kd_max)+1;
					$kd = sprintf("%03s", $tmp);
				}
			}else{
				$kd = "001";
			}
			return "BR".$kd;
		}
	}
}

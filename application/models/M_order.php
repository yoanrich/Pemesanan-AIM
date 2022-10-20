<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_order extends CI_Model
{

	function tambah_keranjang($kode_barang, $nama_barang, $jenis_barang, $harga_jual, $jml_barang, $catatan, $subtotal, $username)
	{
		$this->db->query("INSERT INTO keranjang (kode_barang,nama_barang,jenis_barang,harga_jual,jml_barang,catatan,subtotal,username) 
		VALUES ('$kode_barang','$nama_barang','$jenis_barang','$harga_jual','$jml_barang','$catatan','$subtotal','$username')");
	}

	function simpan_penjualan($total, $username, $diskon, $total_with_disc, $step, $nama_instansi, $nama, $alamat, $notrans, $order_by_marketing, $nama_marketing)
	{
		// Insert Data ke Tabel Transaksi
		$this->db->query("INSERT INTO transaksi (jual_total,
												jual_diskon,
												jual_total_diskon,
												jual_kode,username,
												nama_instansi,
												nama,alamat,
												step,
												order_by_marketing,
												username_marketing) 
												VALUES ('$total',
														'$diskon',
														'$total_with_disc',
														'$notrans',
														'$username',
														'$nama_instansi',
														'$nama',
														'$alamat',
														'$step',
														'$order_by_marketing',
														'$nama_marketing')");

		// Insert Data ke Tabel Detail Penjualan Barang
		$where = array('username' => $this->session->userdata('username'));
		$order = $this->M_order->order($where, 'keranjang');
		foreach ($order as $item) {
			$data = array(
				'd_jual_barang_id'		=>	$item['kode_barang'],
				'd_jual_barang_nama'	=>	$item['nama_barang'],
				'd_jual_jenis_barang'	=>	$item['jenis_barang'],
				'd_jual_harga'			=>	$item['harga_jual'],
				'd_jual_jumlah'			=>	$item['jml_barang'],
				'd_jual_total'			=>	$item['subtotal'],
				'd_jual_catatan'		=>	$item['catatan'],
				'd_jual_kode '			=>	$notrans
			);
			$this->db->insert('detail_penjualan_barang', $data);
			$this->db->query("update stock set jml_barang=jml_barang-'$item[jml_barang]',harga_jual='$item[harga_jual]' where id_barang='$item[kode_barang]'");
		}
		return true;
	}

	function get_kotrans()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(jual_kode,6)) AS kd_max FROM transaksi WHERE DATE(jual_tanggal)");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int)$k->kd_max) + 1;
				$kd = sprintf("%06s", $tmp);
			}
		} else {
			$kd = "000001";
		}
		return "TR" . date('dmy') . $kd;
	}

	function cetak_in()
	{
		$notrans = $this->session->userdata('notrans');
		$hsl = $this->db->query("SELECT jual_kode,DATE_FORMAT(jual_tanggal,'%d-%m-%y %h:%i:%s') AS jual_tanggal,jual_total,jual_jml_uang,nama,alamat,step1,jual_kembalian,d_jual_barang_id,d_jual_barang_nama,d_jual_harga,d_jual_jumlah,d_jual_total FROM transaksi JOIN detail_penjualan_barang ON jual_kode=d_jual_kode WHERE jual_kode='$notrans'");
		return $hsl;
	}

	public function order($where, $table)
	{
		return $this->db->get_where($table, $where)->result_array();
	}

	function del_order($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// Untuk get seberapa banyak data yang ada di keranjang, ditampilkan ke badge
	public function cart_count()
	{
		$where = $this->session->userdata('username');
		$this->db->where('username', $where);
		return $this->db->count_all_results('keranjang');
	}

	public function before_payment($wherebp, $table)
	{
		return $this->db->get_where($table, $wherebp);
	}

	public function after_payment($wherep, $table)
	{
		return $this->db->get_where($table, $wherep);
	}

	function rincian($where)
	{
		$hsl = $this->db->query("SELECT 
							jual_kode,
							DATE_FORMAT(jual_tanggal,'%d-%m-%y %h:%i:%s') AS jual_tanggal,
							jual_total,
							jual_diskon,
							jual_total_diskon,
							nama,
							alamat,
							step,
							username_marketing,
							d_jual_barang_id,
							d_jual_barang_nama,
							d_jual_harga,
							d_jual_jumlah,
							d_jual_total 
							FROM transaksi 
							JOIN detail_penjualan_barang 
							ON jual_kode=d_jual_kode 
							WHERE jual_kode='$where'");
		return $hsl;
	}

	public function update($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_laporan extends CI_Model{

	function get_bulan_tahun_pemasukan(){
		$hsl=$this->db->query("SELECT
								DATE_FORMAT(p_barang_tanggal, '%Y-%m') AS bulan_tahun,
								CASE
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 01 THEN  'Januari' 
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 02 THEN  'Februari'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 03 THEN  'Maret'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 04 THEN  'April'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 05 THEN  'Mei'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 06 THEN  'Juni'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 07 THEN  'Juli'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 08 THEN  'Agustus'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 09 THEN  'September'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 10 THEN  'Oktober'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 11 THEN  'November'
									WHEN DATE_FORMAT(p_barang_tanggal, '%m') = 12 THEN  'Desember'
								END AS bulan,
								DATE_FORMAT(p_barang_tanggal, '%Y') AS tahun
							FROM
								pemasukan_barang");
		return $hsl->result();
	}

	function get_bulan_tahun_penjualan(){
		$hsl=$this->db->query("SELECT
								DATE_FORMAT(jual_tanggal, '%Y-%m') AS bulan_tahun,
								CASE
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 01 THEN  'Januari' 
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 02 THEN  'Februari'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 03 THEN  'Maret'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 04 THEN  'April'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 05 THEN  'Mei'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 06 THEN  'Juni'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 07 THEN  'Juli'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 08 THEN  'Agustus'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 09 THEN  'September'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 10 THEN  'Oktober'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 11 THEN  'November'
									WHEN DATE_FORMAT(jual_tanggal, '%m') = 12 THEN  'Desember'
								END AS bulan,
								DATE_FORMAT(jual_tanggal, '%Y') AS tahun
							FROM
								transaksi");
		return $hsl->result();
	}

    function laporan_stock_barang(){
		$hsl=$this->db->query("SELECT * FROM stock");
		return $hsl;
	}

    function laporan_pemasukan_barang(){
		$hsl=$this->db->query("SELECT
								d_pemasukan_nofak AS No_Faktur,
								p_barang_kode AS Kode_Transaksi,
								DATE_FORMAT(p_barang_tanggal, '%d-%m-%y') AS Tanggal_Inputan,
								d_pemasukan_id_barang AS Kode_Barang,
								d_pemasukan_barang_nama AS Nama_Barang,
								d_pemasukan_jenis_barang AS Jenis_Barang,
								d_pemasukan_harga_beli AS Harga_Beli,
								d_pemasukan_harga_jual AS Harga_Jual,
								d_pemasukan_jumlah AS Jumlah,
								d_pemasukan_total AS Total,
								p_barang_total AS Sub_Total,
								p_barang_user AS Data_Entry
								FROM
									pemasukan_barang
								JOIN detail_pemasukan_barang ON d_pemasukan_kode = p_barang_kode");
		return $hsl;
	}

	function laporan_penjualan_barang(){
		$hsl=$this->db->query("SELECT
								jual_kode AS Kode_Transaksi,
								DATE_FORMAT(jual_tanggal, '%d-%m-%y') AS Tanggal,
								d_jual_barang_id AS Kode_Barang,
								d_jual_barang_nama AS Nama_Barang,
								d_jual_jenis_barang AS Jenis_Barang,
								d_jual_harga AS Harga,
								d_jual_jumlah AS Jumlah,
								d_jual_total AS Total,
								jual_total AS Sub_Total,
								nama AS Customer,
								step AS Status
								FROM
									transaksi
								JOIN detail_penjualan_barang ON d_jual_kode = jual_kode");
		return $hsl;
	}

    function laporan_pemasukan_barang_per($where){
		$hsl=$this->db->query("SELECT
								d_pemasukan_nofak AS No_Faktur,
								p_barang_kode AS Kode_Transaksi,
								DATE_FORMAT(p_barang_tanggal, '%d-%m-%y') AS Tanggal_Inputan,
								d_pemasukan_id_barang AS Kode_Barang,
								d_pemasukan_barang_nama AS Nama_Barang,
								d_pemasukan_jenis_barang AS Jenis_Barang,
								d_pemasukan_harga_beli AS Harga_Beli,
								d_pemasukan_harga_jual AS Harga_Jual,
								d_pemasukan_jumlah AS Jumlah,
								d_pemasukan_total AS Total,
								p_barang_total AS Sub_Total,
								p_barang_user AS Data_Entry
								FROM
									pemasukan_barang
								JOIN detail_pemasukan_barang ON d_pemasukan_kode = p_barang_kode
								WHERE DATE_FORMAT(p_barang_tanggal, '%Y-%m-%d')='$where'
								OR DATE_FORMAT(p_barang_tanggal, '%Y-%m')='$where'
								OR DATE_FORMAT(p_barang_tanggal, '%Y')='$where'");
		return $hsl;
	}

    function laporan_penjualan_barang_per($where){
		$hsl=$this->db->query("SELECT
							jual_kode AS Kode_Transaksi,
							DATE_FORMAT(jual_tanggal, '%d-%m-%y') AS Tanggal,
							d_jual_barang_id AS Kode_Barang,
							d_jual_barang_nama AS Nama_Barang,
							d_jual_jenis_barang AS Jenis_Barang,
							d_jual_harga AS Harga,
							d_jual_jumlah AS Jumlah,
							d_jual_total AS Total,
							jual_total AS Sub_Total,
							nama AS Customer,
							step AS Status
							FROM
								transaksi
							JOIN detail_penjualan_barang ON d_jual_kode = jual_kode
							WHERE DATE_FORMAT(jual_tanggal, '%Y-%m-%d')='$where'
							OR DATE_FORMAT(jual_tanggal, '%Y-%m')='$where'
							OR DATE_FORMAT(jual_tanggal, '%Y')='$where'");
		return $hsl;
	}

    // function laporan_penjualan_barang_perbulan($where){
	// 	$hsl=$this->db->query("SELECT jual_kode,DATE_FORMAT(jual_tanggal,'%d-%m-%y %h:%i:%s') AS jual_tanggal,jual_total,nama,alamat,step,d_jual_barang_id,d_jual_barang_nama,d_jual_harga,d_jual_jumlah,d_jual_total FROM transaksi JOIN detail_penjualan_barang ON jual_kode=d_jual_kode WHERE jual_kode='$where'");
	// 	return $hsl;
	// }

    // function laporan_penjualan_barang_pertahun($where){
	// 	$hsl=$this->db->query("SELECT jual_kode,DATE_FORMAT(jual_tanggal,'%d-%m-%y %h:%i:%s') AS jual_tanggal,jual_total,nama,alamat,step,d_jual_barang_id,d_jual_barang_nama,d_jual_harga,d_jual_jumlah,d_jual_total FROM transaksi JOIN detail_penjualan_barang ON jual_kode=d_jual_kode WHERE jual_kode='$where'");
	// 	return $hsl;
	// }

}
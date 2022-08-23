<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aset extends CI_Model {

	function get_data($where,$table){		
	return $this->db->get_where($table,$where);
	}
	function get_data_all($table){
		return $this->db->get($table);
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function brg_ke($where)
	{
		# code...
		$this->db->select_max('brg_ke');
		$this->db->where($where);
		return $query = $this->db->get('tbl_aset_inventaris');
	}
	function get_data_join_where_qrcode($where){
		$this->db->select('tbl_aset_user.nama,
		tbl_aset_inventaris.qrcode,
		tbl_aset_ruang.nama_ruang,
		tbl_aset_ruang.kode_ruangan,
		tbl_aset_inventaris.brg_ke,
		tbl_aset_gedung.nama_gedung,
		tbl_aset_barang.nama_barang,
		tbl_aset_inventaris.keterangan');
		$this->db->from('tbl_aset_inventaris');
		$this->db->join('tbl_aset_ruang','tbl_aset_inventaris.kd_ruang = tbl_aset_ruang.kd_ruang','inner');
		$this->db->join('tbl_aset_user',' tbl_aset_inventaris.id_user = tbl_aset_user.id_user','inner');
		$this->db->join('tbl_aset_gedung','tbl_aset_inventaris.id_gedung = tbl_aset_gedung.id_gedung','inner');
		$this->db->join('tbl_aset_barang','tbl_aset_inventaris.kd_barang = tbl_aset_barang.kd_barang','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_join_where_rekap($where){
		$this->db->select('tbl_aset_user.nama,
		tbl_aset_inventaris.qrcode,
		tbl_aset_inventaris.kd_inventaris,
		tbl_aset_ruang.nama_ruang,
		tbl_aset_inventaris.brg_ke,
		tbl_aset_gedung.nama_gedung,
		tbl_aset_barang.nama_barang,
		tbl_aset_inventaris.merk,
		tbl_aset_inventaris.tahun_beli,
		tbl_aset_inventaris.harga_beli,
		tbl_aset_inventaris.keterangan,
		tbl_aset_inventaris.status,
		tbl_aset_inventaris.qty');
		$this->db->from('tbl_aset_inventaris');
		$this->db->join('tbl_aset_ruang','tbl_aset_inventaris.kd_ruang = tbl_aset_ruang.kd_ruang','inner');
		$this->db->join('tbl_aset_user',' tbl_aset_inventaris.id_user = tbl_aset_user.id_user','inner');
		$this->db->join('tbl_aset_gedung','tbl_aset_inventaris.id_gedung = tbl_aset_gedung.id_gedung','inner');
		$this->db->join('tbl_aset_barang','tbl_aset_inventaris.kd_barang = tbl_aset_barang.kd_barang','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_join_where_rekap_summary($where){
		$this->db->select('distinct(tbl_aset_barang.nama_barang) AS dis_nama_barang,
		Count(tbl_aset_inventaris.kd_barang) AS count_barang');
		$this->db->from('tbl_aset_barang');
		$this->db->join('tbl_aset_inventaris','tbl_aset_barang.kd_barang = tbl_aset_inventaris.kd_barang','inner');
		$this->db->group_by('tbl_aset_barang.nama_barang');
		$this->db->where($where);
		$this->db->order_by('tbl_aset_barang.nama_barang', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_join_where_detail($like){
		$this->db->select('tbl_aset_barang.nama_barang as nm_barang,
		tbl_aset_gedung.nama_gedung as nm_gedung,
		tbl_aset_inventaris.merk as merk,
		tbl_aset_inventaris.tahun_beli as thn_beli,
		tbl_aset_inventaris.harga_beli as hrg_beli,
		tbl_aset_inventaris.status as status,
		tbl_aset_inventaris.brg_ke as brg_ke,
		tbl_aset_inventaris.keterangan as ket,
		tbl_aset_ruang.nama_ruang as nm_ruang,
		tbl_aset_user.nama as nama');
		$this->db->from('tbl_aset_inventaris');
		$this->db->join('tbl_aset_ruang','tbl_aset_inventaris.kd_ruang = tbl_aset_ruang.kd_ruang','inner');
		$this->db->join('tbl_aset_user',' tbl_aset_inventaris.id_user = tbl_aset_user.id_user','inner');
		$this->db->join('tbl_aset_gedung','tbl_aset_inventaris.id_gedung = tbl_aset_gedung.id_gedung','inner');
		$this->db->join('tbl_aset_barang','tbl_aset_inventaris.kd_barang = tbl_aset_barang.kd_barang','inner');
		// $this->db->like('qrcode', $like);
		$this->db->where($like);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}


}

/* End of file M_aset.php */
/* Location: ./application/models/M_aset.php */
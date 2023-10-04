<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

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
	function get_data_join_for_login($where){
		$this->db->select('user_mhs.user,
		user_mhs.pass,
		tmst_mahasiswa.Nama_mahasiswa,
		tmst_mahasiswa.Kode_program_studi,
		tmst_program_studi.Nama_program_studi');
		$this->db->from('user_mhs');
		$this->db->join('tmst_mahasiswa','user_mhs.user = tmst_mahasiswa.NIM','inner');
		$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}

}

/* End of file M_mahasiswa.php */
/* Location: ./application/models/M_mahasiswa.php */
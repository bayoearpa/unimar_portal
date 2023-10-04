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

}

/* End of file M_mahasiswa.php */
/* Location: ./application/models/M_mahasiswa.php */
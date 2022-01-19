<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_restapi extends CI_Model {


////////////////////////////  tbl_kues_mhsdsn MODEL ///////////////////////////////////////	

	public function get_tbl_kues_mhsdsn()
		{
			# code...
			
			$query = $this->db->get('tbl_kues_mhsdsn');
			return $query->result();
		}	

}

/* End of file M_restapi.php */
/* Location: ./application/models/M_restapi.php */
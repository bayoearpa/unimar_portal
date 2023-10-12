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
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
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
	function get_data_mhs_detail($id)
    {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai dalam database Anda
	     $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_mahasiswa.Tempat_lahir as tl,
			tmst_mahasiswa.Tanggal_lahir as tgll,
			tmst_mahasiswa.Alamat as alamat,
			tmst_mahasiswa.Jenis_kelamin as jk,
			tbl_mon.id_mon as id_mon,
			tbl_mon.d3_no_ijasah as d3_no_ijasah,
			tbl_mon.d3_tanggal_lulus as d3_tanggal_lulus,
	        tbl_mon.pra_lulus_ukp as pra_lulus_ukp,
	        tbl_mon.pra_mb_skl as pra_mb_skl,
	        tbl_mon.pra_status as pra_status,
	        tbl_mon.seafarercode as seafarercode,
	        tbl_mon.pasca_tgl_lulus as pasca_tgl_lulus,
	        tbl_mon.pasca_no_ijasah as pasca_no_ijasah,
	        tbl_mon.pasca_status as pasca_status,
	        tbl_mon.status_onboard,
	        tbl_mon.status_offboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.tgl_lap_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.tgl_lap_sign_off,
	        tbl_mon.upload_file_signoff,
	        tbl_mon.nama_perusahaan,
	        tbl_mon.status_prada,
	        tbl_mon.status_modeling,
	        tbl_mon.upload_file_trb,
	        tbl_mon.status_trb,
	        tbl_mon.status_sb,
	        tbl_mon.status_d3');
	     $this->db->from('tmst_mahasiswa');
	      $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','left');
        $this->db->where('tmst_mahasiswa.NIM', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

}

/* End of file M_mahasiswa.php */
/* Location: ./application/models/M_mahasiswa.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kues extends CI_Model {

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
	function get_data_distinct_dosen($where){
		$this->db->distinct();
		$this->db->select('tbl_kues_mhsdsn.kd_dosen as kddosen,
		tmst_dosen.Nama_dosen as nama_dosen,
		tbl_kues_mhsdsn.ta as ta,
		tbl_kues_mhsdsn.prodi');
		$this->db->from('tbl_kues_mhsdsn');
		$this->db->join('tmst_dosen','tbl_kues_mhsdsn.kd_dosen = tmst_dosen.Kode_dosen','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function insert_data_batch($table, $data){
    return $this->db->insert_batch($table, $data);
 	}
 	 function get_data_mhsdsn_sum_item($where,$item){
		$this->db->select('Sum(tbl_kues_lap_mhsdsn.'.$item.') as sum_item');  
		$this->db->from('tbl_kues_lap_mhsdsn');  
		$this->db->where($where);  
		$query=$this->db->get();  
		return $query; 
	}
	function get_data_mhsdsn_count_makul($where){
		$this->db->select('Count(distinct(kd_makul)) as jml_makul');  
		$this->db->from('tbl_kues_mhsdsn');  
		$this->db->where($where);  
		$query=$this->db->get();  
		return $query; 
	}
	function get_data_mhsdsn_count_responden($where){
		$this->db->select('Count(distinct(tbl_kues_mhsdsn.nim)) as jml_mhs');
		$this->db->from('tbl_kues_mhsdsn');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_mhslem_count_responden($where){
		$this->db->select('Count(distinct(tbl_kues_mhslem.nim)) as jml_mhs');
		$this->db->from('tbl_kues_mhslem');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_dsnlmdk_count_responden($where){
		$this->db->select('Count(tbl_kues_dsnlmdk.ta) as jml_res');
		$this->db->from('tbl_kues_dsnlmdk');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_tndklmdk_count_responden($where){
		$this->db->select('Count(tbl_kues_tndklmdk.ta) as jml_res');
		$this->db->from('tbl_kues_tndklmdk');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_mhsdsn_count_item($where,$item){
		$this->db->select('Count('.$item.') as jml_item');
		$this->db->from('tbl_kues_mhsdsn');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_mhslem_count_item($where,$item){
		$this->db->select('Count('.$item.') as jml_item');
		$this->db->from('tbl_kues_mhslem');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_dsnlmdk_count_item($where,$item){
		$this->db->select('Count('.$item.') as jml_item');
		$this->db->from('tbl_kues_dsnlmdk');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_tndklmdk_count_item($where,$item){
		$this->db->select('Count('.$item.') as jml_item');
		$this->db->from('tbl_kues_tndklmdk');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	 function get_data_mhslem_sum_item($where,$item){
		$this->db->select('Sum(tbl_kues_lap_mhslem.'.$item.') as sum_item');  
		$this->db->from('tbl_kues_lap_mhslem');  
		$this->db->where($where);  
		$query=$this->db->get();  
		return $query; 
	}
	function get_data_dsnlmdk_sum_item($where,$item){
		$this->db->select('Sum(tbl_kues_lap_dsnlmdk.'.$item.') as sum_item');  
		$this->db->from('tbl_kues_lap_dsnlmdk');  
		$this->db->where($where);  
		$query=$this->db->get();  
		return $query; 
	}
	function get_data_dsnlmdk_sum_item24($where,$item){
		$this->db->select('tbl_kues_lap_dsnlmdk.'.$item.' as data_item,
						   tbl_kues_lap_dsnlmdk.jml_responden as jml_res');  
		$this->db->from('tbl_kues_lap_dsnlmdk');  
		$this->db->where($where);  
		$query=$this->db->get();  
		return $query; 
	}
	function get_data_tndklmdk_sum_item($where,$item){
		$this->db->select('Sum(tbl_kues_lap_tndklmdk.'.$item.') as sum_item');  
		$this->db->from('tbl_kues_lap_tndklmdk');  
		$this->db->where($where);  
		$query=$this->db->get();  
		return $query; 
	}
	function get_data_tndklmdk_sum_item24($where,$item){
		$this->db->select('tbl_kues_lap_tndklmdk.'.$item.' as data_item,
						   tbl_kues_lap_tndklmdk.jml_responden as jml_res');  
		$this->db->from('tbl_kues_lap_tndklmdk');  
		$this->db->where($where);  
		$query=$this->db->get();  
		return $query; 
	}
	function get_data_mhslem_sum_item24($where,$item){
		$this->db->select('tbl_kues_lap_mhslem.'.$item.' as data_item,
						   tbl_kues_lap_mhslem.jml_responden as jml_res');  
		$this->db->from('tbl_kues_lap_mhslem');  
		$this->db->where($where);  
		$query=$this->db->get();  
		return $query; 
	}
	function get_data_join_where_nim_prodi($where){
		$this->db->select('tmst_mata_kuliah.Nama_mata_kuliah as matkul,
		tmst_dosen.Nama_dosen as dosen,
		tmst_mahasiswa.Kelas as kelas,
		tmst_mahasiswa.NIM as nim,
		tmst_mahasiswa.Nama_mahasiswa as nama,
		tmst_program_studi.Nama_program_studi as prodi,
		tran_aktivitas_mengajar_dosen.thsmstrakd as kode_ta,
		tran_aktivitas_mengajar_dosen.Kode_program_studi as kode_prodi,
		tran_aktivitas_mengajar_dosen.Kode_mata_kuliah as kode_matkul,
		tran_aktivitas_mengajar_dosen.NIDN as kode_dosen');
		$this->db->from('tran_aktivitas_mengajar_dosen');
		$this->db->join('tmst_mata_kuliah','tran_aktivitas_mengajar_dosen.Kode_mata_kuliah = tmst_mata_kuliah.Kode_mata_kuliah','inner');
		$this->db->join('tmst_dosen','tran_aktivitas_mengajar_dosen.NIDN = tmst_dosen.Kode_dosen','inner');
		$this->db->join('tmst_mahasiswa','tran_aktivitas_mengajar_dosen.Kode_kelas = tmst_mahasiswa.Kelas','inner');
		$this->db->join('tmst_program_studi','tran_aktivitas_mengajar_dosen.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_datadiri_join_where_nim($where){
		$this->db->select('tmst_mahasiswa.NIM as nim,
		tmst_mahasiswa.Nama_mahasiswa as nama,
		tmst_program_studi.Nama_program_studi as prodi,
		tmst_mahasiswa.Kelas as kelas');
		$this->db->from('tmst_mahasiswa');
		$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_datadiri_join_where_nim_smta($where){
		$this->db->select('tran_nilai_semester_mhs.thsmstrnlm as taa,
		tran_nilai_semester_mhs.Kode_Program_studi as kode_prodi,
		tran_nilai_semester_mhs.NIM as nim,
		tran_nilai_semester_mhs.Kode_Mata_kuliah as kode_makul,
		tran_nilai_semester_mhs.Kode_Kelas,
		tmst_mahasiswa.Nama_mahasiswa as nama,
		tmst_program_studi.Nama_program_studi as prodi,
		tmst_mata_kuliah.Nama_Mata_Kuliah as makul,
		tmst_mata_kuliah.SKS_mata_kuliah as sks');

		$this->db->from('tran_nilai_semester_mhs');
		$this->db->join('tmst_mahasiswa','tran_nilai_semester_mhs.NIM = tmst_mahasiswa.NIM','inner');
		$this->db->join('tmst_program_studi','tran_nilai_semester_mhs.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->join('tmst_mata_kuliah','tran_nilai_semester_mhs.Kode_Mata_kuliah = tmst_mata_kuliah.Kode_Mata_kuliah','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_distinct_mhslem_stats($where){
		$this->db->distinct();
		$this->db->select('tbl_kues_lap_mhslem.fak AS fak,
		tbl_kues_lap_mhslem.prodi AS kdprodi,
		tbl_kues_lap_mhslem.time AS tt,
		tmst_program_studi.Nama_program_studi AS prodi,
		tbl_kues_lap_mhslem.ta AS ta');
		$this->db->from('tbl_kues_lap_mhslem');
		$this->db->join('tmst_program_studi','tbl_kues_lap_mhslem.prodi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		$this->db->order_by('tbl_kues_lap_mhslem.time', 'desc');
		$query=$this->db->get();
		return $query;
	}

}

/* End of file M_kues.php */
/* Location: ./application/models/M_kues.php */
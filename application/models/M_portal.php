<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_portal extends CI_Model {

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
	function get_data_join_where($where){
		$this->db->select('tbl_kliring_ujianktsk.id_uks,
tbl_kliring_ujianktsk.nim,
tbl_kliring_ujianktsk.smt,
tbl_kliring_ujianktsk.jenjang,
tbl_kliring_ujianktsk.prodi,
tbl_kliring_ujianktsk.karya,
tbl_kliring_ujianktsk.pembimbing1,
tbl_kliring_ujianktsk.pembimbing2,
tbl_kliring_ujianktsk.pembimbing3,
tbl_kliring_ujianktsk.tgl_permohonan,
tmst_mahasiswa.Kode_perguruan_tinggi,
tmst_mahasiswa.Kode_program_studi,
tmst_mahasiswa.NIM,
tmst_mahasiswa.Kode_jenjang_pendidikan,
tmst_mahasiswa.Nama_mahasiswa,
tmst_mahasiswa.Kelas,
tmst_mahasiswa.Tempat_lahir,
tmst_mahasiswa.Tanggal_lahir,
tmst_mahasiswa.Jenis_kelamin,
tmst_mahasiswa.Alamat,
tmst_mahasiswa.Alamat_kost,
tmst_mahasiswa.Kelurahan,
tmst_mahasiswa.Kode_kecamatan,
tmst_mahasiswa.Kode_kota,
tmst_mahasiswa.Kode_provinsi,
tmst_mahasiswa.Kode_pos,
tmst_mahasiswa.Kode_negara,
tmst_mahasiswa.Status_mahasiswa,
tmst_mahasiswa.Tahun_masuk,
tmst_mahasiswa.Batas_studi,
tmst_mahasiswa.Tanggal_masuk,
tmst_mahasiswa.Tanggal_lulus,
tmst_mahasiswa.IPK_akhir,
tmst_mahasiswa.Nomor_SK_yudisium,
tmst_mahasiswa.Tanggal_SK_yudisium,
tmst_mahasiswa.Nomor_seri_ijazah,
tmst_mahasiswa.Kode_prov_asal_pendidikan,
tmst_mahasiswa.Status_awal_mahasiswa,
tmst_mahasiswa.SKS_diakui,
tmst_mahasiswa.Kode_perguruan_tinggi_asal,
tmst_mahasiswa.Kode_program_studi_asal,
tmst_mahasiswa.Kode_beasiswa,
tmst_mahasiswa.Kode_jenjang_pendidikan_sblm,
tmst_mahasiswa.NIM_asal,
tmst_mahasiswa.Kode_biaya_studi,
tmst_mahasiswa.Kode_pekerjaan,
tmst_mahasiswa.Nama_tempat_bekerja,
tmst_mahasiswa.Kode_PT_bekerja,
tmst_mahasiswa.Kode_PS_bekerja,
tmst_mahasiswa.NIDN_Promotor,
tmst_mahasiswa.NIDN_Kopromotor1,
tmst_mahasiswa.NIDN_Kopromotor2,
tmst_mahasiswa.NIDN_Kopromotor3,
tmst_mahasiswa.NIDN_Kopromotor4,
tmst_mahasiswa.Jalur_skripsi,
tmst_mahasiswa.Judul_skripsi,
tmst_mahasiswa.Bulan_awal_bimbingan,
tmst_mahasiswa.Bulan_akhir_bimbingan,
tmst_mahasiswa.NISN,
tmst_mahasiswa.Kode_kategori_penghasilan,
tmst_mahasiswa.ID_log_audit,
tmst_mahasiswa.SHIFTMSMHS,
tmst_mahasiswa.SMAWLMSMHS,
tmst_mahasiswa.bapak,
tmst_mahasiswa.ibu,
tmst_mahasiswa.alamat_ortu,
tmst_mahasiswa.hp_ortu,
tmst_mahasiswa.telp_ortu,
tmst_mahasiswa.jenis_sma,
tmst_mahasiswa.asal_sekolah,
tmst_mahasiswa.jurusan_sekolah,
tmst_mahasiswa.alamat_sekolah,
tmst_mahasiswa.tahun_lulus_sma,
tmst_mahasiswa.no_ijasah_sma,
tmst_mahasiswa.agama_mahasiswa,
tmst_mahasiswa.tinggi_badan,
tmst_mahasiswa.berat_badan,
tmst_mahasiswa.hp_mahasiswa,
tmst_mahasiswa.dosen_wali,
tmst_mahasiswa.validasi_krs,
tmst_mahasiswa.nik,
tmst_mahasiswa.rt,
tmst_mahasiswa.rw,
tmst_mahasiswa.pindahan');
		$this->db->from('tbl_kliring_ujianktsk');
		$this->db->join('tmst_mahasiswa','tbl_kliring_ujianktsk.nim = tmst_mahasiswa.NIM','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;

		
	}
	function get_data_join_uas_edit_datadiri($where)
	{
		# code...
		$this->db->select('tmst_mahasiswa.Nama_mahasiswa,
		tmst_mahasiswa.NIM,
		tmst_mahasiswa.Kode_program_studi,
		tbl_kliring_uas.smt_now,
		tbl_kliring_uas.ta,
		tbl_kliring_uas.kelas,
		tmst_program_studi.Nama_program_studi,
		tbl_kliring_uas.id_kuas');
		$this->db->from('tmst_mahasiswa');
		$this->db->join('tbl_kliring_uas','tmst_mahasiswa.NIM = tbl_kliring_uas.nim','inner');
		$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
	function get_data_join_uas_where2022($where)
	{
		# code...
		$this->db->select('tmst_mahasiswa.NIM AS nim,
		tmst_mahasiswa.Nama_mahasiswa AS nm_mhs,
		tbl_kliring_uas.id_kuas AS id_kuas,
		tbl_kliring_uas_bk.id_uas_bk AS id_bk,
		tbl_kliring_uas_bk.hasil AS hasil_bk,
		tbl_kliring_uas_mahatar.id_uas_m AS id_m,
		tbl_kliring_uas_mahatar.hasil AS hasil_m,
		tbl_kliring_uas_prodi.id_uas_p AS id_p,
		tbl_kliring_uas_prodi.hasil AS hasil_p,
		tmst_program_studi.Nama_program_studi AS nm_prodi,
		tmst_mahasiswa.Kode_jenjang_pendidikan AS kd_jenjang');
		$this->db->from('tbl_kliring_uas');
		$this->db->join('tbl_kliring_uas_bk','tbl_kliring_uas.id_kuas = tbl_kliring_uas_bk.id_kuas','left');
		$this->db->join('tbl_kliring_uas_mahatar','tbl_kliring_uas.id_kuas = tbl_kliring_uas_mahatar.id_kuas','left');
		$this->db->join('tbl_kliring_uas_prodi','tbl_kliring_uas.id_kuas = tbl_kliring_uas_prodi.id_kuas','left');
		$this->db->join('tmst_mahasiswa','tbl_kliring_uas.nim = tmst_mahasiswa.NIM','inner');
		$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;

	}
	function get_data_join_uas_where($where){
		$this->db->select('tbl_kliring_uas.id_kuas,
tbl_kliring_uas.nim,
tbl_kliring_uas.smt_now,
tbl_kliring_uas.ta,
tbl_kliring_uas.kelas,
tbl_kliring_uas.tgl_pengajauan,
tmst_mahasiswa.Kode_perguruan_tinggi,
tmst_mahasiswa.Kode_program_studi,
tmst_mahasiswa.NIM,
tmst_mahasiswa.Kode_jenjang_pendidikan,
tmst_mahasiswa.Nama_mahasiswa,
tmst_mahasiswa.Kelas,
tmst_mahasiswa.Tempat_lahir,
tmst_mahasiswa.Tanggal_lahir,
tmst_mahasiswa.Jenis_kelamin,
tmst_mahasiswa.Alamat,
tmst_mahasiswa.Alamat_kost,
tmst_mahasiswa.Kelurahan,
tmst_mahasiswa.Kode_kecamatan,
tmst_mahasiswa.Kode_kota,
tmst_mahasiswa.Kode_provinsi,
tmst_mahasiswa.Kode_pos,
tmst_mahasiswa.Kode_negara,
tmst_mahasiswa.Status_mahasiswa,
tmst_mahasiswa.Tahun_masuk,
tmst_mahasiswa.Batas_studi,
tmst_mahasiswa.Tanggal_masuk,
tmst_mahasiswa.Tanggal_lulus,
tmst_mahasiswa.IPK_akhir,
tmst_mahasiswa.Nomor_SK_yudisium,
tmst_mahasiswa.Tanggal_SK_yudisium,
tmst_mahasiswa.Nomor_seri_ijazah,
tmst_mahasiswa.Kode_prov_asal_pendidikan,
tmst_mahasiswa.Status_awal_mahasiswa,
tmst_mahasiswa.SKS_diakui,
tmst_mahasiswa.Kode_perguruan_tinggi_asal,
tmst_mahasiswa.Kode_program_studi_asal,
tmst_mahasiswa.Kode_beasiswa,
tmst_mahasiswa.Kode_jenjang_pendidikan_sblm,
tmst_mahasiswa.NIM_asal,
tmst_mahasiswa.Kode_biaya_studi,
tmst_mahasiswa.Kode_pekerjaan,
tmst_mahasiswa.Nama_tempat_bekerja,
tmst_mahasiswa.Kode_PT_bekerja,
tmst_mahasiswa.Kode_PS_bekerja,
tmst_mahasiswa.NIDN_Promotor,
tmst_mahasiswa.NIDN_Kopromotor1,
tmst_mahasiswa.NIDN_Kopromotor2,
tmst_mahasiswa.NIDN_Kopromotor3,
tmst_mahasiswa.NIDN_Kopromotor4,
tmst_mahasiswa.Jalur_skripsi,
tmst_mahasiswa.Judul_skripsi,
tmst_mahasiswa.Bulan_awal_bimbingan,
tmst_mahasiswa.Bulan_akhir_bimbingan,
tmst_mahasiswa.NISN,
tmst_mahasiswa.Kode_kategori_penghasilan,
tmst_mahasiswa.ID_log_audit,
tmst_mahasiswa.SHIFTMSMHS,
tmst_mahasiswa.SMAWLMSMHS,
tmst_mahasiswa.bapak,
tmst_mahasiswa.ibu,
tmst_mahasiswa.alamat_ortu,
tmst_mahasiswa.hp_ortu,
tmst_mahasiswa.telp_ortu,
tmst_mahasiswa.jenis_sma,
tmst_mahasiswa.asal_sekolah,
tmst_mahasiswa.jurusan_sekolah,
tmst_mahasiswa.alamat_sekolah,
tmst_mahasiswa.tahun_lulus_sma,
tmst_mahasiswa.no_ijasah_sma,
tmst_mahasiswa.agama_mahasiswa,
tmst_mahasiswa.tinggi_badan,
tmst_mahasiswa.berat_badan,
tmst_mahasiswa.hp_mahasiswa,
tmst_mahasiswa.dosen_wali,
tmst_mahasiswa.validasi_krs,
tmst_mahasiswa.nik,
tmst_mahasiswa.rt,
tmst_mahasiswa.rw,
tmst_mahasiswa.pindahan');
		$this->db->from('tbl_kliring_uas');
		$this->db->join('tmst_mahasiswa','tbl_kliring_uas.nim = tmst_mahasiswa.NIM','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;

		
	}

	function cek_data_periode($where){
		$this->db->select('tmst_mahasiswa.NIM,
		tmst_mahasiswa.Kode_program_studi,
		tbl_kliring_uas_periode.Kode_program_studi,
		tbl_kliring_uas_periode.tgl_mulai,
		tbl_kliring_uas_periode.tgl_berakhir');
		$this->db->from('tbl_kliring_uas_periode');
		$this->db->join('tmst_mahasiswa','tmst_mahasiswa.Kode_program_studi = tbl_kliring_uas_periode.Kode_program_studi','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->count_all_results();
		return $query;
}
function rekap_uas_join($where)
{
	# code...
	$this->db->select('tbl_kliring_uas.nim AS uasnim,
tbl_kliring_uas.kelas AS uaskelas,
tmst_mahasiswa.Nama_mahasiswa AS tmstnama,
tmst_program_studi.Nama_program_studi AS tmstprodi
');
	$this->db->from('tbl_kliring_uas');
	$this->db->join('tbl_kliring_uas_baak','tbl_kliring_uas.id_kuas = tbl_kliring_uas_baak.id_kuas','inner');
	$this->db->join('tbl_kliring_uas_bk','tbl_kliring_uas.id_kuas = tbl_kliring_uas_bk.id_kuas','inner');
	$this->db->join('tbl_kliring_uas_mahatar','tbl_kliring_uas.id_kuas = tbl_kliring_uas_mahatar.id_kuas','inner');
	$this->db->join('tbl_kliring_uas_prodi','tbl_kliring_uas.id_kuas = tbl_kliring_uas_prodi.id_kuas','inner');
	$this->db->join('tmst_mahasiswa','tbl_kliring_uas.nim = tmst_mahasiswa.NIM','inner');
	$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
	$this->db->where($where);

	$query=$this->db->get();
	return $query;


}
function get_data_join_prada_where($where){
		$this->db->select('tbl_kliring_prada.id_kp,
tbl_kliring_prada.nim,
tbl_kliring_prada_prodi.dosbing1,
tbl_kliring_prada_prodi.dosbing2,
tbl_kliring_prada_prodi.keterangan as keterangan_prodi,
tbl_kliring_prada_prodi.hasil as prodi_hasil,
tbl_kliring_prada_mahatar.keterangan as keterangan_mahatar,
tbl_kliring_prada_mahatar.hasil as mahatar_hasil,
tbl_kliring_prada_baak.hasil as baak_hasil,
tbl_kliring_prada_baak.keterangan as keterangan_baak,
tbl_kliring_prada_baak.tgl_kliring,
tbl_kliring_prada.tgl_permohonan,
tbl_kliring_prada_bk.tgl_kliring,
tbl_kliring_prada_mahatar.tgl_kliring,
tbl_kliring_prada_prodi.tgl_kliring,
tbl_kliring_prada_bk.hasil as bk_hasil,
tbl_kliring_prada_bk.keterangan as keterangan_bk,
tbl_kliring_prada.judul_k');
		$this->db->from('tbl_kliring_prada');
		$this->db->join('tbl_kliring_prada_baak','tbl_kliring_prada.nim = tbl_kliring_prada_baak.id_kp','inner');
		$this->db->join('tbl_kliring_prada_bk','tbl_kliring_prada.id_kp =  tbl_kliring_prada_bk.id_kp','inner');
		$this->db->join('tbl_kliring_prada_mahatar','tbl_kliring_prada.id_kp = tbl_kliring_prada_mahatar.id_kp','inner');
		$this->db->join('tbl_kliring_prada_prodi','tbl_kliring_prada.id_kp =  tbl_kliring_prada_prodi.id_kp','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
	}
//==========================================================smta===============================================

function get_data_join_nama_en_prodi ($where){
	$this->db->select('tmst_mahasiswa.NIM as nim,
tmst_mahasiswa.Nama_mahasiswa as nama,
tmst_program_studi.Nama_program_studi as prodi,
tmst_program_studi.Kode_program_studi as kode_prodi');
		$this->db->from('tmst_mahasiswa');
		$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}
function get_data_join_kurikulum_where ($where){
	$this->db->select('kurikulum_mk.kode_kurikulum,
	kurikulum_mk.kode_mk,
	tmst_mata_kuliah.Kode_mata_kuliah as kode_makul,
	tmst_mata_kuliah.Nama_mata_kuliah as nama_makul,
	tmst_mata_kuliah.SKS_mata_kuliah as sks,
	tmst_mata_kuliah.Semester');
		$this->db->from('kurikulum_mk');
		$this->db->join('tmst_mata_kuliah',' kurikulum_mk.kode_mk = tmst_mata_kuliah.Kode_mata_kuliah','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}

function get_data_join_sum_makul_temp ($where){
	$this->db->select('Sum(tmst_mata_kuliah.SKS_mata_kuliah) as jml_sks');
		$this->db->from('tbl_kliring_smta_makul_temp');
		$this->db->join('tmst_mata_kuliah',' tbl_kliring_smta_makul_temp.Kode_mata_kuliah = tmst_mata_kuliah.Kode_mata_kuliah','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}

function get_data_join_makul_temp ($where){
	$this->db->select('tmst_mata_kuliah.Nama_mata_kuliah as nama_makul,
		tmst_mata_kuliah.SKS_mata_kuliah as sks,
		tbl_kliring_smta_makul_temp.id_smta_makul as id_makul_temp,
		tmst_mata_kuliah.Kode_mata_kuliah as kd_makul');
		$this->db->from('tbl_kliring_smta_makul_temp');
		$this->db->join('tmst_mata_kuliah',' tbl_kliring_smta_makul_temp.Kode_mata_kuliah = tmst_mata_kuliah.Kode_mata_kuliah','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}
function get_data_join_makul ($where){
	$this->db->select('tmst_mata_kuliah.Nama_mata_kuliah as nama_makul,
		tmst_mata_kuliah.SKS_mata_kuliah as sks,
		tbl_kliring_smta_makul.id_smta_makul as id_makul_temp,
		tmst_mata_kuliah.Kode_mata_kuliah as kd_makul');
		$this->db->from('tbl_kliring_smta_makul');
		$this->db->join('tmst_mata_kuliah',' tbl_kliring_smta_makul.Kode_mata_kuliah = tmst_mata_kuliah.Kode_mata_kuliah','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}
function get_data_count_kelas_smta($where){
	# code...
	$this->db->select('Count(tbl_kliring_smta_makul.Kode_mata_kuliah) as jml_kuota');
	$this->db->from('tbl_kliring_smta_makul');
	$this->db->where($where);
	$query=$this->db->get();
	return $query;
}
function insert_into_smta_makul_fix($where) {
	$this->db->select('id_smta, Kode_mata_kuliah, ta');
	$this->db->from('tbl_kliring_smta_makul_temp');
	$this->db->where($where);
    $q = $this->db->get()->result(); // get first table
    foreach($q as $r) { // loop over results
        $this->db->insert('tbl_kliring_smta_makul', $r); // insert each row to another table
    }
}
function get_data_join_makul_smta_with_master_makul ($where){
		$this->db->distinct();
		$this->db->select('tmst_mata_kuliah.Nama_mata_kuliah as makul,
		tmst_mata_kuliah.Semester as smt,
		tmst_mata_kuliah.Kode_mata_kuliah as kd_makul');
		$this->db->from('tbl_kliring_smta_makul');
		$this->db->join('tmst_mata_kuliah',' tbl_kliring_smta_makul.Kode_mata_kuliah = tmst_mata_kuliah.Kode_mata_kuliah','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}
function get_data_join_smta_select_all($where){
		// $this->db->distinct();
		$this->db->select('tbl_kliring_smta.id_smta as id_smta,
		tbl_kliring_smta.nim as nim,
		tbl_kliring_smta.prodi as prodi,
		tbl_kliring_smta.jml_smt as jml_smt,
		tbl_kliring_smta.status as status,
		tbl_kliring_smta.ta as ta,
		tbl_kliring_smta_bk.id_smta_bk as id_bk,
		tbl_kliring_smta_prodi.id_smta_prodi as id_prodi,
		tmst_mahasiswa.Nama_mahasiswa as nama_mhs,
		tmst_program_studi.Nama_program_studi as nama_prodi,
		tbl_kliring_smta_bk.hasil as hasil_bk,
		tbl_kliring_smta_prodi.hasil as hasil_prodi');
		$this->db->from('tbl_kliring_smta');
		$this->db->join('tbl_kliring_smta_bk',' tbl_kliring_smta.id_smta = tbl_kliring_smta_bk.id_smta','left');
		$this->db->join('tbl_kliring_smta_prodi','tbl_kliring_smta.id_smta = tbl_kliring_smta_prodi.id_smta','left');
		$this->db->join('tmst_mahasiswa','tbl_kliring_smta.nim = tmst_mahasiswa.NIM','inner');
		$this->db->join('tmst_program_studi','tbl_kliring_smta.prodi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		$this->db->order_by('tbl_kliring_smta.id_smta', "desc");
		$this->db->limit(150);
		$query=$this->db->get();
		return $query;
}
function get_data_join_count_makul_absen($where){
	$this->db->select('Count(tbl_kliring_smta_makul.id_smta) as jml_peserta');
		$this->db->from('tbl_kliring_smta');
		$this->db->join('tbl_kliring_smta_bk',' tbl_kliring_smta.id_smta = tbl_kliring_smta_bk.id_smta','inner');
		$this->db->join('tbl_kliring_smta_makul',' tbl_kliring_smta_bk.id_smta = tbl_kliring_smta_makul.id_smta','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}
function get_data_join_cetak_absensi_pdf($where)
{
	# code...
	$this->db->select('tmst_mahasiswa.Nama_mahasiswa as nama,
		tmst_mahasiswa.NIM as nim,
		tbl_kliring_smta_makul.Kode_mata_kuliah as kd_makul,
		tbl_kliring_smta.prodi as prodi');
		$this->db->from('tbl_kliring_smta');
		$this->db->join('tbl_kliring_smta_bk',' tbl_kliring_smta.id_smta = tbl_kliring_smta_bk.id_smta','inner');
		$this->db->join('tbl_kliring_smta_makul',' tbl_kliring_smta_bk.id_smta = tbl_kliring_smta_makul.id_smta','inner');
		$this->db->join('tmst_mahasiswa',' tbl_kliring_smta.nim = tmst_mahasiswa.NIM','inner');
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
// =============================================tpkl==========================================================================		
function get_data_join_tpkl($where)
{
	# code...
		$this->db->select('tbl_kliring_tpkl.id_tpkl AS id_tpkl,
		tbl_kliring_tpkl.nim AS nim,
		tbl_kliring_tpkl.judul_pkl AS judul_pkl,
		tbl_kliring_tpkl.no_telp AS no_telp,
		tbl_kliring_tpkl.file_konduite AS file_konduite,
		tbl_kliring_tpkl.file_suratketoff AS file_suratketoff,
		tbl_kliring_tpkl.tgl_kliring AS tgl_kliring,
		tmst_mahasiswa.Nama_mahasiswa AS nama,
		tmst_program_studi.Nama_program_studi AS prodi');
		$this->db->from('tbl_kliring_tpkl');
		$this->db->join('tmst_mahasiswa',' tbl_kliring_tpkl.nim = tmst_mahasiswa.NIM','inner');
		$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}
function get_data_join_tpkl_all()
{
	# code...
		$this->db->select('tbl_kliring_tpkl.id_tpkl AS id_tpkl,
		tbl_kliring_tpkl.nim AS nim,
		tbl_kliring_tpkl.judul_pkl AS judul_pkl,
		tbl_kliring_tpkl.no_telp AS no_telp,
		tbl_kliring_tpkl.file_konduite AS file_konduite,
		tbl_kliring_tpkl.file_suratketoff AS file_suratketoff,
		tbl_kliring_tpkl.tgl_kliring AS tgl_kliring,
		tmst_mahasiswa.Nama_mahasiswa AS nama,
		tmst_program_studi.Nama_program_studi AS prodi');
		$this->db->from('tbl_kliring_tpkl');
		$this->db->join('tmst_mahasiswa',' tbl_kliring_tpkl.nim = tmst_mahasiswa.NIM','inner');
		$this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
		// $this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}
		// ============================================================== Karyawan dan dosen ===============================================
function get_data_join_kardos($where)
{
	# code...
		$this->db->select('tbl_master_kardos.id as id,
		tbl_master_kardos.niak as niak,
		tbl_master_kardos.nama as nama,
		tbl_master_kardos.jenis_kelamin as jenis_kelamin,
		tbl_master_kardos.tempat_lahir as tempat_lahir,
		tbl_master_kardos.tanggal_lahir as tanggal_lahir,
		tbl_master_kardos.telepon as telepon,
		tbl_master_kardos.agama as agama,
		tbl_master_kardos.alamat as alamat,
		tbl_master_kardos.status_nikah as status_nikah,
		tbl_master_kardos.jabatan as jabatan,
		tbl_master_kardos.sk_kartep as sk_kartep,
		tbl_master_kardos.kartep_tmt as kartep_tmt,
		tbl_master_kardos.sk_dostep as sk_dostep,
		tbl_master_kardos.dostep_tmt as dostep_tmt,
		tbl_master_kardos.status as status,
		tbl_master_jabatan.id_jabatan as id_jabatan,
		tbl_master_jabatan.jabatan as nama_jabatan');
		$this->db->from('tbl_master_kardos');
		$this->db->join('tbl_master_jabatan','tbl_master_kardos.jabatan = tbl_master_jabatan.id_jabatan','left');
		$this->db->where($where);
		//$this->db->order_by('tbl_catar_validasi.no_reg', "asc");
		$query=$this->db->get();
		return $query;
}

///////////////////////////////////////////monitoring//////////////////////////////////////////////////////////

function get_data_formon_mhsall($limit, $offset)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk dari tahun 2018
        $this->db->select('tmst_mahasiswa.NIM as nim,
        tmst_mahasiswa.Nama_mahasiswa as nama,
        tmst_program_studi.Nama_program_studi as prodi,
        tmst_program_studi.Kode_program_studi as kode_prodi,
        tbl_mon.id_mon as id_mon,
        tbl_mon.d3_no_ijasah as d3_no_ijasah,
        tbl_mon.d3_tanggal_lulus as d3_tanggal_lulus,
        tbl_mon.pra_lulus_ukp as pra_lulus_ukp,
        tbl_mon.pra_mb_skl as pra_mb_skl,
        tbl_mon.pra_status as pra_status,
        tbl_mon.seafarercode as seafarercode,
        tbl_mon.pasca_tgl_lulus as pasca_tgl_lulus,
        tbl_mon.pasca_no_ijasah as pasca_no_ijasah,
        tbl_mon.status_prada as status_prada,
        tbl_mon.pasca_status as pasca_status');
	    $this->db->from('tmst_mahasiswa');
	    $this->db->join('tmst_program_studi', 'tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi', 'inner');
	    $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','left');
	    $this->db->where('tmst_mahasiswa.Tahun_masuk >=', '2018');
	    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
	    // $this->db->limit($limit, $offset); // Apply pagination
	    $query = $this->db->get();
	    return $query->result();
}
function count_all_data_formon_mhsall()
{
    $this->db->select('COUNT(*) as count');
    $this->db->from('tmst_mahasiswa');
    $this->db->where('Tahun_masuk >=', '2018');
    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
    $query = $this->db->get();
    $result = $query->row();
    return $result->count;
}
function get_data_formon_mhsyear($year)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
			tbl_mon.id_mon as id_mon,
	        tbl_mon.d3_no_ijasah as d3_no_ijasah,
	        tbl_mon.d3_tanggal_lulus as d3_tanggal_lulus,
	        tbl_mon.pra_lulus_ukp as pra_lulus_ukp,
	        tbl_mon.pra_mb_skl as pra_mb_skl,
	        tbl_mon.pra_status as pra_status,
	        tbl_mon.seafarercode as seafarercode,
	        tbl_mon.pasca_tgl_lulus as pasca_tgl_lulus,
	        tbl_mon.pasca_no_ijasah as pasca_no_ijasah,
	        tbl_mon.status_prada as status_prada,
	        tbl_mon.pasca_status as pasca_status');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','left');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsprodi($program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
			tbl_mon.id_mon as id_mon,
	        tbl_mon.d3_no_ijasah as d3_no_ijasah,
	        tbl_mon.d3_tanggal_lulus as d3_tanggal_lulus,
	        tbl_mon.pra_lulus_ukp as pra_lulus_ukp,
	        tbl_mon.pra_mb_skl as pra_mb_skl,
	        tbl_mon.pra_status as pra_status,
	        tbl_mon.seafarercode as seafarercode,
	        tbl_mon.pasca_tgl_lulus as pasca_tgl_lulus,
	        tbl_mon.pasca_no_ijasah as pasca_no_ijasah,
	        tbl_mon.status_prada as status_prada,
	        tbl_mon.pasca_status as pasca_status');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','left');
        $this->db->where('tmst_mahasiswa.Tahun_masuk >=', '2018');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsyearnprodi($year, $program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
			tbl_mon.id_mon as id_mon,
	        tbl_mon.d3_no_ijasah as d3_no_ijasah,
	        tbl_mon.d3_tanggal_lulus as d3_tanggal_lulus,
	        tbl_mon.pra_lulus_ukp as pra_lulus_ukp,
	        tbl_mon.pra_mb_skl as pra_mb_skl,
	        tbl_mon.pra_status as pra_status,
	        tbl_mon.seafarercode as seafarercode,
	        tbl_mon.pasca_tgl_lulus as pasca_tgl_lulus,
	        tbl_mon.pasca_no_ijasah as pasca_no_ijasah,
	        tbl_mon.status_prada as status_prada,
	        tbl_mon.pasca_status as pasca_status');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','left');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
////////////---------- untuk d3
function get_data_formon_mhsall_d3($limit, $offset)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk dari tahun 2018
        $this->db->select('tmst_mahasiswa.NIM as nim,
        tmst_mahasiswa.Nama_mahasiswa as nama,
        tmst_program_studi.Nama_program_studi as prodi,
        tmst_program_studi.Kode_program_studi as kode_prodi,
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
         tbl_mon.pasca_status as status_prada,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
	    $this->db->from('tmst_mahasiswa');
	    $this->db->join('tmst_program_studi', 'tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi', 'inner');
	    $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
	    $this->db->where('Tahun_masuk >=', '2018');
	    $this->db->where('tbl_mon.status_prada >=', 'sudah');
	    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
	    // $this->db->limit($limit, $offset); // Apply pagination
	    $query = $this->db->get();
	    return $query->result();
}
function count_all_data_formon_mhsall_d3()
{
    $this->db->select('COUNT(*) as count');
    $this->db->from('tmst_mahasiswa');
    $this->db->where('Tahun_masuk >=', '2018');
    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
    $query = $this->db->get();
    $result = $query->row();
    return $result->count;
}
function get_data_formon_mhsyear_d3($year)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tbl_mon.status_prada >=', 'sudah');
        $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsprodi_d3($program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('tmst_mahasiswa.Tahun_masuk >=', '2018');
	    $this->db->where('tbl_mon.status_prada >=', 'sudah');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsyearnprodi_d3($year, $program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
       	$this->db->where('tbl_mon.status_prada >=', 'sudah');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
//////////////////////---------------- end d3
////////////---------- untuk stanby 
function get_data_formon_mhsall_sb($limit, $offset)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk dari tahun 2018
        $this->db->select('tmst_mahasiswa.NIM as nim,
        tmst_mahasiswa.Nama_mahasiswa as nama,
        tmst_program_studi.Nama_program_studi as prodi,
        tmst_program_studi.Kode_program_studi as kode_prodi,
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
        tbl_mon.status_onboard as status_onboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
	    $this->db->from('tmst_mahasiswa');
	    $this->db->join('tmst_program_studi', 'tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi', 'inner');
	    $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
	    $this->db->where('Tahun_masuk >=', '2018');
	    $this->db->where('tbl_mon.pra_status >=', 'sudah');
	    $this->db->where('tbl_mon.status_sb >=', 'iya');
	    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
	    // $this->db->limit($limit, $offset); // Apply pagination
	    $query = $this->db->get();
	    return $query->result();
}
function count_all_data_formon_mhsall_sb()
{
    $this->db->select('COUNT(*) as count');
    $this->db->from('tmst_mahasiswa');
    $this->db->where('Tahun_masuk >=', '2018');
    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
    $query = $this->db->get();
    $result = $query->row();
    return $result->count;
}
function get_data_formon_mhsyear_sb($year)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.status_onboard as status_onboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
         $this->db->where('tbl_mon.pra_status >=', 'sudah');
         $this->db->where('tbl_mon.status_sb >=', 'iya');
        $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsprodi_sb($program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.status_onboard as status_onboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('tmst_mahasiswa.Tahun_masuk >=', '2018');
        $this->db->where('tbl_mon.pra_status >=', 'sudah');
        $this->db->where('tbl_mon.status_sb >=', 'iya');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsyearnprodi_sb($year, $program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.status_onboard as status_onboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tbl_mon.pra_status >=', 'sudah');
        $this->db->where('tbl_mon.status_sb >=', 'iya');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
//////////////////////---------------- end sb
////////////---------- untuk onboard
function get_data_formon_mhsall_ob($limit, $offset)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk dari tahun 2018
        $this->db->select('tmst_mahasiswa.NIM as nim,
        tmst_mahasiswa.Nama_mahasiswa as nama,
        tmst_program_studi.Nama_program_studi as prodi,
        tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
	    $this->db->from('tmst_mahasiswa');
	    $this->db->join('tmst_program_studi', 'tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi', 'inner');
	    $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
	    $this->db->where('Tahun_masuk >=', '2018');
	    $this->db->where('tbl_mon.status_onboard >=', 'iya');
	    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
	    // $this->db->limit($limit, $offset); // Apply pagination
	    $query = $this->db->get();
	    return $query->result();
}
function count_all_data_formon_mhsall_ob()
{
    $this->db->select('COUNT(*) as count');
    $this->db->from('tmst_mahasiswa');
    $this->db->where('Tahun_masuk >=', '2018');
    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
    $query = $this->db->get();
    $result = $query->row();
    return $result->count;
}
function get_data_formon_mhsyear_ob($year)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tbl_mon.status_onboard >=', 'iya');
        $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsprodi_ob($program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('Tahun_masuk >=', '2018');
        $this->db->where('tbl_mon.status_onboard >=', 'iya');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsyearnprodi_ob($year, $program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tbl_mon.status_onboard >=', 'iya');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
//////////////////////---------------- end ob
////////////---------- untuk offboard
function get_data_formon_mhsall_off($limit, $offset)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk dari tahun 2018
        $this->db->select('tmst_mahasiswa.NIM as nim,
        tmst_mahasiswa.Nama_mahasiswa as nama,
        tmst_program_studi.Nama_program_studi as prodi,
        tmst_program_studi.Kode_program_studi as kode_prodi,
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
        tbl_mon.status_modeling as status_modeling,
	        tbl_mon.status_onboard,
	        tbl_mon.status_offboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
	    $this->db->from('tmst_mahasiswa');
	    $this->db->join('tmst_program_studi', 'tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi', 'inner');
	    $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
	    $this->db->where('Tahun_masuk >=', '2018');
	    $this->db->where('tbl_mon.status_offboard >=', 'iya');
	    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
	    // $this->db->limit($limit, $offset); // Apply pagination
	    $query = $this->db->get();
	    return $query->result();
}
function count_all_data_formon_mhsall_off()
{
    $this->db->select('COUNT(*) as count');
    $this->db->from('tmst_mahasiswa');
    $this->db->where('Tahun_masuk >=', '2018');
	$this->db->where('tbl_mon.status_offboard >=', 'iya');
    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
    $query = $this->db->get();
    $result = $query->row();
    return $result->count;
}
function get_data_formon_mhsyear_off($year)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.status_modeling as status_modeling,
	        tbl_mon.status_onboard,
	        tbl_mon.status_offboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
	    $this->db->where('tbl_mon.status_offboard >=', 'iya');
        $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsprodi_off($program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.status_modeling as status_modeling,
	        tbl_mon.status_onboard,
	        tbl_mon.status_offboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('Tahun_masuk >=', '2018');
	    $this->db->where('tbl_mon.status_offboard >=', 'iya');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsyearnprodi_off($year, $program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.status_modeling as status_modeling,
	        tbl_mon.status_onboard,
	        tbl_mon.status_offboard,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
	    $this->db->where('tbl_mon.status_offboard >=', 'iya');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
//////////////////////---------------- end off
////////////---------- untuk pasca
function get_data_formon_mhsall_pasca($limit, $offset)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk dari tahun 2018
        $this->db->select('tmst_mahasiswa.NIM as nim,
        tmst_mahasiswa.Nama_mahasiswa as nama,
        tmst_program_studi.Nama_program_studi as prodi,
        tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
	    $this->db->from('tmst_mahasiswa');
	    $this->db->join('tmst_program_studi', 'tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi', 'inner');
	    $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
	    $this->db->where('Tahun_masuk >=', '2018');
	    $this->db->where('tbl_mon.status_trb >=', 'sudah');
	    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
	    // $this->db->limit($limit, $offset); // Apply pagination
	    $query = $this->db->get();
	    return $query->result();
}
function count_all_data_formon_mhsall_pasca()
{
    $this->db->select('COUNT(*) as count');
    $this->db->from('tmst_mahasiswa');
    $this->db->where('Tahun_masuk >=', '2018');
    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
    $query = $this->db->get();
    $result = $query->row();
    return $result->count;
}
function get_data_formon_mhsyear_pasca($year)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tbl_mon.status_trb >=', 'sudah');
        $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsprodi_pasca($program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('Tahun_masuk >=', '2018');
        $this->db->where('tbl_mon.status_trb >=', 'sudah');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsyearnprodi_pasca($year, $program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tbl_mon.status_trb >=', 'sudah');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
//////////////////////---------------- end pasca
////////////---------- untuk pra
function get_data_formon_mhsall_pra($limit, $offset)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk dari tahun 2018
        $this->db->select('tmst_mahasiswa.NIM as nim,
        tmst_mahasiswa.Nama_mahasiswa as nama,
        tmst_program_studi.Nama_program_studi as prodi,
        tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
	    $this->db->from('tmst_mahasiswa');
	    $this->db->join('tmst_program_studi', 'tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi', 'inner');
	    $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
	    $this->db->where('Tahun_masuk >=', '2018');
	    $this->db->where('tbl_mon.status_prada >=', 'sudah');
	    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
	    // $this->db->limit($limit, $offset); // Apply pagination
	    $query = $this->db->get();
	    return $query->result();
}
function count_all_data_formon_mhsall_pra()
{
    $this->db->select('COUNT(*) as count');
    $this->db->from('tmst_mahasiswa');
    $this->db->where('Tahun_masuk >=', '2018');
    $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
    $query = $this->db->get();
    $result = $query->row();
    return $result->count;
}
function get_data_formon_mhsyear_pra($year)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tbl_mon.status_prada >=', 'sudah');
        $this->db->where_in('tmst_mahasiswa.Kode_program_studi', array('92403', '92402'));
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsprodi_pra($program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('Tahun_masuk >=', '2018');
        $this->db->where('tbl_mon.status_prada >=', 'sudah');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
function get_data_formon_mhsyearnprodi_pra($year, $program_studi)
{
	# code...
	 // Mengambil data mahasiswa dengan tahun_masuk sesuai dengan yang dipilih
        $this->db->select('tmst_mahasiswa.NIM as nim,
			tmst_mahasiswa.Nama_mahasiswa as nama,
			tmst_program_studi.Nama_program_studi as prodi,
			tmst_program_studi.Kode_program_studi as kode_prodi,
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
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
        $this->db->from('tmst_mahasiswa');
        $this->db->join('tmst_program_studi','tmst_mahasiswa.Kode_program_studi = tmst_program_studi.Kode_program_studi','inner');
        $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','inner');
        $this->db->where('YEAR(Tanggal_masuk)', $year);
        $this->db->where('tbl_mon.status_prada >=', 'sudah');
        $this->db->where('tmst_mahasiswa.Kode_program_studi', $program_studi);
        $query = $this->db->get();
        return $query->result();
}
//////////////////////---------------- end pra
function get_data_formon_mhs($id)
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
	        tbl_mon.pasca_status as status_prada,
	        tbl_mon.status_onboard as status_onboard,
	        tbl_mon.status_offboard as status_offboard,
	        tbl_mon.status_modeling as status_modeling,
	        tbl_mon.status_trb as status_trb,
	        tbl_mon.nama_kapal,
	        tbl_mon.tgl_sign_on,
	        tbl_mon.upload_file_signon,
	        tbl_mon.tgl_sign_off,
	        tbl_mon.upload_file_signoff');
	     $this->db->from('tmst_mahasiswa');
	      $this->db->join('tbl_mon','tmst_mahasiswa.NIM = tbl_mon.nim','left');
        $this->db->where('tmst_mahasiswa.NIM', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    ////////----> count summary

     public function countTaruna($programStudi, $tahunMasuk) {
        // Hitung jumlah taruna berdasarkan program studi dan tahun masuk
        $this->db->where('Kode_program_studi', $programStudi);
        $this->db->where('Tahun_masuk', $tahunMasuk);
        $this->db->from('tmst_mahasiswa');
        return $this->db->count_all_results();
    }
     public function countLulusUKPPra($programStudi, $tahunMasuk) {
        // Hitung jumlah lulus UKP pra dari tbl_mon berdasarkan program studi dan tahun masuk
        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_mon AS m');
        $this->db->join('tmst_mahasiswa AS s', 'm.nim = s.NIM', 'inner');
        $this->db->where('m.pra_status', 'sudah');
        $this->db->where('s.Kode_program_studi', $programStudi);
        $this->db->where('s.Tahun_masuk', $tahunMasuk);
        $query = $this->db->get();
        return $query->row()->total;
    }

    public function countStandByPrala($programStudi, $tahunMasuk) {
        // Hitung jumlah standby prala dari tbl_mon berdasarkan program studi dan tahun masuk
        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_mon AS m');
        $this->db->join('tmst_mahasiswa AS s', 'm.nim = s.NIM', 'inner');
        $this->db->where('m.pra_status', 'sudah');
        $this->db->where('s.Kode_program_studi', $programStudi);
        $this->db->where('s.Tahun_masuk', $tahunMasuk);
        $query = $this->db->get();
        return $query->row()->total;
    }

    public function countOnBoard($programStudi, $tahunMasuk) {
        // Hitung jumlah on board dari tbl_mon berdasarkan program studi dan tahun masuk
        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_mon AS m');
        $this->db->join('tmst_mahasiswa AS s', 'm.nim = s.NIM', 'inner');
        $this->db->where('m.status_onboard', 'iya');
        $this->db->where('s.Kode_program_studi', $programStudi);
        $this->db->where('s.Tahun_masuk', $tahunMasuk);
        $query = $this->db->get();
        return $query->row()->total;
    }

    public function countOffBoard($programStudi, $tahunMasuk) {
        // Hitung jumlah off board dari tbl_mon berdasarkan program studi dan tahun masuk
        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_mon AS m');
        $this->db->join('tmst_mahasiswa AS s', 'm.nim = s.NIM', 'inner');
        $this->db->where('m.status_offboard', 'iya');
        $this->db->where('s.Kode_program_studi', $programStudi);
        $this->db->where('s.Tahun_masuk', $tahunMasuk);
        $query = $this->db->get();
        return $query->row()->total;
    }

    public function countLulusUKPPasca($programStudi, $tahunMasuk) {
        // Hitung jumlah lulus UKP pasca dari tbl_mon berdasarkan program studi dan tahun masuk
        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_mon AS m');
        $this->db->join('tmst_mahasiswa AS s', 'm.nim = s.NIM', 'inner');
        $this->db->where('m.pasca_status', 'sudah');
        $this->db->where('s.Kode_program_studi', $programStudi);
        $this->db->where('s.Tahun_masuk', $tahunMasuk);
        $query = $this->db->get();
        return $query->row()->total;
    }

    public function countTotalD3($programStudi, $tahunMasuk) {
        // Hitung jumlah data keseluruhan pada tbl_mon berdasarkan program studi dan tahun masuk
        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_mon AS m');
        $this->db->join('tmst_mahasiswa AS s', 'm.nim = s.NIM', 'inner');
        $this->db->where('s.Kode_program_studi', $programStudi);
        $this->db->where('s.Tahun_masuk', $tahunMasuk);
        $query = $this->db->get();
        return $query->row()->total;
    }
		
}
/* End of file M_portal.php */
/* Location: ./application/models/M_portal.php */